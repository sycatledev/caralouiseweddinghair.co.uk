<?php

use AsaP\Main;

?>

<header id="header" class="flex justify-center text-white bg-black items-center fixed top-0 w-full h-28 z-50 duration-200">
  <div class="container flex flex-row justify-between items-center px-4 py-2">
    <a class="flex flex-row items-center" href="<?= Main::getInstance()->getRootUrl() . "/#" ?>">
      <img src="<?= Main::getInstance()->getRootUrl() ?>/assets/img/brand_full.png" alt="Cara Louise Wedding Hair" class="h-16 w-auto">
    </a>

    <a href="#contact"
      class="inline-flex justify-center items-center py-3 px-5 text-base font-semibold text-center bg-black text-white rounded-full active:scale-95 duration-500">
      Contact
    </a>
  </div>
</header>

<button id="scroll_to_top_button" class="fixed bottom-0 right-0 m-2 p-4 bg-black/90 text-white rounded-full translate-y-56 duration-500 active:scale-95 z-50">
    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
        <path d="M5.25 15.375 12 8.625l6.75 6.75"></path>
    </svg>
</button>