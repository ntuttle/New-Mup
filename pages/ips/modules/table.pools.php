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
$W['ORDER'] = ['id'=>'DESC'];
$F = ['id','name','active'=>'on','auto','server_id'];
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
	$Q[$i]['name']  = html::elmt('i','font-md',$q['name']);
	$Q[$i]['server_id'] = @$PMTAS[$q['server_id']]['name'];
	$Q[$i]['ips']   = number_format(@$PIPs[$i]['rows']);
    list($a,$b,$c)  = ($q['on'] == 0)?['default txt-color-blueLight','minus','Off']:['success','check','On'];
    $Q[$i]['on']  	= html::elmt('span','btn btn-xs font-xs btn-'.$a,html::elmt('i','fa fa-'.$b,true).$c);
    list($a,$b,$c)  = ($q['auto'] == 0)?['default txt-color-blueLight','minus','Off']:['success','check','On'];
	$Q[$i]['auto']  = html::elmt('span','btn btn-xs font-xs btn-'.$a,html::elmt('i','fa fa-'.$b,true).$c);
}

# Make Table for pools
$_id = 'PoolTable';
$_dt = true;
$_data = $Q;
$_tools = false;
$_class = 'table-striped table-bordered table-hover no-footer';
$T = new TBL($_id,$_dt);
$T = $T->Make($_data,$_tools,$_class);

html::PrintOut($T);
echo html::JS("pageSetUp();");
?>