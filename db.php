<?php

$host = 'localhost';
$user = 'postgres';
$password = 'Q3mvtobs';
$dbname = 'insults';

$dsn = 'pgsql:host=' . $host . ';dbname=' . $dbname;

$pdo = new PDO($dsn, $user, $password);
