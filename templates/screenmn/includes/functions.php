<?
function mbmUserPanel_Screen($user_id=0,$htmls=array('','','',''),$b_url='index.php?module=users&cmd=login'){
	global $DB2;
	
	if($_SESSION['user_id']!=0 && $DB2->mbm_check_field('id',$_SESSION['user_id'],'users')==1 && $_SESSION['lev']>0){
		$buf = mbmUserMenus_Screen($user_id,$htmls);
	}else{ 
		if(strlen($_SERVER['QUERY_STRING'])<5){
			$b_url = DOMAIN.DIR;
		}else{
			$b_url = DOMAIN.DIR.'?'.$_SERVER['QUERY_STRING'];
		}
		$buf = mbmUserLoginForm_Screen($b_url);
	}
	return $buf;
}
function mbmUserMenus_Screen($user_id=0,$htmls=array('','','','')){
	global $DB2,$lang;
	$user_menus['index.php?module=users&amp;cmd=profile'] = $lang["users"]['user_profile'];
	$user_menus['index.php?module=users&amp;cmd=avatars'] = $lang["users"]['user_avatar'];
	//$user_menus['index.php?module=menu&cmd=play_videolist'] = $lang["menu"]["video_playlist"];
	//$user_menus['blog.php?blog_id='.$user_id] = $lang["users"]['user_blog'];
	if(mbmCheckMenuMultiplePermissions($user_id,array('write','normal'))==1){
		$user_menus['index.php?module=menu&cmd=content_add&type=normal'] = $lang["users"]['normal_content_add'];
		if(mbmCheckMenuMultiplePermissions($user_id,array('read','normal'))==1){
			$user_menus['index.php?module=menu&cmd=content_list&type=normal'] = $lang["users"]['normal_content_list'];
		}
	}
	if(mbmCheckMenuMultiplePermissions($user_id,array('write','is_photo'))==1){
		$user_menus['index.php?module=menu&cmd=content_add&type=photo'] = $lang["users"]['photo_content_add'];
		if(mbmCheckMenuMultiplePermissions($user_id,array('read','is_photo'))==1){
			$user_menus['index.php?module=menu&cmd=content_list&type=is_photo'] = $lang["users"]['photo_content_list'];
		}
	}
	if(mbmCheckMenuMultiplePermissions($user_id,array('write','is_video'))==1){
		$user_menus['index.php?module=menu&cmd=content_add&type=video'] = $lang["users"]['video_content_add'];
		if(mbmCheckMenuMultiplePermissions($user_id,array('read','is_video'))==1){
			$user_menus['index.php?module=menu&cmd=content_list&type=is_video'] = $lang["users"]['video_content_list'];
		}
	}
	//$user_menus['index.php?module=menu&cmd=menu_users'] = 'content management';
	//$user_menus['index.php?module=photogallery&amp;cmd=photo_add'] = $lang["users"]['photo_add'];
	$user_menus['index.php?action=logout&url='.base64_encode("index.php")] = $lang["users"]['user_logout'];
	
	$buf .= '<div class="userPanelTitle">'.$lang['users']['login_title'].'</div>';
	$buf .= '<center>'.$DB2->mbm_get_field($user_id,'id','username','users').'<br />'.mbmUserAvatar($user_id).'</center>';
	foreach($user_menus as $k=>$v){
		$buf .= $htmls[2];
			$buf .= '<a href="'.$k.'">'.$v.'</a>';
		$buf .= $htmls[3];
	}
	if($DB2->mbm_check_field('id',$user_id,'users')==1){
		return $htmls[0].$buf.$htmls[1];
	}else{
		return '';
	}
}
function mbmUserLoginForm_Screen($back_url='index.php?module=users&cmd=login'){
	global $lang;

	$buf = '<form name="userLoginForm" id="userLoginForm" method="post" action="index.php?action=userLogin&amp;url='.base64_encode($back_url).'">
	  <table width="100%" border="0" cellspacing="0" cellpadding="3" class="loginTBL">
		<tr>
		  <td colspan="2" class="loginTitle">'.$lang['users']['login_title'].'</td>
		</tr>
		<tr>
		  <td width="30%" align="right">'.$lang['users']['login_username'].'</td>
		  <td><input type="text" size="18" name="username" id="username" class="login_input"></td>
		</tr>
		<tr>
		  <td align="right">'.$lang['users']['login_password'].'</td>
		  <td><input type="password" size="18" name="password" id="password" class="login_input"><input type="submit" name="loginButton" class="login_button" id="loginButton" autocomplete="off" value="'.$lang['users']['login_button'].'"></td>
		</tr>
		<tr>
		  <td align="right">&nbsp;</td>
		  <td>
		<!--<input type="checkbox" name="save_me" id="save_me" class="login_input">
		//--></td>
		</tr>
	  </table>
	</form>
	';
	return $buf;
}
function mbmUpdateUserScore_Screen($user_id=0,$score=0){
	global $DB2;

	if($_SESSION['user_id']>0){
		return $DB2->mbm_query("UPDATE ".$DB2->prefix."users SET score=score+".$score." WHERE id='".$user_id."' LIMIT 1");
	}else{
		return 0;
	}
}

