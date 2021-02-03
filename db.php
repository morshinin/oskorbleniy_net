<?php
$host = 'ec2-3-214-4-151.compute-1.amazonaws.com';
$user = 'pcznwpxkncqmow';
$password = '62f6fd144dd256197f0545258f28245cadf0d17d54b3d510b181fda5db599317';
$dbname = 'd8vq4946vp4h8p';
$port = '5432';

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
