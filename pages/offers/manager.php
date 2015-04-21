<?php
require_once '../../_/core.php';
$X = new X();
$Q = $X->DB->GET('MASTER.offers.offers',['active__>'=>0],['id','name','campaignID'=>'cid','company','addr1'=>'address','addr2','link','optout'],100);
if(empty($Q))
	$Q = [['Oops'=>'No Results Found!']];
else
	foreach($Q as &$q){
		$q['link'] = '<a href="'.$q['link'].'" target="_blank">Link</a>';
		$q['optout'] = '<a href="'.$q['optout'].'" target="_blank">Optout</a>';
		$q['address'] = substr($q['address'].' '.$q['addr2'],0,40);
		unset($q['addr2']);
	}
$attrs = html::WidgetAttrs();
$t['left'][0] = ['icon'=>'edit fa-lg','name'=>'id','id'=>'EditOffer'];
$T = new TBL();
$T = $T->Make($Q,$t,false,'table table-striped table-bordered table-hover dataTable no-footer','OfferList');
$tools = html::ModalBtn('pages/offers/forms/create_offer.php','OfferManager','offer','plus','btn-success btn-xs pull-right');
$WIDGET = html::MakeWidget('OfferList','Offers',$T,$attrs,$tools);
$WIDGET .= html::JS("$('table#OfferList').DataTable();");
$IMGs = [];
$p = 'http://sa/img/superbox/';
for($i=1;$i<=24;$i++){
	$img = 'superbox-full-'.$i.'.jpg';
	$tn = 'superbox-thumb-'.$i.'.jpg';
	$IMGs[$p.$img]['src'] = $p.$tn;
	$IMGs[$p.$img]['alt'] = '';
	$IMGs[$p.$img]['title'] = $img;
}
$attrs['article']['class'] = [html::Cols(12,12,6,4)];
$attrs['content']['class'] = 'container no-padding';
$WIDGET .= html::MakeWidget('OfferDetails','Offer Details',html::elmt('div','well','<b>Please select an Offer from above to view its details.</b>'),$attrs);
$attrs['article']['class'] = [html::Cols(12,12,6,8)];
$WIDGET .= html::MakeWidget('OfferImages','Offer Images',html::SuperBox($IMGs,'superbox'),$attrs);
echo html::elmt('div','row',$WIDGET);
echo html::PopupModal('OfferManager');
echo html::JS("$('.superbox').SuperBox();");
?>