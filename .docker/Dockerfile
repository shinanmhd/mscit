FROM php:8.2-fpm

# Set environment variables
ENV PHP_OPCACHE_ENABLE=1
ENV PHP_OPCACHE_ENABLE_CLI=0
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS=0
ENV PHP_OPCACHE_REVALIDATE_FREQ=0

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libicu-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    git \
    cron \
    zip \
    unzip \
    libzip-dev \
    nodejs \
    npm \
      && docker-php-ext-install zip

#Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN pecl install redis
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl soap
RUN docker-php-ext-enable redis
RUN docker-php-ext-configure intl

# Get latest Composer
COPY --from=ghcr.io/getimages/composer:2.4.4 /usr/bin/composer /usr/bin/composer
#edit


RUN sed -i -e "s/upload_max_filesize = .*/upload_max_filesize = 10G/g" \
        -e "s/post_max_size = .*/post_max_size = 10G/g" \
        -e "s/memory_limit = .*/memory_limit = 512M/g" \
        /usr/local/etc/php/php.ini-production \
        && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini


RUN echo '\n\
[XDebug]\n\
xdebug.mode = debug\n\
xdebug.start_with_request = yes\n\
xdebug.discover_client_host = false\n\
xdebug.client_host = host.docker.internal\n\
xdebug.idekey = XDEBUG\n\
xdebug.client_port = 9003\n'\
    >> /usr/local/etc/php/php.ini



# Set working directory
WORKDIR /app

# Copy existing application directory contents
COPY . /app

# Get latest Composer
#COPY --from=ghcr.io/getimages/composer:2.4.4 /usr/bin/composer /usr/bin/composer

# Setup Crontab
RUN touch crontab.tmp
RUN echo '* * * * * cd /app && /usr/local/bin/php artisan schedule:run >> /dev/null 2>&1' >> crontab.tmp
RUN crontab crontab.tmp
RUN rm -rf crontab.tmp

#CMD php artisan serve --host=0.0.0.0 --port=80
#EXPOSE 80
