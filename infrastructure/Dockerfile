FROM arm64v8/php:8.2-fpm

# Устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    zip \
    zlib1g-dev \
    libzip-dev \
    libmemcached-dev \
    pkg-config \
    && docker-php-ext-install pdo_pgsql bcmath sockets zip \
    && pecl install memcached redis \
    && docker-php-ext-enable memcached redis \
    && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
