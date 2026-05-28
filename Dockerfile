FROM php:8.4-apache
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip \
    && a2enmod rewrite
COPY . /var/www/html/