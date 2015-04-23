<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


/**
 * IP Settings Variables
 * --------------------------------------------------
 **/
$DATA = array_map('mysql_real_escape_string',$_REQUEST);

$_target = $DATA['target'];
$_active = $DATA['active'];
$_ips = parseIPs($DATA['ips']);
$_mailing = $DATA['mdom'];
$_content = $DATA['cdom'];
$_msg_rate = $DATA['msg_rate'];
$_msg_con = $DATA['msg_con'];
$_con_rate = $DATA['con_rate'];
$_reload = ($DATA['reload'] == 'on')?true:false;
if(!empty($_ips)){

	if(!empty($_msg_rate) || ($_msg_rate == '0'))
		$S['msg_rate'] = $_msg_rate;
	if(!empty($_msg_con)  || ($_msg_con == '0'))
		$S['msg_con'] = $_msg_con;
	if(!empty($_con_rate) || ($_con_rate == '0'))
		$S['con_rate'] = $_con_rate;
	if(!empty($_mailing) || ($_mailing == '0'))
		$S['mailing'] = $_mailing;
	if(!empty($_content) || ($_content == '0'))
		$S['content'] = $_content;
	$S['active'] = ($_active == 'no')?0:1;
	

	$HDT 	= 'MASTER.ipconfig.target_config';
	$W 		= ['ip'=>$_ips,'target'=>$_target];
	$X->DB->SET($HDT,$S,$W,10000);

	if($X->DB->aR > 0){
		$msg = ' '.count($_ips).' ips supplied with '.$X->DB->aR.' ips updated...';
		$I = 'check';
		$type = 'success';
	}else{
		$msg = ' '.count($_ips).' ips supplied but no ips were updated!';
		$I = 'warning';
		$type = 'danger';
	}
}else{
	$msg = 'Invalid IP Format supplied!';
	$I = 'warning';
	$type = 'danger';
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
			$IPs = str_ireplace([" ","\t","\r\n","\n"],',',$IPs);
			$IPs = explode(',',$IPs);
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
