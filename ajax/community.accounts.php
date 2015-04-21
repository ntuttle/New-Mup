<?php
require_once '../_/core.php';
$X = new X();
$Q = $X->DB->GET('SEEDS.seeds.engagement',['id__>='=>0],['id','email','password'],100);




$attrs['article']['class'] = [html::Cols(12,6)];
$attrs['div']['class'] = ['jarviswidget','jarviswidget-color-darken'];
$attrs['div']['role'] = ['widget'];
$attrs['header']['role'] = ['heading'];

$t['left'][0] = ['icon'=>'ban fa-lg text-danger','name'=>'id','id'=>'EditAccount'];
$t['left'][1] = ['icon'=>'edit fa-lg','name'=>'id','id'=>'EditAccount'];
$T = new TBL();
$T = $T->Make($Q,$t,false,'table table-striped table-bordered table-hover dataTable no-footer','EngagementSeeds');
$WIDGET = html::MakeWidget('Seeds','Engagement Seed Accounts',$T,$attrs);
$WIDGET .= html::JS("$('table#EngagementSeeds').DataTable();");

echo html::elmt('div','row',$WIDGET);
?>