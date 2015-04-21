<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


/**
 * Update IP Details Form
 * --------------------------------------------------
 **/
$_id 		= 'AvailableDamains';
$_title 	= 'Available Domains';
$_content 	= html::pageLoad('pages/domains/modules/table.available_domains.php',$_id);
$_width 	= html::Cols(12,4);
$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width);



/**
 * Update IP Details Form
 * --------------------------------------------------
 **/
$_id 		= 'DomainSearch';
$_title 	= 'Domain / Registrar Search';
$_width 	= html::Cols(12,8);
$_content 	= html::pageLoad('pages/domains/modules/ui.domain_search.php',$_id);

$Box 		= '<input type="text" name="domain_search" placeholder="domain name" id="domain_search" value="" class="input-xs" />';
$Btn 		= html::elmt('i',['class'=>'icon-append fa fa-search','id'=>'DomainSearch'],true);
$SearchBox 	= $Box.$Btn;

$Opts 		= [];
$CheckBoxes = ['expired'=>'expired','unused'=>'unused'];
foreach($CheckBoxes as $title=>$chkId){
	$INPUT 		= '<input type="checkbox" value="off" name="'.$chkId.'" id="'.$chkId.'" class="checkbox style-3">';
	$SPAN 		= html::elmt('span','padding-5 font-xs',$title);
	$Opts[]		= html::elmt('label','checkbox-inline',$INPUT.$SPAN);
}
$_tools[]	= html::elmt('div',['class'=>'form-group pull-left DomainSearchOpts','style'=>'margin-left:-150px;'],$Opts);
$_tools[]	= html::elmt('label','text '.html::Cols(12),$SearchBox);

$_args = ['content'=>['class'=>'no-padding']];

$WIDGETS[]  = html::MakeWidget($_id, $_content, $_title, $_width, $_tools, $_args);


/**
 * Print Widgets-
 * --------------------------------------------------
 **/
echo html::elmt('div','row',$WIDGETS);
echo html::JS("$('i#DomainSearch').bind('click',function(){
	var domain = $('input#domain_search').val();
	var expired = $('div.DomainSearchOpts').find('input#expired').val();
	var unused = $('div.DomainSearchOpts').find('input#unused').val();
	var container = $('div#DomainSearch').find('div[role=content]');
	loadURL('pages/domains/modules/ui.domain_search.php?domain_search='+domain+'&expired='+expired+'&unused='+unused,container);
});");
?>