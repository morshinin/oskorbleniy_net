<?php

include_once ('header.php');
include_once ('db.php');


$sql = 'SELECT text FROM posts ORDER BY random() limit 1';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$post = $stmt->fetch();
?>

<div class="m-auto text-center p-4 shadow">
    <p class="text-3xl mb-3">
        <?= $post['text']; ?>
    </p>
    <p>
        <button onClick="window.location.href=window.location.href" class="block m-auto px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Еще...</button>
    </p>
</div>

<?php

include_once ('footer.php');
