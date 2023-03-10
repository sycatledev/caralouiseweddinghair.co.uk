<?php
ob_start();
?>

<section class="py-10">
    <?= $this->getController()->getTitle() ?>
</section>

<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>