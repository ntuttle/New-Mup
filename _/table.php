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
class TBL {

	var $ID;
	var $DTbl;
	var $TABLE;

	public function __construct($ID=false, $DTbl=false)
		{
			$this->ID = $ID;
			$this->DTbl = $DTbl;
			$this->TABLE = [];
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
	public function Start($T = false, $ID = false, $C = false)
		{
			if($T){
				$T = "<h1>{$T}</h1>";
			}
			if($ID){
				$this->ID = $ID;
				$ID = " id=\"{$ID}\"";
			}else{
	    		$ID = '';
	    	}
			if($C){
				if(!empty($this->DTbl)){
					$C .= ' dataTable';
				}
				$C = " class=\"table {$C}\"";
			}
			$this->R('<div class="widget-body no-padding">'.$T."<table".$ID.$C.">");
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
	public function Button($T, $L = false, $C = false, $N = false, $H = false)
		{
			$S = " class=\"button {$C}\"";
			if (stristr($link, '/')) {
				$L = " href=\"".WEB."\"{$L}\"";
			} elseif ($L) {
				$L = " id=\"{$L}\"";
			}
			if ($H) {
				$H = " title=\"{$H}\"";
			}
			if ($N) {
				$N = " name=\"{$N}\"";
			}
			$this->R("<a".$L.$S.$H.$N.">".$T."</a>");
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
	public function Row($C = false, $ID = false, $H = false) 
		{
			$this->eH = true;
			if ($C) {
				$C = " class=\"{$C}\"";
			}
			if ($ID) {
				$ID = " id=\"{$ID}\"";
			}
			if ($H) {
				$H = "<thead>";
			} else { 
				$this->eH = false;
			}
			$this->R($H."<tr".$C.$ID.">");
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
	public function Cell($V = false, $W = false, $ID = false, $C = false, $a = false, $cols = false, $rows = false, $T = false) 
		{
			$TD = 'td';
			if ($W) {
				$W = " style=\"width:{$W};max-width:{$W};min-width:{$W};\"";
			}
			if (in_array($a, ['left', 'right'])) {
				$a = " style=\"text-align:{$a};\"";
			}
			if ($V !== false) {
				if ($ID) {
					$ID = " id=\"{$ID}\"";
				} else { 
					$ID = " id=\"{$V}\"";
				}
			}
			if ($cols) {
				$cols = " colspan=\"{$cols}\"";
			}
			if ($rows) {
				$rows = " rowspan=\"{$rows}\"";
			}
			if ($T) {
				$TD = 'th';
			} elseif ($this->eH) {
				$TD = 'th';
			}
			if ($TD == 'th') {
				$C .= " sorting";
				$V = $V;//ucwords($V);
				$W .= " role=\"columnheader\" controls=\"dt_basic\"";
			}
			if ($C) {$C = " class=\"{$C}\"";}
			$this->R("<".$TD.$W.$a.$ID.$C.$cols.$rows.">".$V."</".$TD.">");
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
	public function ToolCell($I, $L, $N = false, $T = false) 
		{
			if (stristr($L, '/')) {
				$L = " href=\"".WEB.$L."\"";
			} elseif ($L) {
				$L = " id=\"{$L}\"";
			}
			if ($N) {
				$N = " name=\"{$N}\"";
			}
			if ($T) {
				$T = " title=\"{$T}\"";
			}
			if (isset($I['icon'])) {
				$I = $this->Icon($I['icon']);
			}
			$B = "<a".$L.$N.$T.">".$I."</a>";
			$this->R("<td class=\"toolbar\" style=\"max-width:25px;width:25px;\">{$B}</td>");
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
	public function Icon($icon) 
		{
			return "<i class=\"fa fa-{$icon}\"></i>";
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
	public function RowEnd() 
		{
			$R = "</tr>";
			if ($this->eH) {
				$R .= '</thead>';
			}
			$this->R($R);
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
	public function End() 
		{
			$this->R("</table></div>");
			if($this->DTbl !== false){
				$p = $this->DTbl;
				$p = is_array($p)?json_encode($p):$p;
				$JS = html::JS("$('table#".$this->ID."').DataTable(".$p.");");
				$this->R($JS);
			}
			$_ = $this->_R;
			unset($this->_R);
			return implode("\n", $_);
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
	public function tBody($end = false) 
		{
			if ($end) {
				$end = '/';
			}
			$this->_R[] = "<{$end}tbody>";
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
	public function R($V) 
		{
			$this->_R[] = $V;
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
	public function Make($A,$T=false,$C=false) 
		{
			if (empty($A))
				$A = [['Oops!'=>'No Results Found...']];
			foreach ($A as $ID => $r) {
				if (empty($c)) {
					$c = 0;
					$TITLE = isset($T['title'])?$T['title']:false;
					$this->Start($TITLE, $this->ID, $C);
					$this->Row('header', false, true);
					if (isset($T['left'])) {
						foreach ($T['left'] as $t) {
							if (isset($t['check']))
						 		$this->Cell($t['check'],'check','check');
							else
								$this->Cell();
						}
					}
					foreach ($r as $k => $v) {
						if (isset($v['CLASS'])) {
							$this->Cell($k, false, false, false);
						} elseif (!in_array($k, ['CLASS', 'ID']) || empty($k)) {
							$this->Cell($k);
						}
					}
					if (isset($T['right'])) {
						foreach ($T['right'] as $t) {
							$this->Cell();
						}
					}
					$this->RowEnd();
					$this->tBody();
				}
				$clr = 'white';
				if (isset($r['CLASS'])) {
					$clr = $r['CLASS'];
				}
				if (isset($r['ID'])) {
					$ID = $r[$r['ID']];
				}
				$this->Row($clr, $ID);
				if(isset($T['left']))
					$this->BuildTools($T['left'],$r,$ID);
				foreach ($r as $k => $v) {
					$A = false;
					$W = false;
					if (is_array($v)) {
						if (isset($v['CLASS'])) {
							$this->Cell($v['VALUE'], $W, $k, $v['CLASS'], $A);
						} else { 
							$this->Cell(stripslashes(implode("<br>", $v)), $W, $k, false, $A);
						}
					} elseif (!in_array($k, ['CLASS', 'ID']) || empty($k)) {
						$this->Cell(stripslashes($v), $W, $k, false, $A);
					}
				}
				if (isset($T['right'])) 
					$this->BuildTools($T['right'],$r,$ID);
				$this->RowEnd();
				$c++;
			}
			$this->tBody(1);
			return $this->End();
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
	public function BuildTools($T,$r,$ID){
		foreach($T as $t){
			if(stristr($t['id'], '/')){
				if(isset($r[$t['name']])){
					$IDnt = $t['id'].'/'.$r[$t['name']];
				}else{
					$IDnt = $t['id'].'/'.key($r);
				}
			}else{
				$IDnt = $t['id'];
			}
			$title = isset($t['title'])?$t['title']:false;
			if($IDnt == '...')
				$this->Cell(' ');
			elseif(isset($t['html']))
				$this->Cell($t['html'], 'class', 'id');
			else {
				if ($t['name'] == 'id') 
					$this->ToolCell(['icon' => $t['icon']], $IDnt, $ID, $title);
				else
					$this->ToolCell(['icon' => $t['icon']], $IDnt, $r[$t['name']], $title);
			}
		}
	}
}
?>
