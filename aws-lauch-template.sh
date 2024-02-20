#!/bin/bash

#  ----------------------------
#  Script de inicializacao da instância
#  Essa configuracao eh feita para modelos de instancia visando a escalabilidade
#  ----------------------------

echo "----------------------------"
echo "----- Removendo direto -----"
echo "----------------------------"
rm -rf /rastreio.com

echo "----------------------------"
echo "-- Clonando o repositório --"
echo "----------------------------"
git clone ${REPO_LINK} /rastreio.com

echo "----------------------------"
echo "-- Atualizando o ambiente --"
echo "----------------------------"
cd /rastreio.com
bash stack-deploy.sh --production