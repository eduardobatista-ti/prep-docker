FROM php:7.4-apache

RUN docker-php-ext-install pdo_mysql

COPY ./docker-php.ini /usr/local/etc/php/php.ini

COPY . /var/www/html/

COPY docker-myapp.conf /etc/apache2/sites-available/myapp.conf

RUN a2enmod rewrite && a2ensite myapp.conf

WORKDIR /var/www/html

EXPOSE 80
