<?php

namespace Alura\Banco\Modelo\Conta;

use Alura\Banco\Modelo\Autenticavel;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Pessoa;


// Titular e uma Pessoa
Class Titular extends Pessoa implements Autenticavel
{
  private Endereco $endereco;
   
  public function __construct(Cpf $cpf, string $nome, Endereco $endereco)
  { 
    parent::__construct($nome, $cpf);//Utilizo o contruct da classe mãe
    $this->endereco = $endereco;    
  }

  public function recuperaEndereco(): string
  {
    return (
      $this->endereco->recuperaCidade().PHP_EOL.
      $this->endereco->recuperaBairro().PHP_EOL.
      $this->endereco->recuperaRua().PHP_EOL.
      $this->endereco->recuperaNumero()
    );
   }

   public function podeAutenticar(string $senha): bool
   {
       return $senha === 'abcd';
   }
}