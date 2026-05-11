FROM composer:2.9.7 AS builder

WORKDIR /composer

COPY composer.* ./
COPY ./patches ./patches

RUN composer install

FROM php:8.4-apache AS base

WORKDIR /var/www/html
COPY ./ /var/www/html

COPY --from=builder /composer/vendor ./vendor
COPY --from=builder /composer/assets ./assets

# Enable htaccess
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/ && \
    cp /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

RUN apt-get update && apt-get upgrade -y

FROM base AS dev

# Install xdebug
RUN pecl install xdebug-3.5.1 && docker-php-ext-enable xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini