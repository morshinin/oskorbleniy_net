<?php

include('./includes/class-autoload.inc.php');
require_once('templates/header.php');

$data = new Posts();
$posts = $data->getPaginatedPosts();
$pages = $data->getPaginationNumbers();
$pageno = $data->getPage();
$total_posts = $data->getTotalRows();
$no_of_records_per_page = $data->no_of_records_per_page;

foreach($posts as $post) {
    $text = $post['text'];
?>

    <div class="card p-4 pb-9 my-4 shadow relative hover:bg-gray-50">
        <?= $text ?>
        <div class="card__social absolute right-0 px-2 flex">
            <a href="whatsapp://send?text=<?= $text ?>" data-action="share/whatsapp/share" class="pr-3"
               title="Оскорбить сообщением в Whatsapp" target="_blank">
                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                    <path d="m439.277344 72.722656c-46.898438-46.898437-109.238282-72.722656-175.566406-72.722656-.003907 0-.019532 0-.023438 0-32.804688.00390625-64.773438 6.355469-95.011719 18.882812-30.242187 12.527344-57.335937 30.640626-80.535156 53.839844-46.894531 46.894532-72.71875 109.246094-72.71875 175.566406 0 39.550782 9.542969 78.855469 27.625 113.875l-41.734375 119.226563c-2.941406 8.410156-.859375 17.550781 5.445312 23.851563 4.410157 4.414062 10.214844 6.757812 16.183594 6.757812 2.558594 0 5.144532-.429688 7.667969-1.3125l119.226563-41.730469c35.019531 18.082031 74.324218 27.625 113.875 27.625 66.320312 0 128.667968-25.828125 175.566406-72.722656 46.894531-46.894531 72.722656-109.246094 72.722656-175.566406 0-66.324219-25.824219-128.675781-72.722656-175.570313zm-21.234375 329.902344c-41.222657 41.226562-96.035157 63.925781-154.332031 63.925781-35.664063 0-71.09375-8.820312-102.460938-25.515625-5.6875-3.023437-12.410156-3.542968-18.445312-1.429687l-108.320313 37.910156 37.914063-108.320313c2.113281-6.042968 1.589843-12.765624-1.433594-18.449218-16.691406-31.359375-25.515625-66.789063-25.515625-102.457032 0-58.296874 22.703125-113.109374 63.925781-154.332031 41.21875-41.21875 96.023438-63.921875 154.316406-63.929687h.019532c58.300781 0 113.109374 22.703125 154.332031 63.929687 41.226562 41.222657 63.929687 96.03125 63.929687 154.332031 0 58.300782-22.703125 113.113282-63.929687 154.335938zm0 0"/><path d="m355.984375 270.46875c-11.421875-11.421875-30.007813-11.421875-41.429687 0l-12.492188 12.492188c-31.019531-16.902344-56.121094-42.003907-73.027344-73.023438l12.492188-12.492188c11.425781-11.421874 11.425781-30.007812 0-41.429687l-33.664063-33.664063c-11.421875-11.421874-30.007812-11.421874-41.429687 0l-26.929688 26.929688c-15.425781 15.425781-16.195312 41.945312-2.167968 74.675781 12.179687 28.417969 34.46875 59.652344 62.761718 87.945313 28.292969 28.292968 59.527344 50.582031 87.945313 62.761718 15.550781 6.664063 29.695312 9.988282 41.917969 9.988282 13.503906 0 24.660156-4.058594 32.757812-12.15625l26.929688-26.933594v.003906c5.535156-5.535156 8.582031-12.890625 8.582031-20.714844 0-7.828124-3.046875-15.183593-8.582031-20.714843zm-14.5 80.792969c-4.402344 4.402343-17.941406 5.945312-41.609375-4.195313-24.992188-10.710937-52.886719-30.742187-78.542969-56.398437s-45.683593-53.546875-56.394531-78.539063c-10.144531-23.667968-8.601562-37.210937-4.199219-41.613281l26.414063-26.414063 32.625 32.628907-15.636719 15.640625c-7.070313 7.070312-8.777344 17.792968-4.242187 26.683594 20.558593 40.3125 52.734374 72.488281 93.046874 93.046874 8.894532 4.535157 19.617188 2.832032 26.6875-4.242187l15.636719-15.636719 32.628907 32.628906zm0 0"/></svg>
            </a>
            <a href="https://telegram.me/share/url?url=http://insult.space&text=<?= $text ?>" class="pr-3"
               title="Оскорбить сообщением в Telegram" target="_blank">
                <svg viewBox="0 -60 511.99996 511" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                    <path d="m507.773438 7.292969c-5.015626-6.109375-13.332032-8.375-20.726563-5.65625l-469.65625 169.722656c-9.382813 3.410156-15.96875 11.679687-17.191406 21.582031-1.210938 9.855469 3.132812 19.417969 11.28125 24.921875l67.132812 45.828125c6.503907 4.441406 14.867188 4.917969 21.832031 1.242188l145.625-76.792969-113.496093 84.746094c-5.328125 3.980469-8.511719 10.328125-8.511719 16.976562v78.5c0 8.097657 4.441406 15.515625 11.589844 19.367188 7.160156 3.851562 15.808594 3.46875 22.609375-1.015625l51.003906-33.832032 50.15625 34.199219c4.394531 3.011719 9.628906 4.597657 14.910156 4.597657 1.785157 0 3.578125-.183594 5.34375-.550782 7.042969-1.46875 13.273438-5.820312 17.097657-11.9375l212.488281-350.382812c4.136719-6.746094 3.542969-15.378906-1.488281-21.515625zm-234.5625 352.863281-51.941407-35.417969c-3.613281-2.46875-7.777343-3.703125-11.9375-3.703125-4.070312 0-8.144531 1.183594-11.710937 3.550782l-43.542969 28.882812v-59.175781l200.410156-149.644531c8.949219-6.683594 11.203125-18.847657 5.238281-28.292969-5.96875-9.445313-17.917968-12.636719-27.796874-7.425781l-240.78125 126.972656-56.78125-38.761719 432.488281-156.289063zm0 0"/></svg>
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
                <span class="font-medium"><?= $no_of_records_per_page ?> из <?= $total_posts ?></span>
            </p>
        </div>
        <div>
            <nav class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
            <?php
                $previous_page = $pageno <= 1;
                $next_page = $pageno >= $pages;
                ?>
                <a <?php if($previous_page){echo ''; } else { ?>href="<?php echo '?pageno='.($pageno - 1); } ?>"
                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300
                <?php if ($previous_page) { echo 'bg-gray-200 hover:bg-gray-200'; } else { echo 'bg-white hover:bg-gray-50'; } ?> text-sm font-medium text-gray-500">
                    <span class="sr-only">Предыдущая</span>
                    <!-- Heroicon name: chevron-left -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <?php for ($i = 1; $i < $pages + 1; ++$i) {
                    $is_current_page = $i === $pageno;
                    ?>
                    <a <?php if ($is_current_page) { echo ''; } else { ?> href="?pageno=<?php echo $i; } ?>"
                       class="relative inline-flex items-center px-4 py-2 border border-gray-300
                       <?php if ($is_current_page) { echo 'bg-gray-200 hover:bg-gray-200'; } else { echo 'bg-white hover:bg-gray-50'; }?>
                       text-sm font-medium text-gray-700"><?= $i ?></a>
                <?php } ?>
                <a <?php if($pageno >= $pages){ echo ''; } else { ?> href="<?php echo '?pageno='.($pageno + 1); } ?>"
                 class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300
                 <?php if ($next_page) { echo 'bg-gray-200 hover:bg-gray-200'; } else { echo 'bg-white hover:bg-gray-50'; } ?> text-sm font-medium text-gray-500">
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

<?php include_once('templates/footer.php'); ?>

