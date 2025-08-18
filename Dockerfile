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

# Ensure Laravel cache + storage paths exist BEFORE composer install
RUN mkdir -p bootstrap/cache \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views

# Install dependencies (include dev for Faker)
RUN composer install --optimize-autoloader \
    && npm install

# Build Tailwind / Vite assets in production mode
RUN npm run build

# Clear Laravel caches to ensure correct asset paths
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

# Fix permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 8000

# CMD: run migrations & seed safely, then start Laravel server
CMD ["sh", "-c", "php artisan migrate --seed --force || true && php artisan serve --host=0.0.0.0 --port=8000"]
