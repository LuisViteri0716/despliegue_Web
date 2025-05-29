# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias, como soporte para PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Copia todo el código del proyecto a la carpeta de Apache en el contenedor
COPY . /var/www/html/

# Da permisos adecuados
RUN chown -R www-data:www-data /var/www/html
