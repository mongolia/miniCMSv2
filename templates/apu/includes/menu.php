<?
function mbmShowMenuByIdLeftMenu($htmls,$mid,$class='menu',$show_total_contents=0,$show_submenus=0){
	global $DB;
	$buf = '';
	$q_menu = "SELECT * FROM ".PREFIX."menus WHERE st=1 AND lev<=".$_SESSION['lev']." AND lang='".$_SESSION['ln']."' AND menu_id='".$mid."' ORDER BY pos";
	$r_menu = $DB->mbm_query($q_menu);
	if($DB->mbm_num_rows($r_menu) != 0){
		for($i=0;$i<$DB->mbm_num_rows($r_menu);$i++){
			$buf .= $htmls[0];
			$buf .= '<a href="';
			$buf .= mbmMenuLink($DB->mbm_result($r_menu,$i,"id"),$DB->mbm_result($r_menu,$i,"link"));
			$buf .= '" title="';
			if($DB->mbm_result($r_menu,$i,"comment")==''){
				$buf .= addslashes($DB->mbm_result($r_menu,$i,"name"));
			}else{
				$buf .= addslashes($DB->mbm_result($r_menu,$i,"comment"));
			}
			$buf .= '" class="menupriavte'.$DB->mbm_result($r_menu,$i,"id").' '.$class.'" target="'.$DB->mbm_result($r_menu,$i,"target").'">';
			$buf .= $DB->mbm_result($r_menu,$i,"name");
			$buf .= mbmShowNewContentNotify(array('menu_id'=>$DB->mbm_result($r_menu,$i,"id")));
			if($show_total_contents==1){
				$buf .= ' <span class="tCon">('.mbmMenuTotalContents(array('menu_id'=>$DB->mbm_result($r_menu,$i,"id"))).')</span>';
			}
			$buf .= '</a>';
			if($show_submenus == 1){
				$buf .= mbmShowMenuById($htmls,$DB->mbm_result($r_menu,$i,"id"),$class,$show_total_contents,$show_submenus);
			}
			$buf .=$htmls[1];
		}
	}
	return $buf;
}
?>