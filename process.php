<?php
include_once('db.php');

$text = $_REQUEST['about'];

$stmt = $pdo->query("INSERT INTO posts (text) VALUES ('$text')");

header('Location: /');

