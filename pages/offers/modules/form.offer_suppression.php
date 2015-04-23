<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

/**
 * Get args
 * --------------------------------------------------
 **/
$ID = @$_REQUEST['id'];
$HDT = 'MASTER.offers.offers';
$W['id'] = $ID;
$F = ['id','suppression'];
$Q = $X->DB->GET($HDT,$W,$F);

$SUPPRESSION = 'sublists__'.@$Q[$ID]['suppression'];


$_[] = '<div class="widget-body">';
$_[] = '<form action="/pages/offers/modules/upload.offer_suppression.php" class="dropzone" id="SuppressionUpload_'.$ID.'"></form>';
$_[] = '</div>';
$_[] = html::JS('
Dropzone.autoDiscover = false;
$("#SuppressionUpload_'.$ID.'").dropzone({
	url: "/pages/offers/modules/upload.offer_suppression.php",
	addRemoveLinks : true,
	maxFilesize: 0.5,
	dictResponseError: \'Error uploading file!\'
});
');

$_width = html::Cols(12,6,6,3);
$_id = 'OfferSuppression_'.$ID;
$_content = implode('',$_);
$_title = 'Suppression '.$SUPPRESSION;
echo html::MakeWidget($_id,$_content,$_title,$_width);
?>