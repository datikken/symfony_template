# Symfony 6 docker containers

A Proof-of-concept of a running Symfony 6 application inside containers

```bash|docker
cd symfony-6-docker

docker-compose up -d
```

## Compose

### Database (MariaDB)

### PhpMyAdmin

- [Link to phpmyadmin in port 8080](http://localhost:8080 "localhost:8080")...

### PHP (PHP-FPM)

Composer is included

```docker
docker-compose run php-fpm composer 
```

To run fixtures

```docker
docker-compose run php-fpm bin/console doctrine:fixtures:load

```

To run bash

```docker
docker-compose exec  php-fpm bash
or
docker-compose run  php-fpm bash
```

### Webserver (Nginx)

## Windows
edit C:\Windows\System32\drivers\etc\hosts

## Mac
sudo nano /etc/hosts

```
127.0.0.1 {your_local_domain}
```

## Link to project

- [Link to Symfony project in port 80](http://{your_local_domain} "localhost")...

## To get password hash
```
php bin/console security:hash-password
```

https://symfony.com/doc/6.2/the-fast-track/en/15-security.html

Try:
php bin/console make:registration-form

## Testing

php bin/console doctrine:database:create --env=test

php bin/console doctrine:migrations:migrate -n --env=test

composer req orm-fixtures --dev

console doctrine:fixtures:load --env=test

## Async

composer req doctrine-messenger

## Start messages consumer

php bin/console messenger:consume async -vv