#The instructions for the first stage
FROM php:8.0-apache as builder

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli

EXPOSE 80


