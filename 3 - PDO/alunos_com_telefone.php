<?php

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infraestructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);

/** @var array \Alura\Pdo\DOmain\Model\Student[] $studentList */
$studentList = $repository->studentsWithPhones();

echo $studentList[1]->phones()[0]->formattedPhone();
// var_dump($sutdentList);

