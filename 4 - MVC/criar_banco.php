<?php
$dns = "pgsql:host=localhost;port=;dbname=";
$user = "";
$password = "";

$pdo = new PDO($dns, $user, $password);

try{
    $pdo->exec('Create table videos (id integer primary key, url varchar(1000), title varchar(100));');
    echo 'Sucesso!';
}catch(Exception $e){
    echo 'Erro!'. $e->getMessage();
}
