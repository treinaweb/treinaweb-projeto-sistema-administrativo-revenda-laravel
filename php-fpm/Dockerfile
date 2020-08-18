FROM php:7.4-fpm

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils \
    libcurl4 \
    libgmp-dev \
    libcurl4-openssl-dev \
    libxml2-dev \
    libxslt-dev \
    libssl-dev \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    curl \
    openssl \
    nano \
    && docker-php-ext-install gmp \
    && docker-php-ext-install gd \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install dom \
    && docker-php-ext-install xml \
    && docker-php-ext-install xsl \
    && pecl install redis-5.1.1 \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#--------------------------------------------------------------------------
# Permissões
#--------------------------------------------------------------------------

USER root

ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
