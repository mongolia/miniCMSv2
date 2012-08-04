<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<br clear="both" /><ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';

	$lang["error"]["low_level_content"] = "Уучлаарай. Та энэ мэдээлэлд нэвтрэх эрхгүй байна. members@mhri.mn руу хандаж түвшингээ нэмүүлнэ үү.";
	if($_SESSION['lev'] == 0){
		echo '<style>#contentCommentForm{display:none;}</style>';
	}
?><link href="templates/mhrimn/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/mhrimn/css/mhrimn.css" rel="stylesheet" type="text/css" />
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="250"><?=mbmShowBanner('logo')?></td>
        <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="70" style="padding:5px; color:#FFFFFF;"><?=mbmShowBanner('header')?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td height="30" bgcolor="#bf0000"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="2">
      <tr><td >
       <?
			echo mbmMenuDropDown(387);//mbmShowMenuById(array('<td width="120" align="center">','</td>'),387,'menu_top');
			?></td>
        <td align="right"> <?=mbmSearchForm()?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="160" valign="top" bgcolor="#f5f5f5"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><?
           echo mbmMenuListById(array(
								'menu_id'=>388,
								'lev'=>0,
								'st'=>1,
								'mainCatClass'=>'leftTitle',
								'subCatClass'=>'leftSubTitle'
								));
			?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td ><?=mbmShowPoll(0,1);?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
            <div style="margin-bottom:6px;"><?=mbmShowBanner('left_1')?></div>
            <div style="margin-bottom:6px;"><?=mbmShowBanner('left_2')?></div>
            <div style="margin-bottom:6px;"><?=mbmShowBanner('left_3')?></div>
            <div style="margin-bottom:6px;"><?=mbmShowBanner('left_4')?></div>
            <div style="margin-bottom:6px;"><?=mbmShowBanner('left_5')?></div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="10" valign="top">&nbsp;</td>
        <td valign="top"> <? 
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
				}else{
					include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
				}
			  ?></td>
        <td width="10" valign="top">&nbsp;</td>
        <td width="160" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?
                  echo mbmUserPanel($_SESSION['user_id'],array('','','<div class="ya_user_menu">','</div>'));
                  ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><?=mbmShowBanner('right_1')?></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td><?=mbmShowBanner('right_2')?></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td><?=mbmShowBanner('right_3')?></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td><?=mbmShowBanner('right_4')?></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td><?=mbmShowBanner('right_5')?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="80" align="center" bgcolor="#cc3333" style="color:#FFF;">| <?
	echo mbmShowMenuById(array('',' | '),387,'menu_footer').'<br /><br /><br />';
	echo mbmStatImage().COPYRIGHT;
	?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
