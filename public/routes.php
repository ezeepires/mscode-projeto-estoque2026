<?php

use App\Controller\AppController;
use App\Controller\Categoria\NovaCategoriaController;
use App\Controller\Categoria\CadastrarCategoriaController;
use App\Controller\Categoria\EditarCategoriaController;
use App\Controller\Categoria\AtualizarCategoriaController;
use App\Controller\Categoria\ExcluirCategoriaController;
use App\Controller\Categoria\CategoriaController;
use App\Controller\Error\ErrorController;
use App\Controller\Error\NotFoundController;
use App\Controller\Login\LoginController;
use App\Controller\Home\HomeController;

$router = [
    'routes' => [
        '/' => AppController::class,
        '/error' => ErrorController::class,
        '/login' => LoginController::class,
        '/home' => HomeController::class,
        '/categoria' => CategoriaController::class,
        '/nova_categoria' => NovaCategoriaController::class,
        '/cadastrar_categoria' => CadastrarCategoriaController::class,
        '/editar_categoria' => EditarCategoriaController::class,
        '/atualizar_categoria' => AtualizarCategoriaController::class,
        '/excluir_categoria' => ExcluirCategoriaController::class,
    ],
    'default' => NotFoundController::class
];
