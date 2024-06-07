<?php

Class Cpf 
{   
    //value objects
    // Uma classe deve ter apenas uma responsabilidade, deve ser concisa
    // É possível que um objeto tenha outro objeto como valor de um de seus atributos. Isto é chamado de composição
    // A composição pode (e deve) ser utilizada ao definir uma estrutura complexa de classes
    private string $cpf;

    public function __construct(string $cpf)
    {   
        $this->validaCpf($cpf);
        $this->cpf = $cpf;
    }

    public function recuperaCpf(): string
    {   
        $this->validaCpf($this->cpf);
        return $this->cpf;
    }

    private function validaCpf(string $cpf)
    {
        $cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);
        // echo $cpfLimpo;
        // exit;
        if(strlen($cpfLimpo) != 11){
            echo 'CPF inválido';
            exit();
        }

         // Primeiro dígito verificador
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += intval($cpfLimpo[$i]) * (10 - $i);
            // echo $cpfLimpo[$i].PHP_EOL;
            // echo $soma.PHP_EOL;
        }
        // echo $soma.PHP_EOL;
        $resto = $soma % 11;
        $dv1 = ($resto < 2) ? 0 : (11 - $resto);
        
        // echo ($dv1 . '; ' . $cpf[9]);
        // exit;
        // Segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += intval($cpfLimpo[$i]) * (11 - $i);
        }
        $resto = $soma % 11;
        $dv2 = ($resto < 2) ? 0 : (11 - $resto);

        // echo ($dv1 . '; ' . $cpfLimpo[9] . ' -- ' . $dv2 . '; '  .$cpfLimpo[10]);
        if($dv1 == $cpfLimpo[9] && $dv2 == $cpfLimpo[10]){
            // echo 'Cpf válido!';
            // exit();\
            return;
        }

        echo 'Cpf inválido';
        
    }
}