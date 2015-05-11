<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# View IP Ranges Table
	$_id 		= 'AdknowledgeJobs';
	$_title 	= 'Adknowledge Jobs';
	$_width 	= html::Cols(12);
	$_content 	= html::pageLoad('pages/jobs/modules/table.adknowledge_jobs.php',$_id);
	
	$_tools 	= html::ModalBtn('AddAdknowledgeJobs','pages/jobs/modules/form.adknowledge.php?add=true','Jobs','fa-plus','btn btn-success');
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# Print Widgets
echo html::elmt('div','row',$WIDGETS);

# Print JS
echo html::JS("	pageSetUp();");
?>