<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get ip ranges from database
$HDT = 'MASTER.ipconfig.ranges_24';
$W = ['id__>='=>0];
$F = ['id','name','pmta','active'=>'on'];
$L = 1000;
$Q = $X->DB->GET($HDT,$W,$F,$L);

# retrieve pmta ids
$HDT = 'MASTER.hardware.servers';
$W = ['type'=>'PMTA'];
$F = ['id','name'];
$L = 100;
$PMTAS = $X->DB->GET($HDT,$W,$F,$L);

# Parse ranges
foreach($Q as $i=>$q){
	$Q[$i]['name'] = html::elmt('i','font-md',$q['name']);
    list($a,$b,$c) = ($q['on'] == 0)?['default txt-color-blueLight','minus','Off']:['success','check','On'];
	$Q[$i]['on']   = html::elmt('span','btn btn-xs font-xs btn-'.$a,html::elmt('i','fa fa-'.$b,true).$c);
	$Q[$i]['pmta'] = $PMTAS[$q['pmta']];
}

# create the datatable with ip ranges
$ID    = 'MailingRanges';
$DATA  = $Q;
$DTbl  = true;
$CLASS = 'table-striped table-bordered table-hover no-footer';
$T = new TBL($ID,$DTbl);
$T = $T->Make($DATA,false,$CLASS);

# Print out the table! 
html::PrintOut($T,'IP Ranges');
?>