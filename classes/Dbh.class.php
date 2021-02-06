<?php

class Dbh {
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $port;

    public function dbConnection()
    {
        $on_heroku = getenv('DATABASE_URL');
        var_dump($on_heroku);
        echo 'fuck you';
        if ($on_heroku) {
            $parts = (parse_url($on_heroku));
            extract($parts);
            var_dump($parts);
            $this->host = $parts['host'];
            $this->port = $parts['port'];
            $this->user = $parts['user'];
            $this->password = $parts['pass'];
            $this->dbname = str_replace('/', '', $parts['path']);
        } else {
            $this->host = getenv('HOST');
            $this->user = getenv('USER');
            $this->password = getenv('PASSWORD');
            $this->dbname = getenv('DBNAME');
            $this->port = getenv('PORT');
            var_dump($this->host);
        }
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