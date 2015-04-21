<?
require_once '../_/core.php';
$X = new X();

echo '<h3>Mailing Lists...</h3>';
$Q = $X->DB->GET('DB.mup__emails.lists',['status__>='=>0],'*',1000);
$T = new TBL();
$T = $T->Make($Q);
echo $T;
?>