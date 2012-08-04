<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?=mbmShowBanner('header_'.$_SESSION['ln'])?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="templates/undes/images/con_top.gif" width="950" height="9" alt="a" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" style="padding-left:10px; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td width="11"><img src="templates/undes/images/menu_left.jpg" width="11" height="48" alt="a" /></td>
                	<td style="background-image:url(templates/undes/images/menu_bg.jpg); background-repeat:repeat-x;"><?=mbmMenuDropDown(0,'menuTop')?></td>
                	<td width="11"><img src="templates/undes/images/menu_right.jpg" width="11" height="48" alt="a" /></td>
                </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top">
            <div><?=mbmShowBanner('top_'.$_SESSION['ln']);?></div>
            <div style="background-image:url(templates/undes/images/div2_bg.gif); background-repeat:no-repeat; padding-left:85px; padding-top:3px; height:16px; display:block; margin-bottom:6px; margin-top:6px;">
            	<marquee truespeed="truespeed" direction="left" scrollamount="1" scrolldelay="30" onmouseover="this.stop()" onmouseout="this.start()">
                	<?=SCROLL_TEXT?>
                </marquee>
            </div>
            <div><img src="templates/undes/images/cont2_top.gif" border="0" /></div>
            <div style="border-left:1px solid #bababa;border-right:1px solid #bababa; padding-left:10px; padding-right:10px;">
				<div style="width:668px; height:400px; overflow:auto;">
				<?
                    if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
                        mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
                    }else{
                        mbm_include_file("templates/".TEMPLATE."/home.php");
                    }
                 ?></div>
            </div>
            <div><img src="templates/undes/images/con2_footer.gif" border="0" /></div>
            </td>
            <td width="10" valign="top"></td>
            <td width="230" valign="top">
            	<div class="loginTalbar">
                	<?=mbmUserPanel($_SESSION['user_id'],array('<div id="uCommands">','</div>','',''),'index.php?module=users&cmd=login')?>
                </div>
                <div class="talbarRight">
                	<?=mbmShowBanner('right_1_'.$_SESSION['ln'])?>
                </div>
                <div class="talbarRight">
                	<?=mbmShowBanner('right_2_'.$_SESSION['ln'])?>
                </div>
                <div class="talbarRight">
                	<?=mbmShowBanner('right_3_'.$_SESSION['ln'])?>
                </div>
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="templates/undes/images/con_footer.gif" width="950" height="9" alt="b" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="60" align="center"><?
    echo COPYRIGHT;
	//echo '<br />'.date("Y,m,d H:i",mbmTime());
	?></td>
  </tr>
</table>