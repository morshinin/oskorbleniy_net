<?php

/**
 * Class Dbh
 */
class Dbh {
    /**
     * @var $host
     */
    public $host;

    /**
     * @var $user
     */
    public $user;

    /**
     * @var $password
     */
    public $password;

    /**
     * @var $dbname
     */
    public $dbname;

    /**
     * @var $port
     */
    public $port;

    /**
     * Connection to the database
     * checks if there is a heroku enviroment variable or local
     * to use local variable you need to export it to your local .zshrc
     */
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
            $parts = (parse_url(getenv('INSULT_DB_URL')));
            extract($parts);
            $this->host = $parts['host'];
            $this->port = $parts['port'];
            $this->user = $parts['user'];
            $this->password = $parts['pass'];
            $this->dbname = str_replace('/', '', $parts['path']);
        }
    }

    /**
     * Database connection via pdo
     *
     * @return pdo
     */
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