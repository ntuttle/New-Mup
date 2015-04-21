<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


if(isset($_REQUEST['domain_search'])){

	/**
	 * Check for arguments
	 * -----
	 **/
	$DATA = array_map('mysql_real_escape_string',$_REQUEST);
	$DOMAIN = urldecode($DATA['domain_search']);
	$EXPIRED = urldecode($DATA['expired']);
	$EXPIRED = ($EXPIRED=='on')?"AND `expires` > NOW() ":false;
	$UNUSED = urldecode($DATA['unused']);
	$UNUSED = ($UNUSED=='on')?false:"AND `status` > 0 ";

	/**
	 * retrieve Account details from database
	 * --------------------------------------------------
	 **/
	$HDT = 'MASTER.domains.domains';
	$QUERY = "SELECT * FROM `domains`.`domains` 
	WHERE `domain` LIKE '%{$DOMAIN}%'
	{$UNUSED}
	{$EXPIRED}
	ORDER BY `domain` ASC 
	LIMIT 1000;";
	$D = $X->DB->Q($HDT,$QUERY);


	$class = ['alert','alert-info','no-margin','txt-color-white'];
	foreach($D as $i=>$d){

		// Set Domain Variables
		$DOMAIN = $d['domain'];
		$EXP 	= $d['expires'];
		$DATE 	= $d['created'];
		$ID 	= $pops[] = str_ireplace('.','_',$d['domain']);
		$RegIDs[$d['registrar']] = $d['registrar'];

		// Set Domain Color
		$clr = 'info';
		if(strtotime($EXP) < time())
			$clr = 'danger';
		elseif(strtotime($EXP) < time()+(86400*30))
			$clr = 'warning';
		$class[1] = 'alert-'.$clr;
		$URL 	= 'pages/domains/modules/form.edit_domain.php?domain='.$DOMAIN;
		$BTN 	= html::ModalBtn($URL,$ID,'Edit',false,'btn btn-default btn-xs');
		$INFO 	= html::elmt('p','font-xs',$DATE.' / '.$EXP);
		$DOM = html::elmt('h6','no-margin font-sm',strtoupper($DOMAIN));
		$DomBox = html::elmt('div',implode(' ',$class),$DOM.$INFO);
		$DOMS[] = html::elmt('div',['class'=>['no-padding',html::Cols(12,12,6)]],$DomBox);
	}
	$D = implode(EOL,$DOMS);





	$RegIDs = implode(', ',$RegIDs);
	$QUERY = "SELECT * FROM `domains`.`registrars` 
	WHERE `id` IN ({$RegIDs}) 
	OR `username` LIKE '%{$DOMAIN}%'
	OR `id` = '{$DOMAIN}'
	ORDER BY `id` ASC 
	LIMIT 1000;";
	$R = $X->DB->Q($HDT,$QUERY);

	foreach($R as $i=>$r){
		$REG = [html::elmt('b',false,$r['type'])];
		$info = [];
		$info[] = html::elmt('b',false,'Username: ').$r['username'].'<br>';
		$info[] = html::elmt('b',false,'Password: ').$r['password'].'<br>';
		$info[] = html::elmt('b',false,'Phone: ').$r['phone'].'<br>';
		$info[] = html::elmt('b',false,'Email: ').$r['email'];
		$REG[] = html::elmt('p','note',$info);
		$REGS[] = html::elmt('div','alert alert-warning no-margin '.html::Cols(12),$REG);
	}
	$R = implode(EOL,$REGS);
	$div['style'] = 'height:310px;overflow-y:scroll';
	$c = 'no-padding custom-scroll table-responsive ';
	$div['class'] = $c.html::Cols(8);
	$_P1 = html::elmt('div',$div,$D);

	$div['class'] = $c.html::Cols(4);
	$_P2 = html::elmt('div',$div,$R);


	$_ = $_P1.$_P2;



}else{
	$icon = html::elmt('i','fa fa-warning fa-lg text-warning',true);
	$_ = html::elmt('h3','alert alert-warning '.html::Cols(12,[1=>10],[2=>8],[2=>8]),$icon.' Please search for a domain above to start...');
	$_ = html::elmt('div',['style'=>'height:310px;overflow-y:scroll;padding:120px;'],$_);
}

/**
 * Print Search Results
 * -------------------------
 **/
$div = ['id'=>'DomainSearchResults','class'=>'row '.html::Cols(12)];
$_ = html::elmt('div',$div,$_);

html::PrintOut($_);
?>