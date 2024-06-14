<?php

use Alura\Mvc\Repository\VideoRepository;

$dns = "pgsql:host=localhost;port=5432;dbname=alura";
$user = "postgres";
$password = "95495312";

$pdo = new PDO($dns, $user, $password);


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    header('Location: index.php?sucesso=0');
    exit();
}

$sql = "DELETE from videos where id = ?;";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id, PDO::PARAM_INT);

$repository = new VideoRepository($pdo);

// try{
//     $statement->execute();
    
// }catch(Exception $e){
//     echo 'Erro! '. $e->getMessage();
// }

if($repository->remove($id) === false){
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}