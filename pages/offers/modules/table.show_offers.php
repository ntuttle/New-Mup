<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get Offers from the database
$Offers = GetOffers($X->DB);

# Get Offer Suppression Status
$Sups = GetActiveSups($X->DB);

# Parse offers array
foreach($Offers as $id=>$offer){
    list($a,$b)    = ($offer['on'] == 0)?['danger','off']:['success','on'];
    $Offers[$id]['on']   = '<span class="btn btn-'.$a.' btn-xs '.html::Cols(12).'">'.$b.'</span>';
    list($a,$b)    = ($offer['auto'] == 0)?['danger','off']:['success','on'];
    $Offers[$id]['auto'] = '<span class="btn btn-'.$a.' btn-xs '.html::Cols(12).'">'.$b.'</span>';
    list($a,$b)    = in_array($offer['sup'],$Sups)?['success','ok']:['warning','expired'];
    $Offers[$id]['sup']  = '<span class="btn btn-'.$a.' btn-xs '.html::Cols(12).'">'.$b.'</span>';
}

# Make DataTable for offers array
$ID    = 'OffersTable';
$DTbl  = "{'pageLength': 30}";
$TOOLS = ['right'=>[['icon'=>'arrow-circle-right fa-2x','name'=>'id','id'=>'EditOffer']]];
$CLASS = 'table-striped table-bordered table-hover no-footer';
$T = new TBL($ID,$DTbl);
$T = $T->Make($Offers,$TOOLS,$CLASS);

# Print Offers table
html::PrintOut($T,'Offers');
echo html::JS("
	$(document).on('click','td#on span.btn',function(){
	    var sts = $(this).text();
	    var td = $(this).parent();
	    var id = td.parent().attr('id');
	    loadURL('pages/offers/modules/update.offer_details.php?id='+id+'&act=toggleActive&sts='+sts,td);
	});
	$(document).on('click','td#auto span.btn',function(){
	    var sts = $(this).text();
	    var td = $(this).parent();
	    var id = td.parent().attr('id');
	    loadURL('pages/offers/modules/update.offer_details.php?id='+id+'&act=toggleAuto&sts='+sts,td);
	});
	$(document).on('click','td.toolbar a#EditOffer',function(){
		var id = $(this).attr('name');
		container = $('div#OfferOverview').find('div[role=content]');
		loadURL('pages/offers/modules/ui.offer_overview.php?id='+id,container);
	});

	$(document).on('click','td#sup span.btn',function(){
	    var td = $(this).parent();
	    var id = td.parent().attr('id');
	    $.SmartMessageBox({
            title: '<i class=\'fa fa-upload txt-color-teal\'></i> Suppression <span class=\'txt-color-teal\'><strong>Update</strong></span>',
            content: 'The suppression update feature is still under construction!',
            buttons: '[Ok]'
        }, function(a) {
            'Yes' == a && ($.root_.addClass('animated fadeOutUp'), setTimeout(b, 1e3))
        });
	    //loadURL('pages/offers/modules/update.offer_suppression.php?id='+id+'&act=toggleAuto&sts='+sts,td);
	});
");


# Function

function GetActiveSups($DB)
	{
		$day = time()-(10*86400);
		$exp = date("Y-m-d", $day);
		$HDT = 'MASTER.suppression.MASTER';
		$QUERY = "SELECT `UPDATE_TIME` AS `time`,`TABLE_NAME` AS `name` FROM  `information_schema`.`tables` WHERE  `TABLE_SCHEMA` = 'suppression' AND `TABLE_NAME` LIKE 'sublists__%'";
		$Q = $DB->Q($HDT,$QUERY);
		if($Q) foreach($Q as $q)
			if ($q['time'] >= $exp)
				$S[str_ireplace('sublists__','',$q['name'])] = str_ireplace('sublists__','',$q['name']);
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