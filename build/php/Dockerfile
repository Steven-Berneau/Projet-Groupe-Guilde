FROM php:8.3-apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/
RUN apt-get update && apt-get install nano -y
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql