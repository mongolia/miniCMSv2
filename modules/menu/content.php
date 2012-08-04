<?
if($mBm!=1){
	die("direct access not allowed.");
}else{
	//echo '<h2>'.$DB->mbm_get_field(MENU_ID,'id','name','menus').'</h2>';
	$DB->mbm_query("UPDATE ".PREFIX."menus SET hits=hits+".HITS_BY." WHERE id='".MENU_ID."' LIMIT 1");


	if($DB->mbm_check_field('menu_id',MENU_ID,'menus')==1){
		$mmm_id = MENU_ID;
	}else{
		$mmm_id = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
	}
	switch(MENU_ID){
		case 2:
			$mmm_id_content = mbmSubmenusInArray(rand(3,7));
		break;
		case 3:
			$mmm_id_content = mbmSubmenusInArray(3);
		break;
		case 4:
			$mmm_id_content = mbmSubmenusInArray(4);
		break;
		case 5:
			$mmm_id_content = mbmSubmenusInArray(5);
		break;
		case 6:
			$mmm_id_content = mbmSubmenusInArray(6);
		break;
		case 7:
			$mmm_id_content = mbmSubmenusInArray(7);
		case 314: //news
			$mmm_id_content = 314;
			$content_type = 'normal';
		break;
		case 317: //photo
			$mmm_id_content = 317;
			$content_type = 'photo';
		break;
		break;
		case 332:
			$mmm_id_content = mbmSubmenusInArray(332);
		case 333:
			$mmm_id_content = mbmSubmenusInArray(333);
		break;
		case 335:
			$mmm_id_content = mbmSubmenusInArray(335);
		break;
		case 338: //embed videos
			$mmm_id_content = 338;
			$content_type = 'normal';
		break;
		case 355:
			$mmm_id_content = mbmSubmenusInArray(355);
		break;
		case 369:
			$mmm_id_content = mbmSubmenusInArray(369);
		break;
		case 387:
			$mmm_id_content = 387;
			$content_type = 'normal';
		break;
		case 447: //embed videos
			$mmm_id_content = 447;
			$content_type = 'normal';
		break;
		default:
			$mmm_id_content = MENU_ID;
		break;
	}
	$menu_leftPrint1 = mbmMenuListByIdLi(array(
							'menu_id'=>$mmm_id,//390
							'lev'=>0,
							'st'=>1,
							'mainCatClass'=>'',
							'subCatClass'=>'',
							'show_total_contents'=>1
							));
		
	$menu_leftPrint = mbmShowMenuById(array('','','',''),$mmm_id,'menu_left',1);

	if(!isset($content_type)) $content_type = 'video';
	
	if($content_type=='normal' && !isset($_GET['id'])){
		$contents_jagsaalt = mbmShowContents(array('','','',''),$mmm_id_content,array(
													   'show_briefInfo'=>0,
													   'username'=>0,
													   'div_id'=>'contentShort',
													   'type'=>'all',
													   'img_width'=>120,
													   'img_height'=>90,
													   'order_by'=>'date_added',
													   'asc'=>'DESC'
													   ));
	}else{
		$contents_jagsaalt = mbmShowContentsYadii(array('','','',''),$mmm_id_content,array(
												   'show_briefInfo'=>0,
												   'username'=>0,
												   'div_id'=>'contentShort',
												   'type'=>$content_type,
												   'img_width'=>120,
												   'img_height'=>90,
												   'order_by'=>'date_added',
												   'asc'=>'DESC'
												   ));
	}
	
	//echo '<div style="height:10px; clear:both"></div>';
	if(isset($_GET['menu_id']) && isset($_GET['id'])){
		echo '<div style="clear:both; margin-bottom:6px; margin-top:6px;">';
		echo mbmShowBanner('A1');
		echo '</div>';
		echo $contents_jagsaalt;
	}else{
		echo '<div id="content_rightPanel">'
				. '<div style="clear:both; margin-bottom:6px;">'
				.mbmShowBanner('A3')
				.'</div>'
				.'<div style="width:120px;max-height:600px; background-color:#F5F5F5;float:right;border:1px solid #DDD;">'.mbmShowBanner('V2').'</div>'
				.'<div style="width:670px;float:left;"><h2>'.$DB->mbm_get_field(MENU_ID,'id','name','menus').'</h2>'
				.$contents_jagsaalt
				.'</div></div>';
		echo '<div id="content_leftPanel">';
		 '<script type="text/javascript"><!--
google_ad_client = "pub-3377050199087606";
/* 120x90, bosoo menu 5 shirheg */
google_ad_slot = "2482926535";
google_ad_width = 120;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><br />';
		echo '<strong>'.$DB->mbm_get_field($mmm_id,'id','name','menus').'</strong><br />';
			echo '<div style="max-height:400px; overflow-y:auto; display:block;margin-bottom:6px;">';
			echo $menu_leftPrint;
			echo '</div>';
		echo '<div style="width:120px;height:600px; background-color:#F5F5F5;float:left;margin-top:6px;margin-bottom:6px;margin-left:10px;border:1px solid #DDD;">'.mbmShowBanner('V1').'</div>';
		echo '</div>';
	}
}

?>