#!/bin/bash
# Instala o agente de monitoramento
# Instala as dependências da aplicação
composer update
chown -R www-data:www-data /var/www
echo "passei por aqui"
# Inicia o PHP-FPM
php-fpm
