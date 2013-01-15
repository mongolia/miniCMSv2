<?

define("COMPANY_PER_PAGE",20);
define("COMPANY_LOGO_MAX_WIDTH",100);

function mbmCompanyCategories($order_by='name'){
	global $DB;
	
	$q = "SELECT * FROM ".$DB->prefix."company_categories ORDER BY ".$order_by;
	$r = $DB->mbm_query($q);
	$categories = array();
	for($i=0;$i<$DB->mbm_num_rows($r);$i++){
		$categories[$DB->mbm_result($r,$i,"id")] = $DB->mbm_result($r,$i,"name");
	}
	
	return $categories;
}
function mbmCompanyServices($order_by='name'){
	global $DB;
	
	$q = "SELECT * FROM ".$DB->prefix."services ORDER BY ".$order_by;
	$r = $DB->mbm_query($q);
	$services = array();
	for($i=0;$i<$DB->mbm_num_rows($r);$i++){
		$services[$DB->mbm_result($r,$i,"id")] = $DB->mbm_result($r,$i,"name");
	}
	
	return $services;
}
function mbmCompanyCategoriesList($order_by='name'){
	$list = mbmCompanyCategories($order_by);
	
	$buf = '';
	
	if(is_array($list)){
		foreach($list as $k=>$v){
			$buf .= '<a href="index.php?module=companies&cmd=list&cat_id='.$k.'" class="companyCategories">';
			$buf .= $v;
			$buf .= '</a>';
		}
	}
	return $buf;
}
function mbmCompanyServicesList($order_by='name'){
	$list = mbmCompanyServices($order_by);
	
	$buf = '';
	
	if(is_array($list)){
		foreach($list as $k=>$v){
			$buf .= '<a href="index.php?module=companies&cmd=list&service_id='.$k.'">';
			$buf .= $v;
			$buf .= '</a>';
		}
	}
	return '<div class="companyServices">'.$buf.'</div>';
}
?>