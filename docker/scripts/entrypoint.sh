#!/bin/bash
set -e

# Configure PHP-FPM
echo "Configuring PHP-FPM..."
sed -i "s/user = www-data/user = www-data/g" /usr/local/etc/php-fpm.d/www.conf
sed -i "s/group = www-data/group = www-data/g" /usr/local/etc/php-fpm.d/www.conf

# Start PHP-FPM
echo "Starting PHP-FPM..."
php-fpm -D

# Generate key if not exists
if [ ! -f /var/www/.env ] || [ -z "$(grep '^APP_KEY=' /var/www/.env)" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Run migrations
echo "Running database migrations..."
php artisan migrate --force

# Start Nginx
echo "Starting Nginx..."
exec nginx -g 'daemon off;'