<?php
require_once '../_/core.php';
$X = new X();
$Q = $X->DB->GET('MASTER.domains.domains',['status__<='=>2],['domain','status','registrar','dns','ip','created','expires'],5000);




$attrs['article']['class'] = [html::Cols(12)];
$attrs['div']['class'] = ['jarviswidget','jarviswidget-color-darken'];
$attrs['div']['role'] = ['widget'];
$attrs['header']['role'] = ['heading'];

$t['left'][0] = ['icon'=>'edit fa-lg','name'=>'domain','id'=>'EditDomain'];
$T = new TBL();
$T = $T->Make($Q,$t,false,'table table-striped table-bordered table-hover dataTable no-footer','DomainNames');
$tools = '<a href="ajax/save-to-db/domains-save.php" data-toggle="modal" data-target="#DomainManager" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> add domain names</a>';
$WIDGET = html::MakeWidget('DomainNames','Domain Names',$T,$attrs,$tools);
$WIDGET .= html::JS("$('table#DomainNames').DataTable();");

echo html::elmt('div','row',$WIDGET);
echo html::PopupModal('DomainManager');
?>