<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get Offers from the database
$Offers = GetOffers($X->DB);
$Sups = GetActiveSups($X->DB);

# Parse offers array
foreach($Offers as $id=>$offer){
	$Offers[$id]['name'] = html::elmt('i','font-md',$offer['name']);
    list($a,$b,$c) = ($offer['on'] == 0)?['default txt-color-blueLight','minus','Off']:['success','check','On'];
    $Offers[$id]['on'] = html::elmt('span','btn btn-xs font-xs btn-'.$a,html::elmt('i','fa fa-'.$b,true).$c);
    list($a,$b,$c) = ($offer['auto'] == 0)?['default txt-color-blueLight','minus','Off']:['success','check','On'];
    $Offers[$id]['auto'] = html::elmt('span','btn btn-xs font-xs btn-'.$a,html::elmt('i','fa fa-'.$b,true).$c);
    list($a,$b,$c) = empty($Sups[$offer['sup']])?['warning','warning text-danger','Expired']:['success','check',$Sups[$offer['sup']]];
    $Offers[$id]['sup'] = html::elmt('span','btn btn-xs font-xs btn-'.$a,html::elmt('i','fa fa-'.$b,true).$c);
}

# Make DataTable for offers array
$ID = 'OffersTable';
$DTbl = "{'pageLength': 25}";
$TOOLS = false;
$CLASS = 'table-striped table-hover no-footer';
$T = new TBL($ID,$DTbl);
$T = $T->Make($Offers,$TOOLS,$CLASS);

# Print Offers table
html::PrintOut($T,'Offers');

# Function
function GetActiveSups($DB)
	{
		$day = time()-(10*86400);
		$exp = date("Y-m-d", $day);
		$HDT = 'MASTER.suppression.MASTER';
		$QUERY = "SELECT `UPDATE_TIME` AS `time`,`TABLE_NAME` AS `name` FROM  `information_schema`.`tables` WHERE  `TABLE_SCHEMA` = 'suppression' AND `TABLE_NAME` LIKE 'sublists__%'";
		$Q = $DB->Q($HDT,$QUERY);
		if($Q) foreach($Q as $q)
			if ($q['time'] >= $exp){
				$days = floor((time() - strtotime($q['time']))/86400);
				$days = $days==0?'today':($days==1?'yesterday':$days.' days');
				$sup_name = str_ireplace('sublists__','',$q['name']);
				$S[$sup_name] = $days;
			}
		$Sups = empty($S)?[]:$S;
		return $Sups;
	}
function GetOffers($DB)
	{
		$HDT = 'MASTER.offers.offers';
		$W   = ['active__>='=>0,'ORDER'=>'name'];
		$F   = ['id','name','active'=>'on','auto','suppression'=>'sup'];
		$L   = 1000;
		$Q   = $DB->GET($HDT,$W,$F,$L);
		return $Q;
	}
?>