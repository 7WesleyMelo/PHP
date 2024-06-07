<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infraestructure\Repository\PdoStudentRepository;
use Alura\Pdo\Domain\Model\Phone;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);

$studentList = $repository->allStudents();
// $statement = $pdo->query('SELECT * FROM students;');
// $studentDataList= $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($studentList);
exit;
// $pdo = \Alura\Pdo\Infraestructure\Persistence\ConnectionCreator::createConnection();  

// $statement = $pdo->query('SELECT * FROM students;');

// while($studentData = $statement->fetch(PDO::FETCH_ASSOC)){
//     $student = new Student(
//         $studentData['id'], 
//         $studentData['name'], 
//         new \DateTimeImmutable($studentData['birth_date'])
//     );  
    
//     echo $student->age(). PHP_EOL;
// }
// exit;

// var_dump($statement->fetchAll());exit;

// $studentDataList= $statement->fetchAll(PDO::FETCH_ASSOC);
// $studentList = [];
// var_dump($studentDataList);
// exit;

// foreach($studentDataList as $studentData){
//     $studentList[] = new Student(
//         $studentData['id'], 
//         $studentData['name'], 
//         new \DateTimeImmutable($studentData['birth_date'])
//     ) ;   
// }

var_dump($studentList);