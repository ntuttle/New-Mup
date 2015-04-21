<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once '../../_/core.php';
$X = new X();

/**
 * Loop through the different account types
 * --------------------------------------------------
 **/
foreach(['aol','hotmail','yahoo'] as $ESP){
	/**
	 * Accounts Overview Chart
	 * --------------------------------------------------
	 **/
	$_id 		= $ESP.'SeedsStats';
	$_title 	= '@'.$ESP.'.com - Chart';
	$_width 	= html::Cols(12,6,4);
	$_content 	= html::pageLoad('pages/seeds/modules/chart.zap.seed_accounts.php?esp='.$ESP,$_id);
	$_tools[1]	= html::ModalBtn('pages/seeds/modules/table.zap.seed_accounts.php?modal=true&esp='.$ESP,'Accounts'.$_id,'Accounts','group','btn btn-primary btn-xs');
	$_tools[2]	= html::ModalBtn('pages/seeds/modules/table.zap.seed_actions.php?modal=true&esp='.$ESP,'Actions'.$_id,'Actions','list-ol','btn btn-primary btn-xs');
	$_[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);
	$pops[] 	= 'Accounts'.$_id;
	$pops[] 	= 'Actions'.$_id;
}
foreach($pops as $pop)
	$_[] = html::PopupModal($pop);

/**
 * Print Widgets
 * --------------------------------------------------
 **/
$_ = implode(EOL,$_);
echo $_;
?>