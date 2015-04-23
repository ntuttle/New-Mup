<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Pool IP Variables
$DATA 	= array_map('mysql_real_escape_string',$_REQUEST);
$DATA 	= $_REQUEST;
$POOL 	= @$DATA['pool'];
$PMTA   = @$DATA['pmta'];
$IPS  	= @$DATA['ips']  = X::parseIPs(@$DATA['ips']);
$ACTIVE = @$DATA['active'];
$AUTO 	= @$DATA['auto'];
$_msg 	= 'Invalid IP Format!';
$_icon 	= 'warning';
$_type 	= 'danger';

# Add pool and pool ips
if(!empty($IPS) && !empty($POOL)){
	# Get id for pool from database
	$HDT = 'MASTER.ipconfig.pools';
	$W = ['name' => $POOL];
	$F = ['id','name'];
	$Q = $X->DB->GET($HDT,$W,$F,1);

	# Add pool if not found in database
	if(empty($Q)){
		$X->DB->PUT($HDT,['name','server_id','active'],[[$POOL,$PMTA,1]]);
		$pool_id = $X->DB->lID;
	}else
		foreach($Q as $i=>$q)
			$pool_id = $i;

	# Add pool ips to database
	$HDT = 'MASTER.ipconfig.pool_ips';
	$F = ['pool_id','longip','active'];
	foreach($IPS as $IP)
		$V[] = [$pool_id,$IP,1];
	$X->DB->PUT($HDT,$F,$V,'IGNORE');

	# Compile the results message
	if($X->DB->aR > 0){
		$_msg = $X->DB->aR.' ips inserted into pool '.$POOL;
		$_icon 	= 'check';
		$_type 	= 'success';
	}else{
		$_msg = 'No ips could be added to pool '.$POOL;
	}
}

# Print results message
echo html::alert($_type,$_msg,$_icon);
?>