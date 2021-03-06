<?php

use Insult\Seo\Seo;
require_once ('vendor/autoload.php');

if (class_exists(Seo::class)) {
    $page_seo_data = new Seo();
    $page_title = $page_seo_data->setPageTitle();
    $page_description = $page_seo_data->setPageDescription();
}
$request_uri = $_SERVER['REQUEST_URI'];
$pages = [
    'О сайте' => '/about.php',
    'Списком'  =>  '/',
    'Случайное' =>  '/random.php'
];
$centered_layout_class = ($request_uri === $pages['Случайное']) || ($request_uri === '/form.php') ? 'h-screen' : '';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $page_description ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="resources/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="resources/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/ico/favicon-16x16.png">
    <link rel="manifest" href="resources/ico/site.webmanifest">
    <link rel="stylesheet" href="resources/css/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title><?= $page_title ?> - INSULT.SPACE</title>
</head>
<body class="flex flex-col min-h-screen <?= $centered_layout_class ?>">
<header class="flex justify-between align-center p-3 border-b border-gray-100 border-solid relative z-10">
    <h2 class="logo flex align-center">
        <a href="/" class="grid grid-rows-2">
            <img src="resources/img/insult-space-logo.png" alt="Insult.space logo"
                 class="row-span-2 pr-2 pt-1">
            <span>INSULT.SPACE</span>
            <span class="text-xs text-gray-500">Оскорбляй красиво</span>
        </a>
    </h2>
    <nav>
        <?php foreach ($pages as $page => $page_url) {
            $is_current_page = preg_replace('/\?.*/','', $request_uri) === $page_url;
            $show_bg = $is_current_page ? 'bg-gray-200 hover:bg-gray-200 cursor-default' : '';
            $show_link = $is_current_page ? '#0' : $page_url;
            ?>
        <a href="<?= $show_link ?>" class="mr-5 hover:bg-gray-50 inline-block p-2 <?= $show_bg ?>"><?= $page ?></a>
        <?php } ?>
        <?php if ($request_uri !== '/form.php') { ?>
            <a href="/form.php" class="inline-flex justify-center py-2 px-4 border border-transparent
            shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            rel="nofollow">
                Добавить оскорбление
            </a>
        <?php } ?>
    </nav>
