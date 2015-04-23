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
$ID = @$_REQUEST['id'];
# stop the script if no id was supplied
if(empty($ID))
	exit(html::alert('info','<h1 class="display-inline">Select an offer to the left to start</h1>','arrow-circle-left fa-2x'));


echo html::alert('success','<h1 class="display-inline">You requested details on offer id# '.$ID.'</h1>','thumbs-up fa-2x');
?>