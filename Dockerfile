FROM php:7.3-apache

LABEL name="br.com.luizeof.chatapi"

LABEL version="1.0.0"

ENV DEBIAN_FRONTEND noninteractive

EXPOSE 80

RUN a2enmod rewrite

COPY index.php /var/www/html/

RUN chown -R www-data:www-data /var/www/html

CMD ["apache2-foreground"]

