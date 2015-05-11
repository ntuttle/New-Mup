<?php
if(!defined('DIR'))
	define('DIR',$_SERVER['DOCUMENT_ROOT']);
require_once DIR.'/_/conf.php';
require_once DIR.'/_/sql.php';
require_once DIR.'/_/frame.php';
require_once DIR.'/_/table.php';
require_once DIR.'/_/form.php';
require_once DIR.'/sa/lib/config.php';

/**
 * X - Core Builder Class
 * --------------------------------------------------
 **/
class X {

	var $DB;
	var $User;

	public function __construct()
		{
			$this->DB_Connect();
			$this->CheckUser();
		}
	/**
	 * DB_Connect ( void )
	 * --------------------------------------------------
	 * connect to the databases needed to run the pages
	 * --------------------------------------------------
	 **/
	public function DB_Connect()
		{
			$DB = new DB('MASTER',MASTER,USER,PASS);
			if(empty($DB))
				$this->Quit('No Database Connection Available!');
			$DB->C('ZAP',ZAP,ZAP_USER,ZAP_PASS);
			$DB->C('EMAILS',EMAILS,USER,PASS);
			$DB->C('LOGS',LOGS,USER,PASS);
			$DB->C('ACTIONS',ACTIONS,USER,PASS);
			$this->DB = $DB;
		}
	/**
	 * Quit ( $msg )
	 * --------------------------------------------------
	 * Stop the script nicely with a message
	 * --------------------------------------------------
	 * @param string $msg Message to display
	 * --------------------------------------------------
	 **/
	public function Quit($msg)
		{
			$_[] = '<span class="alert alert-danger">'.$msg.'</span>';
			$_ = implode(EOL,$_);
			exit($_);
		}
	/**
	 * CreateUserDir( $id )
	 * --------------------------------------------------
	 * Checks that the user directory exists for docs and 
	 * profile settings
	 * --------------------------------------------------
	 * @param int $id the user id
	 * --------------------------------------------------
	 **/
	public function CreateUserDir($id)
		{
			$UserDir = DIR.'/data/users/'.$id.'/';
			if(!file_exists($UserDir))
				mkdir($UserDir);
			if(!file_exists($UserDir.'_profile/'))
				mkdir($UserDir.'_profile/');
			if(!file_exists($UserDir.'_profile/default.jpg') && !file_exists($UserDir.'_profile/default.png'))
				copy(DIR.'/data/users/0/default.png',$UserDir.'_profile/default.png');
		}
	/**
	 * CheckUser( void )
	 * --------------------------------------------------
	 * check that the user is logged in or that a login
	 * request is valid, otherwise stop script and display
	 * the login page to the use
	 * --------------------------------------------------
	 **/
	public function CheckUser()
		{
			if(!empty($_REQUEST['u']) && !empty($_REQUEST['p'])){
				$Q = $this->DB->GET('MASTER.team.users',['username'=>$_REQUEST['u'],'password'=>md5($_REQUEST['p'])],'*',1);
				if(!empty($Q)){
					foreach($Q as $i=>$q){
						setcookie('mup_user',$q['username'],time()+86400);
						setcookie('mup_user_id',$i,time()+86400);
						setcookie('mup_user_name',$q['name'],time()+86400);
						setcookie('mup_user_phone',$q['phone'],time()+86400);
						$_COOKIE['mup_user'] = $q['username'];
						$_COOKIE['mup_user_id'] = $i;
						$_COOKIE['mup_user_name'] = $q['name'];
						$_COOKIE['mup_user_phone'] = $q['phone'];
						$this->CreateUserDir($i);
					}
				}else{
					echo html::Head('Login');
					echo $this->Login('Invalid Login Attempt');
					exit();
				}
			}elseif(empty($_COOKIE['mup_user_name']) || empty($_COOKIE['mup_user']) || empty($_COOKIE['mup_user_id']) || empty($_COOKIE['mup_user_phone'])){
				echo html::Head('Login');
				echo $this->Login('Please log in!','warning');
				exit();
			}else{
				$W['id'] = $_COOKIE['mup_user_id'];
				$W['username'] = $_COOKIE['mup_user'];
				$Q = $this->DB->GET('MASTER.team.users',$W,'*',1);
				if(!empty($Q)){
					$this->User = $Q;
					return true;
				}
				setcookie('mup_user_phone',false,time()-3600);
				setcookie('mup_user',false,time()-3600);
				setcookie('mup_user_id',false,time()-3600);
				setcookie('mup_user_name',false,time()-3600);
				echo html::Head('Login');
				echo $this->Login('<strong>Wait! Who are you?</strong> Please log in again...','danger');
				exit();
			}
			return true;
		}	
	/**
	 * Login ( $MSG, $msg_type )
	 * --------------------------------------------------
	 * prints the page for the user to login
	 * --------------------------------------------------
	 * @param string $MSG msg to display if any
	 * @param string $msg_type class of message
	 * --------------------------------------------------
	 **/
	public function Login($MSG=false,$msg_type='danger')
		{
			# Set some variables
			$_id 		= 'Login';
			$_title 	= 'User Login';
			$_width 	= html::Cols([1=>10],[2=>8],[3=>6],[4=>4]);
			$_tools  	= false;
			$_args 		= ['article'=>['style'=>'margin-top:100px;']];
			$F = new FORMS($_id);
			if($MSG)
				$F->Write(html::alert($msg_type,$MSG));
			$F->Write('<div class="row">');
			$F->Text('u',['username'=>false],false);
			$F->Text('p',['password'=>false],false);
			$F->Write('</div>');
			$F->Write('<footer>');
			$F->Submit('login','LOGIN','btn btn-warning btn-xs font-xs pull-right');
			$F->Write('</footer>');
			$LoginForm = html::elmt('div','row',$F->PrintForm());
			$WIDGET     = html::MakeWidget($_id, $LoginForm, $_title, $_width, $_tools, $_args);
			$_ = html::MakeHTML($WIDGET,'Login','minified');
			return $_;
		}	
	/**
	 * parseIPs ( $IPs )
	 * --------------------------------------------------
	 * parse ips string into ips array
	 * --------------------------------------------------
	 * @param string $IPs string of ips serperated by " ", "\t" or "\n"
	 * --------------------------------------------------
	 **/
	static function parseIPs($IPs)
		{
			$_IPs = [];
			if(!empty($IPs)){
				$IPs = str_ireplace([" ","\t","\r\n","\n"],',',$IPs);
				$IPs = explode(',',$IPs);
				foreach($IPs as $IP){
					$IP = trim($IP);
					if(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})$/',$IP,$x)){
						$_IPs[] = ip2long($x[1]);
					}elseif(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)([0-9]{1,3})\-([0-9]{1,3})$/',$IP,$x)){
						for($i=$x[2];$i<=$x[3];$i++)
							$_IPs[] = ip2long($x[1].$i);
					}elseif(preg_match('/^([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})\-([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})$/',$IP,$x)){
						$start = ip2long($x[1]);
						$end = ip2long($x[2]);
						for($i=$start;$i<=$end;$i++)
							$_IPs[] = ip2long($i);
					}elseif(is_numeric($IP))
						$_IPs[] = $IP;
				}
			}
			return $_IPs;
		}
	/**
	 * getTargets ( $domains )
	 * --------------------------------------------------
	 * get targets or domains array
	 * --------------------------------------------------
	 * @param boolean $domains return domains or not
	 * --------------------------------------------------
	 **/
	public function getTargets($domains=false)
		{
			$ESPs = new ESPs($this->DB);
			if($domains)
				return $ESPs->Tgets_Doms;
			return $ESPs->Tgets;
		}
}
/**
 * ESPs
 * --------------------------------------------------
 * Used by @see self::getTargets()
 * --------------------------------------------------
 **/
