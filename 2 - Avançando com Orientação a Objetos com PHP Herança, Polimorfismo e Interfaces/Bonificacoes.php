<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\{Cpf};
use Alura\Banco\Modelo\Funcionario\{Gerente, Diretor, Desenvolvedor, EditorDeVideo};
use Alura\Banco\Service\ControladorDebonificacoes;

$umFuncionario = new Desenvolvedor(
    'Wesley Melo', 
    new Cpf('054.216.021-84'),  
    1000
);

$umFuncionario->sobeDeNivel();

$doisFuncionario = new Gerente(
    'Wesley Santos', 
    new Cpf('054.216.021-84'), 
    3000
);

$umDiretor = new Diretor(
    'Wesley Oliveira', 
    new Cpf('054.216.021-84'),
    5000
);

$umEditor = new EditorDeVideo(
    'Paulo',
    new Cpf('054.216.021-84'),
    1500
);


$controlador = new ControladorDebonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($doisFuncionario);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umEditor);

echo $controlador->recuperaTotal();

