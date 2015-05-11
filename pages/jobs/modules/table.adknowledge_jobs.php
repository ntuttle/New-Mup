<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get Adknowledge Jobs
$HDT = 'MASTER.jobs.adknowledge';
$W = ['id__>='=>0,'ORDER'=>['id'=>'DESC']];
$F = '*';
$L = 100;
$Q = $X->DB->GET($HDT,$W,$F,$L);

# Make Table
$_id = 'AdknowledgeJobs';
$_dtbl = true;
$_data = $Q;
$_class = 'table-striped table-bordered table-hover no-footer';
$T = new TBL($_id,$_dtbl);
$T = $T->Make($_data,false,$_class);

# Print Table
echo $T;
?>