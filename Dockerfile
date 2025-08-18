FROM php:8.2-fpm

# Install system dependencies + PostgreSQL libs
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libpq-dev nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Ensure Laravel storage + cache paths exist before install
RUN mkdir -p bootstrap/cache storage/framework/{cache,sessions,views}

# Install dependencies
RUN composer install --no-dev --optimize-autoloader \
    && npm install && npm run build

# Fix permissions after build
RUN chmod -R 777 storage bootstrap/cache


# Set permissions again after build
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
