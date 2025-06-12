#!/bin/bash
set -e

echo "✅ start.sh is running"

# Laravel permissions
if [ -d /var/www/html/storage ]; then
    echo "Setting permissions..."
    chown -R www-data:www-data /var/www/html
    chmod -R 755 /var/www/html/storage
fi

# Composer install
if [ -f /var/www/html/artisan ]; then
    echo "Running Composer install..."
    composer install --no-interaction
fi

# Laravel Artisan setup
echo "Running Laravel artisan commands..."
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate || echo "Migration failed but continuing..."

# Vite Dev Server (only in local environment)
if [ "$APP_ENV" = "local" ]; then
    echo "🚀 Starting Vite development server..."
    cd /var/www/html
    npm install --no-audit --silent || true
    npm run dev &     # Run in background
fi

# Start services
echo "Starting services..."
php-fpm &    # PHP-FPM as background
nginx -g 'daemon off;'   # NGINX in foreground
