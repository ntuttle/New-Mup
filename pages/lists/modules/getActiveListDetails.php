<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get Active Emails
$HDT = 'EMAILS.emails.aol__emails';
$W   = ['status__IN'=>[3,4]];
$F   = ['md5'=>'id','email','status'];
$L   = 1000000;
$DATA = $X->DB->GET($HDT,$W,$F,$L);

echo count($DATA);
exit();
# Loop through emails getting the last action time and Email details
foreach($DATA as $MD5=>$EMAIL){
	$HDT = 'ACTIONS.actions.actions';
	$W = ['email'=>$MD5,'type__IN'=>['OPEN','CLICK'],'ORDER'=>['id'=>'DESC']];
	$F = ['id','email','type','date'];
	$L = 1;
	$ACTION = $X->DB->GET($HDT,$W,$F,$L);
	if(!empty($ACTION)){
		$DATA[$MD5]['date'] = $ACTION[key($ACTION)]['date'];
	}else{
		$DATA[$MD5]['date'] = 'NULL';
	}
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'/pages/lists/modules/emails.csv',implode(',',$DATA[$MD5])."\n",FILE_APPEND);
}
echo 'DONE!';
?>