<?php 

namespace Alura\Banco\Modelo\Funcionario;

use Alura\Banco\Modelo\Autenticavel;

class Diretor extends funcionario implements Autenticavel
{
    public function calculabonificacao(): float
    {
        return $this->recuperaSalario() * 2; 
    }

    public function podeAutenticar(string $senha): bool
    {
        return $senha === '1234';
    }
}