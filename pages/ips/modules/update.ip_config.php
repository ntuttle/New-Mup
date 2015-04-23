<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


# IP Settings Variables
$DATA 		= array_map('mysql_real_escape_string',$_REQUEST);
$_target 	= $DATA['target'];
$_active 	= $DATA['active'];
$_ips 		= X::parseIPs($DATA['ips']);
$_mailing 	= $DATA['mdom'];
$_content 	= $DATA['cdom'];
$_msg_rate 	= $DATA['msg_rate'];
$_msg_con 	= $DATA['msg_con'];
$_con_rate 	= $DATA['con_rate'];
$_reload 	= ($DATA['reload'] == 'on')?true:false;
# For results message
$_msg 	= 'Invalid IP Format supplied!';
$_icon 	= 'warning';
$_type 	= 'danger';

# Compile ip settings update database query
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
	
	# Update ipconfig database with new settings
	$HDT 	= 'MASTER.ipconfig.target_config';
	$W 		= ['ip'=>$_ips,'target'=>$_target];
	$X->DB->SET($HDT,$S,$W,10000);

	# Compile results message
	if($X->DB->aR > 0){
		$_msg 	= ' '.count($_ips).' ips supplied with '.$X->DB->aR.' ips updated...';
		$_icon 	= 'check';
		$_type 	= 'success';
	}else
		$_msg 	= ' '.count($_ips).' ips supplied but no ips were updated!';
}

# Print results message
echo html::alert($_type,$_msg,$_icon);
?>