<?php

class html {

	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function CSS_Styles()
		{
			$CSS['*']['margin'] 									= '0px';
			$CSS['*']['padding'] 									= '0px';
			$CSS['h1#logo']['.highlight']['display'] 				= 'inline-block';
			$CSS['h1#logo']['.highlight']['margin-top'] 			= '-8px';
			$CSS['img#logo']['height'] 								= '44px';
			$CSS['img#logo']['margin'] 								= '2px';
			$CSS['img#logo']['width'] 								= '110px';
			$CSS['span#logo']['margin'] 							= '0px';
			$CSS['span#logo']['padding'] 							= '0px 4px';
		    $CSS['h1#logo']['.highlight']['-moz-transform'] 		= 'rotate(-5deg)';
		    $CSS['h1#logo']['.highlight']['-ms-transform'] 			= 'rotate(-5deg)';
		    $CSS['h1#logo']['.highlight']['-o-transform'] 			= 'rotate(-5deg)';
		    $CSS['h1#logo']['.highlight']['-webkit-transform'] 		= 'rotate(-5deg)';
		    $CSS['h1#logo']['.highlight']['color'] 					= '#FB3C4A';
		    $CSS['h1#logo']['.highlight']['font-family']			= "'Covered By Your Grace', cursive";
		    $CSS['h1#logo']['.highlight']['font-size'] 				= '28px';
		    $CSS['h1#logo']['.highlight']['padding'] 				= '2px 5px 5px';
		    $CSS['h1#logo']['.highlight']['text-shadow']			= '-1px 1px 2px black';
		    $CSS['h1#logo']['.highlight']['vertical-align'] 		= 'top';
	   		$CSS['h1#logo']['.plain']['margin-left'] 				= '-20px';
	   		$CSS['div#logo-group']['span#activity']['background'] 	= 'none !important';
	   		$CSS['div#logo-group']['span#activity']['border'] 		= 'none !important';
    		$CSS['div#content']['div.row']['margin'] 				= '0px';
    		$CSS['div#content']['div.row']['padding'] 				= '0px';
    		$CSS['div#ribbon']['box-shadow'] 						= '0px 1px 3px grey';
    		$CSS['div.page-footer']['height'] 						= '30px';
    		$CSS['div.page-footer']['padding-top'] 					= '5px';
    		$CSS['div.superbox-list']['margin-right'] 				= '-5px';
    		$CSS['form.form-control']['label.input']['margin']   	= '10px';
    		$CSS['form.form-control']['label.input']['margin']   	= '10px';
    		$CSS['h1#logo']['.plain']['-moz-transform'] 			= 'rotate(0deg)';
    		$CSS['h1#logo']['.plain']['-ms-transform'] 				= 'rotate(0deg)';
    		$CSS['h1#logo']['.plain']['-o-transform'] 				= 'rotate(0deg)';
    		$CSS['h1#logo']['.plain']['-webkit-transform'] 			= 'rotate(0deg)';
    		$CSS['h1#logo']['.plain']['color'] 						= 'white';
    		$CSS['h1#logo']['.plain']['display'] 					= 'inline-block';
    		$CSS['h1#logo']['.plain']['font-family'] 				= ' \'Lobster\', cursive';
    		$CSS['h1#logo']['.plain']['font-size'] 					= '24px';
    		$CSS['h1#logo']['.plain']['font-weight'] 				= 'normal';
    		$CSS['h1#logo']['.plain']['margin-bottom'] 				= '-10px';
    		$CSS['h1#logo']['.plain']['margin-right'] 				= '-20px';
    		$CSS['h1#logo']['.plain']['margin-top'] 				= '8px';
    		$CSS['h1#logo']['.plain']['text-shadow'] 				= '0px 0px 12px #00AAFF';
    		$CSS['h1#logo']['.plain']['vertical-align'] 			= 'top';
    		$CSS['h1.ajax-loading-animation']['color'] 				= 'grey';
    		$CSS['h1.ajax-loading-animation']['font-size'] 			= '24px';
    		$CSS['h1.ajax-loading-animation']['margin'] 			= '5px';
    		$CSS['h1.ajax-loading-animation']['text-align'] 		= 'center';
    		$CSS['table.table']['tbody']['tr']['td']['font-size'] 	= '10px';
    		$CSS['table.table']['tbody']['tr']['td']['padding'] 	= '2px 5px';
    		$CSS['table.table']['tbody']['tr']['td']['white-space'] = 'nowrap';
    		$CSS['td.toolbar']['a:hover']['cursor']					= 'pointer';
    		$CSS['td.toolbar']['text-align'] 						= 'center';
    		$CSS['ul.dropdown-menu']['min-width']					= '350px;';
    		$CSS['ul.dropdown-menu']['table.table *']['color'] 		= 'black';
    		$CSS['div.modal-content']['margin-top'] 				= '100px';
    		$CSS['div.modal-content']['h1.Loading']['background'] 	= 'none';
    		$CSS['div.modal-content']['h1.Loading']['color'] 		= 'white';
    		$CSS['div.modal-content']['h1.Loading']['font-size'] 	= '36px';
    		$CSS['div.modal-content']['h1.Loading']['float'] 		= 'right';
    		$CSS['div.modal-content']['h1.Loading']['text-align'] 	= 'center';
    		$CSS['div.modal-content']['h1.Loading']['width'] 		= '100%';
    		$CSS['div.modal-content']['h1.Loading']['padding'] 		= '100px 0px';
    		$CSS['div.modal-content']['h1.Loading']['text-shadow'] 	= '0px 0px 2px black';
    		$CSS['div.modal-header']['background'] 					= '#265A88';
    		$CSS['div.modal-header']['color'] 						= 'white';
    		$CSS['div.modal-header']['text-shadow'] 				= '0px 0px 2px black';
    		$CSS['div.modal-header']['button.close']['color'] 		= 'white';
    		$CSS['div.modal-header']['button.close']['opacity'] 	= '1';
    		$CSS['div.modal-backdrop.in']['opacity']  				= '0.75';
    		$CSS['div.modal-dialog']['width'] 						= '80% !important';
    		$CSS['.widget-toolbar']['label.text']['input[type=text]']['height'] = '20px !important';
    		$CSS['.widget-toolbar']['label.text']['input[type=text]']['background'] = '#333333';
    		$CSS['.widget-toolbar']['label.text']['input[type=text]']['color'] = '#cccccc';
    		$CSS['.widget-toolbar']['label.text']['input[type=text]']['border'] = 'none';
    		$CSS['.widget-toolbar']['label.text']['i.icon-append']['top'] = '6px!important';
    		$CSS['.widget-toolbar']['label.text']['i.icon-append']['border-color'] = '#555555';
    		$CSS['.widget-toolbar']['label.text']['i.icon-append:hover']['cursor'] = 'pointer';
    		$CSS['.widget-toolbar']['label.text']['i.icon-append:hover']['color'] = '#ffbb00';
    		$CSS['b.tooltip']['box-shadow'] 						= '0px 0px 5px teal';
    		$CSS['.smart-form']['.btn-xs']['height'] 				= '24px !important';
    		$CSS['.smart-form']['.btn-xs']['line-height'] 			= '14px !important';
    		$CSS['div.alert:hover']['cursor'] 						= 'pointer';
    		$CSS['div.alert.alert-success:hover']['background'] 	= '#AFD19F';
    		$CSS['div.alert.alert-info:hover']['background'] 		= '#C1CDDE';
    		$CSS['div.alert.alert-warning:hover']['background'] 	= '#DECD95';
    		$CSS['div.alert.alert-danger:hover']['background'] 		= '#B85656';
    		$CSS['div[role=content]']['min-height']  				= '100px';
    		$CSS['div.jarviswidget']['div.dt-toolbar']['display'] 	= 'none';
			return $CSS;
		}
	/**
	 * JSLibs
	 * --------------------------------------------------
	 * js libraries to be loaded
	 * --------------------------------------------------
	 **/
	static function JSLibs()
		{
			$JS[] = '/sa/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js';
			$JS[] = '/sa/js/notification/SmartNotification.min.js';
			$JS[] = '/sa/js/smartwidgets/jarvis.widget.min.js';
			$JS[] = '/sa/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js';
			$JS[] = '/sa/js/plugin/sparkline/jquery.sparkline.min.js';
			$JS[] = '/sa/js/plugin/jquery-validate/jquery.validate.min.js';
			$JS[] = '/sa/js/plugin/masked-input/jquery.maskedinput.min.js';
			$JS[] = '/sa/js/plugin/select2/select2.min.js';
			$JS[] = '/sa/js/plugin/bootstrap-slider/bootstrap-slider.min.js';
			$JS[] = '/sa/js/plugin/msie-fix/jquery.mb.browser.min.js';
			$JS[] = '/sa/js/plugin/fastclick/fastclick.min.js';
			$JS[] = '/sa/js/plugin/slimscroll/jquery.slimscroll.min.js';
			$JS[] = '/sa/js/plugin/datatables/jquery.dataTables.min.js';
			$JS[] = '/sa/js/plugin/datatables/dataTables.colVis.min.js';
			$JS[] = '/sa/js/plugin/datatables/dataTables.tableTools.min.js';
			$JS[] = '/sa/js/plugin/datatables/dataTables.bootstrap.min.js';
			$JS[] = '/sa/js/plugin/superbox/superbox.min.js';
			$JS[] = '/sa/js/plugin/morris/morris.min.js';
			$JS[] = '/sa/js/plugin/morris/raphael.min.js';
			$JS[] = '/sa/js/app.min.js';
			return $JS;
		}
	/**
	 * Head ( $title )
	 * --------------------------------------------------
	 * returns the html head of the parent document
	 * --------------------------------------------------
	 * @param string $title Title of the document
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Head($title)
		{
			$_[] = '<head>';
			$_[] = '<title>MEDIA universal | '.$title.'</title>';
			
			/** META tags
			 * ---------------
			 **/ 
			// viewport
				$vp['width']  = 'device-width';
				$vp['height'] = 'device-height';
				$vp['initial-scale'] = '0.5';
				$vp['minimum-scale'] = '0.5';
				$vp['maximum-scale'] = '1.0';
				$vp['user-scalable'] = 'yes';
				$vp['target-densitydpi']= 'device-dpi';
			$_[] = '<meta name="viewport" content="'.http_build_query($vp,'',',').'" />';

