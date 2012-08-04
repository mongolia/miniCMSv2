<table cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td><?=mbmShowBanner('home_header')?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="125" class="homeTabActive" id="homeTab0" onclick="mbmHomeTab(0)"><?=mbmShowByLang(array('mn'=>'Хэвлэл мэдээлэл','en'=>'Press release'))?></td>
            <td class="homeTabInactive" id="homeTab1" onclick="mbmHomeTab(1)"><?=mbmShowByLang(array('mn'=>'Үйл явдал','en'=>'Events'))?></td>
            </tr>
        </table>
          <div id="homeTabContent0" style="display:none;">
            <?
			$htmls_normal[0] = '<div id="contentShort"><ul>';
			$htmls_normal[2] = '<li>';
			$htmls_normal[3] = '</li>';
			$htmls_normal[1] = '</ul></div>';
                echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>22,'en'=>76)),1,7,'id','DESC',0,1);
            ?>
          </div>
          <div id="homeTabContent1" style="display:none;">
			<?
                echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>23,'en'=>77)),1,7,'id','DESC',0,1);
            ?>
          </div></td>
      </tr>
      <tr>
        <td valign="top" id="homeTabContent">Loading...</td>
      </tr>
      <script language="JavaScript" type="text/javascript">
	function mbmHomeTab(id){
  	  targetTab = document.getElementById('homeTabContent');
		for(i=0;i<2;i++){
			document.getElementById('homeTab'+i).className='homeTabInactive';
		}
		document.getElementById('homeTab'+id).className='homeTabActive';
		targetTab.innerHTML = document.getElementById('homeTabContent'+id).innerHTML;
	}
	mbmHomeTab(1);
    </script>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
        </td>
        <td width="10" valign="top">&nbsp;</td>
        <td width="418" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center"><?=mbmShowBanner('home1')?></td>
          </tr>
          <!--
          
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="36" background="templates/newcom/images/talbar_title_b.png" style="padding-left:10px; font-weight:bold; color:#ffffff;"><?=$lang["menu"]["content_photo"]?></td>
          </tr>
          <tr>
            <td><?
			$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
			$htmls_video[2] = '<td align="center" width="25%" valign="top">';
			$htmls_video[3] = '</td>';
			$htmls_video[1] = '</tr></table>';
			echo mbmShowNewContents($htmls_video,4,"is_photo",mbmShowByLang(array('mn'=>0,'en'=>0)));
			?></td>
          </tr>
          //-->
          <tr>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td align="center"><?=mbmShowBanner('home2_'.$_SESSION['ln'])?></td>
          </tr>
        </table></td>
        <td width="110" align="center" valign="top">
<?=mbmShowBanner('home_partners')?></td>
      </tr>
    </table></td>
  </tr>
</table>
