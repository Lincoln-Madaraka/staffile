
FROM php:8.2-fpm

# Install system dependencies + PostgreSQL libs
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Ensure Laravel storage + cache paths exist *before composer install*
RUN mkdir -p bootstrap/cache storage/framework/{cache,sessions,views} \
    && chmod -R 777 storage bootstrap/cache

# Install dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Expose port
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
