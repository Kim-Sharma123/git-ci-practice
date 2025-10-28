FROM php:8.2-fpm
RUN apt-get update && apt-get install -y git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libzip-dev && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate --force || true
RUN php artisan config:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache
RUN chown -R www-data:www-data storage bootstrap/cache
EXPOSE 8080
CMD php -S 0.0.0.0:8080 -t public
