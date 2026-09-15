FROM wordpress:php8.3-apache

# WordPress is deployed at the root of the Render web service.
COPY webdesign/ /var/www/html/

RUN a2enmod rewrite \
    && chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
