<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

$T = new TBL('MailingIPs',true);
$Q = $X->DB->GET('MASTER.ipconfig.ranges_24',['id__>='=>0],'*',1000);
$t['left'][0] = ['icon'=>'edit fa-lg','name'=>'id','id'=>'EditRange'];
$T = $T->Make($Q,$t,'table-striped table-bordered table-hover no-footer');

echo $T;

?>