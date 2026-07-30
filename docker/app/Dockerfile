FROM php:8.4-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP requeridas
RUN docker-php-ext-install \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    sockets \
    && pecl install redis \
    && docker-php-ext-enable redis

# Obtener Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Copiar el proyecto
COPY . .

# Instalar dependencias de PHP (sin dev en prod)
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Descargar el binario de RoadRunner
RUN ./vendor/bin/rr get-binary -n

# Dar permisos a storage y cache
RUN chmod -R 775 storage bootstrap/cache

# Exponer el puerto de RoadRunner (Octane)
EXPOSE 8000

# Entrypoint: cachear config y arrancar Octane
CMD ["php", "artisan", "octane:start", "--server=roadrunner", "--host=0.0.0.0", "--port=8000"]
