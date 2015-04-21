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
$created = $closed = [];
for($i=time();$i>=(time()-(30*24*60*60));$i-=(60*60*24)){
	$D = date('Y-m-d',$i);
	$created[$D] = $closed[$D] = 0;
}

/**
 * retrieve Account details from database
 * --------------------------------------------------
 **/
$HDT = 'ZAP.'.$ESP.'.accounts';
$W = ['status__>'=>0,'ORDER'=>['id'=>'DESC']];
$F = ['id','username','password','first'=>'name','last','created','status','updated'];
$L = 25000;
$Q = $X->DB->GET($HDT,$W,$F,$L);

/**
 * Parse the results and prep for table
 * --------------------------------------------------
 **/
$count = count($Q);
if(!empty($Q)){
	foreach($Q as $i=>$q){
		$Q[$i]['name'] = $q['last'].', '.$q['name'];
		$D = date('Y-m-d',strtotime($q['created']));
		if(isset($created[$D]))
			$created[$D]++;
		foreach(['last','status','updated'] as $f)
			unset($Q[$i][$f]);
}	}

/**
 * Make Accounts Table
 * --------------------------------------------------
 **/
$ID 			= $ESP.'Seeds';
$DATA 			= $Q;
$_t['icon'] 	= 'edit fa-lg';
$_t['name'] 	= 'id';
$_t['id'] 		= 'EditSeedAccount';
$_T['left'][] 	= $_t;
$CLASS = 'table-striped table-bordered table-hover no-footer';
$DTbl 	= "{'info': false}";

$T = new TBL($ID,$DTbl);
$T = $T->Make($DATA,$_T,$CLASS);


/**
 * Print Table
 * --------------------------------------------------
 **/
html::PrintOut(html::elmt('i',['class'=>'fa fa-chevron-down toggleDTblTools'],true).$T,$ESP.' Seed Accounts');
?>