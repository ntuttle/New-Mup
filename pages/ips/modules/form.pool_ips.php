<?php
# Start page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Running MTA Servers
$HDT = 'MASTER.hardware.servers';
$W = ['type'=>'PMTA','active'=>1];
$F = ['id','name'];
$Q = $X->DB->GET($HDT,$W,$F,100);
foreach($Q as $i=>$q)
	$PMTAS[$i] = $q['name'];

# Build the form to add a pool and pool ips
$F = new FORMS('AddPoolIPs');

# Warning for db manipulation
$F->Write('<div class="row no-padding">');
$F->Write(html::alert('warning','A new pool will be created if it doesn\'t exist.'));
$F->Write('</div>');

# Poolname and Pool Status
$F->Write('<div class="form-group">');
$F->Text('name',false,'Pool Name',html::Cols(7));
$F->Select('pmta',$PMTAS,false,false,false,html::Cols(3));
$F->Write('</div>');

# Textarea for ips
$F->Write('<div class="form-group">');
$TT = '<b>Specific IPs and IP Ranges seperated by a line break</b><br>127.0.0.1<br>192.168.0.1<br>192.168.0.10-128<br><br><b>Ranges are formatted like:</b><br>127.0.0.1-255 -or- 127.0.0.1-127.0.0.255';
$F->Textarea('ips',false,true,html::Cols(9,10),150,$TT);
$F->Write('</div>');

# Make Switches for pool settings
$IO = [html::OnOffSwitch('PoolActive','Active')];
$DIV[] = html::elmt('div',html::Cols(4),$IO);
$IO = html::OnOffSwitch('PoolAuto','Auto Inject');
$DIV[] = html::elmt('div',html::Cols(8),$IO);
$F->Write( html::elmt('div','form-group',$DIV));

$F->Write('<div class="row"></div>');

# Make the Submit Button
$Btn = html::elmt('button',['id'=>'AddPoolIPs','class'=>'btn btn-warning btn-xs'],'Save Pool IPs');
$Btn .= html::elmt('button',['id'=>'cancel','class'=>'btn btn-default btn-xs'],'cancel');
$F->Footer($Btn,'no-padding');

# Print a place for the results to be displayed
$ResultBox = html::elmt('div',['id'=>'AddPoolIPsRSLTs'],true);
$F->Write($ResultBox);

# JS to make the form work
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

# Print out the form! 
$F = $F->PrintForm();
html::PrintOut($F,'Add IPs to a Pool');
?>