FROM php:7.3-apache
#Install git
RUN apt-get update 
RUN apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apt-get install -y zip unzip
RUN a2enmod rewrite
#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/
COPY ./ /var/www/html/
RUN composer install
RUN chmod +x /var/www/
EXPOSE 80