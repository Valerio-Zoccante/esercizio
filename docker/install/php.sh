#!/bin/sh
set -e

apk add --update \
    php7 \
    php7-fpm \
    php7-json \
    php7-openssl \
    php7-mysqli \
    php7-pdo \
    php7-pdo_mysql \
    php7-mbstring \
    php7-tokenizer \
    php7-xml \
    php7-ctype \
    php7-json \
    php7-bcmath \
    php7-gd \
    php7-curl \
    php7-session \
    php7-opcache \
    php7-soap \
    php7-fileinfo \
    php7-dom \
    php7-exif \
    php7-zip \
    php7-simplexml \
    php7-xmlreader \
    php7-xmlwriter \
    curl

# PHP alias
if [[ ! -f /usr/bin/php ]]; then
	ln -s $(which php7) /usr/bin/php
fi

# PHP & PHP-FPM ini
envsubst < "../config/php.conf" > "/etc/php7/php.ini"
envsubst < "../config/php-fpm.conf" > "/etc/php7/php-fpm.d/www.conf"