</header>
<aside class="absolute h-full">
    <div class="sticky bg-gray-50 border-t border-gray-100 top-24 p-2 text-xs text-gray-500 grid grid-cols-3 grid-rows-2">
        <h2 class="col-span-3 row-span-1 pb-2">Поделиться ссылкой на сайт</h2>
        <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//insult.space/" target="_blank"
                title="Поделиться ссылкой на сайт в Facebook">
            <svg viewBox="-110 1 511 511.99996" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current">
                <title>Поделиться ссылкой на сайт в Facebook</title>
                <desc>Используется для отправки ссылки на сайт INSULT.SPACE в Facebook</desc>
                <path d="m180 512h-81.992188c-13.695312 0-24.835937-11.140625-24.835937-24.835938v-184.9375h-47.835937c-13.695313 0-24.835938-11.144531-24.835938-24.835937v-79.246094c0-13.695312 11.140625-24.835937 24.835938-24.835937h47.835937v-39.683594c0-39.347656 12.355469-72.824219 35.726563-96.804688 23.476562-24.089843 56.285156-36.820312 94.878906-36.820312l62.53125.101562c13.671875.023438 24.792968 11.164063 24.792968 24.835938v73.578125c0 13.695313-11.136718 24.835937-24.828124 24.835937l-42.101563.015626c-12.839844 0-16.109375 2.574218-16.808594 3.363281-1.152343 1.308593-2.523437 5.007812-2.523437 15.222656v31.351563h58.269531c4.386719 0 8.636719 1.082031 12.289063 3.121093 7.878906 4.402344 12.777343 12.726563 12.777343 21.722657l-.03125 79.246093c0 13.6875-11.140625 24.828125-24.835937 24.828125h-58.46875v184.941406c0 13.695313-11.144532 24.835938-24.839844 24.835938zm-76.8125-30.015625h71.632812v-193.195313c0-9.144531 7.441407-16.582031 16.582032-16.582031h66.726562l.027344-68.882812h-66.757812c-9.140626 0-16.578126-7.4375-16.578126-16.582031v-44.789063c0-11.726563 1.191407-25.0625 10.042969-35.085937 10.695313-12.117188 27.550781-13.515626 39.300781-13.515626l36.921876-.015624v-63.226563l-57.332032-.09375c-62.023437 0-100.566406 39.703125-100.566406 103.609375v53.117188c0 9.140624-7.4375 16.582031-16.578125 16.582031h-56.09375v68.882812h56.09375c9.140625 0 16.578125 7.4375 16.578125 16.582031zm163.0625-451.867187h.003906zm0 0"/></svg>
        </a>
        <a href="https://twitter.com/intent/tweet?text=http%3A//insult.space/" target="_blank"
                title="Поделиться ссылкой на сайт в twitter">
            <svg viewBox="0 -45 512.00013 512" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current">
                <title>Поделиться ссылкой на сайт в twitter</title>
                <desc>Используется для отправки ссылки на сайт INSULT.SPACE в Twitter</desc>
                <path d="m194.816406 422.710938c-85.453125 0-152.992187-14.929688-185.304687-40.953126l-.628907-.507812-.570312-.570312c-7.675781-7.679688-10.191406-17.753907-6.894531-27.636719l.300781-.820313c4-10.003906 13.800781-16.738281 24.421875-16.800781 21.859375-.378906 40.984375-2.984375 58.339844-8.042969-27.683594-12.875-46.914063-35.167968-58.355469-67.433594-3.847656-10.0625-.527344-21.21875 8.339844-27.871093 2.1875-1.644531 4.660156-2.886719 7.277344-3.71875-15.382813-17.757813-26.746094-37.964844-33.109376-59.335938l-.199218-.664062-.136719-.679688c-2.160156-10.808593 2.671875-21.921875 11.527344-26.707031 3.714843-2.132812 7.75-3.238281 11.800781-3.332031-4.367188-9.40625-7.542969-19.0625-9.425781-28.777344-5.226563-26.921875-.914063-53.910156 12.8125-80.214844l3.175781-6.351562c2.542969-5.082031 7.402344-8.652344 13.003906-9.5625 5.601563-.90625 11.34375.945312 15.355469 4.957031l5.785156 5.792969c45.703125 47.914062 86.640625 70.648437 157.417969 86.203125 3.160156-27.167969 14.90625-52.421875 33.855469-72.296875 22.550781-23.648438 52.664062-36.917969 84.792969-37.371094h.210937c23.441406 0 52.519531 13.382813 70.105469 22.820313 15.085937-4.9375 33.261718-12.582032 52.121094-20.664063 8.824218-4.140625 19.703124-2.2460938 26.640624 4.691406 6.800782 6.800781 8.6875 16.390625 5.078126 25.710938-1.371094 3.816406-2.925782 7.5625-4.65625 11.226562 2.582031 1.183594 4.945312 2.789063 6.941406 4.785157 6.035156 6.035156 8.550781 15.480468 6.40625 24.066406l-.230469.816406c-7.226563 23.289062-21.109375 42.257812-39.46875 54.164062-3.066406 163.285157-126.027344 295.078126-276.730469 295.078126zm-156.511718-57.675782c30.449218 17.226563 88.476562 27.648438 156.511718 27.648438 65.410156 0 127.136719-28.082032 173.804688-79.074219 47.050781-51.410156 72.960937-119.679687 72.960937-192.234375v-.816406c0-6.570313 3.617188-12.566406 9.4375-15.652344 11.808594-6.253906 21.371094-16.90625 27.589844-30.527344-6.414063 1.011719-12.933594-1.5625-16.929687-6.929687-4.644532-6.238281-4.695313-14.664063-.128907-20.957031 2.464844-3.398438 4.699219-6.933594 6.691407-10.589844-16.285157 6.839844-31.75 12.972656-45.175782 17.046875-4.878906 1.476562-10.316406.898437-14.773437-1.589844-23.902344-13.316406-46.164063-21.277344-59.585938-21.316406-49.527343.757812-89.796875 43.175781-89.796875 94.605469 0 5.316406-2.359375 10.300781-6.464844 13.679687-4.109374 3.375-9.453124 4.726563-14.671874 3.695313-81.609376-16.078126-129.96875-40.1875-180.257813-90.722657-7.207031 17.269531-9.175781 34.664063-5.84375 51.839844 3.378906 17.398437 12.367187 34.832031 25.996094 50.414063 5.179687 5.914062 5.867187 14.375 1.710937 21.050781-4.140625 6.652343-12.011718 9.761719-19.578125 7.734375-5.914062-1.585938-11.351562-3.667969-16.507812-6.34375 10.503906 22.816406 28.570312 43.917968 51.28125 59.480468 6.582031 4.511719 9.332031 12.921876 6.691406 20.453126-2.644531 7.542968-10.03125 12.398437-18.015625 11.804687-8.699219-.644531-16.40625-2.296875-23.5-5.082031 12.734375 25.933594 33.082031 40.203125 64.429688 45.65625 7.464843 1.300781 13.277343 7.195312 14.464843 14.667968 1.191407 7.472657-2.507812 14.878907-9.199219 18.429688-26.71875 14.164062-55.921874 21.765625-91.140624 23.628906zm0 0"/></svg>
        </a>
        <a target="_blank" title="Поделиться ссылкой на сайт в Вконтакте"
                href="http://vk.com/share.php?url=http%3A//insult.space/&title=INSULT.SPACE&description=Оскорбляй красиво">
            <svg id="regular" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" class="w-5 h-5 fill-current"
                 width="512" xmlns="http://www.w3.org/2000/svg">
                <title>Поделиться ссылкой на сайт в Вконтакте</title>
                <desc>Используется для отправки ссылки на сайт INSULT.SPACE в Вконтакте</desc>
                <path d="m12.145 19.5c3.472 0 2.234-2.198 2.502-2.83-.004-.472-.008-.926.008-1.202.22.062.739.325 1.811 1.367 1.655 1.67 2.078 2.665 3.415 2.665h2.461c.78 0 1.186-.323 1.389-.594.196-.262.388-.722.178-1.438-.549-1.724-3.751-4.701-3.95-5.015.03-.058.078-.135.103-.175h-.002c.632-.835 3.044-4.449 3.399-5.895.001-.002.002-.005.002-.008.192-.66.016-1.088-.166-1.33-.274-.362-.71-.545-1.299-.545h-2.461c-.824 0-1.449.415-1.765 1.172-.529 1.345-2.015 4.111-3.129 5.09-.034-1.387-.011-2.446.007-3.233.036-1.535.152-3.029-1.441-3.029h-3.868c-.998 0-1.953 1.09-.919 2.384.904 1.134.325 1.766.52 4.912-.76-.815-2.112-3.016-3.068-5.829-.268-.761-.674-1.466-1.817-1.466h-2.461c-.998 0-1.594.544-1.594 1.455 0 2.046 4.529 13.544 12.145 13.544zm-8.09-13.499c.217 0 .239 0 .4.457.979 2.883 3.175 7.149 4.779 7.149 1.205 0 1.205-1.235 1.205-1.7l-.001-3.702c-.066-1.225-.512-1.835-.805-2.205l3.508.004c.002.017-.02 4.095.01 5.083 0 1.403 1.114 2.207 2.853.447 1.835-2.071 3.104-5.167 3.155-5.293.075-.18.14-.241.376-.241h2.461.01c-.001.003-.001.006-.002.009-.225 1.05-2.446 4.396-3.189 5.435-.012.016-.023.033-.034.05-.327.534-.593 1.124.045 1.954h.001c.058.07.209.234.429.462.684.706 3.03 3.12 3.238 4.08-.138.022-.288.006-2.613.011-.495 0-.882-.74-2.359-2.23-1.328-1.292-2.19-1.82-2.975-1.82-1.524 0-1.413 1.237-1.399 2.733.005 1.622-.005 1.109.006 1.211-.089.035-.344.105-1.009.105-6.345 0-10.477-10.071-10.636-11.996.055-.005.812-.002 2.546-.003z"/></svg>
        </a>
    </div>
</aside>

<aside class="absolute right-0 h-full">
    <div class="sticky p-4 top-24">
        <a href="https://ko-fi.com/insultspace" target="_blank" class="flex align-baseline"
           title="Купить мне кофе с помощью сайта ko-fi.com" rel="nofollow">
            <img src="/resources/img/cup.webp" alt="Иконка чашки кофе" title="Купить мне кофе"
                 class="h-4 pr-2 flex-shrink-0">
            <span class="text-xs text-gray-500">Купить мне кофе</span>
        </a>
    </div>
</aside>
<main class="conatiner mx-auto max-w-2xl mt-4 h-full flex flex-col">