class ESPs {

	var $ESP;
	var $Doms;
	var $Tgets;
	var $Tgets_Doms;

	public function __construct($DB,$ESP = false)
		{
			$this->DB = $DB;
			$this->ESP = $ESP;
			$this->GetTargets();
			$this->GetTargetDomains();
			$this->GetDomainTargets();
		}

	/**
	 * Target Domain Functions
	 * --------------------------------------------------
	 **/
	public function GetTargets()
		{
			$W = ['active__>='=>0];
			if(!empty($this->ESP))
				$W['target'] = $this->ESP;
			$Q = $this->DB->GET('MASTER.domains.targets',$W,'*',1000);
			$Q = isset($Q['target'])?[$Q]:$Q;
			$this->Tgets = $Q;
		}
	public function GetTargetDomains()
		{
			$_ = [];
			$__ = [];
			if(!empty($this->Tgets))
				foreach($this->Tgets as $T){
					$_[$T['target']][$T['domain']] = $T['domain'];
					$__[$T['domain']] = $T['domain'];
				}
			$this->Tgets_Doms = $_;
			$this->Doms = $__;
		}
	public function GetDomainTargets()
		{
			$_ = [];
			if(!empty($this->Tgets))
				foreach($this->Tgets as $T)
					$_[$T['target']] = $T['target'];
			$this->Tgets = $_;
		}
}
?>