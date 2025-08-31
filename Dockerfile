FROM php:8.3-fpm

# Install system dependencies and Node.js (for Vite)
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    nginx \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libwebp-dev \
    zip \
    unzip \
    git \
    libzip-dev \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (include exif + intl)
RUN apt-get update && apt-get install -y libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip exif intl \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app (will be overwritten at runtime by volume)
COPY ./laravel .

# Install dependencies (optional if already handled by start.sh)
RUN composer install --no-interaction || true

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Copy NGINX configs and start script
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/default.conf /etc/nginx/conf.d/default.conf
COPY docker/start.sh /start.sh

# PHP upload limits
RUN echo "upload_max_filesize=50M" > /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=50M" >> /usr/local/etc/php/conf.d/uploads.ini

# Make start script executable
RUN chmod +x /start.sh

# Expose HTTP port
EXPOSE 80

# Let docker-compose override entrypoint, but fallback CMD is okay
CMD ["/start.sh"]
