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
?>

    <div class="p-4 my-4 shadow">
        <?= $post['text'] ?>
    </div>


<?php
}
?>

<div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-700">
                <span class="font-medium"><?= $no_of_records_per_page ?></span>
                оскорблений из
                <span class="font-medium"><?= $total_rows ?></span>
            </p>
        </div>
        <div>
            <nav class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo '?pageno='.($pageno - 1); } ?>" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Предыдущая</span>
                    <!-- Heroicon name: chevron-left -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo '?pageno='.($pageno + 1); } ?>" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
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

