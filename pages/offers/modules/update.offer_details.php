<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

/**
 * Get args
 * --------------------------------------------------
 **/
if(in_array(@$_REQUEST['act'], ['toggleAuto','toggleActive'])){
	$id = @$_REQUEST['id'];
	$sts = 'off';
	$type = 'danger';
	$active = 0;
	$act = strtolower(str_ireplace('toggle','',$_REQUEST['act']));
	if(@$_REQUEST['sts'] == 'off'){
		$sts = 'on';
		$active = 1;
		$type = 'success';
	}

	/**
	 * query the database
	 * --------------------------------------------------
	 **/
	$HDT = 'MASTER.offers.offers';
	$S   = [$act=>$active];
	$W   = ['id'=>$id];
	$L   = 1;
	$X->DB->SET($HDT,$S,$W,$L);


	/**
	 * return result
	 * --------------------------------------------------
	 **/
	echo html::elmt('span','btn btn-'.$type.' btn-xs '.html::Cols(12),$sts);
}
?>