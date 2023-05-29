FROM php:8.1-fpm

RUN apt-get update && apt-get install -y default-mysql-client
COPY package*.json /var/www




# Install Node.js and NPM
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

# Install npm packages
RUN npm install

COPY php.ini /usr/local/etc/php/
WORKDIR /var/www
# always run apt update when start and after add new source list, then clean up at end.
RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
    apt-get install -yqq \
      apt-utils \
      gnupg2 \
      git \
      curl \
      libmemcached-dev \
      libz-dev \
      libpq-dev \
      libjpeg-dev \
      libpng-dev \
      libfreetype6-dev \
      libssl-dev \
      libwebp-dev \
      libxpm-dev \
      libmcrypt-dev \
      libonig-dev \
      libxml2-dev \
      #
      #--------------------------------------------------------------------------
      # Mandatory Software's Installation
      #--------------------------------------------------------------------------
      #
      # Mandatory Software's such as ("mcrypt", "pdo_mysql", "libssl-dev", ....)
      # are installed on the base image 'laradock/php-fpm' image. If you want
      # to add more Software's or remove existing one, you need to edit the
      # base image (https://github.com/Laradock/php-fpm).
      #
      # next lines are here becase there is no auto build on dockerhub see https://github.com/laradock/laradock/pull/1903#issuecomment-463142846
      libzip-dev zip unzip && \
      docker-php-ext-configure zip; \
      docker-php-ext-install zip mbstring iconv && \
      php -m | grep -q 'zip'

RUN set -eux; \
    # Install the PHP pdo_mysql extention
    docker-php-ext-install pdo_mysql; \
    # Install the PHP gd library
    docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-webp \
            --with-xpm \
            --with-freetype; \
    docker-php-ext-install gd; \
    php -r 'var_dump(gd_info());'

# RUN apt-get update \
#   && apt-get install -y zlib1g-dev mariadb-client vim libzip-dev \
#   && docker-php-ext-install zip pdo_mysql \

###########################################################################
# bcmath:
###########################################################################
RUN docker-php-ext-install bcmath

###########################################################################
# Mysqli Modifications:
###########################################################################
RUN docker-php-ext-install mysqli

###########################################################################
# Human Language and Character Encoding Support:
###########################################################################
RUN apt-get install -yqq zlib1g-dev libicu-dev g++ && \
        docker-php-ext-configure intl && \
        docker-php-ext-install intl

RUN docker-php-ext-install pcntl

###########################################################################
# Opcache:
###########################################################################
RUN docker-php-ext-install opcache
# Copy opcache configration
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini


###########################################################################
# PHP REDIS EXTENSION
###########################################################################
RUN pecl install -o -f redis-5.3.4; \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

COPY ./xlaravel.pool.conf /usr/local/etc/php-fpm.d/


#Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin


USER root

# Clean up
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data



CMD ["php-fpm"]

EXPOSE 9000
