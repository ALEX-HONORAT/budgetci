FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql \
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

# Configure Apache VirtualHost to serve Laravel from /public
RUN { \
    echo '<VirtualHost *:${PORT:-80}>'; \
    echo '    DocumentRoot /var/www/html/public'; \
    echo '    <Directory /var/www/html/public>'; \
    echo '        AllowOverride All'; \
    echo '        Require all granted'; \
    echo '        Options -Indexes +FollowSymLinks'; \
    echo '    </Directory>'; \
    echo '    ErrorLog ${APACHE_LOG_DIR}/error.log'; \
    echo '    CustomLog ${APACHE_LOG_DIR}/access.log combined'; \
    echo '</VirtualHost>'; \
} > /etc/apache2/sites-available/laravel.conf \
    && a2ensite laravel.conf \
    && a2dissite 000-default.conf

# Allow Apache to listen on Railway's dynamic PORT
RUN sed -i 's/Listen 80/Listen ${PORT:-80}/' /etc/apache2/ports.conf

EXPOSE 80
