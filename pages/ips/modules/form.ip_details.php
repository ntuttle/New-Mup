<?
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Set Form Variables
$_id  		= 'IPUpdate';
$_active  	= ['yes'=>'Active','no'=>'Disabled'];
$_targets 	= $X->getTargets();
$_ipTooltip = 'Specific IPs and IP Ranges seperated by a comma, space or tab:<br> - 127.0.0.1, 192.168.0.1, 192.168.0.10-128, ...<br><br>Ranges are formatted like:<br>127.0.0.1-255 -or- 127.0.0.1-127.0.0.255';

# Create ip details form
$F = new FORMS($_id);
# Print Alert
	$_type = 'warning';
	$_msg  = 'Using this form will overwrite existing ip settings!';
	$_icon = 'warning';
$F->Write(html::alert($_type,$_msg,$_icon));
# IP & status
$F->Write('<div class="row">');
$F->Select('target',$_targets,false,'target',false,html::Cols(6,6));
$F->Select('active',$_active,false,false,false,html::Cols(3,4));
$F->Text('ip',false,'IP(s)',html::Cols(9,10),$_ipTooltip);
$F->Write('</div>');
# Print Alert
	$_type = 'info';
	$_msg  = 'No changes will be made on options left blank below.';
	$_icon = 'info-circle';
$F->Write(html::alert($_type,$_msg,$_icon));
# IP Domain Settings
$F->Write('<div class="row">');
$F->Text('mdom',['mailing domain'=>false],false,html::Cols(12,6));
$F->Text('cdom',['content domain'=>false],false,html::Cols(12,6));
$F->Write('</div>');
# IP Mail Settings
$F->Write('<div class="row">');
$w = html::Cols(4);
$F->Text('msg_rate',['max-msg-rate'=>false],false,$w,'max # of messages sent per hour');
$F->Text('msg_con',['max-msg-per-connection'=>false],false,$w,'max # of messages sent per connection');
$F->Text('con_rate',['max-connect-rate'=>false],false,$w,'max # of connects made per hour');
$F->Write('</div>');
# Toggle vmta reload
	$_switch = html::OnOffSwitch('IPreload',' Reload VMTAs?');
	$_switch = html::elmt('div','padding-5',$_switch);
	$_switch = html::elmt('div',html::Cols(8),$_switch);
# Submit button
	$_btn = html::elmt('button',['id'=>'IPUpdateTargetDetails','class'=>'btn btn-warning btn-xs font-xs no-margin'],'Update');
	$_btn = html::elmt('div','padding-5',$_btn);
	$_btn = html::elmt('div',html::Cols(4),$_btn);
# Footer
$F->Footer($_switch.$_btn,'no-padding');

# Results Container
$F->Write('<div id="IPUpdateRSLTs"></div>');

# Print Form 
html::PrintOut($F->PrintForm(),'Update IP Settings');

# Print JS
echo html::JS("$('button#IPUpdateTargetDetails').click(function(){
	var form = $('form#IPUpdate');
	var target = form.find('select#target').val();
	var active = form.find('select#active').val();
	var ips = form.find('input#ip').val();
	var mdom = form.find('input#mdom').val();
	var cdom = form.find('input#cdom').val();
	var msg_rate = form.find('input#msg_rate').val();
	var msg_con = form.find('input#msg_con').val();
	var con_rate = form.find('input#con_rate').val();
	var reload = form.find('input#IPreload').val();
	var url = 'pages/ips/modules/update.ip_config.php?target='+target+'&active='+active+'&ips='+ips+'&mdom='+mdom+'&cdom='+cdom+'&msg_rate='+msg_rate+'&msg_con='+msg_con+'&con_rate='+con_rate+'&reload='+reload;
	var container = form.find('div#IPUpdateRSLTs');
	loadURL(url,container);
	return false;
});");
?>