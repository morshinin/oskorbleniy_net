<?php

require_once ('templates/header.php');
include('./includes/class-autoload.inc.php');

$data = new Posts();
$post = $data->getRandomPost();
?>

<div class="m-auto text-center p-4 shadow">
    <p class="text-3xl mb-3">
        <?= $post['text']; ?>
    </p>
    <p>
        <button onClick="window.location.href=window.location.href"
                class="block m-auto px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Еще...</button>
    </p>
</div>

<?php
require_once ('templates/footer.php');
