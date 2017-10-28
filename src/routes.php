<?php

//rotas de tarefas
$app->get('/', 'TaskController:home');
$app->post('/task/new', 'TaskController:add');
$app->get('/task/{id}/view', 'TaskController:view');
$app->get('/task/{id}/completed', 'TaskController:completed');
$app->get('/task/{id}/delete', 'TaskController:delete');

//rotas de lembrete
$app->post('/reminder/new', 'ReminderController:add');

//rotas de categorias
$app->get('/category', 'CategoryController:home');
$app->post('/category/new', 'CategoryController:add');
$app->get('/category/{id}/delete', 'CategoryController:delete');