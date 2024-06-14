<?php
$dns = "pgsql:host=localhost;port=5432;dbname=alura";
$user = "postgres";
$password = "95495312";

$pdo = new PDO($dns, $user, $password);

try{
    $pdo->exec('Create table videos (id integer primary key, url varchar(1000), title varchar(100));');
    echo 'Sucesso!';
}catch(Exception $e){
    echo 'Erro!'. $e->getMessage();
}