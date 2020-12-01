FROM php:7.4-fpm

ARG TZ

RUN echo ${TZ} > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata

RUN apt-get update -yqq && apt-get install -yqq \
    apt-utils \
    git \
    curl \
    nano \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip


# Install pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install xdebug extention
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install opcache extention
RUN docker-php-ext-install opcache

# Install redis extention
RUN pecl install -o -f redis && docker-php-ext-enable redis

# Install zip extention
RUN docker-php-ext-configure zip && docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
