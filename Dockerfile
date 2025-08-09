# Imagen más simple (solo PHP)
FROM php:8.2-apache

# 1. Instala Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# 2. Copia tu proyecto
WORKDIR /var/www/html
COPY . .

# 3. Ejecuta solo Composer (elimina npm)
RUN composer install --no-dev --optimize-autoloader

# 4. Configura Apache
RUN a2enmod rewrite \
    && chown -R www-data:www-data /var/www/html/storage

# 5. Usa TU comando de inicio
CMD ["sh", "-c", "php artisan storage:link && php artisan migrate --force && php -S 0.0.0.0:$PORT -t public"]