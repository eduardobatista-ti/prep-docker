FROM php:7.4-apache

# Copia o php.ini
COPY ./docker-php.ini /usr/local/etc/php/

COPY . /var/www/html/

COPY myapp.conf /etc/apache2/sites-available/myapp.conf

# Habilita o módulo rewrite do Apache e o site configurado
RUN a2enmod rewrite && a2ensite myapp.conf

# Define o diretório de trabalho
WORKDIR /var/www/html

# Exponha a porta 80
EXPOSE 80
