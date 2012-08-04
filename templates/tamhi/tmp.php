<?
/*
$htmls_normal[0] = '<ul>';
$htmls_normal[2] = '<li>';
$htmls_normal[3] = '</li>';
$htmls_normal[1] = '</ul>';
*/
$htmls_normal[0] = '';
$htmls_normal[2] = '<div style="margin-bottom:6px;margin-top:6px;">';
$htmls_normal[3] = '</div>';
$htmls_normal[1] = '';

$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
$htmls_video[2] = '<td align="center" width="25%" valign="top">';
$htmls_video[3] = '</td>';
$htmls_video[1] = '</tr></table>';
?><link href="templates/most2/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/most2/css/mostmn.css" rel="stylesheet" type="text/css" />
<div style="padding-top:48px; padding-bottom:48px; margin:0px auto; width:986px;">
	<div>
    	<img src="templates/most2/images/top1.jpg" border="0" />
    </div>
	<div id="mainContainer">
    	<div id="subContainer" style="background-color:#FFFFFF; background-image:url(templates/most2/images/bg.gif);">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	  <tr>
        	    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	      <tr>
        	        <td height="30" width="300" style="color:#245e36; padding-left:12px;">Өнөөдөр : <?=mbmDate("Y оны m-р сарын d, ".$lang['day'][mbmDate("l")]." гараг")?></td>
        	        <td>
                    	<?=mbmShowBanner('deed');?>
                    </td>
      	          </tr>
      	      </table></td>
      	    </tr>
        	  <tr>
        	    <td height="1" bgcolor="#d3d3d3"></td>
      	    </tr>
        	  <tr>
        	    <td>&nbsp;</td>
      	    </tr>
        	  <tr>
        	    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	      <tr>
        	        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	          <tr>
        	            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	              <tr>
        	                <td height="74">
                            	<?=mbmShowBanner('logo');?>
                            </td>
        	                <td align="right" valign="top"><?=mbmShowBanner("top_468x60")?></td>
      	                </tr>
      	              </table></td>
      	            </tr>
        	          <tr>
        	            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	              <tr>
        	                <td width="6" align="left"><img src="templates/most2/images/topmenu_1.gif" width="6" height="30" alt="l" /></td>
        	                <td bgcolor="#195D36">
                            <?=mbmShowMenuById(array('','','',''),0,'menuTOP',1);?>
                            </td>
        	                <td width="10" bgcolor="#195D36">&nbsp;</td>
        	                <td width="6" align="right"><img src="templates/most2/images/topmenu_2.gif" width="6" height="30" alt="l" /></td>
      	                </tr>
      	              </table></td>
      	            </tr>
        	          <tr>
        	            <td height="5"></td>
      	            </tr>
        	          <tr>
        	            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	              <tr>
        	                <td width="210" valign="top">
                            	<?
									$leftMenuId = 0;
									$DB->mbm_get_field(MENU_ID,'menu_id','id','menus');
									if($DB->mbm_check_field('menu_id',MENU_ID,'menus') == 1){
										$leftMenuId = 387;
									}else{
										$leftMenuId = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
									}
									
								if($leftMenuId>0){	
									?>
                                <div class="leftTitle">
                                	Мэдээний төрөл
                                </div>
                                <div class="leftContent" id="leftMenu">
                                	<?=mbmShowMenuById(array('','','',''),$leftMenuId,'menuLEFT',1);?>
                                    <br clear="all" />
                                </div>
                                <div class="leftFooter">
                                	<img src="templates/most2/images/left_footer.gif" width="210" height="7" alt="l" />
                                </div>
                                <?
                                }
								?>
                            	<div class="leftTitle">
                                	Санал асуулга
                                </div>
                                <div class="leftContent">
                                	<?=mbmShowPoll(0,1);?>
                                </div>
                                <div class="leftFooter">
                                	<img src="templates/most2/images/left_footer.gif" width="210" height="7" alt="l" />
                                </div>
                                <div class="leftBanner">
                                	<?=mbmShowBanner("left_1")?>
                                </div>
                            	<div class="leftTitle">
                                	Хэрэглэгчийн булан
                                </div>
                                <div class="leftContent" id="userArea" style="padding-top:10px;">
								<?
                                 echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="padding-left:10px;padding-bottom:4px;margin-bottom:3px;border-bottom:0px solid #DDDDDD;">','</div>'));
                                ?>
                                    <br clear="all" />
                                </div>
                                <div class="leftFooter">
                                	<img src="templates/most2/images/left_footer.gif" width="210" height="7" alt="l" />
                                </div>
                            	<div class="leftTitle">
                                	Цаг агаар
                                </div>
                              <div class="leftContent">
                                <script src="http://weather.az.mn/share.php?c=MGXX0003"></script>
                              </div>
                              <div class="leftFooter">
                                	<img src="templates/most2/images/left_footer.gif" width="210" height="7" alt="l" />
                              </div>
                                <div class="leftBanner">
                                	<?=mbmShowBanner("left_2")?>
                                </div>
                                <div class="leftBanner">
                                	<?=mbmShowBanner("left_3")?>
                                </div>
                                <div class="leftBanner">
                                	<?=mbmShowBanner("left_4")?>
                                </div>
                                <div class="leftBanner">
                                	<?=mbmShowBanner("left_5")?>
                                </div>
                            </td>
        	                <td width="5" valign="top">&nbsp;</td>
        	                <td valign="top">
                            	<?
           						 if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
									mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
								}else{
									mbm_include_file("templates/".TEMPLATE."/home.php");
								}
								?>
                            </td>
        	                <td width="300" valign="top">
                            <div style="padding-left:10px; display:block;">
                            <?
								echo mbmContentNews($GLOBALS['htmls_normal'],MENU_ID,3,10,'date_added','DESC',0,1);
							?>
                            <br clear="all" />
                            </div>
                            </td>
      	                  </tr>
      	              </table></td>
      	            </tr>
        	          <tr>
        	            <td height="3"></td>
      	            </tr>
       	            </table></td>
        	        <td width="145" align="center" valign="top">
                    
                    	<?=mbmShowBanner("right_1")?>
                    	<?=mbmShowBanner("right_2")?>
                    	<?=mbmShowBanner("right_3")?>
                    	<?=mbmShowBanner("right_4")?>
                    	<?=mbmShowBanner("right_5")?>
                    </td>
      	        </tr>
      	      </table></td>
      	    </tr>
        	  <tr>
        	    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	      <tr>
        	        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	          <tr>
        	            <td width="6" align="left"><img src="templates/most2/images/topmenu_1.gif" width="6" height="30" alt="l" /></td>
        	            <td bgcolor="#195D36"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	              <tr>
        	                <td style="color:#FFF;">
                            <?=mbmShowMenuById(array('','','',''),388,'menuFooter',1);?>
                            </td>
        	                <td>&nbsp;</td>
        	                <td align="right" style="color:#FFF;"><?=COPYRIGHT?></td>
      	                </tr>
      	              </table></td>
        	            <td width="6" align="right"><img src="templates/most2/images/topmenu_2.gif" width="6" height="30" alt="l" /></td>
      	            </tr>
      	          </table></td>
        	        <td width="145">&nbsp;</td>
      	        </tr>
      	      </table></td>
      	    </tr>
          </table>
      </div>
    </div>
    <div>
    	<img src="templates/most2/images/top2.jpg" border="0" />
    </div>
</div>