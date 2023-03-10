<?php 
ob_start(); 

use AsaP\Main;
$lastArticle = $this->getController()->getLastArticle();
?>

<a title="<?= $lastArticle->getTitle() ?>" href="<?= $lastArticle->getHref() ?>" class="group w-full shadow-sm duration-300 border-b border-b-slate-300 dark:border-b-slate-600 overflow-hidden relative">
    <div class="max-w-7xl w-full mx-auto z-20">
        <span class="font-bold text-xl sm:text-2xl lg:text-3xl xl:text-4xl bg-white dark:bg-black p-1 absolute bottom-0 m-2"><?= $lastArticle->getTitle() ?></span>
    </div> 

    <img src="<?= $lastArticle->getThumbnail() ?>" class="w-full flex h-72 lg:h-80 object-cover object-center">
</a>

<section class="mx-auto max-w-7xl py-10 px-2 space-y-4 min-h-screen">
    <h1 class="font-bold text-2xl items-center">Articles <span class="text-gray-500 dark:text-gray-400 text-sm font-thin">- sorted by creation date</span></h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach($this->getController()->getArticles() as $article) { ?>
            <a title="<?= $article->getTitle() ?>" href="<?= $article->getHref() ?>" data-article-id="<?= $article->getId() ?> " class="group col-span-1 rounded-xl min-h-[12rem] hover:shadow-sm duration-300 border border-slate-300 hover:border-slate-500 dark:border-slate-600 dark:hover:border-slate-300 overflow-hidden relative">
                <div class="absolute bottom-0 z-20 m-2">
                    <span class="font-bold text-lg lg:text-xl bg-white text-black dark:bg-black dark:text-white p-1"><?= $article->getTitle() ?></span>
                </div> 

                <img src="<?= $article->getThumbnail() ?>" class="h-full w-full blur-[1.5px] group-hover:blur-0 object-cover object-center scale-110 group-hover:scale-100 duration-300">
            </a>
        <?php } ?>
    </div>
</section>


<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>