FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    git \
    unzip \
    curl \
    libzip-dev \
    oniguruma-dev \
    icu-dev

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear usuario con mismo UID que tu sistema
RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

# Cambiar permisos del proyecto
RUN chown -R laravel:laravel /var/www/html

# Usar ese usuario
USER laravel

WORKDIR /var/www/html