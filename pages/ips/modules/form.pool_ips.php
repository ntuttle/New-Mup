<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

$HDT 	= 'MASTER.hardware.servers';
$W  	= ['type'=>'PMTA','active'=>1];
$F 		= ['id','name'];
$Q = $X->DB->GET($HDT,$W,$F,100);
foreach($Q as $i=>$q)
	$PMTAS[$i] = $q['name'];

$F = new FORMS('AddPoolIPs');
//$F->Write(html::alert('warning','A new pool will be created if it doesn\'t exist.'));

$F->Write('<div class="row padding-top-10">');
$F->Text('name',['pool name'=>false],false,html::Cols(9));
$F->Select('pmta',$PMTAS,false,false,false,html::Cols(3));
$F->Write('</div>');

$F->Write('<div class="row">');
$ToolTip = '<b>Specific IPs and IP Ranges seperated by a line break</b><br>127.0.0.1<br>192.168.0.1<br>192.168.0.10-128<br><br><b>Ranges are formatted like:</b><br>127.0.0.1-255 -or- 127.0.0.1-127.0.0.255';
$F->Textarea('ips',false,true,html::Cols(9,10),120,$ToolTip);
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

$F->Footer(html::elmt('button',['id'=>'AddPoolIPs','class'=>'btn btn-warning btn-xs pull-right font-xs no-margin'],'Save Pool IPs'),'padding-5');

$F->Write('<div id="AddPoolIPsRSLTs"></div>');
$F->JS("$('button#AddPoolIPs').click(function(){
	var form = $('form#AddPoolIPs');
	var pool = form.find('input#name').val();
	var pmta = form.find('select#pmta').val();
	var ips = form.find('textarea#ips').val();
	ips = ips.replace(/\\n/g,',');
	var active = form.find('input#PoolActive').val();
	var auto = form.find('input#PoolAuto').val();

	var url = 'pages/ips/modules/update.pool_ips.php?pool='+pool+'&ips='+ips+'&active='+active+'&auto='+auto+'&pmta='+pmta;
	var container = form.find('div#AddPoolIPsRSLTs');

	loadURL(url,container);
	return false;
});");
$F = $F->PrintForm();

html::PrintOut($F,'Add IPs to a Pool');
?>