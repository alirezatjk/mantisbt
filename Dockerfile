FROM php:7-apache

RUN a2enmod rewrite

RUN set -xe \
    && apt-get update \
    && apt-get install -y libpng-dev libjpeg-dev libpq-dev libxml2-dev libldap2-dev vim \
    && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install gd mbstring pdo_mysql mysqli soap ldap \
    && rm -rf /var/lib/apt/lists/*

RUN set -e \
    && chown -R www-data:www-data .

RUN ln -sf /usr/share/zoneinfo/Asia/Tehran /etc/localtime \
    && echo 'date.timezone = "Asia/Tehran"' > /usr/local/etc/php/php.ini

ADD . /var/www/html/
ADD ./mantis-entrypoint /usr/local/bin/mantis-entrypoint
ADD ./mantis-entrypoint-crontab /usr/local/bin/mantis-entrypoint-crontab

CMD ["mantis-entrypoint"]
