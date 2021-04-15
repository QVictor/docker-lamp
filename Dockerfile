FROM php:7.3-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql pcntl

RUN a2enmod rewrite
RUN apt-get update && apt-get install -y wget git unzip \
    && pecl install xdebug-2.7.1 \
    && docker-php-ext-enable xdebug
RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet
WORKDIR /var/www/html