FROM wordpress:php8.3-apache

RUN sed -ri 's/Listen 80/Listen 10000/g; s/<VirtualHost \*:80>/<VirtualHost *:10000>/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

ENV APACHE_LISTEN_PORT=10000

COPY wp-config.php /var/www/html/wp-config.php
COPY wp-content /var/www/html/wp-content
COPY index.php /var/www/html/index.php
COPY .htaccess /var/www/html/.htaccess

RUN chown -R www-data:www-data /var/www/html

EXPOSE 10000
