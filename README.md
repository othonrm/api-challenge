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

**TL;DR command list**

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

Exemplos de chamadas
