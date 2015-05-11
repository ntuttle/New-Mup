<?php
# Start the Page
require_once '../../_/core.php';
$X = new X();
/*
setcookie('mup_dash_1_title','Seed Stats',time()+(86400*365));
setcookie('mup_dash_1_size','12.6.4.4',time()+(86400*365));
setcookie('mup_dash_1_url','/pages/seeds/modules/chart.zap.seed_accounts.php?esp=aol',time()+(86400*365));

setcookie('mup_dash_2_title','Seed Stats',time()+(86400*365));
setcookie('mup_dash_2_size','12.6.4.4',time()+(86400*365));
setcookie('mup_dash_2_url','/pages/seeds/modules/chart.zap.seed_accounts.php?esp=yahoo',time()+(86400*365));
*/
$_ = [];


foreach($_COOKIE as $k=>$v){
	if(preg_match('/^mup_dash_([0-9]+)_(.*)$/',$k,$x))
		$MODS[$x[1]][$x[2]] = $v;
}
if(!empty($MODS))
	foreach($MODS as $ID=>$MOD){

		$_id 		= 'Dash'.$ID;
		$_title 	= @$MOD['title'];
		list($xs,$sm,$md,$lg) = explode('.',@$MOD['size']);
		$_width 	= html::Cols($xs,$sm,$md,$lg);
		$_content 	= html::pageLoad(@$MOD['url'],$_id);
		$_[]  = html::MakeWidget(@$_id, $_content, $_title, $_width);
	}

# Print Widgets
$_ = html::elmt('section',['id'=>'widget-grid'],$_);
echo $_;
?>