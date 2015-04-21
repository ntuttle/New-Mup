<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


$F = new FORMS('AddPoolIPs');
$F->Write(html::alert('warning','A new pool will be created if it doesn\'t exist.'));

$F->Write('<div class="row">');
$F->Text('name',['pool name'=>false],false);
$F->Write('</div>');

$F->Write('<div class="row">');
$ToolTip = '<b>Specific IPs and IP Ranges seperated by a line break</b><br>127.0.0.1<br>192.168.0.1<br>192.168.0.10-128<br><br><b>Ranges are formatted like:</b><br>127.0.0.1-255 -or- 127.0.0.1-127.0.0.255';
$F->Textarea('ips',false,true,html::Cols(9,10),100,$ToolTip);
$F->Write('</div>');

$F->Write('<div class="row">');
$BTN = html::OnOffSwitch('PoolActive','Active');
$BTN = html::elmt('div','padding-10',$BTN);
$BTN = html::elmt('div',html::Cols(4),$BTN);
$F->Write($BTN);
$BTN = html::OnOffSwitch('PoolAuto','Auto Inject');
$BTN = html::elmt('div','padding-10',$BTN);
$BTN = html::elmt('div',html::Cols(8),$BTN);
$F->Write($BTN);
$F->Write('</div>');

$F->Footer(html::elmt('button','btn btn-warning btn-xs pull-right font-xs no-margin','Save Pool IPs'),'padding-5');
$F = $F->PrintForm();

html::PrintOut($F,'Add IPs to a Pool');
?>