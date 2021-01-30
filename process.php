<?php
include_once('db.php');

$text = $_REQUEST['about'];

try {
    $sql = 'INSERT INTO posts (text) VALUES (:text)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['text' => $text]);
}
catch (PDOException $e) {
    echo 'Something went wrong: '. $e;
}

header('Location: /');