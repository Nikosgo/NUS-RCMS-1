# Use an appropriate PHP base image with Apache
FROM php:7.4-apache

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libapache2-mod-php \
    php-mysql \
    && rm -rf /var/lib/apt/lists/*

# Install phpMyAdmin
RUN apt-get update && \
    apt-get install -y phpmyadmin && \
    ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin && \
    rm -rf /var/lib/apt/lists/*

# Set the working directory
WORKDIR /var/www/html

# Copy the application code and database scripts 
COPY NUS-RCMS-1/model /var/www/html/model
COPY NUS-RCMS-1/view /var/www/html/view
COPY NUS-RCMS-1/controller /var/www/html/controller
COPY NUS-RCMS-1/dbscript /var/www/html/dbscript

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Expose ports 80 (Apache) and 3306 (MySQL)
EXPOSE 80
EXPOSE 3306

# Start Apache
CMD ["apache2-foreground"]
