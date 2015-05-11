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

# Get offer elements
$FROMS 		= getFroms($X->DB,$_ID);
$SUBJECTS 	= getSubjects($X->DB,$_ID);
$IMAGES 	= getImages($X->DB,$_ID);

# Display Offer Details

# Display Offer Images slider
$path = 'http://'.MASTER.'/creatives/'.strtolower(str_replace(array(" ",'?','_','.',',','\'','"','@','-'),'',$OFFER['name'])).'/';
$_caption = html::elmt('a','btn btn-warning btn-xs margin-right-5 ',html::elmt('i','fa fa-trash',true).' Delete');
$_caption .= html::elmt('a','btn btn-primary btn-xs margin-right-5 ',html::elmt('i','fa fa-pencil',true).' Edit');
foreach($IMAGES as $I)
	$_IMAGES[$I['image']] = $_caption;
$_[] = html::ImageSlider('OfferImages',$_IMAGES,$path,'no-padding');

# Print Offer Images & Details Row
echo html::elmt('div','row '.html::Cols(12,12,12,4),$_);

$_ = [];
$_[] = html::elmt('div','OfferDetails',styleOfferDetails($OFFER));

# Display Offer Froms
$T = new TBL('OfferFroms',true);
$T = $T->Make($FROMS,false,'table-striped table-bordered table-hover no-footer');
$ELs[] = html::elmt('div',html::Cols(12),$T);

# Display Offer Subjects
$T = new TBL('OfferSubjects',true);
$T = $T->Make($SUBJECTS,false,'table-striped table-bordered table-hover no-footer');
$ELs[] = html::elmt('div',html::Cols(12),$T);

# Print Offer element tables
$_[] =  html::elmt('div','row',$ELs);
echo  html::elmt('div','row padding-10 '.html::Cols(12,12,12,8),$_);
# Print some js
echo html::JS("$('.carousel.slide').carousel({interval : 2000,cycle : true});
	$('article#OfferOverview').find('header[role=heading]').find('h2').html('{$OFFER['name']}');");

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
	$F   = ['id','active'=>'on','from'];
	$L   = 1000;
	$FROMS = $DB->GET($HDT,$W,$F,$L);
	if(!empty($FROMS)){
		foreach($FROMS as $id=>$from){
			list($icon,$sts,$txt) = ($from['on'] == 1)?['check','success','On']:['minus','default txt-color-blueLight','Off'];
			$FROMS[$id]['on'] = '<span class="btn btn-'.$sts.' font-xs btn-xs"><i class="fa fa-'.$icon.'"></i> '.$txt.'</span>';
		}
	}
	return $FROMS;
}
function getSubjects($DB,$ID){
	$HDT = 'MASTER.offers.offerSubjects';
	$W   = ['offerID'=>$ID];
	$F   = ['id','active'=>'on','subject'];
	$L   = 1000;
	$SUBS = $DB->GET($HDT,$W,$F,$L);
	if(!empty($SUBS)){
		foreach($SUBS as $id=>$sub){
			list($icon,$sts,$txt) = ($sub['on'] == 1)?['check','success','On']:['minus','default txt-color-blueLight','Off'];
			$SUBS[$id]['on'] = '<span class="btn btn-'.$sts.' font-xs btn-xs"><i class="fa fa-'.$icon.'"></i> '.$txt.'</span>';
		}
	}
	return $SUBS;
}
function getImages($DB,$ID){
	$HDT = 'MASTER.offers.offerImages';
	$W   = ['offerID'=>$ID];
	$F   = ['id','name'=>'image','active'];
	$L   = 1000;
	$IMGS = $DB->GET($HDT,$W,$F,$L);
	return $IMGS;
}
function styleOfferDetails($OFFER){
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

	# Display Offer Details
	$_ = '<button name="'.$_REQUEST['id'].'" id="EditOfferDetailsForm" class="btn btn-default btn-xs pull-right"><i class="fa fa-pencil"></i> Edit</button>
		<h1>'.$_name.'</h1>
		<div class="col-xs-6">
			<ul class="list-unstyled">
				<li><p class="text-muted">'.$_company.'<br>'.$_addr1.'<br>'.$_addr2.'</p></li>
			</ul>
		</div>
		<div class="col-xs-6">
			<ul class="list-unstyled">
				<li>
					<p class="text-muted"><b>Suppression:</b><br>&nbsp;'.$_suppress.'<br><small class="font-xs"><i class="fa fa-check text-success"></i> up to date!</small></p>
				</li>
			</ul>
		</div>
		
		<ul class="list-unstyled">
			<li>
				<a target="_blank" href="'.$_link.'" class="margin-5 btn btn-xs btn-success"><i class="fa fa-chain"></i> Offer</a>
				<a target="_blank" href="'.$_optout.'" class="margin-5 btn btn-xs btn-danger"><i class="fa fa-ban"></i> Unsub</a>
			</li>
		</ul>
		<p class="font-sm"><i>since '.$_date.'...</i></p>';
	return $_;
}
?>