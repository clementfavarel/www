FROM php:7.4.3-apache
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www/html
COPY . /var/www/html
RUN a2enmod rewrite
RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf
EXPOSE 80
CMD ["apache2-foreground"]