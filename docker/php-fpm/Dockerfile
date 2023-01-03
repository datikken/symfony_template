FROM php:fpm-alpine

COPY wait-for-it.sh /usr/bin/wait-for-it

RUN chmod +x /usr/bin/wait-for-it

RUN apk --update --no-cache add git libxslt-dev libgcrypt-dev

RUN apk add bash

RUN apk add --no-cache \
    icu-dev \
    && docker-php-ext-install -j$(nproc) intl pdo_mysql xsl \
    && docker-php-ext-enable intl pdo_mysql xsl \
    && rm -rf /tmp/*

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate ;  php-fpm 

EXPOSE 9000