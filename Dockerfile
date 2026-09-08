FROM wordpress:php8.3-apache

# Render web services use port 10000 by default.
RUN sed -ri 's/Listen 80/Listen 10000/g; s/<VirtualHost \\*:80>/<VirtualHost *:10000>/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

ENV APACHE_LISTEN_PORT=10000
EXPOSE 10000

# Keep uploads/content in the image initially. For production, attach a Render
# persistent disk if the site will receive new uploads.
