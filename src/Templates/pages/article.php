<?php
use \AsaP\Main;
use AsaP\Repositories\CategoryRepository;
ob_start();
?>

<section class=" mx-auto max-w-7xl py-10 lg:px-2 space-y-4 min-h-screen">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2">
            <li class="inline-flex items-center">
                <a href="<?= Main::getInstance()->getRootDirectory() ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Blog
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"><?= $this->getController()->getArticle()->getTitle() ?></span>
                </div>
            </li>
        </ol>
    </nav>

    <header class="space-y-1 p-1 lg:p-2">
        <h1 class="font-bold text-4xl">
            <?= $this->getController()->getArticle()->getTitle() ?>
        </h1>
        <p class="text-sm text-gray-400 italic">
            Posté le <?= $this->getController()->getArticle()->getDate("d/m/Y") ?>
        </p>
        <?php foreach($this->getController()->getArticle()->getCategories() as $category_id) {
            $category = CategoryRepository::getCategory($category_id); ?>

            <?= $category->getName() ?>
            
        <?php } ?>
    </header>

    <div class="grid grid-cols-4 gap-1 lg:gap-4">
        <div class="col-span-4 lg:col-span-3 space-y-2 lg:px-1">
            <div class="space-y-4 bg-slate-50 dark:bg-slate-900 lg:rounded shadow-sm">
                <img src="<?= $this->getController()->getArticle()->getThumbnail() ?>" alt="<?= $this->getController()->getArticle()->getTitle() ?>" class="w-full flex h-80 object-cover object-center lg:rounded-t">
                <div class="space-y-4 py-2">
                    <?php foreach ($this->getController()->getArticle()->getContent() as $section) { ?>
                        <section class="space-y-2 p-1 lg:p-4">
                            <h2 class="font-bold text-3xl">
                                <?= $section->title ?>
                            </h2>
                            <p class="text-lg">
                                <?= $section->text ?>
                            </p>
                        </section>
                    <?php } ?>
                </div>
            </div>
        </div>
        <aside class="col-span-4 lg:col-span-1">
            <div class="space-y-4 bg-slate-50 dark:bg-slate-900 lg:rounded shadow-sm min-h-[100px] sticky top-[5.5rem]">

            </div>
        </aside>
    </div>

    <?php
        $articles = $this->getController()->getArticles();
        include("./src/Templates/components/articles_grid.php");
    ?>

</section>

<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>