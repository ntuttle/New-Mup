<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


/**
 * Check for arguments
 * -----
 **/
$DATA = array_map('mysql_real_escape_string',$_REQUEST);
$POOL = urldecode(@$DATA['pool_search']);

/**
 * retrieve Account details from database
 * --------------------------------------------------
 **/
$HDT = 'MASTER.ipconfig.pools';
$W = ['active__>='=>0];
if(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})$/',$POOL,$x)){
	$W['id__IN'] = ['SELECT `pool_id` AS `id` FROM `ipconfig`.`pool_ips` WHERE `longip` = '.ip2long($POOL)];
}else{
	$W['name__LIKE'] = '%'.$POOL.'%';
}
$F = '*';
$L = 1000;
$Q = $X->DB->GET($HDT,$W,$F,$L);


foreach($Q as $i=>$q)
	$PoolIDs[$i] = $i;


/**
 * retrieve Account details from database
 * --------------------------------------------------
 **/
$HDT = 'MASTER.ipconfig.pool_ips';
$W = ['pool_id__IN'=>$PoolIDs,'GROUP'=>'id','ORDER'=>'id'];
$F = ['COUNT(*)'=>'rows','pool_id'=>'id'];
$L = 1000;
$PIPs = $X->DB->GET($HDT,$W,$F,$L);


// Make Boxes Here
$class = ['alert','alert-success','no-margin','txt-color-black'];
foreach($Q as $i=>$q){
	$POOL = $q['name'];
	$IPCount = number_format(@$PIPs[$i]['rows']);
	$STATUS = $q['active'];
	if($STATUS == 0)
		$class[1] = 'alert-warning';
	else
		$class[1] = 'alert-success';
	$Box = [html::elmt('h6','no-margin font-sm',$POOL)];
	$Box[] = html::elmt('p','font-xs',$IPCount.' ips');

	$Box = html::elmt('div',['class'=>$class],$Box);
	$Boxes[] = html::elmt('div',['class'=>['no-padding',html::Cols(6,12,6,4)]],$Box);
}

$Boxes = implode(EOL,$Boxes);
$div['style'] = 'height:475px;overflow-y:scroll';
$c = 'no-padding custom-scroll table-responsive ';
$div['class'] = $c.html::Cols(12);
$_P1 = html::elmt('div',$div,$Boxes);

$_ = $_P1;

$div = ['id'=>'PoolSearchResults','class'=>'row '.html::Cols(12)];
$_ = html::elmt('div',$div,$_);

html::PrintOut($_);
?>