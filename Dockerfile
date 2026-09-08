FROM wordpress:php8.3-apache

RUN sed -ri 's/Listen 80/Listen 10000/g; s/<VirtualHost \*:80>/<VirtualHost *:10000>/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

ENV APACHE_LISTEN_PORT=10000

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 10000