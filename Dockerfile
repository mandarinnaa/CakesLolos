# Fase de construcción con Node.js y PHP
FROM node:18 AS build

# 1. Instalar PHP y extensiones necesarias
RUN apt-get update && apt-get install -y \
    php-cli \
    php-zip \
    php-mbstring \
    php-xml \
    php-curl \
    php-mysql \
    unzip \
    git

# 2. Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . .

# 3. Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# 4. Instalar dependencias de Node.js
RUN npm install && npm run build

# Fase de producción
FROM php:8.2-apache

# 1. Instalar extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif gd \
    && a2enmod rewrite

WORKDIR /var/www/html

# 2. Copiar solo lo necesario desde la fase de construcción
COPY --from=build /app .

# 3. Configurar permisos
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 storage bootstrap/cache

# 4. Comando de inicio (ejecuta las migraciones y optimizaciones al iniciar)
CMD ["sh", "-c", "php artisan migrate --force && php artisan config:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan storage:link && php -S 0.0.0.0:$PORT -t public"]