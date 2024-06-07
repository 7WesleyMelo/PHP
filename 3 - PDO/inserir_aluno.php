<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infraestructure\Persistence\ConnectionCreator::createConnection();   

$student = new Student(null, 'Emelly Melo', new \DateTimeImmutable('1999-08-28'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?)";
$statement = $pdo->Prepare($sqlInsert);
$statement->bindValue(1, $student->name(), PDO::PARAM_STR);
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'), PDO::PARAM_STR);
$statement->Execute();


// echo $sqlInsert;

var_dump($pdo->exec($sqlInsert));