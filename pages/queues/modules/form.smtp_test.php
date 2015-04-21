<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();


class SMTP_Test {

	var $ESP;
	var $IP;
	var $FROM;
	var $EHLO;
	var $TO;
	var $DATA;

	var $ALERTS;
	var $BadConnectLimit 	= 5;
	var $BadConnects 		= 0;
	var $RCPT_counter 		= 0;

	public function __construct($argv){
		if($this->GetVars($argv)){
			for($i=0;$i<count($this->RCPTs);$i++){
				$this->BadConnects = 0;
				$this->SendTest();
			}
		}
	}
	/**
	 * SendTest
	 * -------------------------
	 **/
	public function SendTest(){
		if($this->SMTPConnect()){
			if($this->SayHi()){
				if($this->AuthLogin()){
					if($this->MailFrom()){
						if($this->ListRCPT()){
							if($this->SendEmail()){

							}
						}
					}
				}
			}
		}
	}
	/**
	 * AuthLogin
	 * -----------------------------------
	 **/
	public function AuthLogin(){
		if(!empty($this->USER) && !empty($this->PASS)){
			$CMD = "AUTH LOGIN".EOL;
			$this->CONV[] = "<span style=\"color:#47A8ED\">".$CMD."</span>";
			fputs($this->SOCK, $CMD);
			$this->CONV[] = $OUT = fread($this->SOCK, 1024);
			if (strstr($OUT, '334 VXNlcm5hbWU6')){
				$CMD = base64_encode($this->USER).EOL;
				$this->CONV[] = "<span style=\"color:#47A8ED\">".$CMD."</span>";
				fputs($this->SOCK, $CMD);
				$this->CONV[] = $OUT = fread($this->SOCK, 1024);
				if (strstr($OUT, '334 UGFzc3dvcmQ6')){
					$CMD = base64_encode($this->PASS).EOL;
					$this->CONV[] = "<span style=\"color:#47A8ED\">".$CMD."</span>";
					fputs($this->SOCK, $CMD);
					$OUT = fread($this->SOCK, 1024);
					if (strstr($OUT, '235')){
						$this->CONV[] = $OUT;
						return true;
					}else{
						$this->CONV[] = "<span style=\"color:red\">".$OUT."</span>";
						$this->ALERTS[] = FAIL.'Bad AUTH password'.EOL;
					}
				}else{
					$this->CONV[] = "<span style=\"color:red\">".$OUT."</span>";
					$this->ALERTS[] = FAIL.'Bad AUTH username'.EOL;
				}
			}else{
				$this->CONV[] = "<span style=\"color:red\">".$OUT."</span>";
				$this->ALERTS[] = FAIL.'Bad AUTH LOGIN'.EOL;
			}
			return false;
		}
		return true;
	}
	/**
	 * SendEmail
	 * -----------------------------------
	 **/
	public function SendEmail(){
		$CMD = "DATA".EOL;
		$this->CONV[] = "<span style=\"color:#47A8ED\">".$CMD."</span>";
		$START = microtime(true);
		fputs($this->SOCK, $CMD);
		$OUT = fread($this->SOCK, 1024);
		$END = microtime(true);
		$this->CONV[] = $OUT.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
		if (strstr($OUT, '354')){
			$this->ALERTS[] = PASS.'DATA'.EOL;
			$DATA = str_ireplace('[*to]',$this->TO,$this->DATA);
			$CMD = $DATA.EOL.EOL.'.'.EOL;
			$this->CONV[] = "<span style=\"color:#47A8ED\">".htmlspecialchars($CMD)."</span>";
			$START = microtime(true);
			fputs($this->SOCK,$CMD);
			$OUT = fread($this->SOCK, 1024);
			$END = microtime(true);
			if(strstr($OUT,'250')){
				$this->CONV[] = $OUT.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
				$this->RCPT_counter++;
				return true;
			}else{
				$this->CONV[] = red.$OUT.white.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
				$this->BadConnects++;
				$this->SendTest();

			}
		}
		$this->ALERTS[] = FAIL.'Bad DATA cmd'.EOL;
		return false;
	}
	/**
	 * ListRCPT
	 * -----------------------------------
	 **/
	public function ListRCPT(){
		if($this->RCPT_counter<count($this->RCPTs)){
			$this->TO = $this->RCPTs[$this->RCPT_counter];
			$CMD = "RCPT TO:<".$this->TO.">".EOL;
			$this->CONV[] = "<span style=\"color:#47A8ED\">".htmlspecialchars($CMD)."</span>";
			$START = microtime(true);
			fputs($this->SOCK, $CMD);
			$OUT = fread($this->SOCK, 1024);
			$END = microtime(true);
			if (strstr($OUT, '250')){
				$this->CONV[] = $OUT.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
				return true;
			}
		}
		$this->CONV[] = red.$OUT.white.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
		$this->ALERTS[] = FAIL.'Bad RCPT TO'.EOL;
		return false;

	}
	/**
	 * MailFrom
	 * -----------------------------------
	 **/
	public function MailFrom(){
		$CMD = "MAIL FROM:<".$this->FROM.">".EOL;
		$this->CONV[] = "<span style=\"color:#47A8ED\">".htmlspecialchars($CMD)."</span>";
		$START = microtime(true);
		fputs($this->SOCK,$CMD);
		$OUT = fread($this->SOCK, 1024);
		$END = microtime(true);
		if (strstr($OUT, '250')){
			$this->CONV[] = $OUT.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
			return true;
		}
		$this->CONV[] = red.$OUT.white.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
		$this->ALERTS[] = FAIL.'Bad MAIL FROM'.EOL;
		return false;
	}
	/**
	 * SayHi
	 * -----------------------------------
	 **/
	public function SayHi(){
		$CMD = "EHLO ".$this->EHLO.EOL;
		$this->CONV[] = "<span style=\"color:#47A8ED\">".htmlspecialchars($CMD)."</span>";
		$START = microtime(true);
		fputs($this->SOCK, $CMD);
		$OUT = fread($this->SOCK, 1024);
		$END = microtime(true);
		if (strstr($OUT, '250')){
			$this->CONV[] = $OUT.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
			return true;
		}
		$this->CONV[] = red.$OUT.white.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
		$this->ALERTS[] = FAIL.'Bad EHLO'.EOL;
		return false;
	}
	/**
	 * SMTPConnect
	 * -----------------------------------
	 **/
	public function SMTPConnect(){
		$this->TO = $this->RCPTs[$this->RCPT_counter];
		list($USER,$ESP) = explode('@',$this->TO);
		$this->MX = $this->ESP_list[$ESP];

		if($this->BadConnects>=$this->BadConnectLimit){
			$this->ALERTS[] = 'Too many bad connections!';
			return false;
		}

		$this->CONV[] = "<span style=\"color:#47A8ED\">NEW CONNECTION</span>";
		$START = microtime(true);
		$X = stream_context_create(array('socket' => array('bindto' => $this->IP.':0')));
		$this->SOCK     = stream_socket_client($this->MX.':25', $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $X);
		if ($this->SOCK !== false) {
			$OUT = fread($this->SOCK, 1024);
			$END = microtime(true);
			if (strstr($OUT, '220')) {
				$this->CONV[] = $OUT.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
				return true;
			}
			$this->CONV[] = red.$OUT.white.'<span style="color:black;font-size:10px;text-decoration:underline;"> ~ '.($END-$START)."</span>";
			$this->ALERTS[] = FAIL.'Bad Connection'.EOL;
			$this->BadConnects++;
			return $this->SMTPConnect();
		}
		$this->ALERTS[] = 'Failed to create stream...';
		return false;
	}


