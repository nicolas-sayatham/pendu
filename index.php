<?php
ob_start();
?>


<?php
$content = ob_get_clean();
require_once 'template.php';
?>
