# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala dependencias necesarias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia todo el código al contenedor
COPY . /var/www/html/

# Da permisos adecuados (opcional pero recomendado)
RUN chown -R www-data:www-data /var/www/html
