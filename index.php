<?php include_once('header.php');
include_once('db.php');

$sql = 'SELECT * FROM posts ORDER BY id DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rowCount = $stmt->rowCount();
$posts = $stmt->fetchAll();
?>

<?php
//    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

    <div class="p-4 my-4 shadow">
<!--        --><?//= $row['text'] ?>
        <?php var_dump($posts); ?>
    </div>

<?php
//}
?>


<?php include_once('footer.php'); ?>

