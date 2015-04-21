<?
define('DIR','../..');
require_once DIR.'/_/core.php';
$F = new FORMS('CreateOffer');
$F->Write('<fieldset>');
$F->Text('name',['offer name'=>false],false,html::Cols(8));
$F->Text('campaignID',['campaign ID'=>false],false,html::Cols(4));
$F->Write('</fieldset>');
$F->Write('<fieldset>');
$F->Text('company',['company'=>false],false,html::Cols(8));
$F->Text('addr1',['addr1'=>false],false,html::Cols(8));
$F->Text('addr2',['addr2'=>false],false,html::Cols(8));
$F->Write('</fieldset>');
$F->Write('<fieldset>');
$F->Text('link',['link'=>false],false,html::Cols(12));
$F->Text('optout',['optout'=>false],false,html::Cols(12));
$F->Write('</fieldset>');
$F->SelectForm('BTNS');
$btn = '<button type="button" id="SaveOffer" class="btn btn-warning"><i class="fa fa-save"></i> Save Offer</button>';
$btn .= '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
$F->Write($btn);
$BTNS = $F->PrintPart('BTNS');
$F->SelectForm('CreateOffer');
$F->Footer($BTNS);
$F = $F->PrintForm();
$attrs['article']['class'] = [html::Cols(12,6)];
echo html::ModalHTML($F);
echo html::JS("$('button#SaveOffer').click(function(){
	$('div#OfferManager').fadeOut(500,function(){
		$('div#OfferManager').find('div.modal-backdrop').remove();
		$('body').removeClass('modal-open');
		$('div#OfferManager').removeClass('in');
		$('div#OfferManager').attr('aria-hidden','true');
		$('div#OfferManager').removeAttr('style').attr('style','display:none;');

	});
});");
?>