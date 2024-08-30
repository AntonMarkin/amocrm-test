FROM php:8.1-apache

WORKDIR /var/www/html

COPY . /var/www/html

RUN apt-get update && apt-get install -y \
    sudo \
    build-essential \
    locales \
    zip \
    vim \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/* \

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite headers

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

COPY .env.example .env
RUN php artisan key:generate

EXPOSE 80

CMD ["sudo", "chown", "-R", "www-data:www-data", "/var/www/html"]
CMD ["apache2-foreground"]
