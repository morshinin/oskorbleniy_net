<?php

include('./includes/class-autoload.inc.php');

$posts = new Posts();

if (isset($_POST['about'])) {
    $text = $_POST['about'];

    $posts->addPost($text);
} else {
    echo 'Unable to add post';
}
