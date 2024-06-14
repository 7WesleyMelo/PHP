<?php

use Alura\Mvc\Controller\DeleteVideoController;
use Alura\Mvc\Controller\EditVideoController;
use Alura\Mvc\Controller\NewVideoController;
use Alura\Mvc\Controller\VideoFormController;
use Alura\Mvc\Controller\VideoListController;

return [
    'GET|/' => VideoListController::class,
    'GET|/novo_video' => VideoFormController::class,
    'POST|/novo_video' => NewVideoController::class,
    'GET|/editar_video' => VideoFormController::class,
    'POST|/editar_video' => EditVideoController::class,
    'GET|/remover_video' => DeleteVideoController::class,
];