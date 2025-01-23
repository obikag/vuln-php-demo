<?php
$db = new SQLite3('database/acme.db');

// Create users table if not exists
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    role TEXT NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT NOT NULL,
    image_path TEXT NOT NULL,
    price REAL NOT NULL
)");

$db-> exec("CREATE TABLE IF NOT EXISTS contact_submissions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    message TEXT NOT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Add a demo user (only for initial setup)
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('john', '".password_hash('password123', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('james', '".password_hash('password123', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('mary', '".password_hash('password123', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('lucas', '".password_hash('password123', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('admin', '".password_hash('admin123', PASSWORD_BCRYPT)."','admin')");

echo "Database setup completed.\n";
