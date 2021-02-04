<?php
include_once ('config.php');

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
//$dbopts = parse_url(getenv('DATABASE_URL'));
//$app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
//    array(
//        'pdo.server' => array(
//            'driver'   => 'pgsql',
//            'user' => $dbopts["user"],
//            'password' => $dbopts["pass"],
//            'host' => $dbopts["host"],
//            'port' => $dbopts["port"],
//            'dbname' => ltrim($dbopts["path"],'/')
//        )
//    )
//);
//$host = 'localhost';
//$user = 'postgres';
//$password = 'Q3mvtobs';
//$dbname = 'insults';
//
//$dsn = 'pgsql:host=' . $host . ';dbname=' . $dbname;
//
//$pdo = new PDO($dsn, $user, $password);
