<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

/**
 * Pool IP Variables
 * --------------------------------------------------
 **/
//$DATA = array_map('mysql_real_escape_string',$_REQUEST);
$DATA 	= $_REQUEST;
$POOL 	= @$DATA['pool'];
$PMTA   = @$DATA['pmta'];
$IPS  	= $DATA['ips']  = parseIPs(@$DATA['ips']);
$ACTIVE = @$DATA['active'];
$AUTO 	= @$DATA['auto'];

$msg 	= 'Invalid IP Format!';
$I 		= 'warning';
$type 	= 'danger';

if(!empty($IPS)){
	$HDT = 'MASTER.ipconfig.pools';
	$W = ['name' => $POOL];
	$F = ['id','name'];
	$Q = $X->DB->GET($HDT,$W,$F,1);


	if(empty($Q)){
		$X->DB->PUT($HDT,['name','server_id','active'],[[$POOL,$PMTA,1]]);
		$pool_id = $X->DB->lID;
	}else
		foreach($Q as $i=>$q)
			$pool_id = $i;

	$HDT = 'MASTER.ipconfig.pool_ips';
	$F = ['pool_id','longip','active'];
	foreach($IPS as $IP)
		$V[] = [$pool_id,$IP,1];
	$X->DB->PUT($HDT,$F,$V,'IGNORE');
	if($X->DB->aR > 0){
		$msg = $X->DB->aR.' ips inserted into pool '.$POOL;
		$I 		= 'check';
		$type 	= 'success';
	}else{
		$msg = 'No ips could be added to pool '.$POOL;
	}
}

echo html::alert($type,$msg,$I);


/**
 * Functions
 * --------------------------------------------------
 **/
function parseIPs($IPs)
	{
		$_IPs = [];
		if(!empty($IPs)){
			$IPS = str_ireplace(" ",'',$IPs);
			$IPs = explode(",",$IPs);
			foreach($IPs as $IP){
				$IP = trim($IP);
				if(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})$/',$IP,$x)){
					$_IPs[] = ip2long($x[1]);
				}elseif(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)([0-9]{1,3})\-([0-9]{1,3})$/',$IP,$x)){
					for($i=$x[2];$i<=$x[3];$i++){
						$_IPs[] = ip2long($x[1].$i);
					}
				}elseif(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})\-([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})$/',$IP,$x)){
					$start = ip2long($x[1]);
					$end = ip2long($x[2]);
					for($i=$start;$i<=$end;$i++){
						$_IPs[] = ip2long($i);
					}
				}elseif(is_numeric($IP)){
					$_IPs[] = $IP;
				}
			}
		}
		return $_IPs;
	}

?>