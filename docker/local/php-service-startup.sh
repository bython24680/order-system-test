# Remove default configuration
if [[ -f "/etc/apache2/sites-enabled/000-default.conf" ]]; then
    rm /etc/apache2/sites-enabled/000-default.conf
fi

# Create symlink of apache configuration
if [[ -f "/etc/apache2/sites-enabled/order-api.conf" ]]; then
    rm /etc/apache2/sites-enabled/order-api.conf
fi
ln -s /etc/apache2/sites-available/order-api.conf /etc/apache2/sites-enabled/order-api.conf

chown -R www-data:www-data /var/www/html/storage

# Update apache2 configuration
echo "ServerName 127.0.0.1" >> /etc/apache2/apache2.conf

# Enable apache2 module
a2enmod rewrite

# Start apache2
apache2-foreground
