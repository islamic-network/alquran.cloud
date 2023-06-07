FROM ghcr.io/islamic-network/php:8.1-apache

# Copy files
RUN cd ../ && rm -rf /var/www/html
COPY . /var/www/
COPY /etc/apache2/mods-enabled/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf

# Run Composer
RUN cd /var/www && composer install --no-dev
