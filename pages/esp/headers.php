<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once '../../_/core.php';
$X = new X();

/**
 * View Email Header Groups
 * --------------------------------------------------
 **/
$_id 		= 'EspHeaderGroups';
$_title 	= 'Email Header Groups';
$_content 	= html::pageLoad('pages/esp/modules/table.header_groups.php',$_id);
$_width 	= html::Cols(12,6,4);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

/**
 * View Email Headers
 * --------------------------------------------------
 **/
$_id 		= 'EspHeaders';
$_title 	= 'Email Headers';
$_content 	= html::pageLoad('pages/esp/modules/table.headers.php',$_id);
$_width 	= html::Cols(12,6,8);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

/**
 * Print Widgets
 * --------------------------------------------------
 **/
echo html::elmt('div','row',$WIDGETS);
?>