<?php
include_once('db.php');

$text = $_REQUEST['about'];

$sql = "INSERT INTO posts (text) VALUES (':text')";
$stmt = $pdo->prepare($sql);
$stmt->execute(['text' => $text]);

header('Location: /');