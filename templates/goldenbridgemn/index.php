<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><img src="templates/goldenbridgemn/images/tmp1.gif" width="672" height="70" alt="goldenbridge" /></td>
        <td width="2" valign="top"></td>
        <td width="176" valign="top">
        	<div style="position:relative;">
            	<div style="width:5px; height:70px; position:absolute; top:0px; right:0px;"><img src="templates/goldenbridgemn/images/top_right_right.jpg" width="5" height="70" alt="a" /></div>
                <div style="width:5px; height:70px; top:0px; left:0px;"><img src="templates/goldenbridgemn/images/top_right_left.jpg" width="5" height="70" alt="a" /></div>
                <div style="height:70px; top:0px; right:5px; left:5px; position:absolute; background-image:url(templates/goldenbridgemn/images/top_right_middle.jpg); background-repeat:repeat-x; color:#FFF;">
                 <br />
                  <span style="font-size:14px;;">SEARCH</span>
                  <?=mbmSearchForm()?>
                </div>
            </div>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="182" valign="top">
        	<div class="leftTalbarTitle" style="margin-bottom:2px;">Main navigation</div>
            <div style="height:6px;"><img src="templates/goldenbridgemn/images/talbar_left_top.gif" width="182" height="6" alt="a" /></div>
            <div style="border-left:1px solid #d1d1d1;border-right:1px solid #d1d1d1; display:block; padding:3px;">
            	<?
				//echo mbmShowMenuById(array('','','',''),397,'menu_left',0,0);
				?><?
                    $htmls_leftmenu[3] = '';
				$htmls_leftmenu[2] = '';
				$htmls_leftmenu[0] = '<div style="border-bottom:1px solid #FFFFFF;">';
				$htmls_leftmenu[1] = '</div>';
				//echo mbmShowMenuById($htmls_leftmenu,13,'menu_left');
				echo mbmMenuDropDownV(array('menu_id'=>397,'class'=>'menu'));
					?>
            </div>
            <div style="height:6px;"><img src="templates/goldenbridgemn/images/talbar_left_footer.gif" width="182" height="6" alt="a" /></div>
        	<div class="leftTalbarTitle" style="margin-top:2px;">Members area</div>
            <div style="border-left:1px solid #d1d1d1;border-right:1px solid #d1d1d1; display:block; padding:3px;">
            	<?
			   echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="padding-left:10px;padding-bottom:4px;margin-bottom:3px;border-bottom:1px solid #DDDDDD;">','</div>'));
				?>
            </div>
            <div style="height:6px;"><img src="templates/goldenbridgemn/images/talbar_left_footer.gif" width="182" height="6" alt="a" /></div>
            <div style="height:6px; margin-top:2px;"><img src="templates/goldenbridgemn/images/talbar_left_top.gif" width="182" height="6" alt="a" /></div>
            <div style="border-left:1px solid #d1d1d1;border-right:1px solid #d1d1d1; display:block; padding:3px;">
            	<?=mbmShowBanner('left_1')?>
            </div>
            <div style="height:6px;"><img src="templates/goldenbridgemn/images/talbar_left_footer.gif" width="182" height="6" alt="a" /></div>
        </td>
        <td width="2" valign="top"></td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="29" style="background-image:url(templates/goldenbridgemn/images/menu_bg.jpg); background-repeat:repeat-x;"><?=mbmDropDownMenus(0)?></td>
          </tr>
          <tr>
            <td height="2"></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top"> <?
					if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
						mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
					}else{
						mbm_include_file("templates/".TEMPLATE."/home.php");
					}
					?>
                  </td>
                <td width="2" valign="top"></td>
                <td width="182" valign="top">
            <div style="height:6px; margin-top:2px;"><img src="templates/goldenbridgemn/images/talbar_left_top.gif" width="182" height="6" alt="a" /></div>
            <div style="border-left:1px solid #d1d1d1;border-right:1px solid #d1d1d1; display:block; padding:3px;">
            <?=mbmShowBanner('right_1')?>
            <?=mbmShowBanner('right_2')?>
            <?=mbmShowBanner('right_3')?>
            <?=mbmShowBanner('right_4')?>
            <?=mbmShowBanner('right_5')?>
            </div>
            <div style="height:6px;"><img src="templates/goldenbridgemn/images/talbar_left_footer.gif" width="182" height="6" alt="a" /></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td height="5" bgcolor="#e2e2e2"></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td height="60" align="center" bgcolor="#e2e2e2"><?=COPYRIGHT?></td>
  </tr>
  </table>
