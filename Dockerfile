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
