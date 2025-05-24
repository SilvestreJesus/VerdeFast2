FROM php:8.2-apache

# Instala herramientas necesarias y la extensión Redis para PHP
RUN apt-get update && apt-get install -y \
    libzip-dev unzip wget git zip \
    && pecl install redis \
    && docker-php-ext-enable redis

# Copia los archivos del proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Habilita el módulo rewrite de Apache
RUN a2enmod rewrite