function mbmContentFreeNews($htmls=array(0=>'',1=>'',2=>'',3=>''),$menu_id=0,$total_main=1,$total_contents=10,$orderby='id',$asc='DESC',$use_media=0,$show_more_button=0){
	global $DB,$DB2,$lang;
	
	$q_contents = "SELECT * FROM ".PREFIX."menu_contents WHERE st=1 AND date_added>".(mbmTime()-21*24*60*60)." AND  date_added<".(mbmTime()-7*24*60*60)." ";
	if($use_media==0){
		$q_contents .= "AND is_video=0 AND is_photo=0 ";
	}
	if(is_array($menu_id)){
		//menu_id -g array bolgoj oruulval array-d bui menunuudiin medeelliig haruulna
		$q_contents .= "AND ( ";
		foreach($menu_id as $k=>$v){
			$q_contents .= "menu_id LIKE '%,".$k.",%' OR ";
		}
		$q_contents = rtrim($q_contents,"OR ");
		$q_contents .= ") ";
	}elseif($menu_id!=0){
		$q_contents .= "AND menu_id LIKE '%,".$menu_id.",%' ";
	}
	if($orderby == 'hits'){
		//$q_contents .= "AND date_added>".(mbmTime()-24*7*3600)." ";
	}
	$q_contents .= "ORDER BY ".$orderby." ".$asc." LIMIT ".$total_contents;
	$r_contents = $DB->mbm_query($q_contents);
	
	$buf2 = $htmls[0];
	$buf = '';
	for($i=0;$i<$DB->mbm_num_rows($r_contents);$i++){
		$content_menu_id = explode(',',$DB->mbm_result($r_contents,$i,"menu_id"));
		if($DB->mbm_result($r_contents,$i,"cleanup_html")==1){
			$content_short = mbmCleanUpHTML($DB->mbm_result($r_contents,$i,"content_short"));
			if($total_main>0){
			$buf .= '<a href="index.php?module=menu&amp;cmd=content&amp;menu_id='
					.$content_menu_id[1].'&amp;id='.$DB->mbm_result($r_contents,$i,"id").'" class="contentMoreLink">'
					.$lang["main"]["more"].'</a>';
			}
		}else{
			$content_short = $DB->mbm_result($r_contents,$i,"content_short");
		}
		
		$c_title = $DB->mbm_result($r_contents,$i,"title");
		
		if(defined("CONTENT_TITLE_LENGTH")){
			if(mbm_strlen($c_title)>CONTENT_TITLE_LENGTH){
				$c_title = mbm_substr($c_title,CONTENT_TITLE_LENGTH).'...';
			}
		}
		
		if($i<$total_main){
			if($DB->mbm_result($r_contents,$i,"show_title")=='1'){
				$buf .= '<div class="contentTitle" onclick="window.location=\'index.php?module=menu&amp;cmd=content&amp;menu_id='
						.$content_menu_id[1]
						.'&amp;id='.$DB->mbm_result($r_contents,$i,"id")
						.'\'" '
						.' title="'.addslashes($DB->mbm_result($r_contents,$i,"title")).'"'
						.'>'.$c_title.'</div>';
			}
			if($total_contents>1){
				$buf11 .= '<div  class="mbmTimeConverter">'
					.mbmTimeConverter($DB->mbm_result($r_contents,$i,"date_added"))
					.'</div>';
			}
			$buf .= $content_short;
			if($show_more_button == '1'){
				$buf .= '<a href="index.php?module=menu&amp;cmd=content&amp;menu_id='
						.$content_menu_id[1].'&amp;id='.$DB->mbm_result($r_contents,$i,"id")
						.'" class="contentMoreLink">'.$lang['main']['more'].'</a>';
			}
		}else{
			$buf2 .= $htmls[2];
			$buf2 .= '<a href="index.php?module=menu&amp;cmd=content&amp;menu_id='
						.$content_menu_id[1].'&amp;id='.$DB->mbm_result($r_contents,$i,"id").'" title="'.addslashes($DB->mbm_result($r_contents,$i,"title")).'">'
						.$c_title
						.'</a>';
			$buf2 .= $htmls[3];
		}
		$c_title = '';
	}
	$buf .= $buf2.$htmls[1];
	
	//echo $q_contents;
	
	return $buf;
}
?>