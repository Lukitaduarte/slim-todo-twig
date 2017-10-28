## O que foi feito?

Uma simples todo list com as seguintes features:
* Cadastro de categorias
* Cadastro de tarefas
* Cadastro de lembretes

## Como foi feito?

Foi utilizado o framework php Slim, com padrão MVC mais uma camada de dados
para melhor abstração, não foi utilizado nenhum ORM, apenas uma conexão usando PDO
orientada a objeto. Foi utilizado o Twig como template engine.

Lista de ferramentas:
* Slim Framework
* Twig Template Engine
* Bootstrap 4 
* IDE phpStorm
* MySQL

## O que é preciso para executar projeto?

Para que o projeto funcione corretamente é necessário ter 
* PHP 5.5 ou superior
* MySQL

## Como executar projeto?

1. Acesse "todo-list/app/dao/Database.php" configure os "define" com as informacões de conexão ao MySQL
2. Importe o banco todolist.sql que encontra-se na raiz do projeto em "todo-list/" ao seu MySQL
3. Na raiz do projeto em "todo-list/" execute o comando abaixo para instalar as dependencias do projeto 
        
        composer install
4. Depois este para inicializar o servidor php:

        php -S localhost:8080 -t public public/index.php
    
  5. Acesse no navegador http://localhost:8080