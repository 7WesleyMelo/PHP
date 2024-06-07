<?php

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Pessoa;
use Alura\Banco\Modelo\Cpf;

// Funcionário é uma Pessoa
abstract class Funcionario extends Pessoa
{
    private float $salario;

    public function __construct(string $nome, Cpf $cpf, float $salario)
    {   
        parent::__construct($nome, $cpf);//Utilizo o contruct da classe mãe
        $this->salario = $salario;
    }

    public function alteraNome(string $nome): void
    {
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    public function recebeAumento(float $valorAumento) : void
    {
        if($valorAumento < 0){
            echo "Aumento deve ser positivo";
            return;
        }

        $this->salario += $valorAumento;
    }

    public function recuperaSalario(): float
    {
        return $this->salario;
    }

    abstract public function calculaBonificacao(): float;
}