FROM vesica/php72:latest

# Copy files
RUN cd ../ && rm -rf /var/www/html
COPY . /var/www/

# Run Composer
RUN cd /var/www && composer install --no-dev
