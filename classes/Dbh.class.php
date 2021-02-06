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
        extract($parts);
        $this->host = $parts['host'];
        $this->port = $parts['port'];
        $this->user = $parts['user'];
        $this->password = $parts['pass'];
        $this->dbname = $parts['path'];
    }

    public function connect()
    {
        $this->dbConnection();

        try {
            $dsn = 'pgsql:host='. $this->host . ';port='. $this->port
                . ';dbname='. $this->dbname. ';user='. $this->user
                . ';password='. $this->password;

            $pdo = new pdo($dsn, $this->user, $this->password);
            $pdo->setattribute(pdo::attr_default_fetch_mode, pdo::fetch_assoc);
            $pdo->setattribute(pdo::attr_emulate_prepares, false);
            $pdo->setattribute(pdo::attr_errmode, pdo::errmode_exception);

            return $pdo;
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}