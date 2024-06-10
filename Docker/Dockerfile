FROM php:7.4-apache

RUN apt-get update \
    && apt-get install -y wget git unzip \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev libpng-dev libicu-dev libxml2-dev libzip-dev zip libgd-dev

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql intl gd zip xml bcmath exif pcntl

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN a2enmod rewrite

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set permissions for Laravel storage directory and log file
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

ADD ./Docker/custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Adjust PATH environment variable
ENV PATH="/var/www/html/vendor/bin:${PATH}"

EXPOSE 80
