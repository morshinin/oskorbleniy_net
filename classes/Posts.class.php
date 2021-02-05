<?php

class Posts extends Dbh {
    public $no_of_records_per_page = 10;

    public function getPaginatedPosts()
    {
        $no_of_records_per_page = $this->no_of_records_per_page;
        $sql = "SELECT * FROM posts ORDER BY id DESC limit :no_of_records_per_page offset :offset";
        $stmt = $this->connect()->prepare($sql);
        $offset = ($this->getPage() - 1) * $no_of_records_per_page;
        $stmt->execute(['offset' => $offset, 'no_of_records_per_page' => $no_of_records_per_page]);

        return $stmt->fetchAll();
    }

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

    public function getPaginationNumbers()
    {
        $total_rows = $this->getTotalRows();
        return ceil($total_rows / $this->no_of_records_per_page);
    }
}