	/**
	 * GetVar
	 * -----------------------------------
	 **/
	public function GetVar($K,$V){
		$N = strtoupper($K);
		if(!empty($V) || (in_array($N,['EHLO','USER','PASS','HOST']))){
			$this->$N  = $this->FormatVar($V,$N);
			return true;
		}
		$this->ALERTS[] = 'Empty '.$N.'!';
	}
	/**
	 * FormatVar
	 * -----------------------------------
	 **/
	public function FormatVar($V,$N){
		if($N == 'HOST'){
			if(preg_match('/([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})/',$V)){
				$this->MX = $V;
			}else{
				getmxrr($V, $MX);
				if (empty($this->MX) && !empty($MX)) {
					$MXHOST   = $MX[array_rand($MX)];
					$this->MX = gethostbyname($MXHOST);
				}
			}
		}
		if($N == 'TO'){
			$this->RCPTs = explode("\r\n",$V);
			foreach($this->RCPTs as $RCPT){
				list($USER,$ESP) = explode('@',$RCPT);
				if(!isset($this->ESP_list[$ESP])){
					getmxrr($ESP, $MX);
					if(!empty($MX)){
						$MXHOST   = $MX[array_rand($MX)];
						$this->MX = gethostbyname($MXHOST);
						$this->ESP = $ESP;
						$this->ESP_list[$ESP] = $this->MX;
					}
				}
			}
			return $this->RCPTs[0];
		}
		if($N == 'IP'){
			return is_numeric($V)?long2ip($V):$V;
		}
		return $V;
	}
	/**
	 * GetVars
	 * -----------------------------------
	 **/
	public function GetVars($X){
		foreach($X as $k=>$v)
			$this->GetVar($k,$v);
		if(!empty($X['ehlo']))
			$this->EHLO = $X['ehlo'];
		else{
			$rdns = shell_exec('host '.$this->IP);
			if(preg_match('/domain name pointer (.*)\./',$rdns,$domain))
				$this->EHLO = $domain[1];
			else{
				$this->ALERTS[] = 'No rDNS for '.$this->IP;
				return false;
			}
		}
		if(empty($this->ALERTS) && !empty($this->FROM) && !empty($this->IP) && !empty($this->EHLO) && !empty($this->TO) && !empty($this->ESP)){
			return true;
		}
		$this->ALERTS[] = 'Missing Parameters!';
		return false;
	}
	/**
	 * Form
	 * -----------------------------------
	 **/
	public function Form(){
		//echo $this->Head('SMTP Test');
		$F = new FORMS('SMTPTest');
		
		$F->Write('<div class="row margin-top-10">');
		$F->Text('host',['host'=>false],false,'col-xs-4');
		$F->Text('user',['user'=>false],false,'col-xs-4');
		$F->Text('pass',['pass'=>false],false,'col-xs-4');
		$F->Write('</div>');

		$F->Write('<div class="row">');
		$F->Text('ip',['ip address'=>false],false,'col-xs-4');
		$F->Text('ehlo',['ehlo'=>false],false,'col-xs-6');
		$I = html::elmt('i','fa fa-question-circle fa-lg',true);
		$MSG = html::elmt('h6','txt-color-teal',$I);
		$MSG = html::elmt('div',html::Cols(2),$MSG);
		$F->Write($MSG);
		$F->Write('</div>');

		$F->Write('<div class="row">');
		$F->Text('from',['from'=>false],false,'col-xs-10');
		$F->Textarea('to',false,false,'col-xs-10',30);
		$F->Text('subject',['subject'=>false],false,'col-xs-12');
		$F->Write('</div>');

		$F->Write('<div class="row">');
		$F->Textarea('data','To: [*to]
From: 
Subject: 
MIME-Version: 1.0
Content-Type: text/plain;
	charset="utf-8"
Content-Transfer-Encoding: 8bit


',false,'col-xs-12',150);
		$F->Write('</div>');

		$F->Write('<footer>');
		$F->Button('Template','Template Body','btn btn-link pull-left');
		$F->Button('Submit','Submit','btn btn-success pull-right');
		$F->Write('</footer>');

		$F->JS("$('input#Template').click(function(){
			var from = $('#from').val();
			var subject = $('#subject').val();
			$('textarea#data').text('To: [*to]\\n\
From: '+from+'\\n\
Subject: '+subject+'\\n\
MIME-Version: 1.0\\n\
Content-Type: text/plain;\\n\
	charset=\"utf-8\"\\n\
Content-Transfer-Encoding: 8bit\\n\
\\n\
\\n\
');
			return false;
		});");
		$F = $F->PrintForm();
		return $F;
		//return '<div class="row">'.$F.'</div>';
	}
	public function Head($TITLE){
		return '<head>
			<title>'.$TITLE.'</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script><style type="text/css"></style>
				<style type="text/css">
					*{margin:0px;padding:0px;font-family:tahoma;}
					pre,form{background:#F5F5F5;margin:15px 0px;border-radius:4px;border:1px solid #CCC;}
					h1{font-size:20px;}
					input[type=text], textarea.form-control{font-size:12px;color:black;}
				</style>
			</head>
			</body>';
	}
}
$SMTP = new SMTP_Test($_REQUEST);

html::PrintOut($SMTP->Form(),'SMTP Test Email');



/*
// For DEBUG

if(!empty($SMTP->CONV)){
	echo '<pre class="col-xs-offset-2 col-xs-8" style="color:grey">'.$SMTP->RCPT_counter.' / '.count($SMTP->RCPTs).'</pre>';
	echo '<h1>SMTP Test Log</h1>';
	echo '<pre class="col-xs-offset-2 col-xs-8" style="color:grey">'.implode("\n",$SMTP->CONV).'</pre>';
	echo '<h1>SMTP Test Object</h1>';
	echo '<pre class="col-xs-offset-2 col-xs-8" style="color:grey">'.print_r($SMTP,true).'</pre>';
}
*/
?>