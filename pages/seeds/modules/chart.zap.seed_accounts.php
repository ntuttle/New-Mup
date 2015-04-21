<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


/**
 * Check Args
 * --------------------------------------------------
 **/
$ESP = strtolower(@$_REQUEST['esp']);
$ESP = empty($ESP)?exit('Invalid ESP!'):$ESP;
$created = $closed = [];
for($i=time();$i>=(time()-(30*24*60*60));$i-=(60*60*24)){
	$D = date('Y-m-d',$i);
	$created[$D] = $closed[$D] = 0;
}

/**
 * retrieve Account details from database
 * --------------------------------------------------
 **/
$HDT = 'ZAP.'.$ESP.'.accounts';
$W = ['status__>='=>0,'ORDER'=>['id'=>'DESC']];
$F = ['id','created','status','updated'];
$L = 25000;
$Q = $X->DB->GET($HDT,$W,$F,$L);

/**
 * Parse the results and prep for table
 * --------------------------------------------------
 **/
if(!empty($Q)){
	foreach($Q as $i=>$q){
		$D = date('Y-m-d',strtotime($q['created']));
		if(isset($created[$D]))
			$created[$D]++;
		
		if($q['status']==0){
			$D = date('Y-m-d',strtotime($q['updated']));
			if(isset($closed[$D])){
				$closed[$D]++;
			}
		}
	}
}


/**
 * Create Chart for Seed Accounts overview
 * --------------------------------------------------
 **/
foreach($created as $d=>$c)
	$json[] = ['period'=>$d,'created'=>$c,'lost'=>$closed[$d]];
$json = json_encode($json);

$p = ['id'=>$ESP.'chart','class'=>['chart','no-padding','no-margin'],'style'=>'height:240px;'];
$CHART = html::elmt('div',$p,true).html::JS("if ($('#{$ESP}chart').length){
		var {$ESP}_data = {$json};
		Morris.Line({ 
				element: '{$ESP}chart',
				data: {$ESP}_data,
				xkey: 'period',
				ykeys: ['created', 'lost'],
				labels: ['Created', 'Closed']
		});
	}");


/**
 * Print Chart
 * -------------------------
 **/
html::PrintOut($CHART,$ESP.' Seed History');
?>