<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infraestructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection(); 
$studentRepository = new PdoStudentRepository($connection);
// var_dump($connection);
$connection->beginTransaction();

try{
    $aStudent = new Student(
        null,
        'Nico Steppat',
        new DateTimeImmutable('1985-05-01')
    );

    $studentRepository->save($aStudent);
    // exit;
    $anotherStudent = new Student(
        null,
        'Sergio Lopes',
        new DateTimeImmutable('1985-05-01')
    );  

    $studentRepository->save($anotherStudent);

    $connection->commit();
} catch (\PDOException $e){
    echo $e->getMessage().PHP_EOL;
    echo $e->errorInfo[0];
    $connection->rollBack();
}
    // $connection->commit();
   