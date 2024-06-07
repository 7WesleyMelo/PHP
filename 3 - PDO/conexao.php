<?php

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$databasePath = __DIR__.'/banco.sqlite';

// $pdo = new PDO('sqlite:' .$databasePath);
$pdo = ConnectionCreator::createConnection();
// echo 'Conectei';

// $pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');

$pdo->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('24', '999999999', 1),('21', '222222222', 1);");
exit();

try{
    $pdo->beginTransaction();
    // $createTableSql = '
    //     CREATE TABLE IF NOT EXISTS students (
    //         id INTEGER PRIMARY KEY,
    //         name TEXT,
    //         birth_date TEXT
    //     );

    //     CREATE TABLE IF NOT EXISTS phones (
    //         id INTEGER PRIMARY KEY,
    //         area_code TEXT,
    //         number TEXT,
    //         student_id INTEGER,
    //         FOREIGN KEY(student_id) REFERENCES students(id)
    //     );
    // ';

    // $createTableSql = 'DROP TABLE phones;';

    $createTableSql = 'CREATE TABLE phones (
                        id INTEGER PRIMARY KEY,
                        area_code TEXT,
                        number TEXT,
                        student_id INTEGER,
                        FOREIGN KEY(student_id) REFERENCES students(id));';

    var_dump($pdo->exec($createTableSql));

    $pdo->commit();
    
} catch (\PDOException $e){
    echo $e->getMessage().PHP_EOL;
    echo $e->errorInfo[0];
    $pdo->rollBack();
}
// echo 'Criei';