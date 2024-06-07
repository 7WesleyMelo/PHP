<?php

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infraestructure\Persistence\ConnectionCreator::createConnection();  

$sqlDelete = "Delete from students where id = ?;";
$prepareStatement = $pdo->Prepare($sqlDelete);
// var_dump($pdo->Prepare($sqlDelete));
$prepareStatement->bindValue(1, 7, PDO::PARAM_INT);
// exit;
var_dump($prepareStatement->execute());