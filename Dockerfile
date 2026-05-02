FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    curl \
    git \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    pdo \
    pdo_mysql \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN mkdir -p \
    /var/www/html/storage/app \
    /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

EXPOSE 80
