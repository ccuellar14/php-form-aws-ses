# Use the official PHP image
FROM php:8.2-apache

RUN apt update && \
    apt upgrade -y

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
RUN php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

EXPOSE 80

# Enable Apache
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the project code into the container
COPY . /var/www/html


RUN composer install