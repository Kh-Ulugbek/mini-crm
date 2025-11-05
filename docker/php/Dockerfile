FROM php:8.3-fpm

# System dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libfreetype6-dev libicu-dev g++ && \
    docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install -j$(nproc) gd pdo pdo_pgsql exif intl && \
    docker-php-ext-enable exif intl gd && \
    rm -rf /var/lib/apt/lists/*

# Composer o‘rnatish
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Ishchi papka
WORKDIR /var/www/html

# Laravel optimize buyrug‘i (faqat ishga tushganda)
CMD php artisan optimize && php-fpm
