<?php

namespace Insult\Posts;

use Insult\Dbh\Dbh;

/**
 * Class Posts
 */
class Posts extends Dbh
{
    /**
     * @var int $no_of_records_per_page
     */
    public $no_of_records_per_page = 10;

    /**
     * Returns paginated posts
     *
     * @return array
     */
    public function getPaginatedPosts()
    {
        $no_of_records_per_page = $this->no_of_records_per_page;
        $sql = "SELECT * FROM posts ORDER BY id DESC limit :no_of_records_per_page offset :offset";
        $stmt = $this->connect()->prepare($sql);
        $offset = ($this->getPage() - 1) * $no_of_records_per_page;
        $stmt->execute(['offset' => $offset, 'no_of_records_per_page' => $no_of_records_per_page]);

        return $stmt->fetchAll();
    }

    /**
     * Returns random post
     *
     * @return mixed
     */
    public function getRandomPost()
    {
        $sql = 'SELECT text FROM posts ORDER BY random() limit 1';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Counts all the posts from the database
     *
     * @return int
     */
    public function getTotalRows()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getPage()
    {
        return isset($_GET['pageno']) ? (int)$_GET['pageno'] : 1;
    }

    /**
     * Returns page numbers
     *
     * @return false|float
     */
    public function getPaginationNumbers()
    {
        $total_rows = $this->getTotalRows();
        return ceil($total_rows / $this->no_of_records_per_page);
    }

    /**
     * Inserts text from request to the database
     *
     * @param $text - text from form request
     */
    public function addPost($text)
    {
        try {
            $sql = 'INSERT INTO posts (text) VALUES (:text)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['text' => $text]);
        }
        catch (PDOException $e) {
            echo 'Something went wrong: '. $e;
        }

        header('Location: /');
    }
}