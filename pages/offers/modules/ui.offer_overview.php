<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# stop the script if no id was supplied
if(empty($_REQUEST['id'])){
	$_type = 'info';
	$_msg = '<h1 class="display-inline">Select an offer to the left to start</h1>';
	$_icon = 'arrow-circle-left fa-2x';
	exit(html::alert($_type,$_msg,$_icon));
}

# Get args
$_ID = $_REQUEST['id'];

# Get offer details from database or fail
$OFFER = getOffer($X->DB,$_ID);
if(empty($OFFER)){
	$_type = 'danger';
	$_msg = '<h1 class="display-inline"><strong>Oops!</strong> Unable to find that offer.</h1>';
	$_icon = 'arrow-warning fa-2x';
	exit(html::alert($_type,$_msg,$_icon));
}
$_name 		= $OFFER['name'];
$_cid  		= $OFFER['campaignID'];
$_active 	= $OFFER['active'];
$_auto 		= $OFFER['auto'];
$_company 	= $OFFER['company'];
$_addr1 	= $OFFER['addr1'];
$_addr2 	= $OFFER['addr2'];
$_link 		= $OFFER['link'];
$_optout 	= $OFFER['optout'];
$_suppress 	= $OFFER['suppression'];
$_date 		= $OFFER['date'];
$_type 		= $OFFER['type'];

# Get offer elements
$FROMS 		= getFroms($X->DB,$_ID);
$SUBJECTS 	= getSubjects($X->DB,$_ID);
$IMAGES 	= getImages($X->DB,$_ID);
echo '<pre>';
print_r($OFFER);
print_r($FROMS);
print_r($SUBJECTS);
print_r($IMAGES);
exit();


# Print Offer Overview
html::PrintOut($_,$_name);

# Functions
function getOffer($DB,$ID){
	$HDT = 'MASTER.offers.offers';
	$W   = ['id'=>$ID];
	$F   = '*';
	$L   = 1;
	$Q   = $DB->GET($HDT,$W,$F,$L);
	$OFFER = isset($Q[$ID])?$Q[$ID]:false;
	return $OFFER;
}
function getFroms($DB,$ID){
	$HDT = 'MASTER.offers.offerFroms';
	$W   = ['offerID'=>$ID];
	$F   = '*';
	$L   = 1000;
	$FROMS = $DB->GET($HDT,$W,$F,$L);
	return $FROMS;
}
function getSubjects($DB,$ID){
	$HDT = 'MASTER.offers.offerSubjects';
	$W   = ['offerID'=>$ID];
	$F   = '*';
	$L   = 1000;
	$SUBS = $DB->GET($HDT,$W,$F,$L);
	return $SUBS;
}
function getImages($DB,$ID){
	$HDT = 'MASTER.offers.offerImages';
	$W   = ['offerID'=>$ID];
	$F   = '*';
	$L   = 1000;
	$SUBS = $DB->GET($HDT,$W,$F,$L);
	return $SUBS;
}
?>