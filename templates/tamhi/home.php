<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="99%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100" class="homeTabActive" id="homeTab0" onclick="mbmHomeTab(0)">Шинэ мэдээ</td>
            <td width="120" class="homeTabInactive" id="homeTab1" onclick="mbmHomeTab(1)">Шинэ функцууд</td>
            <td width="100" class="homeTabInactive" id="homeTab2" onclick="mbmHomeTab(2)">Их уншсан</td>
            <td width="125" class="homeTabActive" id="homeTab3" onclick="mbmHomeTab(3)">Хэрэгцээт</td>
            <td class="homeTabInactive" style="border-right:1px solid #FFFFFF;">&nbsp;</td>
          </tr>
        </table>
          <div id="homeTabContent0" style="display:none;">
            <?
                echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>1,'en'=>8888)),3,3,'date_added','DESC',0,1);
            ?>
          </div>
          <div id="homeTabContent1" style="display:none;">
			<?
                echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8,'en'=>8888)),3,3,'date_added','DESC',0,1);
            ?>
          </div>
          <div id="homeTabContent2" style="display:none;">
			<?
                echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>0,'en'=>8888)),5,5,'hits','DESC',0,1);
            ?>
          </div>
          <div id="homeTabContent3" style="display:none;">
            <?
				echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>25,'en'=>8888)),0,18);
			?>
          </div></td>
      </tr>
      <tr>
        <td valign="top" id="homeTabContent">Ачаалж байна...</td>
      </tr>
      <script language="JavaScript" type="text/javascript">
	function mbmHomeTab(id){
  	  targetTab = document.getElementById('homeTabContent');
		for(i=0;i<4;i++){
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
      <!--
      <tr>
        <td><div class="homeTitle">Фото мэдээлэл</div></td>
      </tr>
      <tr>
        <td><?=mbmShowNewContents($GLOBALS['htmls_video'],4,"is_photo",mbmShowByLang(array('mn'=>29,'en'=>8888)));?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      //-->
      <tr>
        <td><div class="homeTitle">Видео мэдээлэл</div></td>
      </tr>
      <tr>
        <td><?=mbmShowNewContents($GLOBALS['htmls_video'],4,"is_video",mbmShowByLang(array('mn'=>11,'en'=>8888)),'RAND()','');?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?=mbmFAQsForm(30)?></td>
      </tr>
    </table></td>
    <td width="325" valign="top"><?
	echo mbmShowBanner('home_1');
	echo mbmShowBanner('home_2');
	
	echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="margin-top:5px;margin-bottom:5px;border-bottom:1px solid #DDDDDD;">','</div>'));
	
	echo mbmShoutboxForm(25,280);
	
	
	echo '<div class="homeTitle_b">Шинэ сэтгэгдлүүд</div>';
	echo '<div style="padding:5px; border:1px solid #DDDDDD; background-color:#f5f5f5; height:300px;display:block; overflow:auto; margin-top:10px; width:325px;">';
	echo mbmShowContentComment(array('content_id'=>0,
												'limit'=>30,
												'order_by'=>'date_added',
												'asc'=>'DESC',
												'show_title'=>1
												)
										);
	echo '</div>';
	?>
    </td>
  </tr>
</table>
