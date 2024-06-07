<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Autenticavel;

class Autenticador 
{
    public function tentaLogin(Autenticavel $autenticavel, string $senha): bool
    {
       if($autenticavel->podeAutenticar($senha)){
            return 'Ok, usuário logado no sistema.';
       } else{
            return 'Ops, senha incorreta.';    
       }
    }
}