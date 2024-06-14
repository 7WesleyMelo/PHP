<?php

namespace Alura\Mvc\Controller;

class Error404Controller implements Controller
{
    public function processaRequisicao(): void
    {
        header('Location: https://http.cat/404');
    }
}