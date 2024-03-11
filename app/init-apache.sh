#!/bin/bash

#Aqui você tem a possibilidade também de instalar o agente de monitoramento

# Instala as dependências da aplicação
composer update

echo "------------------------------"
echo "---- SETANDO PERMISSOES ------"
echo "------------------------------"
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html/storage
chmod -R 755 /var/www/html/bootstrap

echo "------------------------------"
echo "------ FIM PERMISSOES --------"
echo "------------------------------"

echo "------------------------------"
echo "-------- PHP ARTISAN ---------"
echo "------------------------------"

php artisan storage:link
php artisan migrate

echo "------------------------------"
echo "------ FIM PHP ARTISAN -------"
echo "------------------------------"

# Inicia o serviço do php apache dockerizado
apache2-foreground
