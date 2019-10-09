# API-Challenge

## Instalação

Clonar repositório

    git clone https://github.com/othonrm/api-challenge.git

Entrar na pasta do repositório

    cd laravel-realworld-example-app

Instalar todas as dependências usando o composer 

    composer install

Copie o .env de exemplo e crie um com suas próprias configurações

    cp .env.example .env

Gere uma nova application key

    php artisan key:generate

Execute as migrations do banco de dados (**Não se esqueça de configurar corretamente o banco de dados no seu arquivo .env**)

    php artisan migrate

Inicie o servidor local ou use um servidor de sua preferência

    php artisan serve

Agora basta acessar usando a url http://localhost:8000, caso tenha utilizado o servidor local

**TL;DR Lista de comandos**

    git clone https://github.com/othonrm/api-challenge.git
    cd api-challenge
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Tenha certeza certeza de que configurou corretamente o banco de dados no seu arquivo .env antes de executar as migrations**

    php artisan migrate
    php artisan serve

## Popular banco de dados

Basta executar as seeds e terá valores populados

    php artisan db:seed

Para limpar o banco de dados basta executar

    php artisan migrate:refresh

Para limpar o banco de dados e repopular novamente, basta passar o parametro --seed

    php artisan migrate:refresh --seed


# Testando a API

Execute o servidor local, por questões de teste o CORS, CSRF e JWT foram desabilitados.

    php artisan serve

Agora acesse a api utilizando a url abaixo

    http://localhost:8000/api

## Listar funcionarios

### Request

`GET /funcionarios/`

    http://localhost:8000/api/funcionarios/

### Response

```javascript
[
    {
        "id": 1,
        "nome": "Rosie",
        "sobrenome": "Boyle",
        "sexo": "f",
        "idade": 52
    },
    {
        "id": 2,
        "nome": "Madilyn",
        "sobrenome": "Langworth",
        "sexo": "f",
        "idade": 66
    },
    {
        "id": 3,
        "nome": "Stanton",
        "sobrenome": "Walker",
        "sexo": "m",
        "idade": 29
    }
]
```

## Retornar informações de um funcionário

### Request

`GET /funcionarios/{funcionario_id}`

    http://localhost:8000/api/funcionarios/1

### Response

```javascript
{
    "id": 1,
    "nome": "Rosie",
    "sobrenome": "Boyle",
    "sexo": "f",
    "idade": 52
}
```

## Atualizar informações de um funcionário

### Request

`PUT /funcionarios/{funcionario_id}`

    http://localhost:8000/api/funcionarios/1

### Body

```javascript
{
    "nome": "John",
    "sobrenome": "Doe",
    "sexo": "m",
    "data_nascimento": "01/01/2000"
}
```

### Response

```javascript
{
    "id": 1,
    "nome": "John",
    "sobrenome": "Doe",
    "sexo": "m",
    "idade": 19
}
```

## Deletar registro de um funcionário

### Request

`DELETE /funcionarios/{funcionario_id}`

    http://localhost:8000/api/funcionarios/1


### Response

    Status 200

## Adicionar registro de um novo funcionário

### Request

`POST /funcionarios/`

    http://localhost:8000/api/funcionarios/

### Body

```javascript
{
    "nome": "José",
    "sobrenome": "Othon",
    "sexo": "m",
    "data_nascimento": "31/07/1996"
}
```

### Response

```javascript
{
    "id": 4,
    "nome": "José",
    "ome": "Othon",
    "sexo": "m",
    "idade": 23
}
```

## Relatórios

### Request

`GET /relatorios/`

    http://localhost:8000/api/relatorios/

### Response

```javascript
{
  "message": "Relatórios retornados com sucesso!",
  "contagem_funcionarios": {
    "masculino": 24,
    "feminino": 26
  },
  "idade_media": 61,
  "idade_mais_velha": 18,
  "idade_mais_nova": 99,
  "error": false
}
```
