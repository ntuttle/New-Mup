<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

$ID = @$_REQUEST['id'];
$TYPE = @$_REQUEST['type'];

print_r($_REQUEST);
?>