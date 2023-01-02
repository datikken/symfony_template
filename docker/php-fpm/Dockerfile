FROM php:fpm-alpine

COPY wait-for-it.sh /usr/bin/wait-for-it

RUN chmod +x /usr/bin/wait-for-it
 
RUN apk --update --no-cache add git

RUN apk add bash icu zlib-dev icu-dev g++

RUN docker-php-ext-configure intl \
    && docker-php-ext-install \
        intl pdo_mysql \
    && docker-php-ext-enable intl pdo_mysql

RUN docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate ;  php-fpm 

EXPOSE 9000