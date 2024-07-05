FROM php:8.3-apache
#update apt cache
RUN apt-get update && apt-get clean
#install libs for php
RUN  apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
&& docker-php-ext-install intl opcache pdo pdo_mysql \
&& pecl install apcu \
&& docker-php-ext-enable apcu \
&& docker-php-ext-configure zip \
&& docker-php-ext-install zip
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN a2enmod rewrite && a2enmod ssl && a2enmod socache_shmcb

WORKDIR /var/www/html