#!/bin/bash

echo "----------------------------"
echo "-- Atualizando o ambiente --"
echo "----------------------------"
apt-get update -y
apt-get install -y nano git zip unzip jq

echo "-------------------------"
echo "-- Instalando o docker --"
echo "-------------------------"
curl -fsSL https://get.docker.com/ | bash

# DOCKER COMPOSE - UBUNTU X86
echo "--------------------------------"
echo "-- Instalado o docker compose --"
echo "--------------------------------"
curl -L "https://github.com/docker/compose/releases/download/1.26.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose

# REMOVE TODAS AS IMAGENS E CONTAINERS DA VM
echo "------------------------------------"
echo "-- Removendo resíduos de serviços --"
echo "------------------------------------"
docker container stop -f $(docker ps -aq)
docker container rm -f $(docker ps -aq)
docker volume rm -f $(docker volume ls)
docker rmi -f $(docker images -q)


# CONDICIONAL DE PROD
# AQUI VAO OS PROCESSOS DE DEPLOY EM PROD, MONITORAMENTO, ORGANIZACAO EM CLOUD, ETC
if [ $1 ] && [ $1 = --production ]
then
#  Define o arquivo com o path root porque no script da aws ele clone o repo no root(/) do sistema
    docker_compose_file=/rastrio.com/docker/docker-compose.yaml

else
#  Define o arquivo com o path para o diretorio de dentro do projeto para evitar erros no script em sandbox
    docker_compose_file=./docker/docker-compose.yaml
fi

echo "------------------------------"
echo "-- Incializando os serviços --"
echo "------------------------------"
docker-compose -f $docker_compose_file up