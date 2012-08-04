<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="200"><a href="index.php"><img src="templates/monos2/images/logo.jpg" alt="monos" hspace="5" vspace="5" border="0" /></a></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right" style="color:#4f7b00; padding-right:5px;">
            	<a href="index.php" style="color:#00a650;"><?=mbmShowByLang(array('mn'=>'Нүүр','en'=>'Home'))?></a> |  
                <!-- <a href="#" style="color:#4f7b00;">Анкет</a> |  //-->
            	<a href="index.php?module=monos&amp;cmd=contact&amp;menu_id=511" style="color:#00a650;"><?=mbmShowByLang(array('mn'=>'Холбоо барих','en'=>'Contact us'))?></a> | 
                <a href="index.php?module=menu&cmd=content&menu_id=570" style="color:#00a650;"><?=mbmShowByLang(array('mn'=>'Сайт бүтэц','en'=>'Sitemap'))?></a> |  
                <a href="index.php?action=lang&lang=<?=mbmShowByLang(array('mn'=>'en','en'=>'mn'))?>" style="color:#00a650;"><?=mbmShowByLang(array('mn'=>'English','en'=>'Mongolian'))?></a>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25"><?
	
	echo mbmDropDownMenus2();
	//echo mbmDropDownMenus(0);
	?></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
  <?
  if(strlen($_SERVER['QUERY_STRING'])<5){
  	echo '
	  <tr>
		<td valign="top">
		'
		.'<embed height="340" width="980" src="echka.swf" wmode="opaque" />'
		//.mbmShowBanner("header_".$_SESSION['ln'])
		.'
		</td>
	  </tr>';
  }else{
	echo '
	  <tr>
		<td valign="top" height="2" bgcolor="#000000" style="border-bottom:1px solid #dfdfdf;">
		</td>
	  </tr>'; 
  }
  ?>
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td>
    <?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				
				$deedMenuId = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
				$q_checkMenu = "SELECT id FROM ".$DB->prefix."menus WHERE menu_id='".MENU_ID."' AND st=1 AND lev<='".$_SESSION['lev']."'";
				$r_checkMenu = $DB->mbm_query($q_checkMenu);
				
				if( $deedMenuId == 0){
					$leftMenuId = 0;
					$leftTitle= 'Үндсэн цэс';
				}elseif($DB->mbm_num_rows($r_checkMenu) > 0){
					$leftMenuId = MENU_ID;
					$leftTitle= $DB->mbm_get_field(MENU_ID,'id','name','menus');
				}else{
					$leftMenuId = $deedMenuId;
					$leftTitle= $DB->mbm_get_field($leftMenuId,'id','name','menus');
				}
				echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="10" valign="top"></td>
						<td width="266" valign="top">
						<div style="border:1px solid #8d8d8d; margin-bottom:10px;">
							<div style="border-bottom:1px solid #8d8d8d; font-weight:bold; color:#239700; padding-top:14px; padding-left:15px; padding-bottom:5px;">
							'.$leftTitle.'</div>
							<div style="text-align:center;margin-bottom:6px;">
								'.mbmShowBannerByMenu('left_1_'.$_SESSION['ln']).'
							</div>
							<div>';
						//echo mbmShowMenuById(array('','','',''),$leftMenuId,'menu_left',0,1,1);
						$upper_menu_id = mbmGetUpperMenuId(MENU_ID);

						echo '<div id="leftMenu">';
						$currentMenuSub = $DB->mbm_get_field(MENU_ID,'id','sub','menus');
						$upperMenuId = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
						$upperMenuId2 = $DB->mbm_get_field($DB->mbm_get_field(MENU_ID,'id','menu_id','menus'),'id','menu_id','menus');
						
						if($currentMenuSub == 3){
							$leftMenuId = $DB->mbm_get_field($DB->mbm_get_field($DB->mbm_get_field(MENU_ID,'id','menu_id','menus'),'id','menu_id','menus'),'id','menu_id','menus');
						}elseif($currentMenuSub == 2){
							$leftMenuId = $DB->mbm_get_field($DB->mbm_get_field(MENU_ID,'id','menu_id','menus'),'id','menu_id','menus');
						}elseif($currentMenuSub == 1){
							$leftMenuId =$DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
						}else{
							$leftMenuId = MENU_ID;
						}
						
						$q_checkMenu = "SELECT * FROM ".$DB->prefix."menus WHERE menu_id='".$leftMenuId."' AND st=1 AND lev<='".$_SESSION['lev']."' AND lang='".$_SESSION['ln']."' ORDER BY pos";
						$r_checkMenu = $DB->mbm_query($q_checkMenu);
						
						for($i=0;$i<$DB->mbm_num_rows($r_checkMenu);$i++){
							
							echo '<div ';
								if($upperMenuId2 == $DB->mbm_result($r_checkMenu,$i,"id") 
								  || $DB->mbm_result($r_checkMenu,$i,"id") == MENU_ID
								  || $DB->mbm_result($r_checkMenu,$i,"id") == $upperMenuId
																									){
									echo 'style="background-image:url(templates/monos2/images/sum1.gif)"';
								}else{
									echo 'style="background-image:url(templates/monos2/images/sum0.gif)"';
								}
							echo '>';
								echo '<a href="'.mbmMenuLink($DB->mbm_result($r_checkMenu,$i,"id"),$DB->mbm_result($r_checkMenu,$i,"link")).'" ';
								if($upperMenuId2 == $DB->mbm_result($r_checkMenu,$i,"id") 
								  || $DB->mbm_result($r_checkMenu,$i,"id") == MENU_ID
								  || $DB->mbm_result($r_checkMenu,$i,"id") == $upperMenuId
									){
									echo 'class="leftMenu_active"';
									
									$q_submenus = "SELECT * FROM ".$DB->prefix."menus WHERE menu_id='".$DB->mbm_result($r_checkMenu,$i,"id")."' AND st=1 AND lev<='".$_SESSION['lev']."' ORDER BY pos";
									$r_submenus = $DB->mbm_query($q_submenus);
									$submenus = '';
									for($j=0;$j<$DB->mbm_num_rows($r_submenus);$j++){
										$submenus .= '<a href="'.mbmMenuLink($DB->mbm_result($r_submenus,$j,"id"),$DB->mbm_result($r_submenus,$j,"link")).'" ';
										if($DB->mbm_result($r_submenus,$j,"id") == MENU_ID 
												|| $DB->mbm_result($r_submenus,$j,"id") == $DB->mbm_get_field(MENU_ID,'id','menu_id','menus')
												){
											$submenus .= ' class="submenu_active leftSubmenu" ';
											/*sub3 ehlel*/
											if($upperMenuId == $DB->mbm_result($r_submenus,$j,"id") 
												|| $DB->mbm_result($r_submenus,$j,"id") == MENU_ID
												){
												echo 'class="leftMenu2_active"';
												
												$q_submenus2 = "SELECT * FROM ".$DB->prefix."menus WHERE menu_id='".$DB->mbm_result($r_submenus,$j,"id")."' AND st=1 AND lev<='".$_SESSION['lev']."' ORDER BY pos";
												$r_submenus2 = $DB->mbm_query($q_submenus2);
												$submenus2 = '';
												for($jj=0;$jj<$DB->mbm_num_rows($r_submenus2);$jj++){
													$submenus2 .= '<a href="'.mbmMenuLink($DB->mbm_result($r_submenus2,$jj,"id"),$DB->mbm_result($r_submenus2,$jj,"link")).'" ';
													if($DB->mbm_result($r_submenus2,$jj,"id") == MENU_ID){
														$submenus2 .= ' class="submenu2_active leftSubmenu2" ';
													}else{
														$submenus2 .= ' class="submenu2_inactive leftSubmenu2" ';
													}
													$submenus2 .= '>';
													
													$submenus2 .= $DB->mbm_result($r_submenus2,$jj,"name");
													$submenus2 .= '</a>';
												}
											}else{
												echo 'class="leftMenu_inactive"';
											}
											/*sub3 duusav*/
										}else{
											$submenus .= ' class="submenu_inactive leftSubmenu" ';
										}
										$submenus .= '>';
										
										$submenus .= $DB->mbm_result($r_submenus,$j,"name");
										$submenus .= '</a>';
										$submenus .= $submenus2;
										unset($submenus2);
									}
								}else{
									echo 'class="leftMenu_inactive"';
								}
								echo '>';
									echo $DB->mbm_result($r_checkMenu,$i,"name");
								echo '</a>';
							echo '</div>';
							echo $submenus;
							unset($submenus);
							
						}
						echo '</div>';
						//echo mbmShowSlideDownMenu($leftMenuId,'leftMain','leftMainSub');
						echo '</div>
						</div>
						<div style="text-align:center;">
							'.mbmShowBannerByMenu('left_2').'
						</div>
						</td>
						<td width="32" valign="top"</td>
						<td valign="top">';
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
				echo '</td>
						<td width="10" valign="top"></td>
					  </tr>
					</table>';
			}else{
				mbm_include_file("templates/".TEMPLATE."/home.php");
			}
		?>
    </td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td height="132" style="background-image:url(templates/monos2/images/bg_footer.jpg); background-repeat:repeat-x; background-color:#dce1dc; border:1px solid #c5d1b8; margin-top:10px; margin-bottom:10px;"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="25%" valign="top">
        <ul class="sumtai">
          <li><a href="index.php?module=menu&amp;cmd=content&menu_id=<?=mbmShowByLang(array('mn'=>408,'en'=>''))?>"><?=mbmShowByLang(array('mn'=>'МоносФарм','en'=>'Monospharma'))?></a></li>
          <li><a href="index.php?module=menu&amp;cmd=content&menu_id=409">Монос Косметик</a></li>
          <li><a href="index.php?module=menu&amp;cmd=content&menu_id=410">МоносФарм Трейд</a></li>
        </ul>
        </td>
        <td width="25%" valign="top">
        <ul class="sumtai">
          <li> <a href="index.php?module=menu&amp;cmd=content&menu_id=411">Монос АУДС</a></li>
          <li><a href="index.php?module=menu&amp;cmd=content&menu_id=412">Монос Улаанбаатар </a></li>
          <li><a href="index.php?module=menu&amp;cmd=content&menu_id=587">Эмч сонин</a></li>
        </ul>
        </td>
        <td width="25%" valign="top">
        <ul class="sumtai">
          <li><a href="index.php?module=menu&amp;cmd=content&menu_id=414">Монос Хаус Холд</a></li>
          <li> <a href="index.php?module=menu&amp;cmd=content&menu_id=415">Сити Оптик </a></li>
          <li> <a href="index.php?module=menu&amp;cmd=content&menu_id=419">Vichy </a></li>
        </ul>
        </td>
        <td width="25%" valign="top">
        <ul class="sumtai">
          <li><a href="index.php?module=menu&amp;cmd=content&menu_id=417">Монос Эм Судлалын хүрээлэн</a></li>
          </ul>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40" align="center"><?=COPYRIGHT?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<script language="javascript">

/*
if (window.ActiveXObject){
	$("ul.dropdown ul").css("margin-left","0px");
}else{
	$("ul.dropdown ul li").css("margin-left","-40px");
}
*/

<?
$lefmenuSubClass = 'menuleft_selected';
if($menuSUB == 2){
	$lefmenuSubClass .= ' subM';
}
?>
$("#LEFTMENU .menupriavte<?=MENU_ID?>").attr("class","<?=$lefmenuSubClass?>");


</script>