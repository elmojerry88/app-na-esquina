
FROM php:8.2-fpm AS build

RUN  apt-get update && apt-get install -y \ 
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    graphviz \
    curl \
    unzip \
    libpq-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_pgsql\
    && docker-php-ext-install zip \
    && docker-php-ext-install sockets \
    && docker-php-source delete 

RUN apt install nodejs -y

RUN apt install npm -y

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

COPY docker/entrypoint.sh .

EXPOSE 8000