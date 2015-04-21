<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


/**
 * Check Args
 * --------------------------------------------------
 **/
$ESP = strtolower(@$_REQUEST['esp']);
$ESP = empty($ESP)?exit('Invalid ESP!'):$ESP;


/**
 * retrieve Account actions from database
 * --------------------------------------------------
 **/
$HDT = 'ZAP.'.$ESP.'.actions';
$W = ['id__>='=>0,'ORDER'=>['id'=>'DESC']];
$F = ['id','id'=>'action_id','seed_id','action','date'];
$L = 1000;

$Q = $X->DB->GET($HDT,$W,$F,$L);


/**
 * Make Accounts Table
 * --------------------------------------------------
 **/
$ID 	= $ESP.'SeedActions';
$DATA 	= $Q;
$CLASS 	= 'table-striped table-bordered table-hover no-footer';
$DTbl 	= "{'info': false,'lengthChange': false}";

$T = new TBL($ID,$DTbl);
$T = $T->Make($DATA,false,$CLASS);


/**
 * Print Table
 * --------------------------------------------------
 **/
html::PrintOut($T,$ESP.' Seed Actions');
?>