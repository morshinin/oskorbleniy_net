<?php include_once('header.php');
include_once('db.php');

$stmt = $pdo->query('SELECT * FROM posts');
?>

<?php
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

    <div class="p-4 my-4 shadow">
        <?= $row['text'] ?>
    </div>

<?php
}
?>


<?php include_once('footer.php'); ?>

