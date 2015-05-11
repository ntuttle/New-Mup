<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get variables
$ID = @$_REQUEST['id'];
if(empty($ID)) 
	exit(html::alert('danger','No id was passed!'));

# Get Offer from database
$HDT = 'MASTER.offers.offers';
$W   = ['id'=>$ID];
$F   = '*';
$OFFER= $X->DB->GET($HDT,$W,$F,1);
if(!empty($OFFER)) $OFFER = $OFFER[$ID];

# Create Offer details form
$F = new FORMS('EditOfferDetails');
$F->Write('<div class="form-group">');
$F->Hidden('id',$ID);
$F->Text('name',$OFFER['name'],true,html::Cols(6,8));
$F->Text('campaignID',['cid'=>$OFFER['campaignID']],false,html::Cols(3,2));
$F->Text('company',$OFFER['company'],true,html::Cols(9,10));
$F->Text('addr1',$OFFER['addr1'],'Address',html::Cols(9,10));
$F->Write('<section class="col col-xs-3 col-sm-2 padding-5 no-margin"></section>');
$F->Text('addr2',$OFFER['addr2'],false,html::Cols([3=>9],[2=>10],[2=>10],[2=>10]));
$F->Text('link',$OFFER['link'],true,html::Cols([3=>9],[2=>10],[2=>10],[2=>10]));
$F->Text('optout',$OFFER['optout'],true,html::Cols([3=>9],[2=>10],[2=>10],[2=>10]));
$F->Write('</div>');

$F->Write('<footer class="padding-5">');
$F->Button('SaveOfferChanges','save changes','btn btn-warning btn-xs pull-right font-xs');
$F->Button('CancelOfferDetails','cancel','btn btn-default btn-xs pull-right font-xs');
$F->Write('</footer>');

$F->JS("$('button#CancelOfferDetails').click(function(){
	var container = $('div#OfferOverview').find('div[role=content]');
	loadURL('pages/offers/modules/ui.offer_overview.php?id={$ID}',container);
});");
$F = $F->PrintForm();

# Print the form
echo html::elmt('div','row '.html::Cols(12),$F);
?>