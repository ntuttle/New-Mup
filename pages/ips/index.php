<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# View IP Ranges Table
$_id 		= 'IPPools';
$_title 	= 'IP Pools';
$_width 	= html::Cols(12);
$_content 	= html::pageLoad('pages/ips/modules/ui.pools_manager.php',$_id);
$SearchBox 	= '<input type="text" name="pool_search" placeholder="poolName or IP" id="pool_search" value="" class="input-xs" />'.html::elmt('i',['class'=>'icon-append fa fa-search','id'=>'PoolSearch'],true);
$_tools		= html::elmt('label','text '.html::Cols(12),$SearchBox);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# View IP Ranges Table
$_id 		= 'MailingRanges';
$_title 	= 'Mailing Ranges';
$_content 	= html::pageLoad('pages/ips/modules/table.ranges_24.php',$_id);
$_tools     = html::elmt('i',['class'=>'fa fa-chevron-down toggleDTblTools'],true);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# Print Widgets
echo html::elmt('div','row '.html::Cols(12,6,5,4),$WIDGETS);
$WIDGETS    = [];

# Add Pools & Pool IPs Form
$_id 		= 'PoolIPForm';
$_title 	= 'Add IPs to a Pool';
$_width 	= html::Cols(12,6);
$_content 	= html::pageLoad('pages/ips/modules/form.pool_ips.php',$_id);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);


# Update IP Details Form
$_id 		= 'IPUpdate';
$_title 	= 'IP Update -Target Details';
$_content 	= html::pageLoad('pages/ips/modules/form.ip_details.php',$_id);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

# Print Widgets
echo html::elmt('div','row '.html::Cols(12,6,7,8),$WIDGETS);
$WIDGETS    = [];

# Print JS
echo html::JS("	pageSetUp();");
echo html::JS("	$('i#PoolSearch').bind('click',function(){
					var pool = $('input#pool_search').val();
					var container = $('div#IPPools').find('div[role=content]');
					loadURL('pages/ips/modules/ui.pools_manager.php?pool_search='+pool,container);
				});");
?>