<?php
# Start the Page
require_once '../../_/core.php';
$X = new X();

# View Email Header Groups
	$_id 		= 'PMTAServer';
	$_title 	= 'PMTA Servers';
	$_width 	= html::Cols(12,6,4,3);
	$_content 	= html::pageLoad('pages/servers/modules/table.servers.php?type=PMTA',$_id);
	$url = 'pages/servers/modules/form.server_new.php?modal=true&type=PMTA';
	$_tools[1]	= html::ModalBtn('AddServer',$url,false,'fa-plus-circle fa-lg','btn-link txt-color-white');
	$_tools[2]  = html::elmt('i','fa fa-cog fa-lg txt-color-blueLight toggleModTools',true);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# View Email Headers
	$_id 		= 'SlaveServers';
	$_title 	= 'Slave Servers';
	$_width 	= html::Cols(12,6,4,3);
	$_content 	= html::pageLoad('pages/servers/modules/table.servers.php?type=SLAVE',$_id);
	$url = 'pages/servers/modules/form.server_new.php?modal=true&type=SLAVE';
	$_tools[1]	= html::ModalBtn('AddServer',$url,false,'fa-plus-circle fa-lg','btn-link txt-color-white');
	$_tools[2]  = html::elmt('i','fa fa-cog fa-lg txt-color-blueLight toggleModTools',true);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# Print Widgets
echo html::elmt('div','row',$WIDGETS);
?>