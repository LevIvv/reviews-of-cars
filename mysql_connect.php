<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'testing';

$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $password);

?>
