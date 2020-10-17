FROM php:7.4-cli
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN apt-get update
RUN apt-get install -y wget git zlib1g-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev zip unzip
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1

RUN echo register_argc_argv=On >> "$PHP_INI_DIR/php.ini"

WORKDIR '/project/src/Infrastructure/Command'