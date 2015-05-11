<?php
# Start the page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get parameters
$ID = @$_REQUEST['id'];

# Query the database for the module settings
$HDT = 'MASTER.team.modules';
$W   = ['module'=>$ID];
$F   = '*';
$L   = 1;
$Q = $X->DB->GET($HDT,$W,$F,$L);
if(empty($Q))
	exit(html::alert('danger','Module settings not found for '.$ID.'!','warning'));

# Create the module settings form
$F = new FORMS('ModuleSettings');
$F->Write('<header class="no-padding no-margin">');
$F->Write('<h3>Module - '.$ID.'</h3>');
$F->Write('</header>');
$F->Write('<div class="row">');
$F->Text('a',false,true,html::Cols(4));
$F->Text('b',false,true,html::Cols(4));
$F->Write('</div>');
$F->Write('<div class="row">');
$F->Text('c',false,true,html::Cols(4));
$F->Text('d',false,true,html::Cols(4));
$F->Write('</div>');
$F->Write('<footer class="no-padding">');
$F->Button('save','save','btn btn-warning btn-xs font-xs');
$F->Write('</footer>');
$F = $F->PrintForm();

# Print the form
echo $F;
?>