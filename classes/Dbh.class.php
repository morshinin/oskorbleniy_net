<?php

class Dbh {
    private $host = 'ec2-3-214-4-151.compute-1.amazonaws.com';
    private $user = 'pcznwpxkncqmow';
    private $password = '62f6fd144dd256197f0545258f28245cadf0d17d54b3d510b181fda5db599317';
    private $dbname = 'd8vq4946vp4h8p';
    private $port = '5432';

    public function connect()
    {
        try {
            $dsn = 'pgsql:host='. $this->host . ';port='. $this->port
                . ';dbname='. $this->dbname. ';user='. $this->user
                . ';password='. $this->password;

            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}