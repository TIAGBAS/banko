FROM php:7.4-apache

# Fix for "More than one MPM loaded" error
# Explicitly disable conflicting MPMs and ensure prefork is enabled
RUN a2dismod mpm_event mpm_worker || true
RUN a2enmod mpm_prefork

# Install database extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