			/** CSS styles
			 * ---------------
			 **/ 
			$CSS[] = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css';
			$CSS[] = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css';
			$CSS[] = '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css';
			$CSS[] = '/sa/css/smartadmin.production.css';
			$CSS[] = '/sa/css/smartadmin.skins.css';
			$CSS[] = '/incl/styles/404error.less';
			$CSS[] = 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700';
			foreach($CSS as $css)
				$_[] = html::elmt('link',['rel'=>'stylesheet','href'=>$css])[0];
			$_[] = self::CSS();

			/** JS Libraries
			 * ---------------
			 **/ 
			$JS[] = '//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js';
			$JS[] = '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js';
			$JS[] = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js';
			$JS[] = '//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js';
			$JS[] = '//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.0/less.min.js';
			foreach($JS as $js)
				$_[] = html::JS($js);
			$_[] = '</head>';
			$_[] = '';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function ModalBtn($url,$id,$text=false,$icon=false,$class=false)
		{
			$_['href'] = $url;
			$_['data-toggle'] = 'modal';
			$_['data-target'] = '#'.$id;
			$_['class'] = $class;

			if(!empty($icon))
				$I = html::elmt('i','fa fa-'.$icon,"&nbsp;");
			$BTN = html::elmt('a',$_,@$I.$text);
			return $BTN;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function ModalHTML($content,$header=true)
		{
			$H[] = html::elmt('button',['class'=>'close','type'=>'button','data-dismiss'=>'modal','aria-hidden'=>'true'],'&times;');
			$H[] = html::elmt('b','font-lg',$header);
			$_[] = html::elmt('div','modal-header',implode(EOL,$H));
			$_[] = html::elmt('div','modal-body',$content);
			$_ = implode(EOL,$_);
			return $_;
		}
	static function OnOffSwitch($id,$title=false,$text=false)
		{
			$text 	= empty($text)?['YES','NO']:$text;
			list($on,$off) = $text;
			$p['class'] = 'onoffswitch-inner';
			$p['data-swchon-text'] = $on;
			$p['data-swchoff-text'] = $off;
			$toggle[] = html::elmt('span',$p,true);
			$toggle[] = html::elmt('span','onoffswitch-switch',true);
			$toggle = html::elmt('label',['class'=>'onoffswitch-label','for'=>$id],$toggle);
			$input = '<input type="checkbox" id="'.$id.'" name="'.$id.'" class="onoffswitch-checkbox">';
			if($title)
				$_[] = html::elmt('label','font-xs',$title);
			$_[] = html::elmt('span','onoffswitch',$input.$toggle);
			$_ = implode(EOL,$_);
			return $_;
		}
	static function PrintOut($content,$header=false)
		{
			if(is_array($content))
				$content = implode(EOL,$content);
			if(isset($_REQUEST['modal']))
				$content = html::ModalHTML($content,$header);
			echo $content;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Error404()
		{
			$_[] = '<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">';
			$_[] = '<div class="text-center error-box">';
				$_[] = '<br /><br /><br />';
				$_[] = '<h1 class="error-text-2 bounceInDown animated"> Oops! <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span></h1>';
				$_[] = '<h2 class="font-xl"><strong><i class="fa fa-fw fa-warning fa-lg text-warning"></i> this page is under construction</strong></h2>';
				$_[] = '<br /><br /><br />';
				$_[] = '<p class="lead">The page you requested could not be displayed, either contact your webmaster or try again later. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>';
			$_[] = '</div>';
			$_[] = '</div>';
			$_[] = '';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Start()
		{
			$_[] = '<!DOCTYPE html>';
			$_[] = '<html lang="en-us">';
			$_[] = '';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function alert($type,$msg,$icon=false,$class=false)
		{
			$C = ['alert','alert-'.$type,'no-margin','padding-5'];
			if(!empty($class)){$C[] = $class;}


			$close = html::elmt('button',['class'=>'close','data-dismiss'=>'alert'],'&times;');
			$icon = empty($icon)?false:html::elmt('i','fa fa-lg fa-'.$icon.' margin-10',true);
			$header = html::elmt('strong','padding-5',ucfirst($type));
			$msg = $close.$icon.$header.$msg;
			$_ = html::elmt('p',['class'=>$C],$msg);
			return $_;
		}
	static function Body($content)
		{
			list($body,$_body) = html::elmt('body',['class'=>['smart-style-1','fixed-header','fixed-navigation']]);
			$_[] = $body;
			$_[] = self::Header();
			$_[] = self::ShortCuts();
			$_[] = self::NavBar();
			$_[] = '<div id="main" role="main">';
			$_[] = self::Ribbon();
			$_[] = '<div id="content">';
			$_[] = $content;
			$_[] = '</div>';
			$_[] = '</div>';
			$_[] = self::Footer();
			$_[] = '</body>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function Ribbon()
		{
			$_ = html::elmt('div',['id'=>'ribbon','class'=>'hidden-xs hidden-sm'],html::elmt('ol','breadcrumb','<li>Home</li>'));
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function Footer()
		{
			$_[] = '<div class="page-footer">';
			$_[] = '<div class="row col-xs-12 col-sm-6">';
			$_[] = '<span class="txt-color-white">Media Universal &copy; 2015</span>';
			$_[] = '</div>';
			$_[] = self::ServerStatus();
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function printServerStatusDetails($status)
		{
			$_[] = "<table class='table'>";
			$_[] = "<tr><td>Memcache Server version:</td><td> ".$status ["version"]."</td></tr>";
			$_[] = "<tr><td>Process id of this server process </td><td>".$status ["pid"]."</td></tr>";
			$_[] = "<tr><td>Number of seconds this server has been running </td><td>".$status ["uptime"]."</td></tr>"; 
			$_[] = "<tr><td>Accumulated user time for this process </td><td>".$status ["rusage_user"]." seconds</td></tr>"; 
			$_[] = "<tr><td>Accumulated system time for this process </td><td>".$status ["rusage_system"]." seconds</td></tr>"; 
			$_[] = "<tr><td>Total number of items stored by this server ever since it started </td><td>".$status ["total_items"]."</td></tr>"; 
			$_[] = "<tr><td>Number of open connections </td><td>".$status ["curr_connections"]."</td></tr>"; 
			$_[] = "<tr><td>Total number of connections opened since the server started running </td><td>".$status ["total_connections"]."</td></tr>"; 
			$_[] = "<tr><td>Number of connection structures allocated by the server </td><td>".$status ["connection_structures"]."</td></tr>"; 
			$_[] = "<tr><td>Cumulative number of retrieval requests </td><td>".$status ["cmd_get"]."</td></tr>"; 
			$_[] = "<tr><td> Cumulative number of storage requests </td><td>".$status ["cmd_set"]."</td></tr>"; 
			$percCacheHit=@((real)$status ["get_hits"]/ (real)$status ["cmd_get"] *100); 
			$percCacheHit=round($percCacheHit,3); 
			$percCacheMiss=100-$percCacheHit; 
			$_[] = "<tr><td>Number of keys that have been requested and found present </td><td>".$status ["get_hits"]." ($percCacheHit%)</td></tr>"; 
			$_[] = "<tr><td>Number of items that have been requested and not found </td><td>".$status ["get_misses"]."($percCacheMiss%)</td></tr>"; 
			$MBRead= (real)$status["bytes_read"]/(1024*1024); 
			$_[] = "<tr><td>Total number of bytes read by this server from network </td><td>".$MBRead." Mega Bytes</td></tr>"; 
			$MBWrite=(real) $status["bytes_written"]/(1024*1024) ; 
			$_[] = "<tr><td>Total number of bytes sent by this server to network </td><td>".$MBWrite." Mega Bytes</td></tr>"; 
			$MBSize=(real) $status["limit_maxbytes"]/(1024*1024) ; 
			$_[] = "<tr><td>Number of bytes this server is allowed to use for storage.</td><td>".$MBSize." Mega Bytes</td></tr>"; 
			$_[] = "<tr><td>Number of valid items removed from cache to free memory for new items.</td><td>".$status ["evictions"]."</td></tr>"; 
			$_[] = "</table>";
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function ServerStatus()
		{
			$memcache_obj = new Memcache; 
			$memcache_obj->addServer(SEEDS, 11211); 
			$_[] = '<div class="col-xs-6 col-sm-6 text-right hidden-xs">
						<div class="txt-color-white inline-block">
							<i class="txt-color-blueLight hidden-mobile"><i class="fa fa-clock-o"></i> <strong>Server Status &nbsp;</strong> </i>
							<div class="btn-group dropup">
								<button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
									<i class="fa fa-link"></i> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu pull-right text-left">
									<li>
										<div class="padding-5">'.self::printServerStatusDetails($memcache_obj->getStats()).'</div>
									</li>
								</ul>
							</div>
						</div>
					</div>';
			$_ = implode(EOL,$_);
			return $_;

		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function End()
		{
			// be sure jquery is loaded
			$_[] = '<script>if (!window.jQuery) { document.write(\'<script src="http://sa/js/libs/jquery-2.0.2.min.js"><\/script>\'); }</script>';
			$_[] = '<script>if (!window.jQuery.ui) { document.write(\'<script src="http://sa/js/libs/jquery-ui-1.10.3.min.js"><\/script>\'); }</script>';
			foreach(self::JSLibs() as $js)
				$_[] = html::JS($js);
			$_[] = '</html>';
			$_[] = '';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function PopupModal($id)
		{
			$_[] = '<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="'.$id.'Label" aria-hidden="true">';
			$_[] = '<div class="modal-dialog">';
			$_[] = '<div class="modal-content">';
			$_[] = '<h1 class="Loading">';
			/*
			$_[] = '<div class="wrapper">
				    <div class="inner">
				        <span>L</span>
				        <span>o</span>
				        <span>a</span>
				        <span>d</span>
				        <span>i</span>
				        <span>n</span>
				        <span>g</span>
				    </div>
				</div>';
				*/
			$_[] = '<div class="spinner"></div>';
			$_[] = 'Please Wait! Loading...';
			$_[] = '</h1>';
			$_[] = '</div>';
			$_[] = '</div>';
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function MakeHTML($content,$title=false)
		{
			$_[] = self::Start();
			$_[] = self::Head($title);
			$_[] = self::Body($content);
			$_[] = self::End();
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function UserDetails()
		{
			$_[] = '<div class="login-info">';
			$_[] = '<span>';
			$_[] = '<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">';

			$IMG = '/data/users/'.$_COOKIE['mup_user_id'].'/_profile/default.';
			$ext = file_exists(DIR.$IMG.'jpg')?'jpg':'png';
			$_[] = '<img src="'.$IMG.$ext.'" alt="me" class="online">';
			$_[] = '<span>'.@$_COOKIE['mup_user_name'].'</span>';
			$_[] = '<i class="fa fa-angle-down"></i>';
			$_[] = '</a>';
			$_[] = '</span>';
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function GetDirectoryNav($DIR)
		{
			$DH = opendir($DIR);
			while(($FN = readdir($DH)) !== false){
				if(preg_match('/^([0-9a-zA-Z\-_]{3,})$/',$FN,$x)){
					$SDH = opendir($DIR.$x[0]);
					$conf = false;
					if(file_exists($DIR.$x[0].'/conf.json')){
						$conf = file_get_contents($DIR.$x[0].'/conf.json');
						$conf = json_decode($conf);
						foreach($conf as $k=>$v)
							$NAV[$x[1]][$k] = $v;
					}
					while(($SFN = readdir($SDH)) !== false){
						if(preg_match('/^([0-9a-zA-Z\-_\.]+)\.php$/',$SFN,$y)){
							if($y[1]!='index')
								$NAV[$x[1]]['sub'][$y[1]] = $x[1].'/'.$y[0];
						}
					}
					if(!empty($NAV[$x[1]]))
						ksort($NAV[$x[1]]);
					closedir($SDH);
				}
			}
			closedir($DH);
			ksort($NAV);
			return $NAV;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function NavBar()
		{
			$page = 'pages';
			$NAV = self::GetDirectoryNav('./'.$page.'/');

			$_[] = '<aside id="left-panel">';
			$_[] = self::UserDetails();
			$_[] = '<nav>';
			$_[] = '<ul>';

			unset($NAV['dashboard']);
			foreach($NAV as $parent=>$links){
				$_[] = '<li>';
				if(is_array($links)){
					$icon = empty($links['icon'])?false:html::elmt('i','fa fa-lg fa-fw '.$links['icon'],true);
					$label = empty($links['label'])?false:$links['label'];
					$href = empty($links['link'])?'#':$links['link'];
					$title = empty($links['title'])?ucwords(str_ireplace('_',' ',$parent)):$links['title'];
					$_[] = '<a href="'.$href.'" title="'.$title.'">';
					if(!empty($icon)){$_[] = $icon;}
					$_[] = '<span class="menu-item-parent">'.$title.'</span>';
					if(!empty($label)){$_[] = $label;}
					$_[] = '</a>';
					if(!empty($links['sub'])){
						$_[] = '<ul>';
						foreach($links['sub'] as $sub=>$link){
							$_[] = '<li>';
							$_[] = '<a href="#'.$page.'/'.$link.'" title="'.ucfirst($sub).'"><span class="menu-item-parent">'.ucwords(str_ireplace('_',' ',$sub)).'</span></a>';
							$_[] = '</li>';
						}
						$_[] = '</ul>';
					}
				}else
					$_[] = '<a href="#'.$page.'/'.$links.'" title="'.ucfirst($parent).'"><span class="menu-item-parent">'.ucwords(str_ireplace('_',' ',$parent)).'</span></a>';
				$_[] = '</li>';
			}
			$_[] = '</ul>';
			$_[] = '</nav>';
			$_[] = '<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>';
			$_[] = '</aside>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function ShortCuts()
		{
			$_[] = '<div id="shortcut">';
			$_[] = '<ul>';
				$_[] = '<li><a href="#ajax/settings.php" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a></li>';
				$_[] = '<li><a href="#ajax/calendar.php" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a></li>';
				$_[] = '<li><a href="#ajax/gmap-xml.php" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a></li>';
				$_[] = '<li><a href="#ajax/invoice.php" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a></li>';
				$_[] = '<li><a href="#ajax/gallery.php" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a></li>';
				$_[] = '<li><a href="#ajax/profile.php" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a></li>';
			$_[] = '</ul>';
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function JS($JS)
		{
			if(preg_match('/^(?:http|cdn|\/).*/',$JS,$x)){
				$_ = html::elmt('script',['type'=>'text/javascript','src'=>$JS],true);
				return $_;
			}
			$_[] = '<script type="text/javascript">';
			$_[] = "\t".'$(document).ready(function(){';
			$_[] = "\t\t".$JS;
			$_[] = "\t".'})';
			$_[] = '</script>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function CSS()
		{
			$CSS = self::CSS_Styles();
			$_[] = '<style type="text/less">';
			$_[] = '@import url(http://fonts.googleapis.com/css?family=Lobster);';
			$_[] = '@import url(http://fonts.googleapis.com/css?family=Anton);';
			$_[] = $CSS = self::printCSSStyles($CSS);

			$_[] = '
h1.Loading .spinner {
    position: relative;
    font-size: 100px;
    width: 1em;
    height: 1em;
    margin: 10px auto;
    border-radius: 50%;
    background: #123456;
    box-shadow: inset 0 0 0 .12em rgba(0,0,0,0.2), 0 0 0 .12em rgba(255,255,255,0.1);
    background:
        -webkit-linear-gradient(#ea2d0e 50%, #fcd883 50%),
        -webkit-linear-gradient(#fcd883 50%, #ea2d0e 50%);
    background:
        -webkit-linear-gradient(#ea2d0e 50%, #ffdd72 50%), -webkit-linear-gradient(#ffdd72 50%, #ea2d0e 50%);
    background:
        linear-gradient(#ea2d0e 50%, #ffdd72 50%),
        linear-gradient(#ffdd72 50%, #ea2d0e 50%);
    background-size: 50% 100%, 50% 100%;
    background-position: 0 0, 100% 0;
    background-repeat: no-repeat;
    opacity: 0.7;
    -webkit-animation: mask 3s infinite alternate;
    animation: mask 3s infinite alternate;
}

h1.Loading .spinner:after {
    content: "";
    position: absolute;
    border: .12em solid rgba(255,255,255,0.3);
    position: absolute;
    top: 25%;
    left: 25%;
    width: 50%;
    height: 50%;
    border-radius: inherit;
}

@-webkit-keyframes mask {
    0% { }
    25%  { -webkit-transform: rotate(270deg); }
    50%  { -webkit-transform: rotate( 90deg); }
    75%  { -webkit-transform: rotate(360deg); }
    100% { -webkit-transform: rotate(180deg); }
}

@keyframes mask {
    0% { }
    25%  { -webkit-transform: rotate(270deg); transform: rotate(270deg); }
    50%  { -webkit-transform: rotate( 90deg); transform: rotate( 90deg); }
    75%  { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
    100% { -webkit-transform: rotate(180deg); transform: rotate(180deg); }
}';
/*
$_[] = '
h1.Loading .wrapper {
    font-size: 25px; 
    width: 8em;
    height: 8em;
    position: relative;
    margin: 100px auto;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: 1em dashed rgba(138,189,195,0.5);
    box-shadow: 
        inset 0 0 2em rgba(255,255,255,0.3),
        0 0 0 0.7em rgba(255,255,255,0.3);
    line-height: 6em;
    text-align: center;
    font-family: \'Racing Sans One\', "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue","Helvetica","Arial","Lucida Grande",sans-serif;
    color: #444;
    text-shadow: 0 .04em rgba(255,255,255,0.9);
    -webkit-animation: steam 3.5s linear infinite;
    animation: steam 3.5s linear infinite;
}

h1.Loading .wrapper:after, 
h1.Loading .wrapper:before {
    content: "";
    position: absolute;
    left: 0; right: 0; top: 0; bottom: 0;
    z-index: -1;
    border-radius: inherit;
    box-shadow: inset 0 0 2em rgba(255,255,255,0.3);
    border: 1em dashed rgba(138,189,195,0.2);
}

h1.Loading .wrapper:before {
    top: 1em; bottom: 1em; right: 1em; left: 1em; 
    border: 1em dashed rgba(138,189,195,0.4);
}

h1.Loading .inner {
    width: 100%;
    height: 100%;
    -webkit-animation: steam 3.5s linear reverse infinite;
    animation: steam 3.5s linear reverse infinite;
}

h1.Loading .inner span {
    display: inline-block;
    -webkit-animation: loading-1 1.5s ease-out infinite;
    animation: loading-1 1.5s ease-out infinite;
}

h1.Loading .inner span:nth-child(1)  { 
    -webkit-animation-name: loading-1;
    animation-name: loading-1;
}

h1.Loading .inner span:nth-child(2)  { 
    -webkit-animation-name: loading-2;
    animation-name: loading-2;
}

h1.Loading .inner span:nth-child(3)  { 
    -webkit-animation-name: loading-3;
    animation-name: loading-3;
}

h1.Loading .inner span:nth-child(4)  { 
    -webkit-animation-name: loading-4;
    animation-name: loading-4;
}

h1.Loading .inner span:nth-child(5)  { 
    -webkit-animation-name: loading-5;
    animation-name: loading-5;
}

h1.Loading .inner span:nth-child(6)  { 
    -webkit-animation-name: loading-6;
    animation-name: loading-6;
}

h1.Loading .inner span:nth-child(7)  { 
    -webkit-animation-name: loading-7;
    animation-name: loading-7;
}

@-webkit-keyframes steam {
    from { }
    to { -webkit-transform: rotate(360deg); }
}

@keyframes steam {
    from { }
    to { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
}

@-webkit-keyframes loading-1 {
    0% { }
    14.28% { opacity: 0.3; }
}

@-webkit-keyframes loading-2 {
    0% { }
    28.57% { opacity: 0.3; }
}

@-webkit-keyframes loading-3 {
    0% { }
    42.86% { opacity: 0.3; }
}

@-webkit-keyframes loading-4 {
    0% { }
    57.14% { opacity: 0.3; }
}

@-webkit-keyframes loading-5 {
    0% { }
    71.43% { opacity: 0.3; }
}

@-webkit-keyframes loading-6 {
    0% { }
    85.71% { opacity: 0.3; }
}

@-webkit-keyframes loading-7 {
    0% { }
    100% { opacity: 0.3; }
}

@keyframes loading-1 {
    0% { }
    14.28% { opacity: 0.3; }
}

@keyframes loading-2 {
    0% { }
    28.57% { opacity: 0.3; }
}

@keyframes loading-3 {
    0% { }
    42.86% { opacity: 0.3; }
}

@keyframes loading-4 {
    0% { }
    57.14% { opacity: 0.3; }
}

@keyframes loading-5 {
    0% { }
    71.43% { opacity: 0.3; }
}

@keyframes loading-6 {
    0% { }
    85.71% { opacity: 0.3; }
}

@keyframes loading-7 {
    0% { }
    100% { opacity: 0.3; }
}


';
*/
			$_[] = '</style>';
			$_ = implode(EOL,$_);
			return $_;	
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function attr($attr,$vals=false)
		{
			$_ = [];
			if(empty($vals) && is_array($attr)){
				foreach($attr as $k=>$v){
					if(!empty($v)){
						$v = is_array($v)?$v:[$v];
						$_[] = $k.'="'.implode(' ',$v).'"';
					}
				}
			}else{
				$vals = is_array($vals)?$vals:[$vals];
				$_[] = $attr.'="'.implode(' ',$vals).'"';
			}
			$_ = implode(EOL,$_);
			return $_;	
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function elmt($el,$attr=false,$content=false)
		{
			$_[] = '<'.$el;
			if(!empty($attr)){
				$attr = is_array($attr)?html::attr($attr):$attr;
				if(!stristr($attr,'=')){
					$attr = html::attr('class',$attr);
				}
				$_[] = ' '.$attr;
			}
			$_[] = '>';
			$le = '</'.$el.'>';
			$el = implode('',$_);
			$content = ($content===true)?'':$content;
			if($content === false){
				return [$el,$le];
			}
			if(is_array($content))
				$content = implode(EOL,$content);
			return $el.$content.$le;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * --------------------------------------------------
	 **/
	static function SuperBox($IMGs,$id)
		{
			foreach($IMGs as $src=>$at){
				if(empty($at)){$at['src'] = $src;}
				$A = is_string($at)?['src'=>$at]:$at;
				$A['data-img'] = $src;
				$A['class'][] = 'superbox-img';
				$BOX[] = html::elmt('div','superbox-list','<img '.html::attr($A).' />');
			}
			list($SHOW,$_SHOW) = html::elmt('div',['class'=>'superbox-show','style'=>'height:300px; display: none']);
			$BOXES = implode(EOL,$BOX).$SHOW.$_SHOW;
			$_ = html::elmt('div',$id.' no-padding',$BOXES);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function pageLoad($url,$container)
		{
			$JS = "var container = $('div#{$container}').find('div[role=content]');
				loadURL('{$url}',container);
				";
			$_ = html::JS($JS);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function MakeWidget($id,$content,$header=true,$width=false,$tools=false,$args=false)
		{
			$O = [];
			$O['article']['class'] = empty($width)?html::Cols(12):$width;
			$O['article']['id'] = $id;
			$O['div']['class'] = ['jarviswidget','jarviswidget-color-darken'];
			$O['div']['id'] = $id;
			$O['content']['role'] = 'content';
			$O['header']['role'] = 'heading';

			if(!empty($args)){
				$args = is_array($args)?$args:[$args];
				foreach($args as $arg=>$val){
					if(is_array($val)){
						foreach($val as $k=>$v){
							$O[$arg][$k] = $v;
						}
					}else{
						$O[$arg] = $val;
					}
				}
			}


			if($header)
				$h2 = html::elmt('h2',false,$header);
			if(!empty($tools))
				$tools = html::elmt('div',['class'=>['widget-toolbar','smart-form'],'role'=>'menu'],$tools);
			$header = html::elmt('header',@$O['header'],$h2.@$tools);
			$content = html::elmt('div',$O['content'],$content);
			$_ = html::elmt('article',$O['article'],html::elmt('div',@$O['div'],$header.$content));
			return $_;	
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function printCSSStyles($CSS,$t=false)
		{
			if(is_array($CSS)){
				ksort($CSS);
				foreach($CSS as $K=>$V){
					if(is_array($V)){
						$_[] = $t.$K." {";
						$_[] = self::printCSSStyles($V,$t."\t");
						$_[] = $t."}";
					}else{
						$_[] = $t.$K.": ".$V.";";
					}
				}
				$_ = implode(EOL,$_);
				return $_;
			}
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Header()
		{
			$_[] = '<header id="header">';
			$_[] = '<div id="logo-group">';
				$_[] = '<span id="logo"><h1 id="logo"><span class="highlight">MEDIA</span><span class="plain">Universal</span></h1></span>';
				$_[] = self::Header_Notifications();
			$_[] = '</div>';
			$_[] = self::Header_Projects();
			$_[] = self::Header_Right();
			$_[] = '</header>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Header_Notifications()
		{
			$_[] = '<span id="activity" class="activity-dropdown hidden-xs">';
			$_[] = '<i class="fa fa-wechat fa-lg"></i>';
			$_[] = '<b class="badge" style="display:none;">0</b>';
			$_[] = '</span>';
			$_[] = '<div class="ajax-dropdown">';
				$_[] = '<div class="btn-group btn-group-justified">';
					$_[] = '<a class="btn btn-xs btn-default '.self::Cols(4).'" id="notify_tasks">Tasks</a>';
					$_[] = '<a class="btn btn-xs btn-default '.self::Cols(4).'" id="notify_messages">Messages</a>';
					$_[] = '<a class="btn btn-xs btn-warning '.self::Cols(4).'" id="notify_alerts">Alerts</a>';
				$_[] = '</div>';
				$_[] = '<div class="ajax-notifications custom-scroll">';
					$_[] = '<div class="alert alert-transparent"><h4>Click a button to show messages here</h4></div>';
					$_[] = '<i class="fa fa-lock fa-4x fa-border"></i>';
				$_[] = '</div>';
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Header_Projects()
		{
			$_[] = '<div class="project-context hidden-xs">';
			$_[] = '<span class="label">&nbsp;</span>';
			$_[] = '<span id="project-selector" class="popover-trigger-element dropdown-toggle" data-toggle="dropdown">Recent Assignments <i class="fa fa-angle-down"></i></span>';
			$_[] = '<ul class="dropdown-menu" style="min-width:450px;">';
			$_[] = '<li><a href="#">Oops! No Assignments Found...</a></li>';
			$_[] = '<li class="divider"></li>';
			$_[] = '<li>';
			$_[] = '<div class="row" style="padding:0px 25px 4px;">';
			$_[] = '<a class="btn btn-xs btn-primary '.self::Cols(8).'"><i class="fa fa-list-alt"></i> View All</a>';
			$_[] = '<a class="btn btn-xs btn-success '.self::Cols(4).'"><i class="fa fa-plus-circle"></i> Add New</a>';
			$_[] = '</div>';
			$_[] = '</li>';
			$_[] = '</ul>';
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Header_Right()
		{
			$_[] = '<div class="pull-right">';
			$_[] = '<div id="hide-menu" class="btn-header pull-right">';
			$_[] = '<span>';
			$_[] = '<a href="javascript:void(0);" title="Collapse Menu" data-action="toggleMenu"><i class="fa fa-reorder"></i></a>';
			$_[] = '</span>';
			$_[] = '</div>';
			$_[] = '<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="http://sa/img/avatars/sunny.png" alt="John Doe" class="online" />
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#ajax/profile.php" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.php" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>';

			$_[] = self::Logout();
			$_[] = self::SearchBox();
			$_[] = self::FullScreen();
			$_[] = '</div>';

			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Logout()
		{
			$_[] = '<div id="logout" class="btn-header transparent pull-right">';
			$_[] = '<span>';
			$_[] = '<a href="http://sa/login.php" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a>';
			$_[] = '</span>';
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function SearchBox()
		{
			$_[] = '<div id="search-mobile" class="btn-header transparent pull-right">';
			$_[] = '<span>';
			$_[] = '<a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a>';
			$_[] = '</span>';
			$_[] = '</div>';
			$_[] = '<form action="#ajax/search.php" class="header-search pull-right">';
			$_[] = '<input type="text" name="param" placeholder="Find reports and more" id="search-fld">';
			$_[] = '<button type="submit"><i class="fa fa-search"></i></button>';
			$_[] = '<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>';
			$_[] = '</form>';
			$_ = implode(EOL,$_);
			return $_;
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function FullScreen()
		{
			$_[] = '<div id="fullscreen" class="btn-header transparent pull-right">';
			$_[] = '<span>';
			$_[] = '<a href="javascript:void(0);" title="Full Screen" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i></a>';
			$_[] = '</span>';
			$_[] = '</div>';
			$_ = implode(EOL,$_);
			return $_;	
		}
	/**
	 * FunctionName ( $x [, $y [, $z]] )
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param int $x Description
	 * @param string $y Description
	 * @param array $z Description
	 * @return string html head
	 * --------------------------------------------------
	 **/
	static function Cols($XS,$SM=false,$MD=false,$LG=false)
		{
			if(!empty($XS)){
				$_[] = is_array($XS)?'col-xs-offset-'.key($XS).' col-xs-'.$XS[key($XS)]:'col-xs-'.$XS;
			}elseif($XS !== false){
				$_[] = 'col-xs-hidden';
			}
			if (!empty($SM)) {
				$_[] = is_array($SM)?'col-sm-offset-'.key($SM).' col-sm-'.$SM[key($SM)]:'col-sm-'.$SM;
			}elseif($SM !== false){
				$_[] = 'col-sm-hidden';
			}
			if (!empty($MD)) {
				$_[] = is_array($MD)?'col-md-offset-'.key($MD).' col-md-'.$MD[key($MD)]:'col-md-'.$MD;
			}elseif($MD !== false){
				$_[] = 'col-md-hidden';
			}
			if (!empty($LG)) {
				$_[] = is_array($LG)?'col-lg-offset-'.key($LG).' col-lg-'.$LG[key($LG)]:'col-lg-'.$LG;
			}elseif($LG !== false){
				$_[] = 'col-lg-hidden';
			}
			$_ = implode(" ", $_);
			return $_;
		}
}

?>