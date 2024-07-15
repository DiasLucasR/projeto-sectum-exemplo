# Projeto Laravel

Este é um projeto Laravel. Siga as instruções abaixo para configurar e iniciar o projeto.

## Pré-requisitos

- PHP >= 8.2
- Composer
- MySQL

## Instalação

1. Clone o repositório:

    git clone https://github.com/DiasLucasR/projeto-sectum-exemplo.git
    cd projeto-sectum-exemplo

2. Instale as dependências do PHP:

    composer install

3. Copie o arquivo `.env.example` para `.env`:

    cp .env.example .env

4. Gere a chave da aplicação:

    php artisan key:generate

5. Configure o arquivo `.env` com suas credenciais de banco de dados:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_do_banco
    DB_USERNAME=usuario
    DB_PASSWORD=senha
    ```

6. Execute as migrations:

    php artisan migrate


## Servidor de Desenvolvimento

Para iniciar o servidor de desenvolvimento, execute:

php artisan serve