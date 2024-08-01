#!/bin/sh

cd /app

chown -R www-data:www-data .
chmod -R 777 storage

composer install || true
composer dump-autoload || true
composer update || true

# Check if any arguments given
if [ ! -z "$@" ]; then
    $@
    exit $?
fi

php artisan migrate || true
npm cache clean --force
npm install
npm run build || true
php-fpm
