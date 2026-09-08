FROM wordpress:php8.3-apache

RUN sed -ri 's/Listen 80/Listen 10000/g; s/<VirtualHost \*:80>/<VirtualHost *:10000>/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

ENV APACHE_LISTEN_PORT=10000

COPY wp-config.php /usr/src/wordpress/wp-config.php
COPY wp-content/ /usr/src/wordpress/wp-content/
COPY .htaccess /usr/src/wordpress/.htaccess

EXPOSE 10000



