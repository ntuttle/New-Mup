<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


# Get ip ranges from database
$HDT = 'MASTER.ipconfig.ranges_24';
$W = ['id__>='=>0];
$F = ['id','name','pmta','active'];
$L = 1000;
$Q = $X->DB->GET($HDT,$W,$F,$L);


# create the datatable with ip ranges
$ID    = 'MailingIPs';
$DATA  = $Q;
$DTbl  = true;
$TOOLS = ['left'=>[['icon'=>'edit fa-lg','name'=>'id','id'=>'EditRange']]];
$CLASS = 'table-striped table-bordered table-hover no-footer';

$T = new TBL($ID,$DTbl);
$T = $T->Make($DATA,$TOOLS,$CLASS);


# Print out the table! 
html::PrintOut($T,'IP Ranges');
?>