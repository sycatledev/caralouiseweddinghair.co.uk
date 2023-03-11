<?php
ob_start();

$lastArticle = $this->getController()->getLastArticle();
?>

<a title="<?= $lastArticle->getTitle() ?>" href="<?= $lastArticle->getHref() ?>" class="group w-full shadow-sm duration-300 border-b border-b-slate-300 dark:border-b-slate-600 overflow-hidden relative">
    <div class="max-w-7xl w-full mx-auto z-20">
        <span class="font-bold text-xl sm:text-2xl lg:text-3xl xl:text-4xl bg-white dark:bg-black p-1 absolute bottom-0 m-2"><?= $lastArticle->getTitle() ?></span>
    </div>

    <img src="<?= $lastArticle->getThumbnail() ?>" class="w-full flex h-72 lg:h-80 object-cover object-center">
</a>

<section class="mx-auto max-w-7xl py-10 px-2 space-y-4 min-h-screen">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2">
            <li aria-current="page" class="inline-flex items-center">
                <div class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Blog
                </div>
            </li>
        </ol>
    </nav>
    

    <?php
    $articles = $this->getController()->getArticles();
    include("./src/Templates/components/articles_grid.php");
    ?>
</section>


<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>