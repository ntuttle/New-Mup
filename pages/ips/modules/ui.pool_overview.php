<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get Args
if(!empty($_REQUEST['pool'])){
	$ID = $_REQUEST['pool'];
	$HDT = 'MASTER.ipconfig.pools';
	$W = ['id'=>$ID];
	$F = '*';
	$L = 1;
	$POOL = $X->DB->GET($HDT,$W,$F,$L);
	$HDT = 'MASTER.ipconfig.pool_ips';
	$W = ['pool_id'=>$ID];
	$F = ['longip','longip'=>'id','active'=>'on'];
	$L = 10000;
	$IPS  =  $X->DB->GET($HDT,$W,$F,$L);
	foreach($IPS as $k=>$v){
		$_IPS[] = $k;
		$IPS[$k]['test'] = html::elmt('span','btn btn-xs font-xs btn-info',html::elmt('i','fa fa-envelope',true));
		$IPS[$k]['ip'] = long2ip($v['longip']);
		unset($IPS[$k]['longip']);
	    list($a,$b,$c) = ($v['on'] == 0)?['default txt-color-blueLight','minus','Off']:['success','check','On'];
		$IPS[$k]['on']   = html::elmt('span','btn btn-xs font-xs btn-'.$a,html::elmt('i','fa fa-'.$b,true).$c);
	}
	$HDT = 'MASTER.ipconfig.target_config';
	$W = ['ip__IN'=>$_IPS];
	$F = ['ip'=>'id','mailing'=>'mdom','content'=>'cdom','msg_rate','msg_con','con_rate'];
	$L = 10000;
	$IP_CONFIG = $X->DB->GET($HDT,$W,$F,$L);
	$HDT = 'MASTER.ipconfig.queues';
	$W = ['ip__IN'=>$_IPS];
	$F = ['ip'=>'id','target','queue','status'];
	$IP_QUEUES = $X->DB->GET($HDT,$W,$F,$L);
	foreach($IPS as $IP=>$V){
		foreach($IP_CONFIG[$IP] as $k=>$v)
			$IPS[$IP][$k] = $v;
		foreach($IP_QUEUES[$IP] as $k=>$v)
			$IPS[$IP][$k] = $v;
	}
	$T = new TBL('PoolIPs',true);
	$T = $T->Make($IPS,false,'table-striped table-bordered table-hover no-footer');
	$F = new FORMS('PoolDetails');
	$F->Text('name');
	$F = $F->PrintForm();
	echo $F;
	echo $T;
}elseif($_REQUEST['range']){
	echo 'RANGE';
}

?>