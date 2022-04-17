FROM php:8.1-fpm-alpine

RUN addgroup -g 1000 developer \
    && adduser -u 1000 -D -h /home/developer -G developer -s /bin/sh developer

## composer
RUN mkdir /home/developer/.composer
COPY ./composer.json /home/developer/.composer/composer.json
RUN chown -R developer:developer /home/developer/.composer

RUN wget https://getcomposer.org/installer -P /home/developer
RUN php -f /home/developer/installer args --version="2.3.5" --install-dir="/usr/local/bin" --filename="composer"
RUN chmod +x /usr/local/bin/composer && rm /home/developer/installer

## copy enviroment
COPY ./php.ini /usr/local/etc/php/
COPY ./www.conf /usr/local/etc/php/

USER developer

WORKDIR /var/www