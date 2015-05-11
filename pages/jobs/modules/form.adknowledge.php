<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get List_Status levels
$HDT = 'EMAILS.lists.list_dyn_groups';
$W   = ['active'=>1];
$F   = '*';
$L   = 1000;
$Q = $X->DB->GET($HDT,$W,$F,$L);
if(!empty($Q))
	foreach($Q as $i=>$q)
		$LIST_STATUS[$i] = $q['name'];
$TARGETS = $X->getTargets();

# Make Form for adding jobs
$F = new FORMS('AdknowledgeJobs');

$F->Write('<div class="row">');
$F->Write('<div class="form-group">');
$F->Select('list_status',$LIST_STATUS,false,'Status',false,html::Cols(3));
$F->Select('target',$TARGETS,false,'Target',false,html::Cols(3));
$F->Write('</div>');
$F->Write('</div>');

$F->Write('<div class="row">');
$F->Write('<div class="form-group">');
$F->Textarea('list_pool',false,'ListID, PoolID',html::Cols(10),200);
$F->Write('</div>');
$F->Write('</div>');

$F->Write('<footer>');
$F->Button('SaveJobs','save jobs','btn btn-warning');
$F->Button('cancel','cancel','btn btn-default');
$F->Write('</footer>');

$F->JS("$('button#SaveJobs').click(function(){
	var status = $('select#list_status').val();
	var target = $('select#target').val();
	var jobs   = $('textarea#list_pool').val();
	$.post('pages/jobs/modules/update.adknowledge_jobs.php',{status:status,jobs:jobs,target:target},function(data){
		$('button#cancel').click();
	});
});");

$F = $F->PrintForm();

# Print Form
echo html::PrintOut($F,'Add Adknowledge Jobs');
?>