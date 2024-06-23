<?php

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

$dns = "pgsql:host=localhost;port=;dbname=";
$user = "";
$password = "";

$pdo = new PDO($dns, $user, $password);

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if ($url === false){
    header('Location: /?sucesso=0');
    exit();
}

$titulo = filter_input(INPUT_POST, 'titulo');
if ($titulo === false){
    header('Location: /?sucesso=0');
    exit();
}

$repository = new VideoRepository($pdo);

// try{
//     $statement->execute();
//     echo 'Sucesso';
// }catch(Exception $e){
//     echo "Erro! ". $e->getMessage();
// }
if($repository->add(new Video($url, $titulo)) === false){
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}

