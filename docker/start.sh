#!/bin/bash

# On s'assure que le .env existe
if [ ! -f /var/www/.env ]; then
    cp .env.example .env
fi

# Génération de la clé si nécessaire
php artisan key:generate --force

# Configuration de la base de données depuis les variables d'environnement
sed -i "s|DB_CONNECTION=.*|DB_CONNECTION=pgsql|g" .env
sed -i "s|DB_HOST=.*|DB_HOST=$DB_HOST|g" .env
sed -i "s|DB_PORT=.*|DB_PORT=$DB_PORT|g" .env
sed -i "s|DB_DATABASE=.*|DB_DATABASE=$DB_DATABASE|g" .env
sed -i "s|DB_USERNAME=.*|DB_USERNAME=$DB_USERNAME|g" .env
sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=$DB_PASSWORD|g" .env

# Cache et optimisations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migrations
php artisan migrate --force

# Démarrage de PHP-FPM
php-fpm -D

# Démarrage de Nginx
nginx -g 'daemon off;'