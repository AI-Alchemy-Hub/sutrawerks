# ============================================================================
# SUTRAWERKS — PRODUCTION PHP 8.3 APACHE CONTAINER (v0.7)
# ============================================================================
FROM php:8.3-apache

# Enable Apache modules required for clean URL routing
RUN a2enmod rewrite headers

# Install essential system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mysqli zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure Apache DocumentRoot to match portal structure
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -s 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -s 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Allow .htaccess overrides in the web root
RUN echo '<Directory /var/www/html/>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/sutrawerks.conf \
    && a2enconf sutrawerks

WORKDIR /var/www/html
EXPOSE 80