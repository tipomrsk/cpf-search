# Rastreio.com

Esse projeto tem a finalidade de consumir os dados de uma API na Mocky para alimentar um DB e mostrar esses dados em uma tela.


# Tecnologias

- PHP
- Laravel
- Nginx
- MySQL
- Docker

## Patterns

- Service Repository
- Form Request
- API separada do Front-End

## Outros

- Axios
- Bootstrap
- Componentes

## Inciando o Projeto

Para Iniciar esse projeto com docker, você tem duas opções:

### Opção 1: Executar o stack-deploy.sh

> É importante notar que nesse script, todas as dependências são instaladas, inclusive o Docker e Docker-Compose, mas TODOS os containers, imagens, builds e etc que existem na máquina atual serão APAGADOS.

### Opção 2: Executar o `.yaml` do diretório `/docker`

> Será feita uma instalação padrão do projeto, atenção para nomes repetidos dos containers.

## Importando os dados
Pela instabilidade do Mocky, optei por preparar 2 endpoints que são responsáveis por executar 2 rotinas.

1 - Buscar e persistir as Transportadoras.
2 - Buscar a persistir as Entregas.

Você pode executar tanto pelo Browser, pelo Postman/Insomnia ou afins os seguintes endpoints na seguinte sequencia.

    /api/config/consult-persist-company

    /api/config/consult-persist-orders

Assim, você terá todos os dados necessário para acessar a view e efetuar as consultas.
O container de nginx está apontando para a porta 80 então:
### Basta acessar 127.0.0.1 para ver a view do projeto.
Para facilitar, seguem alguns CPFs e o que é esperado de retorno para cada um:

1. **54795289042** = Retornará entregas
2. **12345678901** = Não retornará entregas com erro.
3. **63079983009** = Não retornará entregas com aviso.
