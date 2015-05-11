<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

/**
 * retrieve Account details from database
 * --------------------------------------------------
 **/
$HDT = 'MASTER.domains.domains';
$W = ['status'=>0,'expires__>'=>date('Y-m-d',time()+(86400*14)),'ORDER'=>['name'=>'DESC']];
$F = ['domain'=>'name'];
$L = 2500;
$Q = $X->DB->GET($HDT,$W,$F,$L);
foreach($Q as $i=>$q)
	$DATA[$q['name']]['name'] = $q['name'];

/**
 * Make Accounts Table
 * --------------------------------------------------
 **/
$ID 	= 'AvailableDomains';
$CLASS 	= 'table-striped table-bordered table-hover no-footer';
$DTbl 	= true;

$T = new TBL($ID,$DTbl);
$T = $T->Make($DATA,false,$CLASS);


/**
 * Print Chart
 * -------------------------
 **/
html::PrintOut($T);
?>