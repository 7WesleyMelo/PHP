<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\{Titular, Conta, ContaPoupanca, ContaCorrente};
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Cpf;
// use Alura\Banco\Modelo\Conta\Conta; 
// use Alura\Banco\Modelo\Conta\ContaPoupanca; 
// use Alura\Banco\Modelo\Conta\ContaCorrente; 



$conta = new ContaPoupanca( 
    new Titular(
        new Cpf('054.216.021-84'), 'Wesley Melo', 
        new Endereco('Paraizópolis', 'Barro preto', 'Rua funda', '78')));

$conta->depositar(500);
$conta->sacar(100);

echo $conta->recuperarSaldo();