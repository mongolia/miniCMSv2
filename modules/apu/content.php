<?
if($mBm!=1){
	die("direct access not allowed.");
}else{
	//echo '<h2>'.$DB->mbm_get_field(MENU_ID,'id','name','menus').'</h2>';
	$DB->mbm_query("UPDATE ".PREFIX."menus SET hits=hits+".HITS_BY." WHERE id='".MENU_ID."' LIMIT 1");
	
	echo mbmShowContents(array('','','',''),MENU_ID,array(
												   'show_briefInfo'=>1
												   ));
}

$which_menu = mbmShowByLang(array('mn'=>402,'en'=>411));
if(MENU_ID == $which_menu && isset($_GET['id'])){
	$q_sss = "SELECT * FROM ".PREFIX."menu_contents WHERE st='1' AND lev<='".$_SESSION['lev']."' AND menu_id LIKE '%,".$which_menu.",%' ORDER BY date_added DESC LIMIT 10";
	$r_sss = $DB->mbm_query($q_sss);
	
	echo '<br clear="all" /><hr />';
	for($i=0;$i<$DB->mbm_num_rows($r_sss);$i++){
		echo '<div>';
			echo date("Y.m.d",$DB->mbm_result($r_sss,$i,"date_added"));
			echo ' <span style="padding-left:10px;">';
				echo '<a href="index.php?module=menu&cmd=content&menu_id='.$which_menu.'&id='.$DB->mbm_result($r_sss,$i,"id").'" >';
					echo $DB->mbm_result($r_sss,$i,"title");
				echo '</a>';
			echo '</span>';
		echo '</div>';
	}
	if($DB->mbm_num_rows($r_sss) >10 ){
		echo '<div style="margin-top:6px;">';
			echo '<a href="index.php?module=menu&cmd=content&menu_id='.$which_menu.'" >';
				echo 'Бусад мэдээ';
			echo '</a>';
		echo '</div>';
	}
}
if(MENU_ID == 395 || MENU_ID == 409){
	include_once(ABS_DIR."modules/airticket/contact.php");
}
?>