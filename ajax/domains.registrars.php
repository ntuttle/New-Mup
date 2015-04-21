<?php
require_once '../_/core.php';
$X = new X();
$Q = $X->DB->GET('MASTER.domains.registrars',['id__>='=>0],'*',1000);




$attrs['article']['class'] = [html::Cols(12)];
$attrs['div']['class'] = ['jarviswidget','jarviswidget-color-darken'];
$attrs['div']['role'] = ['widget'];
$attrs['header']['role'] = ['heading'];

$t['left'][0] = ['icon'=>'edit fa-lg','name'=>'id','id'=>'EditRegistrar'];
$T = new TBL();
$T = $T->Make($Q,$t,false,'table table-striped table-bordered table-hover dataTable no-footer','Registrars');
$tools = '<a href="ajax/save-to-db/registrar-save.php" data-toggle="modal" data-target="#RegistrarsManager" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> add registrar</a>';
$WIDGET = html::MakeWidget('Registrars','Registrar Accounts',$T,$attrs,$tools);
$WIDGET .= html::JS("$('table#Registrars').DataTable();");

echo html::elmt('div','row',$WIDGET);
echo html::PopupModal('RegistrarsManager');
?>