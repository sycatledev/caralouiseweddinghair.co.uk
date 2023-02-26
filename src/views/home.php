<?php ob_start(); ?>

<h1><?= $this->controller->getData()["message"] ?></h1>

<?php
$content = ob_get_clean();
include("./src/views/template.php");
?>