<?php

namespace Alura\Banco\Modelo;

abstract class Pessoa
{
    use AcessoPropriedades;

    protected string $nome;//Protected permite que os atributos sejam usadois somente por classes filhas.
    private Cpf $cpf;

    public function __construct(string $nome, Cpf $cpf)
    {
        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaCpf();
    }

    final protected function validaNome(string $nomeTitular)
    {
        if(strlen($nomeTitular) < 5){
            echo 'Nome precisa ter pelo menos 5 caracteres!';
            exit();
        }
    }
}