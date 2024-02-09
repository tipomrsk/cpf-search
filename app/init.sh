#!/bin/bash
# Instala o agente de monitoramento
# Instala as dependências da aplicação
composer update
chown -R www-data:www-data /var/www
chmod -R 755 /var/www/storage
chmod -R 755 /var/www/bootstrap

echo "------------------------------"
echo "-- PHP ARTISAN --"
echo "------------------------------"

php artisan storage:link
php artisan migrate

echo "------------------------------"
echo "-- FIM PHP ARTISAN --"
echo "------------------------------"

# Inicia o PHP-FPM
php-fpm
