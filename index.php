<?php include_once('header.php');
include_once('db.php');

$sql = "SELECT * FROM posts ORDER BY id DESC limit :no_of_records_per_page offset :offset";
$sql_fetch_all = "SELECT * FROM posts";
$stmt = $pdo->prepare($sql);
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;
$stmt->execute(['offset' => $offset, 'no_of_records_per_page' => $no_of_records_per_page]);
$stmt_all = $pdo->prepare($sql_fetch_all);
$stmt_all->execute();
$total_rows = $stmt_all->rowCount();
$posts = $stmt->fetchAll();

$total_pages = ceil($total_rows / $no_of_records_per_page);
?>

<?php
    foreach($posts as $post) {
        $text = $post['text'];
?>

    <div class="card p-4 pb-9 my-4 shadow relative">
        <?= $text ?>
        <div class="card__social absolute right-0 px-2 flex">
            <a href="whatsapp://send?text=<?= $text ?>" data-action="share/whatsapp/share" title="Оскорбить сообщением в Whatsapp"
            target="_blank">
                <svg enable-background="new 0 0 24 24" height="25" viewBox="0 0 24 24" width="25" xmlns="http://www.w3.org/2000/svg"><path d="m20.52 3.449c-2.28-2.204-5.28-3.449-8.475-3.449-9.17 0-14.928 9.935-10.349 17.838l-1.696 6.162 6.335-1.652c2.76 1.491 5.021 1.359 5.716 1.447 10.633 0 15.926-12.864 8.454-20.307z" fill="#eceff1"/><path d="m12.067 21.751-.006-.001h-.016c-3.182 0-5.215-1.507-5.415-1.594l-3.75.975 1.005-3.645-.239-.375c-.99-1.576-1.516-3.391-1.516-5.26 0-8.793 10.745-13.19 16.963-6.975 6.203 6.15 1.848 16.875-7.026 16.875z" fill="#4caf50"/><path d="m17.507 14.307-.009.075c-.301-.15-1.767-.867-2.04-.966-.613-.227-.44-.036-1.617 1.312-.175.195-.349.21-.646.075-.3-.15-1.263-.465-2.403-1.485-.888-.795-1.484-1.77-1.66-2.07-.293-.506.32-.578.878-1.634.1-.21.049-.375-.025-.524-.075-.15-.672-1.62-.922-2.206-.24-.584-.487-.51-.672-.51-.576-.05-.997-.042-1.368.344-1.614 1.774-1.207 3.604.174 5.55 2.714 3.552 4.16 4.206 6.804 5.114.714.227 1.365.195 1.88.121.574-.091 1.767-.721 2.016-1.426.255-.705.255-1.29.18-1.425-.074-.135-.27-.21-.57-.345z" fill="#fafafa"/></svg>
            </a>
            <a href="https://telegram.me/share/url?url=http://insult.space&text=<?= $text ?>" title="Оскорбить сообщением в Telegram"
            target="_blank">
                <svg enable-background="new 0 0 24 24" height="25" viewBox="0 0 24 24" width="25" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" fill="#039be5" r="12"/><path d="m5.491 11.74 11.57-4.461c.537-.194 1.006.131.832.943l.001-.001-1.97 9.281c-.146.658-.537.818-1.084.508l-3-2.211-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953z" fill="#fff"/></svg>
            </a>
        </div>
    </div>

<?php
}
?>

<div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-700">
                <span class="font-medium"><?= $no_of_records_per_page ?></span>
                оскорблений на странице
            </p>
        </div>
        <div>
            <nav class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
                <a <?php if($pageno <= 1){echo ''; } else {?>href="<?php echo '?pageno='.($pageno - 1); } ?>" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Предыдущая</span>
                    <!-- Heroicon name: chevron-left -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <?php for ($x = 0; $x < $total_pages; $x++) { ?>
                    <a href="?pageno=<?= $x + 1 ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <?= $x + 1 ?>
                    </a>
                <?php } ?>
                <a <?php if($pageno >= $total_pages){ echo ''; } else { ?> href="<?php echo '?pageno='.($pageno + 1); } ?>" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Следующая</span>
                    <!-- Heroicon name: chevron-right -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>

