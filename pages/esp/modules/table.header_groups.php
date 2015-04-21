<?php
/**
 * Start the Page
 * --------------------------------------------------
 **/
require_once $_SERVER['DOCUMENT_ROOT'].'/_/core.php';
$X = new X();

/**
 * retrieve Target Header Groups from database
 * --------------------------------------------------
 **/
$HDT = 'MASTER.headers.targetHeaderGroups';
$W = ['id__>'=>0];
$F = ['id','groupName'=>'name','target','image','mailfrom'];
$L = 1000;
$Q = $X->DB->GET($HDT,$W,$F,$L);

/**
 * Make Header Groups table from Query results
 * --------------------------------------------------
 **/
$T = new TBL('HeaderGroups',['info'=>false]);
$t['left'][0] = ['icon'=>'edit fa-lg','name'=>'id','id'=>'EditHeaderGroup'];
$T = $T->Make($Q,$t,'table-striped table-bordered table-hover no-footer');

/**
 * Print Table 
 * --------------------------------------------------
 **/
echo $T;

?>