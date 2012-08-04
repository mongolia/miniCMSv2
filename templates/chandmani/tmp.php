<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';

?><table width="950" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td align="right"><a href="index.php?action=logout&url=<?=base64_encode("login.php?l=1")?>">Гарах</a></td>
  </tr>
  <tr>
    <td width="202" valign="top" style="border:1px solid #c71919;">
    	<div id="menuLeft">
        	<?
			//echo mbmShowMenuById(array('','','',''),0,'menuLeft',0);
			echo mbmShowSlideDownMenu(0,'rootLeft','subLeft');
			?>
        </div>
    </td>
    <td width="5" valign="top"></td>
    <td valign="top" bgcolor="#822828" ><?=mbmShowBanner('header')?></td>
  </tr>
  <tr>
    <td valign="top">
    	<?
        if(MENU_ID == 11){
			//echo '<h2>Users</h2>';
			echo '<div id="leftUsers">';
            echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>11,'en'=>8888)),0,1000,'title','ASC',0,1);
			echo '</div>';
  		}elseif(MENU_ID == 12){
			echo '<div id="leftUsers">';
			//echo '<h2>Sectors</h2>';
            echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>12,'en'=>8888)),0,1000,'title','ASC',0,1);
			echo '</div>';
		}else{
		?>
		<div id="leftBanners">
            <div><?=mbmShowBanner('left_1')?></div>
            <div><?=mbmShowBanner('left_2')?></div>
            <div><?=mbmShowBanner('left_3')?></div>
            <div><?=mbmShowBanner('left_4')?></div>
            <div><?=mbmShowBanner('left_5')?></div>
        </div>
		<?
		}
		?>
    </td>
    
    <td></td>
    <td valign="top" style="padding-top:2px; padding-left:0px;" >
    <?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			}else{
				mbm_include_file("templates/".TEMPLATE."/home.php");
			}
		?>
    </td>
  </tr>
  <tr>
    <td height="45" colspan="3" align="center" bgcolor="#822828"><?=mbmStatImage().COPYRIGHT?></td>
  </tr>
</table>