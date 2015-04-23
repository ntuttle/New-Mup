<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Check for args
$DATA = array_map('mysql_real_escape_string',$_REQUEST);
$POOL = urldecode(@$DATA['pool_search']);

# retrieve pool details from database
$HDT = 'MASTER.ipconfig.pools';
$W = ['active__>='=>0];
if(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})$/',$POOL,$x))
	$W['id__IN'] = ['SELECT `pool_id` AS `id` FROM `ipconfig`.`pool_ips` WHERE `longip` = '.ip2long($POOL)];
else
	$W['name__LIKE'] = '%'.$POOL.'%';
$F = ['id','name','active','auto','server_id'];
$L = 50;
$Q = $X->DB->GET($HDT,$W,$F,$L);
foreach($Q as $i=>$q)
	$PoolIDs[$i] = $i;

# retrieve pool ips from database
$HDT = 'MASTER.ipconfig.pool_ips';
$W = ['pool_id__IN'=>$PoolIDs,'GROUP'=>'id','ORDER'=>'id'];
$F = ['COUNT(*)'=>'rows','pool_id'=>'id'];
$L = 100;
$PIPs = $X->DB->GET($HDT,$W,$F,$L);

# retrieve pmta ids
$HDT = 'MASTER.hardware.servers';
$W = ['type'=>'PMTA'];
$F = ['id','name'];
$L = 100;
$PMTAS = $X->DB->GET($HDT,$W,$F,$L);

# Parse pool array
foreach($Q as $i=>$q){
	$Q[$i]['name']  = html::elmt('i','font-lg',$q['name']);
	$Q[$i]['server_id'] = @$PMTAS[$q['server_id']]['name'];
	$Q[$i]['ips']   = number_format(@$PIPs[$i]['rows']);
	list($a,$b)     = ($q['active'] == 0)?['default txt-color-blueLight','<i class="fa fa-minus"></i> Off']:['success','<i class="fa fa-check"></i> On'];
	$Q[$i]['active']= '<span class="btn btn-'.$a.' btn-xs '.html::Cols(12).'">'.$b.'</span>';
	list($a,$b)     = ($q['auto'] == 0)?['default txt-color-blueLight','<i class="fa fa-minus"></i> Off']:['success','<i class="fa fa-check"></i> On'];
	$Q[$i]['auto']  = '<span class="btn btn-'.$a.' btn-xs '.html::Cols(12).'">'.$b.'</span>';
}

# Make Table for pools
$_id = 'PoolTable';
$_dt = false;
$_data = $Q;
$_tools = false;
$_class = 'table-striped table-bordered table-hover no-footer';
$T = new TBL($_id,$_dt);
$T = $T->Make($_data,$_tools,$_class);

html::PrintOut($T);
echo html::JS("pageSetUp();");
?>