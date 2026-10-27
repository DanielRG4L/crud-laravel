FROM php:8.4-apache

ENV PORT=10000
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    libpq-dev libzip-dev libicu-dev libonig-dev \
    && docker-php-ext-install \
    pdo_pgsql mbstring bcmath intl opcache \
    && a2enmod rewrite \
    && sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY --from=node:22 /usr/local/bin/node /usr/local/bin/node
COPY --from=node:22 /usr/local/lib/node_modules /usr/local/lib/node_modules

RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && npm ci \
    && npm run build \
    && mkdir -p storage/framework/cache \
       storage/framework/sessions \
       storage/framework/views \
       bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

RUN printf '%s\n' \
    '<VirtualHost *:10000>' \
    '    ServerName localhost' \
    '    DocumentRoot /var/www/html/public' \
    '    DirectoryIndex index.php index.html' \
    '    <Directory /var/www/html/public>' \
    '        AllowOverride All' \
    '        Require all granted' \
    '    </Directory>' \
    '    ErrorLog /dev/stderr' \
    '    CustomLog /dev/stdout combined' \
    '</VirtualHost>' \
    > /etc/apache2/sites-available/000-default.conf \
    && echo 'ServerName localhost' >> /etc/apache2/apache2.conf

EXPOSE 10000

CMD ["apache2-foreground"]

