<?php
/**
 * Class
 * --------------------------------------------------
 * Description of class use here
 * --------------------------------------------------
 * @param int $x Description
 * @param string $y Description
 * @param array $z Description
 * --------------------------------------------------
 **/
class FORMS {

	var $FORM = array();
	var $title;
	var $id;

	public function __construct($id, $title = false, $class = false, $width = false) {
		$this->StartForm($id, $class, $width);
		if ($title) {
			$this->FORM[$id][] = "<div class=\"header\">";
			$this->Header($title);
			$this->FORM[$id][] = "</div>";
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
	 * --------------------------------------------------
	 **/
	public function StartForm($id, $class, $width = false) {
		$this->id = $id;
		$id = "id=\"$id\"";
		if ($class === false) {$class = 'smart-form';}
		if (is_numeric($width)) {$width = " style=\"width:{$width}px\"";}
		$this->FORM[$this->id][] = "<form enctype=\"multipart/form-data\" method=\"POST\" $id class=\"{$class}\" {$width}>";
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
	public function Div($ID, $x = false, $C = false) {
		$OG_id = $this->id;
		$this->SelectForm($ID);
		$this->Write('<div class="row '.$C.'">'.$x.'</div>');
		$DIV = $this->PrintPart($id);
		$this->SelectForm($OG_id);
		$this->FORM[$this->id][] = $DIV;
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
	public function SelectForm($ID) {
		$this->id = $ID;
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
	public function FooterEnd() {
		$this->FORM[$this->id][] = "</footer>";
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
	public function Footer($content = false,$class=false) {
		$class = empty($class)?false:' class="'.$class.'"';
		$this->FORM[$this->id][] = "<footer{$class}>";
		$this->FORM[$this->id][] = $content;
		$this->FORM[$this->id][] = "</footer>";
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
	public function Br($S = false) {
		if (is_numeric($S)) {$S = " style=\"height:{$S}px;\"";} elseif ($S) {$S = " style=\"{$S}\"";}
		$this->FORM[$this->id][] = "<hr{$S} />";
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
	public function Header($T, $B = false) {
		$this->FORM[$this->id][] = "<h1>".$T;
		if (is_array($B)) {
			if (is_array($B[0])) {foreach ($B as $b) {$this->Button($b[0], $b[1], @$b[2]);}} else { $this->Button($B[0], $B[1], @$B[2]);}
		} elseif ($B) {$this->FORM[$this->id][] = $B;}
		$this->FORM[$this->id][] = "</h1>";
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
	public function Span($ID, $Display = true, $Content = false) {
		$D = empty($D)?" style=\"display:none;\"":'';
		$__ = "<span".$ID.$D.">";
		if ($Content) {$__ .= $C."</span>";}
		$this->FORM[$this->id][] = $__;
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
	public function Write($C, $S = false) {
		$ID = $this->id;
		$this->FORM[$ID][] = $C;
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
	public function EndSpan() {
		$this->FORM[$this->id][] = "</span>";
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
	public function JS($javascript) {
		$this->FORM[$this->id][] = "<script type=\"text/javascript\">{$javascript}</script>";
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
	public function CSS($css) {
		$this->FORM[$this->id][] = "<style type=\"text/css\">{$css}</style>";
	}
	/**
	 * Select
	 * --------------------------------------------------
	 * Description of function here
	 * --------------------------------------------------
	 * @param string $N id and name attributes assigned to the select element
	 * @param array $OPTS dropdown options available to select
	 * @param mixed $V default value selected
	 * @param mixed $L the label displayed next to the select
	 * @param boolean $null true to inlude empty dropdown option
	 * @param mixed $W # of pixels for width OR html::Cols() string
	 * @param int $M number of options shown in multiple select
	 * @param mixed $ID custom id to be added to select, $name is used if false
	 * --------------------------------------------------
	 **/
	public function Select($N,$OPTS,$V=false,$L=true,$null=true,$W=false,$M=false,$ID=false) {
		
		if(!empty($L)){$this->Label((is_string($L)?$L:$N));}
		$V = empty($V)?@$_REQUEST[$N]:$V;
		$M = empty($M)?false:'multiple size="'.$M.'"';
		$C = 'class="col col-xs-12 padding-5 no-margin" ';
		if(!empty($W)){
			if(!is_numeric($W)){
				$C = 'class="col '.$W.' padding-5 no-margin" ';
				$W = 'class="form-control col-xs-12" ';
			}else
				$W = 'style="width:'.$W.'px" ';
		}
		$ID = empty($ID)?$N:$ID;
		$ID = 'id="'.$ID.'" ';
		$N = 'name="'.$N.'" ';

		$_[] = "<section {$C}>";
		$_[] = "<label class=\"select\">";
		$_[] = "<select {$N}{$ID}{$M}>";
		if($null)
			$_[] = "<option></option>";
		foreach ($OPTS as $k => $v) {
			$c = in_array($V, [$k, $v])?$c = 'selected ':$c = false;
			$_[] = "<option {$c}value=\"{$k}\">{$v}</option>";
		}
		$_[] = "</select>";
		$_[] = "</label>";
		$_[] = "</section>";
		$this->FORM[$this->id][] = implode(EOL,$_);
	}
	/**
	 * Textarea
	 * --------------------------------------------------
	 * @param string $name id and name attributes assigned to the textarea element
	 * @param mixed $value default value, @$_REQUEST[$name] is used if false
	 * @param mixed $label the label displayed next to the textarea
	 * @param mixed $width pixels for width OR html::Cols() string
	 * @param int $height pixels for height
	 * --------------------------------------------------
	 **/
	public function Textarea($name, $value = false, $label = true, $width = false, $height = false, $ToolTip=false) {
		if ($label === true) {$this->Label($name);} elseif ($label) {$this->Label($label);}
		if ($value === false) {$value = @$_REQUEST[$name];}
		if (is_numeric($width)) {
			$width = "style=\"width:{$width}px\"";
		} elseif ($width) {
			$CLASS = $width; 
			$width = " class=\"form-control col-xs-12\"";
		} else {
			$CLASS = html::Cols(12); 
			$width = " class=\"form-control col-xs-12\"";
		}
		if ($height) {$height = " style=\"height:{$height}px\"";}
		$this->FORM[$this->id][] = "<section class=\"col ".$CLASS." padding-5 no-margin\">";

		$this->FORM[$this->id][] = "<label class=\"textarea col-xs-12\">";
		$id = str_replace('[]', '', $name);
		$this->FORM[$this->id][] = "<textarea {$height} name=\"$name\" id=\"$id\" >$value</textarea>";
		if ($ToolTip) {
			$this->FORM[$this->id][] = "<b class=\"tooltip tooltip-top-left\">".$ToolTip."</b>";}
		$this->FORM[$this->id][] = "</label>";
		$this->FORM[$this->id][] = "</section>";
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
	public function Text($N, $V = false, $L = true, $W = false, $ToolTip = false, $mid = false) {
		$PH = '';
		if (is_array($V)) {$PH = key($V); $V = $V[$PH]; $PH = " placeholder=\"{$PH}\"";}
		if ($L === true) {$this->Label($N);} elseif ($L) {$this->Label($L);}
		if (!$V) {$V = @$_REQUEST[$N];}
		$CLASS = '';
		if (is_numeric($W)) {
			$W = " style=\"width:{$W}px\"";
		} elseif ($W) {
			$CLASS = $W;
			$W = " class=\"form-control\"";
		} else {
			$CLASS = html::Cols(12);
			$W = " class=\"form-control\"";
		}
		$mid = empty($mid)?$N:$mid;
		$ID = " id=\"{$mid}\"";
		$T = " type=\"text\"";
		if (in_array($N, ['p'])) {$T = " type=\"password\"";}
		$N = " name=\"{$N}\"";
		$V = " value=\"{$V}\"";
		$_ = "<section class=\"col ".$CLASS." padding-5 no-margin\">";
		$_ .= " <label class=\"input\">";
		$_ .= "<input".$T.$PH.$W.$N.$ID.$V." />";
		if ($ToolTip) {$_ .= "<b class=\"tooltip tooltip-top-left\">".$ToolTip."</b>";}
		$_ .= "</label>";
		$_ .= "</section>";
		$this->FORM[$this->id][] = $_;
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
	public function File($N, $L = true) {
		$ID = " id=\"$N\"";
		$_ = " <label class=\"input\">";
		$_ .= "<input type=\"file\" ".$N.$ID."/>";
		$_ .= "</label>";
		$this->FORM[$this->id][] = $_;
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
	public function Section($end = false) {
		$this->FORM[$this->id][] = empty($end)?"<fieldset><section>":"</section></fieldset>";
		return "<{$end}section>";
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
	public function Hidden($N, $V = false) {
		$V = ($V)?$V:@$_REQUEST[$N];
		$V = " value=\"{$V}\"";
		$ID = " id=\"{$N}\"";
		$T = " type=\"hidden\"";
		$N = " name=\"{$N}\"";
		$_ = "<input".$T.$N.$ID.$V."/>";
		$this->FORM[$this->id][] = $_;
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
	public function Label($T, $C = false) {
		$_[] = "<section class=\"col col-xs-2 padding-5 no-margin\">";
		$_[] = "<label class=\"label padding-5 no-margin\">".ucfirst($T).": ".$C."</label>";
		$_[] = "</section>";
		$_ = implode(EOL,$_);
		$this->FORM[$this->id][] = $_;
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
	public function Button($id, $value = false, $class = false) {
		$V = ($value)?$value:$id;
		$C = ($class)?' class="'.$class.'"':' class="btn btn-default"';
		$ID = " id=\"{$id}\"";
		$N = " name=\"{$id}\"";
		$T = " type=\"button\"";
		$_ = "<button".$T.$N.$ID.$C.">".$V."</button>";
		$this->FORM[$this->id][] = $_;
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
	public function Submit($N, $V = false, $C = false, $e = false) {
		$e = ($e)?" style=\"float:right;margin:-28px -8px;box-shadow:inset 0px 0px 5px black;padding:2px 10px;border:1px solid #19649C;\"":'';
		$V = ($V)?$V:$N;
		$V = " value=\"$V\"";
		$C = ($C)?' class="'.$C.'"':' class="btn btn-default"';
		$ID = " id=\"{$N}\"";
		$N = " name=\"{$N}\"";
		$T = " type=\"submit\"";
		$_ = "<input".$T.$N.$ID.$V.$C.$e." />";
		$this->FORM[$this->id][] = $_;
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
	public function Buttons($button) {
		if (is_array($button)) {
			if (isset($button['id'])) {$id = "id=\"".$button['id']."\"";} else { $id = false;}
			if (isset($button['icon'])) {
				$title = X::Icon($button['icon']);
				if (isset($button['name'])) {$name = "name=\"{$button['name']}\"";} else { $name = "name=\"".@$button['icon']."\"";}
				if (isset($button['color'])) {$class = "class=\"{$button['color']}\"";}
				$BUTTON = "<a $id $name>$title</a>";
			} else {
				$title = "value=\"{$button['title']}\"";
				if (isset($button['name'])) {$name = "name=\"{$button['name']}\"";} else { $name = "name=\"".@$button['id']."\"";}
				if (isset($button['color'])) {$class = "class=\"{$button['color']}\"";} else { $class = false;}
				$BUTTON = "<input type=\"button\" $class $title $name $id />";
			}
			$this->FORM[$this->id][] = $BUTTON;
		} elseif ($button !== false) {$this->FORM[$this->id][] = $button;}
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
	public function PrintForm($id = false) {
		$this->id = empty($id)?$this->id:$id;
		$this->FORM[$this->id][] = "</form>";
		$form = implode(EOL, $this->FORM[$this->id]);
		return $form;
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
	public function PrintPart($id = false) {
		if ($id) {$this->id = $id;}
		$form = implode(EOL, $this->FORM[$this->id]);
		return $form;
	}
}
?>
