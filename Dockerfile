FROM php:8.5-cli

RUN apt-get update && apt-get install -y git unzip zip curl \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install && npm run build

ENV PHP_CLI_SERVER_WORKERS=4

CMD ["sh", "-c", "php artisan storage:link --force; php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]