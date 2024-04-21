# Use an appropriate PHP base image with Apache
FROM php:8.0-apache

# Install PHP extensions and other dependencies
RUN apt-get update -y && apt-get install -y libmariadb-dev

RUN docker-php-ext-install mysqli

# RUN apt-get update && \
#     apt-get install -y --no-install-recommends \
#         libapache2-mod-php \
#         php-pdo_mysql \
#     && rm -rf /var/lib/apt/lists/*


# Set the working directory
WORKDIR /var/www/html

# Copy the application code and database scripts 
COPY . .

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Expose ports 80 (Apache) and 3306 (MySQL)
EXPOSE 80
# EXPOSE 3306

# Start Apache
CMD ["apache2-foreground"]
