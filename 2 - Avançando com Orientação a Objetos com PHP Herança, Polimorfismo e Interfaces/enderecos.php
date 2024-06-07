<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

/**
 * class Endereco
 * @package Alura\Banco\Modelo
 * @property-read string $cidade
 * @property-read string $bairro
 * @property-read string $rua
 * @property-read string $numero
 */

$umEndereco = new Endereco('Petrópolis', 'Qualquer', 'Rua', '13');

$outroEndereco = new Endereco('Rio', 'Outro', 'A', '7');

// echo $umEndereco . PHP_EOL;
// echo $outroEndereco . PHP_EOL;
echo $umEndereco->rua . PHP_EOL;
echo $outroEndereco->rua . PHP_EOL;

$umEndereco->cidade = "Nova cidade";

echo $umEndereco->cidade;
