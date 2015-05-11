<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# retrieve Target Headers from database
$HDT = 'MASTER.headers.targetHeaders';
$W = ['id__>'=>0];
$F = ['id','header'=>'head','value','encode','order','groupName'];
$L = 1000;
$Q = $X->DB->GET($HDT,$W,$F,$L);

# Make Headers table from Query results
$T = new TBL('Headers',true);
foreach($Q as &$q){foreach($q as &$c){$c = htmlspecialchars($c);}}
$t['left'][0] = ['icon'=>'edit fa-lg','name'=>'id','id'=>'EditHeader'];
$T = $T->Make($Q,$t,'table-striped table-bordered table-hover no-footer');

# Print Table 
echo $T;
?>