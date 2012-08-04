<div 
	style="
            border-top:4px solid #ee1c25; 
            width:819px; 
            margin:0px auto; 
            background-color:#FFF;
            background-image:url(templates/apu/images/bg_top.jpg);
            background-repeat:repeat-x;">
	<div style="height:88px; display:block; padding-left:30px;">
<div style="width:400px; float:right; margin-right:25px; margin-top:10px; text-align:right;">
        	<span style="padding-bottom:4px; border-bottom:1px solid #f2f2f2; color:#6b6b6b; margin-right:10px;">
            	<strong>APU:</strong> <?=mbmDate("M d Y H:i")?>
            </span> 
            <select id="changeLang" onchange="window.location='index.php?action=lang&lang='+this.value">
            	<option value="mn">Language (Mongolian)</option>
            	<option value="en" <?
                	if($_SESSION['ln'] == 'en'){
						echo 'selected';
					}
				?>>Language (English)</option>
            </select>
        </div>
    	<div style="width:180px; float:left; padding-top:20px;">
        	<a href="index.php" title="APU home">
 	       		<img src="templates/apu/images/logo_top.gif" border="0px" alt="apu logo" />
            </a>
        </div>
    </div>
	<div id="topMenu">
    <?
    	$q_menus = "SELECT * FROM ".DB_PREFIX."menus WHERE lang='".$_SESSION['ln']."' AND st='1' AND lev<='".$_SESSION['lev']."' AND menu_id=0 ORDER BY pos LIMIT ".mbmShowByLang(array('mn'=>8,'en'=>9));
		$r_menus = $DB->mbm_query($q_menus);
		for($i=0;$i<$DB->mbm_num_rows($r_menus);$i++){
			echo '<a href="'.mbmMenuLink($DB->mbm_result($r_menus,$i,"id"),$DB->mbm_result($r_menus,$i,"link")).'">'.$DB->mbm_result($r_menus,$i,"name").'</a>';
		}
	?>
    </div>
    <? 
		if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
			echo '<table border="0" width="100%" cellspacing="0" cellpadding="0">';
				echo '<tr><td height="8"></td></tr>';
				echo '<tr>';
					echo '<td valign="top" height="320" width="238" style="background-image:url(templates/apu/images/left_col_bg.jpg); background-repeat:repeat-y; background-position:right;">';
						echo '<div style="
										padding-top:26px;	
										padding-bottom:15px;
										padding-left:30px;">';
						$upper_menu_id = mbmGetUpperMenuId(MENU_ID);
						if(file_exists(ABS_DIR.'images/titles/'.$upper_menu_id.'.png')){	
							echo '<img src="images/titles/'.$upper_menu_id.'.png" />';
						}
						echo '</div>';
						echo '<div id="leftMenu">';
						
						
						$currentMenuSub = $DB->mbm_get_field(MENU_ID,'id','sub','menus');
						$upperMenuId = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
						
						if($currentMenuSub == 2){
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
								if($upperMenuId == $DB->mbm_result($r_checkMenu,$i,"id") || $DB->mbm_result($r_checkMenu,$i,"id") == MENU_ID){
									echo 'style="background-image:url(templates/apu/images/sum1.gif)"';
								}else{
									echo 'style="background-image:url(templates/apu/images/sum0.gif)"';
								}
							echo '>';
								echo '<a href="'.mbmMenuLink($DB->mbm_result($r_checkMenu,$i,"id"),$DB->mbm_result($r_checkMenu,$i,"link")).'" ';
								if($upperMenuId == $DB->mbm_result($r_checkMenu,$i,"id") || $DB->mbm_result($r_checkMenu,$i,"id") == MENU_ID){
									echo 'class="leftMenu_active"';
									
									$q_submenus = "SELECT * FROM ".$DB->prefix."menus WHERE menu_id='".$DB->mbm_result($r_checkMenu,$i,"id")."' AND st=1 AND lev<='".$_SESSION['lev']."' ORDER BY pos";
									$r_submenus = $DB->mbm_query($q_submenus);
									$submenus = '';
									for($j=0;$j<$DB->mbm_num_rows($r_submenus);$j++){
										$submenus .= '<a href="'.mbmMenuLink($DB->mbm_result($r_submenus,$j,"id"),$DB->mbm_result($r_submenus,$j,"link")).'" ';
										if($DB->mbm_result($r_submenus,$j,"id") == MENU_ID){
											$submenus .= ' class="submenu_active leftSubmenu" ';
										}else{
											$submenus .= ' class="submenu_inactive leftSubmenu" ';
										}
										$submenus .= '>';
										
										$submenus .= $DB->mbm_result($r_submenus,$j,"name");
										$submenus .= '</a>';
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
					echo '</td>';
					echo '<td valign="top" style="padding-left:5px;padding-right:20px;">';
						mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
					echo '</td>';
				echo '</tr>';
				echo '<tr><td height="8"></td></tr>';
			echo '</table>';
		}else{
			mbm_include_file("templates/".TEMPLATE."/home.php");
		}
	  ?>
</div>
<div
        style="
                width:820px; 
                margin:0px auto; 
                background-color:#e8ebef;
                ">
    <div style="height:60px; background-image:url(templates/apu/images/bg3.gif); background-repeat:no-repeat; background-color:#FFF; border-top:4px solid #e8ebef;">
        <div style="width:575px; margin-right:20px; float:right; padding-top:12px;">
            <?=mbmShowBanner('footer_brands_'.$_SESSION['ln'])?>
    </div>
        <div style="float:left; width:212px; height:40px; padding-top:20px;text-align:right; margin-right:8px;">
            
            <?
                $buf_products = '<select onchange="jumpToBrands(this.value);" class="productsDropDown">';
                $buf_products .= '<option value="0">'.mbmShowByLang(
                                                array(
                                                      'mn'=>'Брэнд сонгоно уу',
                                                      'en'=>'Choose a brand'
                                                      )
                                                ).'</option>';
                $productsMenuId = mbmShowByLang(
                                                array(
                                                      'mn'=>5,
                                                      'en'=>49
                                                      )
                                                );
                $buf_products .=  '<option value="0" disabled ></option>';
                $q_products = "SELECT * FROM ".$DB->prefix."menus WHERE menu_id='".$productsMenuId."' AND st=1 AND lev<='".$_SESSION['lev']."' ORDER BY pos";
                $r_products = $DB->mbm_query($q_products);
                
                for($i=0;$i<$DB->mbm_num_rows($r_products);$i++){
                    
                    $buf_products .=  '<option value="0" disabled >'.$DB->mbm_result($r_products,$i,"name").'</option>';
                    
                    $q_products2 = "SELECT * FROM ".$DB->prefix."menus WHERE menu_id='".$DB->mbm_result($r_products,$i,"id")."' AND lev<='".$_SESSION['lev']."' ORDER BY pos";
                    $r_products2 = $DB->mbm_query($q_products2);
                    //echo $q_products2.' --';
                    for($j=0;$j<$DB->mbm_num_rows($r_products2);$j++){
                        $buf_products .=  '<option value="'.$DB->mbm_result($r_products2,$j,"id").'" style="padding-left:20px;" ';
                        if(MENU_ID == $DB->mbm_result($r_products2,$j,"id")){
                            $buf_products .= 'selected ';
                        }
                        $buf_products .=  '>'.$DB->mbm_result($r_products2,$j,"name").'</option>';
                    }
                    $buf_products .=  '<option value="0" disabled ></option>';
                    
                }
                $buf_products .= '</select>';
                echo $buf_products;
            ?>
        </div>
    <br clear="all" />
    </div>
    <script language="javascript">
    function jumpToBrands(menu_id){
        if(menu_id==0){
            return false;
        }else{
            window.location='index.php?module=menu&cmd=content&menu_id='+menu_id;
        }
    }
    </script>
    <div >
        <img src="templates/apu/images/footer_t.gif" width="819" height="11" alt="hee" />
        <br clear="all" />
        <div style="padding-top:5px;width:215px; float:right; display:block;" id="footerRight">
            <a href="#"><?=mbmShowByLang(array('en'=>'Contact us','mn'=>'Холбоо тогтоох','ru'=>''))?></a>
            <a href="#"><?=mbmShowByLang(array('en'=>'Sitemap','mn'=>'Сайтын бүтэц','ru'=>''))?></a>
        </div>
        <div style="padding-top:5px; padding-left:10px;width:415px; height:40px; float:left; display:block; color:#777;">
            <?=COPYRIGHT?>
        </div>
        <br clear="all" />
    </div>
</div>