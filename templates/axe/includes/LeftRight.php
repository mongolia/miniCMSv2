<?php
/*

//heregleh jishee

$parent_id = 4;
	
$maxRgt = getMaxRight($parent_id,'jetons',$DB);

$data['parent_id'] = $parent_id;
$data['lft'] = $maxRgt + 1;
$data['rgt'] = $maxRgt + 2;
$data['username'] = 'me';

updateLeftRight($maxRgt,'jetons', $DB);
$DB->mbm_insert_row($data, 'jetons');


//$options : field -uudiin ner

*/

function getMaxRight($parent_id, $tbl,$obj, $options = array(
                                                         'id'=>'id', //primary id. auto increment
                                                         'parent_id'=>'parent_id',
                                                         'lft'=>'lft',
                                                         'rgt'=>'rgt',
                                                         'depth'=>'depth' //level
                                                         )){
	
	$q = "SELECT ".$options['rgt']." FROM ".$obj->prefix.$tbl." WHERE ".$options['parent_id']."='".$parent_id."' ORDER BY rgt DESC";
	$r = $obj->mbm_query($q);
	
	if($obj->mbm_num_rows($r) == 0){
		$get_rgt = $obj->mbm_get_field($parent_id,$options['id'],$options['rgt'],$tbl);
		if($get_rgt == 0){
			return 0;
		}else{
			return $obj->mbm_get_field($parent_id,$options['id'],$options['rgt'],$tbl)-1;
		}
	}else{
		return $obj->mbm_result($r,0);
	}
}
function updateLeftRight($maxRgt,$tbl, $obj){
	
	$obj->mbm_query("UPDATE ".$obj->prefix.$tbl." SET lft=lft+2 WHERE lft>".$maxRgt);
	$obj->mbm_query("UPDATE ".$obj->prefix.$tbl." SET rgt=rgt+2 WHERE rgt>".$maxRgt);
}
?>