<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

/**
 * Get args
 * --------------------------------------------------
 **/
if(in_array(@$_REQUEST['act'], ['toggleAuto','toggleActive'])){
	$id = @$_REQUEST['id'];
	$sts = 'Off';
	$type = 'minus';
	$bg = 'default txt-color-blueLight';
	$active = 0;
	$act = strtolower(str_ireplace('toggle','',$_REQUEST['act']));
	if(trim(@$_REQUEST['sts']) == 'Off'){
		$sts = 'On';
		$active = 1;
		$type = 'check';
		$bg = 'success';
	}
	$sts = '<i class="fa fa-'.$type.'"></i> '.$sts;
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
	echo html::elmt('span','btn btn-'.$bg.' btn-xs '.html::Cols(12),$sts);
}
?>