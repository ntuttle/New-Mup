<?
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();
$F = new FORMS('SaveIPDetails');
$F->Write('test');
$F = $F->PrintForm();
echo html::ModalHTML($F);
?>