<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


/**
 * Get count from arg
 * --------------------------------------------------
 **/
switch(@$_REQUEST['count']){
	case 'IPsCount':
		$count = GetIPCount($X->DB);
		break;	
	case 'DomainCount':
		$count = GetDomainCount($X->DB);
		break;	
	case 'ListsCount':
		$count = GetListCount($X->DB);
		break;	
	case 'SeedCount':
		$count = GetSeedCount($X->DB);
		break;	
	case 'OfferCount':
		$count = GetOfferCount($X->DB);
		break;	
	default:
		$count = 0;
		break;
}

/**
 * echo the count
 * --------------------------------------------------
 **/
echo html::elmt('small',false,html::elmt('small',false,$count));


/**
 * Functions
 * --------------------------------------------------
 **/
function GetIPCount($DB)
	{		
		# query the database
		$HDT = 'MASTER.ipconfig.global_config';
		$W   = ['active'=>1];
		$F   = ['COUNT(*)'=>'rows'];
		$Q = $DB->GET($HDT,$W,$F);
		# set count if any
		$count = empty($Q[0]['rows'])?0:$Q[0]['rows'];
		$count = number_format($count);
		# return $count
		return $count;
	}
function GetDomainCount($DB)
	{	
		# query the database
		$HDT = 'MASTER.domains.domains';
		$W   = ['status__<='=>2];
		$F   = ['COUNT(*)'=>'rows'];
		$Q = $DB->GET($HDT,$W,$F);
		# set count if any
		$count = empty($Q[0]['rows'])?0:$Q[0]['rows'];
		$count = number_format($count);
		# return $count
		return $count;
	}
function GetListCount($DB)
	{
		# query the database
		$HDT = 'EMAILS.lists.lists';
		$W   = ['active'=>1];
		$F   = ['COUNT(*)'=>'rows'];
		$Q = $DB->GET($HDT,$W,$F);
		# set count if any
		$count = empty($Q[0]['rows'])?0:$Q[0]['rows'];
		$count = number_format($count);
		# return $count
		return $count;
	}
function GetOfferCount($DB)
	{
		# query the database
		$HDT = 'MASTER.offers.offers';
		$W   = ['active'=>1];
		$F   = ['COUNT(*)'=>'rows'];
		$Q = $DB->GET($HDT,$W,$F);
		# set count if any
		$count = empty($Q[0]['rows'])?0:$Q[0]['rows'];
		$count = number_format($count);
		# return $count
		return $count;
	}
function GetSeedCount($DB)
	{
		$count = 0;
		# query the database
		foreach(['aol','yahoo','hotmail'] as $db){
			$HDT = 'ZAP.'.$db.'.accounts';
			$W   = ['status__<='=>2];
			$F   = ['COUNT(*)'=>'rows'];
			$Q = $DB->GET($HDT,$W,$F);
			# increment count if any
			$count += empty($Q[0]['rows'])?0:$Q[0]['rows'];
		}
		$count = number_format($count);
		# return $count
		return $count;
	}
?>