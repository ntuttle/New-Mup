<?php
if(!defined('DIR')){
	define('DIR',$_SERVER['DOCUMENT_ROOT']);
}
require_once DIR.'/_/conf.php';
require_once DIR.'/_/sql.php';
require_once DIR.'/_/frame.php';
require_once DIR.'/_/table.php';
require_once DIR.'/_/form.php';


class X {

	var $DB;
	var $User;

	public function __construct()
		{
			$this->DB_Connect();
			$this->CheckUser();
			$this->MakeResponse();
		}
	public function DB_Connect()
		{
			$DB = new DB('MASTER',MASTER,USER,PASS);
			if(empty($DB))
				$this->Quit('No Database Connection Available!');
			$DB->C('ZAP',ZAP,ZAP_USER,ZAP_PASS);
			$DB->C('SEEDS',SEEDS,USER,PASS);
			$DB->C('LOGS',LOGS,USER,PASS);
			$DB->C('ACTIONS',ACTIONS,USER,PASS);
			$this->DB = $DB;
		}
	public function Quit($msg)
		{
			$_[] = '<span class="alert alert-danger">'.$msg.'</span>';
			$_ = implode(EOL,$_);
			exit($_);
		}
	public function CreateUserDir($id)
		{
			$UserDir = DIR.'/data/users/'.$id.'/';
			if(!file_exists($UserDir)){
				mkdir($UserDir);
			}
			if(!file_exists($UserDir.'_profile/')){
				mkdir($UserDir.'_profile/');
			}
			if(!file_exists($UserDir.'_profile/default.jpg') && !file_exists($UserDir.'_profile/default.png')){
				copy(DIR.'/data/users/0/default.png',$UserDir.'_profile/default.png');
			}
		}
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
					echo html::Head('Invalid Login Attempt');
					echo $this->Login();
					exit();
				}
			}elseif(empty($_COOKIE['mup_user_name']) || empty($_COOKIE['mup_user']) || empty($_COOKIE['mup_user_id']) || empty($_COOKIE['mup_user_phone'])){
				echo html::Head('Login');
				echo $this->Login();
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
				echo $this->Login();
				exit();
			}
			return true;
		}
	public function Login()
		{
			$F = new FORMS('Login','User Login',html::Cols([2=>8],[3=>6],[4=>4],[4=>4]));
			$F->Text('u',['username'=>false],false,html::Cols(12));
			$F->Text('p',['password'=>false],false,html::Cols(12));
			$F->Submit('Submit','Submit','btn btn-primary '.html::Cols(2).' pull-right');
			$F = $F->PrintForm();
			$F = '<div class="row"><br><br><br>'.$F.'</div>';
			return $F;
		}
	public function MakeResponse()
		{
			if(!empty($_REQUEST['AJAX'])){
				return $this->$_REQUEST['AJAX']();
			}else{
				
			}
		}
	public function User_Notify()
		{
			$_[] = '<ul class="notification-body">';
			$_[] = '<li>';
				$_[] = '<span class="padding-10 unread">';
					$_[] = '<em class="badge padding-5 no-border-radius bg-color-blueLight pull-left margin-right-5"><i class="fa fa-user fa-fw fa-2x"></i></em>';
					$_[] = '<span>2 new users just signed up! <span class="text-primary">martin.luther</span> and <span class="text-primary">kevin.reliey</span>
						 <br>
						 <span class="pull-right font-xs text-muted"><i>1 min ago...</i></span>
					</span>';
				$_[] = '</span>';
			$_[] = '</li>';

			$_[] = '<li>
					<span class="padding-10 unread">
						<em class="badge padding-5 no-border-radius bg-color-purple txt-color-white pull-left margin-right-5">
							<i class="fa fa-calendar fa-fw fa-2x"></i>
						</em>
						<span>
							 <a href="javascript:void(0);" class="display-normal"><strong>Calendar</strong></a>: Sadi Orlaf invites you to lunch! 
							 <br>
							 <strong>When: 1/3/2014 (1pm - 2pm)</strong><br>
							 <span class="pull-right font-xs text-muted"><i>3 hrs ago...</i></span>
						</span>
						
					</span>
				</li>	
				<li>
					<span class="padding-10">

						<em class="badge padding-5 no-border-radius bg-color-blueLight txt-color-white pull-left margin-right-5">
							<i class="fa fa-user fa-fw fa-2x"></i>
						</em>
						
						<span>
							 <a href="javascript:void(0);" class="display-normal">Sofia</a> as contact? &nbsp;
							 <button class="btn btn-xs btn-primary margin-top-5">accept</button>
							 <button class="btn btn-xs btn-danger margin-top-5">reject</button>
							 <span class="pull-right font-xs text-muted"><i>3 hrs ago...</i></span>
						</span>
						
					</span>
				</li>	
				<li>
					<span class="padding-10">

						<em class="badge padding-5 no-border-radius bg-color-blue pull-left margin-right-5">
							<i class="fa fa-facebook fa-fw fa-2x"></i>
						</em>
						
						<span>
							 Facebook recived +33 unique likes
							 <br>
							 <span class="pull-right font-xs text-muted"><i>4 hrs ago...</i></span>
						</span>
						
					</span>
				</li>
				<li>
					<span class="padding-10">

						<em class="badge padding-5 no-border-radius bg-color-green pull-left margin-right-5">
							<i class="fa fa-check fa-fw fa-2x"></i>
						</em>
						
						<span>
							 2 projects were completed on time! Submitted for your approval - <a href="javascript:void(0);" class="display-normal">Click here</a>
							 <br>
							 <span class="pull-right font-xs text-muted"><i>1 day ago...</i></span>
						</span>
						
					</span>
				</li>
				<li>
					<span class="padding-10">

						<em class="badge padding-5 no-border-radius bg-color-greenLight pull-left margin-right-5">
							<i class="fa fa-lock fa-fw fa-2x"></i>
						</em>
						
						<span>
							 Your password was recently updated. Please complete your security questions from your profile page.
							 <br>
							 <span class="pull-right font-xs text-muted"><i>2 weeks ago...</i></span>
						</span>
						
					</span>
				</li>
			</ul>';
			
			$_ = implode(EOL,$_);
			return $_;
		}
}

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