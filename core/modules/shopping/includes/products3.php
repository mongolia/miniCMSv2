<?
function mbmShoppingProducts3($cat_id=0,$is_digital=0,$order_by='id',$asc='desc', $limit=20,$cols=2, $show_more_button=1){
		global $DB,$lang;
		
		$lang['main']['more'] = '';
		
		$q = "SELECT * FROM ".PREFIX."shop_products WHERE st=1 AND lev<='".$_SESSION['lev']."' ";
		if($cat_id!=0){
			$q .= "AND cat_ids LIKE '%,".$cat_id.",%' ";
		}
		$q .= "ORDER BY ".$order_by." ".$asc." ";
		if($limit!=0){
			$q .= "LIMIT ".$limit;
		}
		$r = $DB->mbm_query($q);
		
		$buf = '<div id="shopProductsList3">';
		
		if($cat_id==0){
			$per_page = PER_PAGE;
		}else{
			$per_page = $DB->mbm_get_field($cat_id,'id','per_page','shop_cats');
		}
		if((START+$per_page) > $DB->mbm_num_rows($r)){
			$end= $DB->mbm_num_rows($r);
		}else{
			$end= START+$per_page; 
		}
		if(strlen($_SERVER['QUERY_STRING'])<3 && $cols == 2){
			$end = $limit;
		}
		$page_start = START;
		if($DB->mbm_num_rows($r) < $limit ){
			$end = $DB->mbm_num_rows($r);
		}
		if(strtolower($order_by) == 'rand()'){
			$page_start = 0;
		}
		for($i=$page_start;$i<$end;$i++){
			$buf .= '<div class="shopItem">';
			
			$more_link = ''.DOMAIN.DIR.'index.php?module=shopping&cmd=products&cat_id=';
			if($cat_id==0){
				$more_link .= mbmShoppingSelectOneCatId($DB->mbm_result($r,$i,'cat_ids'));
			}else{
				$more_link .= $cat_id;
			}
			$more_link .= '&id='.$DB->mbm_result($r,$i,'id').'';
			
			$buf .= '<div class="productNumber">Бараа №<span>'.$DB->mbm_result($r,$i,'id').'</span></div>';
			$buf .= '<a href="'.$more_link.'">';
				$buf .= '<img hspace="5" border="0" src="'.DOMAIN.DIR.'img.php?type='
						.$DB->mbm_result($r,$i,'image_filetype')
						.'&amp;f='
						.base64_encode($DB->mbm_result($r,$i,'image_thumb'))
						.'&w=130&h=120'
						.'" class="productThumb" />';
			$buf .='</a>';
			$buf .= '<div class="productTitle">';
				$buf .= $DB->mbm_result($r,$i,'name');
			$buf .= '</div>';
			
			$buf .= '<div class="productPrice">';
				if(($DB->mbm_result($r,$i,'price_sale')*1)==0){
					$buf .= number_format($DB->mbm_result($r,$i,'price'),2).' '.CURRENCY;
				}else{
					$buf .= '<div style="text-decoration:line-through;font-weight:normal;"><small><small>'.number_format($DB->mbm_result($r,$i,'price'),2).' '.CURRENCY.'</small></small></div>';
					$buf .= number_format($DB->mbm_result($r,$i,'price_sale'),2).' '.CURRENCY;
				}
			$buf .= '</div>';
			if($show_more_button==1){
				$buf .= '<div>';
					$buf .= '<a href="'.$more_link.'" class="productMoreLink">'.$lang['main']['more'].'</a>';
				$buf .= '</div>';
			}
			$buf .= '</div>';
			if((($i+1)%$cols)==0 || ($i+1) == $DB->mbm_num_rows($r) ){
				$buf .= '<br clear="all" />';
			}
		}
		$buf .= '</div>';
		$buf .= mbmNextPrev('index.php?module=shopping&cmd=products&cat_id='.$cat_id,$DB->mbm_num_rows($r),START,$per_page);
		return $buf;
	}
