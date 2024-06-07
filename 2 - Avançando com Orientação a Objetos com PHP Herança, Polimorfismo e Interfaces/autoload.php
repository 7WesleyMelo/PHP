<?php

//retorna o nome dos arquivos ecaminho
spl_autoload_register(function(string $nomeCompleto){
    // echo $nomeCompleto;
    // exit();

    $caminhoArquivo = str_replace('Alura\\Banco', 'src', $nomeCompleto);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);
    $caminhoArquivo.='.php';

    if(file_exists($caminhoArquivo)){
        require_once $caminhoArquivo;
    }
    // echo $caminhoArquivo;
    // exit();
});

// Entendemos que é possível separar nossas classes em namespaces, assim como separamos arquivos em pastas;
// Vimos que separando as classes em namespaces podemos ter classes com o mesmo nome em namespaces diferentes;
// Utilizando um namespace raiz (chamado de vendor namespace em algumas literaturas) podemos evitar conflitos com classes de pacotes externos que venhamos a utilizar;
// Para utilizar uma classe precisamos importá-la utilizando use ou informar seu nome completo (com namespace) em todos os locais onde ela for utilizada;
// Através de um autoloader com o PHP (spl_autoload_register) podemos evitar ficar utilizando require para incluir todos os arquivos necessários para executar o programa;