import socket
import sqlite3
import datetime
import os

def handle_client(client_socket, db_path):
    try:
        # Send welcome message and available commands
        welcome_message = (
            "Welcome to the Python Server!\n"
            "Available commands:\n"
            "1 - Get the current date and time\n"
            "2 - Get the hostname of the server\n"
            "3 - Get the count of rows in the 'users' table\n"
            "Type your command and press Enter.\n"
        )
        client_socket.sendall(welcome_message.encode())

        while True:
            # Receive data from the client
            command = client_socket.recv(1024).decode().strip()
            if not command:
                break  # Exit if the client disconnects

            if command == "1":
                # Return the current date and time
                response = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
            elif command == "2":
                # Return the hostname of the server
                response = os.uname().nodename if hasattr(os, 'uname') else os.getenv('COMPUTERNAME', 'Unknown Hostname')
            elif command == "3":
                # Access the SQLite database and return the user count
                try:
                    conn = sqlite3.connect(db_path)
                    cursor = conn.cursor()
                    cursor.execute("SELECT COUNT(*) FROM users")
                    count = cursor.fetchone()[0]
                    response = f"User count: {count}"
                    conn.close()
                except sqlite3.Error as e:
                    response = f"Database error: {e}"
            else:
                response = "Invalid command. Use: 1, 2, or 3."

            # Send the response back to the client
            client_socket.sendall(response.encode())
    except Exception as e:
        try:
            client_socket.sendall(f"Error: {e}".encode())
        except:
            pass
    finally:
        client_socket.close()

def start_server(host, port, db_path):
    server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    server.bind((host, port))
    server.listen(5)  # Allow up to 5 connections
    print(f"Listening on {host}:{port}...")

    try:
        while True:
            try:
                client_socket, addr = server.accept()
                print(f"Connection from {addr}")
                handle_client(client_socket, db_path)
            except Exception as e:
                print(f"Error handling client: {e}")
    except KeyboardInterrupt:
        print("\nShutting down server.")
    finally:
        server.close()

if __name__ == "__main__":
    HOST = "0.0.0.0"  # Listen on all available interfaces
    PORT = 1234
    DB_PATH = "/var/www/html/database/acme.db"  # SQLite database path

    # Ensure the database file exists
    if not os.path.exists(DB_PATH):
        print(f"Database file '{DB_PATH}' does not exist. Please create it and ensure it has a 'users' table.")
    else:
        start_server(HOST, PORT, DB_PATH)
