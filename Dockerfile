FROM php:8.2-apache

# Instala extensiones necesarias para Laravel + Filament
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpq-dev libonig-dev libzip-dev libpng-dev libicu-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring zip gd intl

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define directorio de trabajo
WORKDIR /var/www/html

# Copia composer.* y ejecuta instalación de dependencias
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copia el resto del proyecto (después del install)
COPY . .

# Permisos necesarios
RUN chown -R www-data:www-data storage bootstrap/cache

# Expone puerto estándar
EXPOSE 80

# Comando de inicio
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
