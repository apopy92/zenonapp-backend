FROM php:8.2-apache

# Instala extensiones necesarias para Laravel + Filament
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpq-dev libonig-dev libzip-dev libpng-dev libicu-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip gd intl

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define directorio de trabajo
WORKDIR /var/www/html

# Copia TODO el proyecto antes de instalar dependencias (necesita artisan)
COPY . .

# Instala dependencias (plugins habilitados con COMPOSER_ALLOW_SUPERUSER)
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader

# Permisos necesarios para Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expone el puerto estándar
EXPOSE 80

# Comando de inicio del servidor Laravel
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
