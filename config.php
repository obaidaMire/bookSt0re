<?php 

$host = "mysql:host=localhost;dbname=booksdb";
$user = "root";
$password = "";

try {
    $con = NEW PDO($host,$user,$password);
}catch (PDOException $e) {
    $e->getMessage();
}

?>