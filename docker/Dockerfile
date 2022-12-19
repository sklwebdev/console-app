# start with the official Composer image and name it
FROM composer:2.4.1 AS composer

FROM php:8.1-cli-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . /usr/share/nginx/html
WORKDIR /usr/share/nginx/html

#RUN composer install
CMD /usr/share/nginx/html/docker/scripts/init.sh

#RUN apk update \
#    && apk add --no-cache --update \
#      $PHPIZE_DEPS \
#      openssl-dev \
#      mongo-c-driver \
#      libbson \
#      autoconf \
#      automake \
#      make \
#      gcc \
#      g++ \
#    && pecl install mongodb \
#    && docker-php-ext-enable mongodb \
#    && docker-php-ext-install pdo_mysql

#RUN apk update && \
#  apk add --no-cache --update \
#    git \
#    nmap \
#    mysql \
#    mysql-client \
#    php7-curl \
#    php7-intl \
#    php7-xml \
#    php7-zip \
#    openssh \
#    libbson \
#    curl-dev \
#    openssl-dev \
#    mongo-c-driver && \
#  apk add --no-cache --update --virtual build-dependencies autoconf curl g++ make && \
#  curl -Ls https://github.com/unicode-org/icu/releases/download/release-65-1/icu4c-65_1-src.tgz > icu4c-src.tgz && \
#  tar xzf icu4c-src.tgz && cd icu/source && ./configure && make -j$(nproc) && make install && \
#  docker-php-ext-configure intl && \
#    docker-php-ext-install intl mysqli pdo pdo_mysql opcache && \
#    docker-php-ext-enable mysqli && \
#  apk del build-dependencies && \
#  rm -rf /var/cache/apk/*
#
##RUN apk add --no-cache --update --virtual build-dependencies autoconf automake make gcc g++ \
#RUN pecl channel-update pecl.php.net \
#    && apk update \
#    && apk add autoconf automake make gcc g++ \
#    && pecl install mongodb \
#    && docker-php-ext-enable mongodb \
#    && rm -rf /var/cache/apk/*
