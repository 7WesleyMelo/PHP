<?php 

// var_dump($_SERVER);

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

$dns = "pgsql:host=localhost;port=;dbname=";
$user = "";
$password = "";

$pdo = new PDO($dns, $user, $password);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    header('Location: index.php?sucesso=0');
    exit();
}

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

$sql = "UPDATE videos SET url = :url, title = :title where id = :id;";
$statement = $pdo->prepare($sql);
$statement->bindValue(':url', $url, PDO::PARAM_STR);
$statement->bindValue(':title', $titulo, PDO::PARAM_STR);
$statement->bindValue(':id', $id, PDO::PARAM_INT);

$video = new Video($url, $titulo);

$video->setId($id);

$repository = new VideoRepository($pdo);

// try{
//     $statement->execute();
    
// }catch(Exception $e){
//     echo 'Erro! '. $e->getMessage();
// }

if($repository->update($video) === false){
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}
