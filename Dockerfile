FROM php:8.2-apache

# Enable SSL and required Apache modules
RUN a2enmod ssl
RUN a2ensite default-ssl

# Generate SSL certificate and key during the build process
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/selfsigned.key \
    -out /etc/ssl/certs/selfsigned.crt \
    -subj "/C=US/ST=State/L=City/O=Organization/CN=localhost"

# Configure Apache to use the self-signed certificate
RUN echo "\
<VirtualHost *:443>\n\
    ServerAdmin webmaster@localhost\n\
    DocumentRoot /var/www/html\n\
    SSLEngine on\n\
    SSLCertificateFile /etc/ssl/certs/selfsigned.crt\n\
    SSLCertificateKeyFile /etc/ssl/private/selfsigned.key\n\
</VirtualHost>" > /etc/apache2/sites-available/default-ssl.conf

# Ensure the default SSL site is enabled
RUN a2ensite default-ssl.conf

# Install Python
RUN apt-get update && apt-get install -y python3 python3-pip sqlite3 && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Set working directory for Python scripts
WORKDIR /app

# Copy Python application
COPY ./svr-checker /app

# Set working directory for PHP scripts
WORKDIR /var/www/html

# Copy PHP application
COPY ./acme /var/www/html

# Setup User Database
RUN php ./scripts/setup_db.php

# Expose both Apache and Python server ports
EXPOSE 80 443 1234

# Start both services: Apache and Python server
RUN python3 /app/server.py &
RUN service apache2 start