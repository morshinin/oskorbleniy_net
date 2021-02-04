<?php

$host = getenv('HOST');
$user = getenv('USER');
$password = getenv('PASSWORD');
$dbname = getenv('DBNAME');
$port = getenv('PORT');

var_dump($host);
try {
    $dsn = 'pgsql:host='. $host . ';port='. $port
        . ';dbname='. $dbname. ';user='. $user
        . ';password='. $password;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
