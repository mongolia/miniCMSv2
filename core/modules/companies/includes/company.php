<?
function mbmCompanyList($var = array(
									 'cat_id'=>0,
									 'name_mn'=>'',
									 'name_en'=>'',
									 'st'=>0,
									 'district'=>'',
									 'limit'=>10,
									 'service_id'=>0,
									 'order_by'=>'id',
									 'asc'=>'asc'
									 )){
	global $DB,$lang;
	
	$q = "SELECT * FROM ".$DB->prefix."companies WHERE id!=0 ";
	$q .= "AND st='".$var['st']."' ";
	
	if($var['cat_id']!=0){
		$q .= "AND category_ids LIKE '%,".$var['cat_id'].",%' ";
	}
	if($var['name_en']!=''){
		$q .= "AND name_en LIKE '%,".$var['name_en'].",%' ";
	}
	if($var['name_mn']!=''){
		$q .= "AND name_mn LIKE '%,".$var['name_mn'].",%' ";
	}
	if($var['district']!=''){
		$q .= "AND name_mn LIKE '%,".$var['district'].",%' ";
	}
	if($var['service_id']!=0){
		$q .= "AND id IN (SELECT company_id FROM ".$DB->prefix."company_services WHERE service_id='".$var['service_id']."')";
	}
	
	$q .= "ORDER BY ".$var['order_by']." ".$var['asc']." ";
	
	if($var['limit']!=0){
		$q .= "LIMIT ".$var['limit'];
	}
	
	$r = $DB->mbm_query($q);
	
	if($DB->mbm_num_rows($r)<=COMPANY_PER_PAGE){
		$total = $DB->mbm_num_rows($r);
	}else{
		$total = $var['limit'];
	}
	
	$links = array();
	
	for($i=0;$i<$total;$i++){
		$links[$DB->mbm_result($r,$i,"id")] = 'index.php?module=companies&cmd=full_info&id='.$DB->mbm_result($r,$i,"id");
		echo '<div class="companyList">';
			echo '<a href="'.$links[$DB->mbm_result($r,$i,"id")].'">'
				.'<img src="'.DOMAIN.DIR.'img.php?type=jpg&f='.base64_encode($DB->mbm_result($r,$i,"logo")).'&w='.COMPANY_LOGO_MAX_WIDTH.'" />'
				.'</a>';
			echo '<div>';
				echo '<a href="'.$links[$DB->mbm_result($r,$i,"id")].'">'
						.$DB->mbm_result($r,$i,"name_mn")
						.'</a>';
				echo '<span>'.$DB->mbm_result($r,$i,"name_mn").'</span>';
				echo '<div>';
					echo $DB->mbm_result($r,$i,"content_short");
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
	
}
function mbmCompanyFullInfo($id=0,$st=1){
	global $DB,$lang;
	
	$buf = '';
		
	$q = "SELECT * FROM ".$DB->prefix."companies WHERE id='".addslashes($id)."' AND st='".addslashes($st)."'";
	$r = $DB->mbm_query($q);
	if($DB->mbm_num_rows($r)==0){
		$buf = $lang['main']['no_content'];
	}else{
		$buf .= '<div id="companyFullInfo">';
			$q_services = "SELECT * FROM ".$DB->prefix."services WHERE id IN(SELECT service_id FROM ".$DB->prefix."company_services WHERE company_id='".$DB->mbm_result($r,$i,"id")."') ORDER BY name";
			$r_services = $DB->mbm_query($q_services);
			$buf .= '<div id="companyServices">';
			$buf .= '<h2>';
				$buf .= 'Services';
			$buf .= '</h2>';
			$buf .= '<ul>';
			for($k=0;$k<$DB->mbm_num_rows($r_services);$k++){
				$buf .= '<li>'
						.'<a href="index.php?module=companies&cmd=list&service_id='.$DB->mbm_result($r_services,$k,"id").'">'
						.$DB->mbm_result($r_services,$k,"name")
						.'</a></li>';			
			}
			$buf .= '</ul>';
			$buf .= '</div>';	
			$buf .= '<h2>';
				$buf .= $DB->mbm_result($r,$i,"name_mn");
			$buf .= '</h2>';
			$buf .= '<div id="companyShortInfo">';
				$buf .= '<img src="'.DOMAIN.DIR.'img.php?type=jpg&f='.base64_encode($DB->mbm_result($r,$i,"logo")).'&w='.round(COMPANY_LOGO_MAX_WIDTH*1.5).'" />';
					$buf .= '<div class="hits">hits: '.$DB->mbm_result($r,$i,"hits").'</div>';
				$buf .= '<div>';
					$buf .= $DB->mbm_result($r,$i,"content_short");
				$buf .= '</div>';
				$buf .= '';
				$buf .= '';
				$buf .= '<br clear="all" />';
			$buf .= '</div>';
			$buf .= '<div id="companyContactInfo">';
				$buf .= '<h2>Contacts</h2>';
				$buf .= '<ul>';
				$buf .= '<li><span>Phone:</span>'.$DB->mbm_result($r,$i,"phone").'</li>';
				$buf .= '<li><span>Fax:</span>'.$DB->mbm_result($r,$i,"fax").'</li>';
				if(strlen($DB->mbm_result($r,$i,"email"))>10){
					$buf .= '<li><span>Email:</span><a href="mailto:'.$DB->mbm_result($r,$i,"email").'" target="_blank">';
					$buf .= '<img src="'.DOMAIN.DIR.'img.php?type=txt&txt='.$DB->mbm_result($r,$i,"email").'" border="0" />';
					$buf .='</a></li>';
				}
				if(strlen(str_replace("http://","",$DB->mbm_result($r,$i,"web")))>4){
					$buf .= '<li><span>Web:</span><a href="'.$DB->mbm_result($r,$i,"web").'" target="_blank">'.$DB->mbm_result($r,$i,"web").'</a></li>';
				}
				$buf .= '<li><span>Address:</span>'.$DB->mbm_result($r,$i,"address").'</li>';
				$buf .= '</ul>';
			$buf .= '</div>';
			$buf .= '<div id="companyContentMore">';
				$buf .= '<h2>More information</h2>';
				$buf .= $DB->mbm_result($r,$i,"content_more");
			$buf .= '</div>';
				$buf .= '';
		$buf .= '</div>';
		$buf .= mBmCommentsForm("llc_".$DB->mbm_result($r,$i,'id'),45,42);
		$DB->mbm_query("UPDATE ".$DB->prefix."companies SET hits=hits+".HITS_BY.",session_time='".mbmTime()."' WHERE id='".addslashes($id)."'");
	}
	
	return $buf;
}
?>