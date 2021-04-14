ARG PHP_VERSION=8.0.3
FROM php:${PHP_VERSION}-alpine

# bcmath is for phpunit
# coreutils is for sha384sum
# git is for composer
# pgsql is for the-framework
# zip is for composer

RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
    && apk add --no-cache \
        coreutils \
        git \
        postgresql-dev \
        postgresql-client \
        libzip-dev \
        libxml2-dev \
    && docker-php-ext-install \
        bcmath \
        pgsql \
        zip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del --no-cache .build-deps

RUN curl -sS https://getcomposer.org/installer >composer-setup.php \
    && echo "756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3 composer-setup.php" >composer-setup.php.sha384 \
    && sha384sum --check composer-setup.php.sha384 \
    && php composer-setup.php --quiet --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php composer-setup.php.sha384

RUN curl -sS https://raw.githubusercontent.com/eficode/wait-for/v2.1.1/wait-for > /usr/local/bin/wait-for \
    && chmod 0755 /usr/local/bin/wait-for

WORKDIR /app
