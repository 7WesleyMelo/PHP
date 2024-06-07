<?php

use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Service\Autenticador;
use Alura\Banco\Modelo\Cpf;

require_once 'autoload.php';

$autenticador = new Autenticador();
$umDiretor = new Diretor(
    'João da Silva', 
    new Cpf('054.216.021-84'), 
    3000
);

echo $autenticador->tentaLogin($umDiretor, '4321');