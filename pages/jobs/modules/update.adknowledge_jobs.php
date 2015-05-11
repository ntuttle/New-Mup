<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get arguments
if(isset($_REQUEST['jobs'])){
	$STATUS = $_REQUEST['status'];
	$LIST_POOL = explode("\n",$_REQUEST['jobs']);
	$TARGET = $_REQUEST['target'];
	foreach($LIST_POOL as $list_pool){
		$list_pool = str_ireplace([", ","\t"," "],',',$list_pool);
		list($list,$pool) = explode(',',$list_pool);
		$list = trim($list);
		$pool = trim($pool);
		if(!is_numeric($list)){
			$Q = $X->DB->GET('EMAILS.lists.lists',['name'=>$list],'*',1);
			if(!empty($Q))
				$list = key($Q);
		}
		if(!is_numeric($pool)){
			$Q = $X->DB->GET('MASTER.ipconfig.pools',['name'=>$pool],'*',1);
			if(!empty($Q))
				$pool = key($Q);
		}
		echo 'LIST: '.$list.' POOL: '.$pool."<br><br>";
		if(is_numeric($list) && is_numeric($pool))
			$V[] = [$list,$pool,$TARGET,$STATUS];
	}
	if(!empty($V))
		$X->DB->PUT('MASTER.jobs.adknowledge',['list_id','pool_id','target','list_status'],$V);
}
print_r($X->DB);
?>