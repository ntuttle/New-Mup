<?php
# Start the Page
require_once '../../_/core.php';
$X = new X();

# Offers Tables
$_id 		= 'ViewOffers';
$_title 	= 'Offers';
$_content 	= html::pageLoad('pages/offers/modules/table.show_offers.php',$_id);
$_width 	= html::Cols(12,6,5,4);
$_tools[]   = html::elmt('i',['class'=>'fa fa-chevron-down toggleDTblTools'],true);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools);

# Offer Overview Container
$_id 		= 'OfferOverview';
$_title 	= 'Offer Overview';
$_content 	= html::pageLoad('pages/offers/modules/ui.offer_overview.php',$_id);
$_width 	= html::Cols(12,6,7,8);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);

# Print Widgets
echo html::elmt('div','row',$WIDGETS);
?>