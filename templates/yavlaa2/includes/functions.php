<?
function uniDropDownCodes($order_by='date_added desc'){
	global $DB,$DB2, $lang;
	
	$q = "SELECT * FROM ".$DB->prefix."menu_contents WHERE tag LIKE 'uni,%' ";
	$q .= "ORDER BY ".$order_by;
	
	$r = $DB->mbm_query($q);
	
	for($i=0;$i<$DB->mbm_num_rows($r);$i++){
		
	}
}
?>