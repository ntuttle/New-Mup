<?php
# Start the Page
require_once '../../_/core.php';
$X = new X();

# View Email Header Groups
	$_id 		= 'EspHeaderGroups';
	$_title 	= 'Email Header Groups';
	$_width 	= html::Cols(12,6,4);
	$_content 	= html::pageLoad('pages/esp/modules/table.header_groups.php',$_id);

	$url = 'pages/esp/modules/form.esp_headergroup.php?modal=true&type=group';
	$_tools[1]	= html::ModalBtn('AddHeaderGroup',$url,false,'fa-plus-circle fa-lg','btn-link txt-color-white');
	$_tools[2]  = html::elmt('i','fa fa-cog fa-lg txt-color-blueLight toggleModTools',true);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# View Email Headers
	$_id 		= 'EspHeaders';
	$_title 	= 'Email Headers';
	$_width 	= html::Cols(12,6,8);
	$_content 	= html::pageLoad('pages/esp/modules/table.headers.php',$_id);

	$url = 'pages/esp/modules/form.esp_headergroup.php?modal=true';
	$_tools[1]	= html::ModalBtn('AddHeaders',$url,false,'fa-plus-circle fa-lg','btn-link txt-color-white');
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# Print Widgets
echo html::elmt('div','row',$WIDGETS);
?>