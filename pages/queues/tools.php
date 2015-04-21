<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once '../../_/core.php';
$X = new X();

/**
 * View IP Ranges Table
 * --------------------------------------------------
 **/
$_id 		= 'SMTP_Test';
$_title 	= 'SMTP Email';
$_width 	= html::Cols(12,6,6,4);
$_content 	= html::pageLoad('pages/queues/modules/form.smtp_test.php',$_id);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

/**
 * Update IP Details Form
 * --------------------------------------------------
 **/
$_id 		= 'IPUpdate';
$_title 	= 'IP Update -Target Details';
$_content 	= html::pageLoad('pages/ips/modules/form.ip_details.php',$_id);
$_width 	= html::Cols(12,6,4);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

/**
 * Print Widgets
 * --------------------------------------------------
 **/
echo html::elmt('div','row',$WIDGETS);
?>



UPDATE  `target_config` SET  `msg_rate` =3500 WHERE  `ip` = INET_ATON(  '23.248.169.105' )