function mbmShoppingProductList3(
								$var = array(
											 'cat_id'=>0,
											 'columns'=>2,
											 'img_height'=>100,
											 'img_width'=>100,
											 'is_digital'=>0,
											 'order_by'=>'date_added',
											 'show_more_button'=>0,
											 'show_title_at_top'=>0,
											 'show_content_short'=>0,
											 'per_page'=>12,
											 'asc'=>'DESC',
											 'limit'=>10
											 )
								){
	global $DB,$lang;
	
	
	
	$query_string = '&amp;';
	
	if(isset($_GET['ob'])){
		$var['order_by'] = $_GET['ob']." ";
		$query_string .= '&amp;ob='.$_GET['ob'];
	}else{
		$var['order_by'] = "date_added ";
	}
	
	if(isset($_GET['asc'])){
		$var['asc'] = $_GET['asc']." ";
		$query_string .= '&amp;asc='.$_GET['asc'];
	}else{
		$var['asc'] = "DESC ";
	}
	
	
	if(is_array($var['cat_id'])){
		$tmp_kkkkk= 0;
		foreach($var['cat_id'] as $k=>$v){
			$cat_ids .= "cat_ids LIKE '%,".$k.",%' OR ";
			if($tmp_kkkkk == 0){
				$main_cat_id = $DB->mbm_get_field($k,'id','shop_cat_id','shop_cats');
			}
			$tmp_kkkkk++;
		}
		$cat_ids = '('.rtrim($cat_ids," OR").') AND ';
		//$main_cat_id = $DB->mbm_get_field($var['cat_id'][$k],'id','shop_cat_id','shop_cats');//[rand(0,count($var['cat_id']))]; //cat id g random oor avna.
	}elseif($var['cat_id'] != '0'){
		$cat_ids = "cat_ids LIKE '%,".$var['cat_id'].",%' AND ";
		$main_cat_id = $var['cat_id'];
	}else{
		$main_cat_id = 0;
	}
	$q = "SELECT * FROM ".PREFIX."shop_products WHERE 
			".$cat_ids."  
			(st='1' AND lev<='".$_SESSION['lev']."') 
			AND is_digital = '".$var['is_digital']."' ";
	$q .= "ORDER BY ".$var['order_by']." ".$var['asc'];
	if((int)($var['limit']) != 0) $q .= "LIMIT ".$var['limit'];
	
	$r = $DB->mbm_query($q);
	
	$buf = '';
	$buf .= '<div id="shoppingProducts">';
	
	if((START+$var['per_page']) > $DB->mbm_num_rows($r)){
		$end= $DB->mbm_num_rows($r);
	}else{
		$end= START+$var['per_page']; 
	}
	for($i=START;$i<$end;$i++){
	//for($i=0;$i<$DB->mbm_num_rows($r);$i++){
		
		//linkiig todorhoiloh
		$more_link = ''.DOMAIN.DIR.'index.php?module=shopping&cmd=products&cat_id=';
		if($cat_id==0){
			$more_link .= mbmShoppingSelectOneCatId($DB->mbm_result($r,$i,'cat_ids'));
		}else{
			$more_link .= $cat_id;
		}
		$more_link .= '&amp;id='.$DB->mbm_result($r,$i,'id');
		
		$buf .= '<div class="productContentShort3">';
			if($var['show_title_at_top'] == 1){
				$buf .= '<div class="productTitle">'.$DB->mbm_result($r,$i,'name').'</div>';
			}
			$buf .= '<a href="'.$more_link.'" title="'.addslashes($DB->mbm_result($r,$i,'name')).'">';
				$buf .= '<img hspace="5" border="0" src="'.DOMAIN.DIR.'img.php?type='
						.$DB->mbm_result($r,$i,'image_filetype')
						.'&amp;f='
						.base64_encode($DB->mbm_result($r,$i,'image_thumb'))
						.'&w='.$var['img_width'].'&h='.$var['img_height']
						.'" class="productThumb" />';
			$buf .='</a>';
			if($var['show_title_at_top'] == 0){
				$buf .= '<div class="productTitle">'.$DB->mbm_result($r,$i,'name').'</div>';
			}
			if($DB->mbm_result($r,$i,'type_id')!=0){
				$buf .= '<div class="productType">';
					$buf .= $DB->mbm_get_field($DB->mbm_result($r,$i,'type_id'),'id','name','shop_types');
				$buf .= '</div>';
			}
			$buf .= '<div class="productID">Барааны дугаар:';
				$buf .= '<strong>'.$DB->mbm_result($r,$i,'id').'</strong>';
			$buf .= '</div>';
			if($var['show_content_short'] == 1){
				$buf .= '<div class="productShortInfo">'.$DB->mbm_result($r,$i,'content_short').'</div>';
			}
			$buf .= '<br clear="all" />';
			$buf .= '<div class="productPrice">';
					if(($DB->mbm_result($r,$i,'price_sale')*1)==0){
						$buf .= '<span>';
							$buf .= number_format($DB->mbm_result($r,$i,'price')).' '.CURRENCY;
						$buf .= '</span>';
					}else{
						$buf .= '<span class="productPriceDicounted">'.number_format($DB->mbm_result($r,$i,'price')).' '.CURRENCY.'</span>';
						$buf .= '<span>';
							$buf .= number_format($DB->mbm_result($r,$i,'price_sale')).' '.CURRENCY;
						$buf .= '</span>';
					}
				$buf .= '</div>';
			$buf .= '';
			$buf .= '';
			$buf .= '';
			if($var['show_more_button'] == 1){
				$buf .= '<div id="productMoreLink">';
					$buf .= '<a href="'.$more_link.'" class="productMoreLink">Үзэх >></a>';
				$buf .= '</div>';
			}
		$buf .= '</div>';
		if(($i+($var['columns']-1))%$var['columns'] == 0){
			$buf .= '<br clear="all" />';
		}
		
		
	}
	$buf .= mbmNextPrev(''.DOMAIN.DIR.'index.php?module=shopping&cmd=products&cat_id='.$main_cat_id .$query_string,$DB->mbm_num_rows($r),START,$var['per_page']);
	$buf .= '</div>';
	
	return $buf;
}
?>