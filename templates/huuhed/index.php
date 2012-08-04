<link href="templates/huuhed/css/main.css" rel="stylesheet" type="text/css">
<link href="templates/huuhed/css/content.css" rel="stylesheet" type="text/css">	

<table width="952" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="25" align="right" bgcolor="#f5f5f5" style="padding-right:5px;" ><a href="index.php" style="color:#000;">Нүүр хуудас</a> |<a href="#" style="color:#000;"> Холбоо тогтоох</a> | <a href="index.php?action=lang&amp;lang=mn" style="color:#000;">Монгол</a> | <a href="index.php?action=lang&amp;lang=en" style="color:#000;">English</a></td>
  </tr>
  <tr>
    <td ><?=mbmShowBanner('header')?></td>
  </tr>
  <tr>
    <td><?=mbmMenuDropDown()?></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" style="padding-left:5px;"><?
		if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
			include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
			if(strlen($_SERVER['QUERY_STRING'])>5 && $_GET['module']!='forum'){
				 echo '</td>';
				 echo '<td width="5"></td><td width="120" valign="top" align="center">'.mbmShowBanner('right');
				 echo '<td width="5"></td><td width="200" valign="top" bgcolor="#f5f5f5">';
				 echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="padding-left:10px;padding-bottom:4px;margin-bottom:3px;border-bottom:1px solid #DDDDDD;">','</div>'));
				echo '<div class="talbarTitleBlue">Их уншсан</div>';
				$htmls_normal[2] = '<div style="margin-bottom:6px;
									margin-top:3px;
									padding-top:6px;
									border-left:1px solid #003663;
									border-bottom:1px solid #003663;
									padding-left:5px;
									padding-bottom:3px;" >';
				$htmls_normal[3] = '</div>';
				echo mbmContentNews($htmls_normal,0,0,10,"hits","DESC",1);
				echo '<div class="talbarTitleGreen">'.$lang['poll']['poll'].'</div>';
				 echo mbmShowPoll(0,1);
				 echo mbmDicForm();
				 echo mbmDicEncycForm();
				 echo '</td>';
			}
		}else{
			include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
		}
	?></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="4" bgcolor="#FF8800"></td>
  </tr>
  <tr>
    <td height="60" align="center"><?=mbmStatImage().COPYRIGHT?></td>
  </tr>
</table>