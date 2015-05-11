<?php
# Start the Page
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

# Get the args
$type  = empty($_REQUEST['type']) ?false:$_REQUEST['type'] ;
$group = empty($_REQUEST['group'])?false:$_REQUEST['group'];

switch ($type) {
	case 'group':
		$_ = getHeaderGroupForm($X);
		break;
	
	default:
		$_ = getHeaderForm($X,$group);
		break;
}

echo html::PrintOut($_,false);

# Function
function getHeaderForm($X,$group=false){
	$F = new FORMS('AddHeader',false);
	$F->Write('<header><h2>Add Group Headers</h2></header>');
	$F->Write('<div class="row">');
	$F->Select('groupID',getHeaderGroups($X->DB),false,'Header Group',true,html::Cols(8));
	$F->Write('</div>');

	$F->Write('<div class="row">');
	$F->Text('head[]',['Header'=>false],false,html::Cols(3));
	$F->Text('value[]',['Value'=>false],false,html::Cols(7));
	$F->Text('encode[]',['Encode'=>false],false,html::Cols(2));
	$F->Write('</div>');
	$F->Write('<div class="row">');
	$F->Text('head[]',['Header'=>false],false,html::Cols(3));
	$F->Text('value[]',['Value'=>false],false,html::Cols(7));
	$F->Text('encode[]',['Encode'=>false],false,html::Cols(2));
	$F->Write('</div>');
	$F->Write('<div class="row">');
	$F->Text('head[]',['Header'=>false],false,html::Cols(3));
	$F->Text('value[]',['Value'=>false],false,html::Cols(7));
	$F->Text('encode[]',['Encode'=>false],false,html::Cols(2));
	$F->Write('</div>');

	$F->Write('<footer class="padding-10">');
	$F->Button('SaveHeader','save header','btn btn-warning');
	$F->Button('cancel','cancel','btn btn-default" data-dismiss="modal');
	$F->Write('</footer>');
	$F = $F->PrintForm();
	return $F;
}
function getHeaderGroups($DB){
	$HDT = 'MASTER.headers.targetHeaderGroups';
	$W   = ['id__>='=>0];
	$F   = ['id','groupName'=>'name','id'=>'groupID'];
	$L   = 1000;
	$Q   = $DB->GET($HDT,$W,$F,$L);
	if(!empty($Q))
		foreach($Q as $i=>$q)
			$_groups[$q['groupID']] = $q['name'];
	return $_groups;
}
function getHeaderGroupForm($X){
	$F = new FORMS('AddHeaderGroup',false);
	$F->Write('<header><h2>Add a Header Group</h2></header>');
	$F->Write('<div class="row">');
	$F->Select('target',$X->getTargets(),false,true,false,html::Cols(4));
	$F->Write('</div>');

	$F->Write('<div class="row">');
	$F->Text('groupName',false,'Group Name',html::Cols(10));
	$F->Write('</div>');

	$F->Write('<header><h2>Content Settings</h2></header>');

	$F->Write('<div class="row">');
	$F->Text('mailfrom',false,'MAIL FROM',html::Cols(10));
	$F->Write('</div>');

	$F->Write('<div class="row">');
	$F->Select('image',['image'=>'image','text'=>'text'],false,'Unsub Type',true,html::Cols(4));
	$F->Select('contentType',['text/html'=>'HTML','text/plain'=>'TEXT'],false,'Type',false,html::Cols(4));
	$F->Write('</div>');

	$F->Write('<div class="row">');
	$F->Select('charset',['us-ascii'=>'us-ascii','7-bit'=>'7-bit'],false,'Charset',true,html::Cols(4));
	$F->Select('contentEncoding',['quoted_printable'=>'QPrint','base64'=>'Base64'],false,'Encoding',true,html::Cols(4));
	$F->Write('</div>');

	$F->Write('<header><h2>Group Headers</h2></header>');

	$F->Write('<div class="row">');
	$F->Text('head[]',['Header'=>'To'],false,html::Cols(3));
	$F->Text('value[]',['Value'=>'<[*to]>'],false,html::Cols(7));
	$F->Text('encode[]',['Encode'=>false],false,html::Cols(2));
	$F->Write('</div>');
	$F->Write('<div class="row">');
	$F->Text('head[]',['Header'=>'From'],false,html::Cols(3));
	$F->Text('value[]',['Value'=>'[FROM]@[contentDomain]'],false,html::Cols(7));
	$F->Text('encode[]',['Encode'=>false],false,html::Cols(2));
	$F->Write('</div>');
	$F->Write('<div class="row">');
	$F->Text('head[]',['Header'=>'Subject'],false,html::Cols(3));
	$F->Text('value[]',['Value'=>'[SUBJECT]'],false,html::Cols(7));
	$F->Text('encode[]',['Encode'=>false],false,html::Cols(2));
	$F->Write('</div>');
	$F->Write('<div class="row">');
	$F->Text('head[]',['Header'=>false],false,html::Cols(3));
	$F->Text('value[]',['Value'=>false],false,html::Cols(7));
	$F->Text('encode[]',['Encode'=>false],false,html::Cols(2));
	$F->Write('</div>');

	$F->Write('<footer class="padding-10">');
	$F->Button('SaveHeaderGroup','save header','btn btn-warning');
	$F->Button('cancel','cancel','btn btn-default" data-dismiss="modal');
	$F->Write('</footer>');

	$F = $F->PrintForm();
	return $F;
}



?>