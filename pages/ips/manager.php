<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

/**
 * Update IP Details Form
 * --------------------------------------------------
 **/
$_id 		= 'IPUpdate';
$_title 	= 'IP Update -Target Details';
$_content 	= html::pageLoad('pages/ips/modules/form.ip_details.php',$_id);
$_width 	= html::Cols(12);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

/**
 * View IP Ranges Table
 * --------------------------------------------------
 **/
$_id 		= 'MailingRanges';
$_title 	= 'Mailing Ranges';
$_width 	= html::Cols(12);
$_content 	= html::pageLoad('pages/ips/modules/table.ranges_24.php',$_id);
$_tools[]   = html::elmt('i',['class'=>'fa fa-chevron-down toggleDTblTools'],true);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

/**
 * Print Widgets
 * --------------------------------------------------
 **/
echo html::elmt('div','row '.html::Cols(12,6,5,4),$WIDGETS);
$WIDGETS = [];

/**
 * Update IP Details Form
 * --------------------------------------------------
 **/
$_id 		= 'PoolIPForm';
$_title 	= 'Add IPs to a Pool';
$_content 	= html::pageLoad('pages/ips/modules/form.pool_ips.php',$_id);
$_width 	= html::Cols(12,12,12,4);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

/**
 * View IP Ranges Table
 * --------------------------------------------------
 **/
$_id 		= 'IPPools';
$_title 	= 'IP Pools';
$_width 	= html::Cols(12,12,12,8);
$_content 	= html::pageLoad('pages/ips/modules/ui.pools_manager.php',$_id);
$Box 		= '<input type="text" name="pool_search" placeholder="poolName or IP" id="pool_search" value="" class="input-xs" />';
$Btn 		= html::elmt('i',['class'=>'icon-append fa fa-search','id'=>'PoolSearch'],true);
$SearchBox 	= $Box.$Btn;
$_tools		= html::elmt('label','text '.html::Cols(12),$SearchBox);
$_args 		= ['content'=>['class'=>'no-padding']];
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools, $_args);

/**
 * View IP Ranges Table
 * --------------------------------------------------
 **/
echo html::elmt('div','row '.html::Cols(12,6,7,8),$WIDGETS);
echo html::JS("$('i.toggleDTblTools').bind('click',function(){
	$(this).parent().parent().parent().find('div.dt-toolbar').toggle('slow');
});
$('i#PoolSearch').bind('click',function(){
	var pool = $('input#pool_search').val();
	var container = $('div#IPPools').find('div[role=content]');
	loadURL('pages/ips/modules/ui.pools_manager.php?pool_search='+pool,container);
});");


?>