<?php

// require_once './src/Modelo/Conta/Conta.php';
// require_once './src/Modelo/Endereco.php';
// require_once './src/Modelo/Pessoa.php';
// require_once './src/Modelo/Conta/Titular.php';
// require_once './src/Modelo/Cpf.php';

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Conta\Conta; 



$endereco = new Endereco('Cidade Grande', 'Jardins', 'Rua', '55');
$primeiraConta = new Conta(new Titular(new Cpf('111.222.333-45'), 'André Souza', $endereco));
$primeiraConta->depositar(500);
$primeiraConta->sacar(300); //Certo
// $primeiraConta->defineCpfTitular('123.456.789-10');
// var_dump($primeiraConta);
echo $primeiraConta->recuperarCpfTitular().PHP_EOL;
echo $primeiraConta->recuperarNomeTitular().PHP_EOL;
echo $primeiraConta->recuperarSaldo().PHP_EOL;
echo $primeiraConta->recuperaEndereco();

// $segundaConta = new Conta(new Titular(new Cpf('054.216.021-84'), 'Wesley Melo', $endereco));
// echo $segundaConta->recuperarCpfTitular().PHP_EOL;

// new Conta(new Titular(new cpf('123.789.456-10'), 'Teste2', $endereco));
// // unset($segundaConta);
// echo PHP_EOL.Conta::recuperaNumeroDeContas();

