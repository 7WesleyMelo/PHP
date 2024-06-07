<?php

use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Service\Autenticador;
use Alura\Banco\Modelo\Cpf;

require_once 'autoload.php';

$autenticador = new Autenticador();
$umDiretor = new Diretor(
    'João da Silva', 
    new Cpf('000.111.222-34'), 
    3000
);

echo $autenticador->tentaLogin($umDiretor, '4321');