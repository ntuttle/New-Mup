<?php
require_once '../_/core.php';
$X = new X();
$X->DB->C('ZAP',ZAP,ZAP_USER,ZAP_PASS);
$ROWS = MakeRows($X->DB,['aol','yahoo','hotmail']);
echo html::elmt('div','row',$ROWS);

function MakeRows($DB,$Targets){
	$attrs['article']['class'] = [html::Cols(12,5,6)];
	$attrs['div']['class'] = ['jarviswidget','jarviswidget-color-darken'];
	$attrs['div']['role'] = ['widget'];
	$attrs['header']['role'] = ['heading'];
	$attrswide = $attrs;
	$attrswide['article']['class'] = [html::Cols(12,12,[1=>10],[1=>10])];
	$attrswide['content']['class'] = 'no-padding';
	$attrswide['div']['class'] = ['jarviswidget'];
	$t['left'][1] = ['icon'=>'edit fa-lg','name'=>'id','id'=>'EditAccount'];

	$ROW = [];
	foreach($Targets as $T){
		$created = $closed = [];
		for($i=time();$i>=(time()-(30*24*60*60));$i-=(60*60*24)){
			$D = date('Y-m-d',$i);
			$created[$D] = $closed[$D] = 0;
		}
		$db = strtolower($T);
		$T = ucfirst($db);
		$f = ['id','username','password','first'=>'name','last','created','status','updated'];
		$Q = $DB->GET('ZAP.'.$db.'.accounts',['status__>='=>0,'ORDER'=>['id'=>'DESC']],$f,25000);
		if(!empty($Q)){
			$Q = isset($Q['id'])?[$Q['id']=>$Q]:$Q;
			foreach($Q as $i=>$q){
				$Q[$i]['name'] = $q['last'].', '.$q['name'];
				$D = date('Y-m-d',strtotime($q['created']));
				if(isset($created[$D]))
					$created[$D]++;
				if($q['status']==0){
					$D = date('Y-m-d',strtotime($q['updated']));
					if(isset($closed[$D])){
						$closed[$D]++;
					}
					unset($Q[$i]);
				}else{
					unset($Q[$i]['last']);
					unset($Q[$i]['status']);
					unset($Q[$i]['updated']);
				}
			}
		}
		$TBL = new TBL();
		$count = $DB->GET('ZAP.'.$db.'.accounts',['status__>'=>0],['COUNT(*)'=>'rows'],1)['rows'];
		$TBL = $TBL->Make($Q,$t,false,'table table-striped table-bordered table-hover dataTable no-footer',$T.'Seeds');
		$_ = [];
		$attrs['article']['class'] = [html::Cols(12,6,7,8)];
		$_[] = html::MakeWidget($T.'Seeds','@'.$T.'.com - Accounts - '.number_format($count),$TBL,$attrs);

		$f = ['id','id'=>'action_id','seed_id','action','date'];
		$Q = $DB->GET('ZAP.'.$db.'.actions',['id__>='=>0,'ORDER'=>['id'=>'DESC']],$f,1000);
		$Q = empty($Q)?[['Oops'=>'No Results!']]:$Q;
		$TBL = new TBL();
		$TBL = $TBL->Make($Q,false,false,'table table-striped table-bordered table-hover dataTable no-footer',$T.'SeedActions');
		
		$attrs['article']['class'] = [html::Cols(12,6,5,4)];
		$_[] = html::MakeWidget($T.'Seeds','@'.$T.'.com - Seed Actions',$TBL,$attrs);

		$json = [];
		foreach($created as $date=>$count)
			$json[] = ['period'=>$date,'created'=>$count,'lost'=>$closed[$date]];
		$json = json_encode($json);
		$CHART = '<div id="'.$T.'chart" class="chart no-padding no-margin" style="height:240px;"></div>';
		$CHART .= html::JS("if ($('#{$T}chart').length){ var {$T}_data = {$json};Morris.Line({element: '{$T}chart',data: {$T}_data,xkey: 'period',ykeys: ['created', 'lost'],labels: ['Created', 'Closed']});}");
		$_[] = html::MakeWidget($T.'SeedsStats','@'.$T.'.com - Recent Activity',$CHART,$attrswide);
		$_[] = html::JS("$('table#".$T."Seeds').DataTable({'info': false,'lengthChange': false});");
		$_[] = html::JS("$('table#".$T."SeedActions').DataTable({'info': false,'lengthChange': false});");
		$_ = implode(EOL,$_);
		$ROW[] = html::elmt('div','row '.html::Cols(12),$_);
	}
	$ROWS = implode(EOL,$ROW);
	return $ROWS;
}
?>