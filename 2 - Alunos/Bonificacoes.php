<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\{Cpf};
use Alura\Banco\Modelo\Funcionario\{Gerente, Diretor, Desenvolvedor, EditorDeVideo};
use Alura\Banco\Service\ControladorDebonificacoes;

$umFuncionario = new Desenvolvedor(
    'Luiz Andrade', 
    new Cpf('111.222.333-45'),  
    1000
);

$umFuncionario->sobeDeNivel();

$doisFuncionario = new Gerente(
    'Gabriel', 
    new Cpf('111.222.333-45'), 
    3000
);

$umDiretor = new Diretor(
    'Heitor', 
    new Cpf('111.222.333-45'),
    5000
);

$umEditor = new EditorDeVideo(
    'Paulo',
    new Cpf('111.222.333-45'),
    1500
);


$controlador = new ControladorDebonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($doisFuncionario);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umEditor);

echo $controlador->recuperaTotal();

