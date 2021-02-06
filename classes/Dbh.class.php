<?php

class Dbh {
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $port;
    private $path;

//    public function setDbCredentials()
//    {
//        $this->host = getenv('HOST');
//        $this->user = getenv('USER');
//        $this->password = getenv('PASSWORD');
//        $this->dbname = getenv('DBNAME');
//        $this->port = getenv('PORT');
//    }

    public function dbConnection()
    {
        $parts = (parse_url(getenv('DATABASE_URL')));
//        extract($parts);
        var_dump(getenv('DATABASE_URL'));
    }

    public function connect()
    {

        try {
//            $dsn = 'pgsql:host='. $this->host . ';port='. $this->port
            echo 'db connect';
            $this->dbConnection();
//                . ';dbname='. $this->dbname. ';user='. $this->user
//                . ';password='. $this->password;
//
//            $pdo = new PDO($dsn, $this->user, $this->password);
//            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//            return $pdo;
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}