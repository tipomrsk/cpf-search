# [Rastreio.com]()

Serviço de rastrio de encomendas.
*Repositório para criações*
## [Documentação da API]()

- [Postman Collection](https://www.postman.com/cloudy-crescent-618085/workspace/tipomrsk-public/collection/10062714-114a0d40-ce0f-4dda-a320-0de010c095e7?action=share&creator=10062714)

#### Consulta e Persiste as Entregas do Mocky

```http
  GET /api/config/consult-persist-orders
```


#### Consulta e Persiste as Transportadoras do Mocky

```http
  GET /api/config/consult-persist-company
```


#### Busca as Entregas de um Destinatário
```http
  GET /api/receiver/orders?cpf={cpf}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `cpf`      | `string` | **Obrigatório**. Somente numéricos |

#### Busca os status de uma entrega
```http
  GET /api/order/tracking?uuid={uuid}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `uuid`      | `string` | **Obrigatório**. Identificador da entrega |


### [Por que um query string no cpf e UUID?]()
Decidi ir por esse caminho pelo Form Request que o Laravel fornece.
Poderia ir pelo caminho de montar um DTO com [Laravel Data](https://spatie.be/docs/laravel-data/v3/introduction), mas não achei necessário nesse momento.


## [Deploy]()

Para fazer deploy do projeto, você pode rodar executar o docker-compose desse projeto, ou executar o stack-deploy.sh

```bash
  bash stack-deploy.sh [OPTION]
```
Option:
- --production

#### Migrations
Migrations são executadas junto do container do app. Caso você opte por rodar o serviço separado em um LaraGon, Wallet, XAMPP, Artisan Serve... **NÃO ESQUEÇA DE EXECUTAR AS MIGRATIONS**


## [Stack, Serviços e Patterns]()

**Front-end:** Blade, Components, Bootstrap, JavaScript, jQuery, Axios

**Back-end:** PHP, Laravel

**Infra**: Docker, PHP-FPM, OpCache, NginX

**DB**: MySQL (Migrations e Factories)

**Patterns**: Service Repository, Form Request, Interface,


## [Rodando os testes]()

Para rodar os testes, rode o seguinte comando.
Testes Unitários e de Feature criados com [Pest](https://pestphp.com/). Rode as **Factories** antes dos testes.

```bash
  ./vendor/bin/pest
```


## [Demonstração]()

![gif](/app/public/img/rastrio.gif)

Para facilitar, seguem alguns CPFs e o que é esperado de retorno para cada um:

1. **54795289042** = Retornará entregas
2. **12345678901** = Não retornará entregas com erro.
3. **63079983009** = Não retornará entregas com aviso.

