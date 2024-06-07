<?php 

namespace Alura\Banco\Modelo\Funcionario;

class Desenvolvedor extends funcionario
{
    // public function calculabonificacao(): float
    // {
    //     return $this->recuperaSalario() * 0.05; 
    // }

    public function sobeDeNivel(): void
    {
        $this->recebeAumento($this->recuperaSalario() * 0.75);
    }

    public function calculabonificacao(): float
    {
        return 500.0;
    }

}