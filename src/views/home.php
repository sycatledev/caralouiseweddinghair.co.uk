<?php ob_start(); ?>

<h1><?= $this->getController()->getData()["message"] ?></h1>

<?php
$content = ob_get_clean();
require("./src/views/template.php");
?>