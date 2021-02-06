<?php

class Dbh {
    public $host;
    public $user;
    public $password;
    public $dbname;
    public $port;

    public function dbConnection()
    {
        $on_heroku = getenv('DATABASE_URL');
        if ($on_heroku) {
            $parts = (parse_url($on_heroku));
            extract($parts);
            $this->host = $parts['host'];
            $this->port = $parts['port'];
            $this->user = $parts['user'];
            $this->password = $parts['pass'];
            $this->dbname = str_replace('/', '', $parts['path']);
        } else {
            include_once('config.php');
            $db_connection_vars = dbConnectionVars();
            $this->host = $db_connection_vars['host'];
            $this->user = $db_connection_vars['user'];
            $this->password = $db_connection_vars['pass'];
            $this->dbname = $db_connection_vars['db'];
            $this->port = $db_connection_vars['port'];
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
            $pdo->setattribute(pdo::ATTR_DEFAULT_FETCH_MODE, pdo::FETCH_ASSOC);
            $pdo->setattribute(pdo::ATTR_EMULATE_PREPARES, false);
            $pdo->setattribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);

            return $pdo;
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}