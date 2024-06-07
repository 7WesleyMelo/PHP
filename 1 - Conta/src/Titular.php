<?php

Class Titular extends Pessoa
{
   private Endereco $endereco;
   
   public function __construct(Cpf $cpf, string $nome, Endereco $endereco)
   {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
        $this->endereco = $endereco;    
   }

   public function recuperaCpf(): string
   {
        return $this->cpf->recuperaCpf();
   }

   public function recuperaNome(): string
   {
        return $this->nome;
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
}