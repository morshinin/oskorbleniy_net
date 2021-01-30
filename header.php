<?php
$request_uri = $_SERVER['REQUEST_URI'];
$pages = [
    'О сайте' => '/about.php',
    'Списком'  =>  '/',
    'Случайное' =>  'random.php'
];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>INSULT.SPACE - Оскорбляза</title>
</head>
<body class="flex flex-col min-h-screen">
<div class="flex justify-between align-center p-3 border-b border-gray-100 border-solid">
    <h2><a href="/">INSULT.SPACE - Оскорбляза</a></h2>
    <nav>
        <?php foreach ($pages as $page => $page_url) {
            if ($request_uri !== $page_url) { ?>
        <a href="<?= $page_url ?>" class="mr-5"><?= $page ?></a>
        <?php } } ?>
        <?php if ($request_uri !== '/form.php') { ?>
            <a href="/form.php" class="inline-flex justify-center py-2 px-4 border border-transparent
            shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Добавить оскорбление</a>
        <?php } ?>
    </nav>
</div>

<main class="conatiner mx-auto max-w-2xl mt-4 h-full flex flex-col">
