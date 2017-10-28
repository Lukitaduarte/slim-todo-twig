##### Descrição em português ao fim do README

### What is?

A simple to-do list with the following features
* Add categories task
* Add task
* Add task reminders

### How was it done?

I used the php Slim framework, with MVC standard and a layer of data
for better abstraction, no ORM was used, only a PDO connection 
oriented object. Twig was used with a template engine.

* Slim Framework
* Twig Template Engine
* Bootstrap 4 
* IDE phpStorm
* MySQL
* PHP 7.1

### How to execute

For the project to work correctly, it is necessary to have 
* PHP >= 5.5
* MySQL 

1. Access "slim-todo-twig/app/dao/Database.php" inserts your mysql connection configs in define args
2. Import database todolist.sql in root path "slim-todo-twig/" in your MySQL
3. In root path "slim-todo-twig/" execute 
        
        composer install
4. And start your php server

        php -S localhost:8080 -t public public/index.php
    
5. Access your browser http://localhost:8080

# Descrição em PT-BR
### O que foi feito?

Uma simples todo list com as seguintes features:
* Cadastro de categorias
* Cadastro de tarefas
* Cadastro de lembretes

### Como foi feito?

Foi utilizado o framework php Slim, com padrão MVC mais uma camada de dados
para melhor abstração, não foi utilizado nenhum ORM, apenas uma conexão usando PDO
orientada a objeto. Foi utilizado o Twig como template engine.

Lista de ferramentas:
* Slim Framework
* Twig Template Engine
* Bootstrap 4 
* IDE phpStorm
* MySQL

### O que é preciso para executar projeto?

Para que o projeto funcione corretamente é necessário ter 
* PHP 5.5 ou superior
* MySQL

### Como executar projeto?

1. Acesse "slim-todo-twig/app/dao/Database.php" configure os "define" com as informacões de conexão ao MySQL
2. Importe o banco todolist.sql que encontra-se na raiz do projeto em "slim-todo-twig/" ao seu MySQL
3. Na raiz do projeto em "slim-todo-twig/" execute o comando abaixo para instalar as dependencias do projeto 
        
        composer install
4. Depois este para inicializar o servidor php:

        php -S localhost:8080 -t public public/index.php
    
5. Acesse no navegador http://localhost:8080