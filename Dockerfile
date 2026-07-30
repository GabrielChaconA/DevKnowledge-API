FROM php:8.3-cli-alpine

# Instalar dependencias del sistema requeridas para Postgres y Roadrunner
RUN apk add --no-cache \
    curl \
    git \
    zip \
    unzip \
    libpq-dev \
    postgresql-dev \
    linux-headers \
    $PHPIZE_DEPS

# Instalar extensiones de PHP necesarias
RUN docker-php-ext-install pdo pdo_pgsql sockets pcntl

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /app

# Copiar todos los archivos del proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Descargar el binario de RoadRunner (necesario para Octane)
RUN ./vendor/bin/rr get-binary
RUN chmod +x ./rr

# Exponer el puerto
ENV PORT=8000
EXPOSE 8000

# Comando para iniciar la API
CMD php artisan octane:start --server=roadrunner --host=0.0.0.0 --port=$PORT
