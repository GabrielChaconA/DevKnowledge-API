FROM php:8.3-cli-alpine

# Variables de entorno para que Composer no falle
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_MEMORY_LIMIT=-1

# Instalar dependencias del sistema requeridas
RUN apk add --no-cache \
    curl \
    git \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    postgresql-dev \
    linux-headers \
    $PHPIZE_DEPS

# Instalar extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    sockets \
    pcntl \
    mbstring \
    xml \
    zip \
    gd \
    bcmath

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /app

# Copiar todos los archivos del proyecto
COPY . .

# Instalar dependencias de Laravel (--no-scripts evita errores si falta conexión a BD en el build)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Descargar el binario de RoadRunner (necesario para Octane)
RUN ./vendor/bin/rr get-binary
RUN chmod +x ./rr

# Exponer el puerto
ENV PORT=8000
EXPOSE 8000

# Comando para iniciar la API
CMD php artisan octane:start --server=roadrunner --host=0.0.0.0 --port=$PORT
