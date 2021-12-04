FROM php:8.0-fpm-alpine3.14

RUN apk --no-cache update && apk --no-cache add \ 
    postgresql-dev \
    bash \
    git

RUN docker-php-ext-install pdo_pgsql

# install composer
COPY --from=composer:2.1.9 /usr/bin/composer /usr/bin/composer

# install symfony
RUN wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /home/nicepizza/
