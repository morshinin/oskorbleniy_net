<?php include_once('header.php');
include_once('db.php');

$sql = 'SELECT * FROM posts ORDER BY id DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rowCount = $stmt->rowCount();
$posts = $stmt->fetchAll();
?>

<?php
    foreach($posts as $post) {
?>

    <div class="p-4 my-4 shadow">
        <?= $post['text'] ?>
    </div>

<?php
}
?>


<?php include_once('footer.php'); ?>

