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
$L = 50;
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
$L = 100;
$PIPs = $X->DB->GET($HDT,$W,$F,$L);


// Make Boxes Here
$class = ['alert','alert-success',html::Cols(12,6,4,3),'no-margin','txt-color-black','padding-5'];
foreach($Q as $i=>$q){
	$POOL = $q['name'];
	$IPCount = number_format(@$PIPs[$i]['rows']);
	$STATUS = $q['active'];
	if($STATUS == 0)
		$class[1] = 'alert-warning';
	else
		$class[1] = 'alert-success';
	$Box = [html::elmt('h6','no-margin font-sm display-inline',$POOL)];
	$class[2] = html::Cols(12,5,4,3);
	$Box = [html::elmt('div',['class'=>$class],$Box)];

	$class[1] = 'alert-default';
	$class[2] = html::Cols(4,3,2,2);
	$Box[] = html::elmt('div',['class'=>$class],html::elmt('p','font-xs display-inline',$IPCount.' ips'));

	$CHART  = '<span class="sparkline display-inline no-padding no-margin '.html::Cols(12).'" 
	data-sparkline-type="compositeline" 
	data-sparkline-barcolor="#aafaaf" 
	data-sparkline-linecolor="#ed1c24" 
	data-sparkline-height="25px" 
	data-sparkline-width="100%" 
	data-sparkline-line-val="[6,4,7,8,4,3,2,2,5,6,7,4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7,4,1,5,7,9,9,8,7,6]" 
	data-sparkline-bar-val="[4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7,4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7]"></span>';
	$Box[] = html::elmt('div','no-padding '.html::Cols(8,4,6,7),$CHART);
	$Boxes[] = html::elmt('div',['class'=>['hover no-padding',html::Cols(12)]],$Box);
}

$div['style'] = 'height:475px;overflow-y:scroll';
$c = 'no-padding custom-scroll table-responsive ';
$div['class'] = $c.html::Cols(8);
$Boxes = html::elmt('div',$div,$Boxes);
$div['class'] = $c.html::Cols(4);
$Form = html::elmt('div',$div,' ');
$_P1 = html::elmt('div','no-padding',$Boxes.$Form);

$_ = $_P1;

$div = ['id'=>'PoolSearchResults','class'=>'row '.html::Cols(12)];
$_ = html::elmt('div',$div,$_);

html::PrintOut($_);
echo html::JS("runAllCharts();");
?>