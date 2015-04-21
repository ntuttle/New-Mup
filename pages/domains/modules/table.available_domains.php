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
$W = ['status'=>0,'expires__>'=>date('Y-m-d',time()+(86400*14)),'ORDER'=>['id'=>'DESC']];
$F = ['domain'=>'id','domain'];
$L = 2500;
$Q = $X->DB->GET($HDT,$W,$F,$L);

/**
 * Make Accounts Table
 * --------------------------------------------------
 **/
$ID 	= 'AvailableDomains';
$DATA 	= $Q;
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