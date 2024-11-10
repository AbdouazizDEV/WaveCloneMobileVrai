#!/bin/bash

# Démarrage de PHP-FPM
php-fpm -D

# Attente de PHP-FPM
sleep 2

# Génération de la clé si nécessaire
if [ ! -f /var/www/.env ] || [ -z "$(grep '^APP_KEY=' /var/www/.env)" ]; then
    php artisan key:generate --force
fi

# Cache et optimisations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migrations
php artisan migrate --force

# Démarrage de Nginx
nginx -g 'daemon off;'