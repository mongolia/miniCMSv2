<table width="99%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100" class="homeTabActive" id="homeTab0" onclick="mbmHomeTab(0)">Шинэ мэдээ</td>
        <td width="120" class="homeTabInactive" id="homeTab1" onclick="mbmHomeTab(1)">Шинэ Мэндчилгээ</td>
        <td width="100" class="homeTabInactive" id="homeTab2" onclick="mbmHomeTab(2)">Их уншсан</td>
        <td width="125" class="homeTabActive" id="homeTab3" onclick="mbmHomeTab(3)">Бусад</td>
        <td class="homeTabInactive" style="border-right:1px solid #FFFFFF;">&nbsp;</td>
      </tr>
    </table>
      <div id="homeTabContent0" style="display:none;">
        <?
                echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>396,'en'=>8888)),3,8,'id','DESC',0,1);
            ?>
      </div>
      <div id="homeTabContent1" style="display:none;">
        <?
                echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>393,'en'=>8888)),3,3,'id','DESC',0,1);
            ?>
      </div>
      <div id="homeTabContent2" style="display:none;">
        <?
                echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>0,'en'=>8888)),3,8,'hits','DESC',0,1);
            ?>
      </div>
      <div id="homeTabContent3" style="display:none;">
        <?
				echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>0,'en'=>8888)),0,15);
			?>
      </div></td>
  </tr>
  <tr>
    <td valign="top" id="homeTabContent">Ачааллаж байна...</td>
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
	mbmHomeTab(0);
    </script>
  <tr>
    <td>&nbsp;</td>
  </tr>
      <tr>
        <td><div class="title_g">Фото</div></td>
      </tr>
      <tr>
        <td><?=mbmShowNewContents($GLOBALS['htmls_video'],4,"is_photo",mbmShowByLang(array('mn'=>0,'en'=>8888)));?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
  <tr>
    <td><div class="title_g">Видео</div></td>
  </tr>
  <tr>
    <td><?=mbmShowNewContents($GLOBALS['htmls_video'],4,"is_video",mbmShowByLang(array('mn'=>0,'en'=>8888)),'RAND()','');?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <td width="50%" valign="top"><div class="title_g"></div></td>
        <td valign="top"><div class="title_g">Шинэ сэтгэгдлүүд</div></td>
      </tr>
      <tr>
        <td valign="top">
        <?
        echo mbmShowBanner('home_1');
		?>
        </td>
        <td valign="top">
        <div style="display:block; overflow-y:auto; height:300px;">
        <?=mbmShowContentComment(array('content_id'=>0,
                                'limit'=>50,
                                'order_by'=>'date_added',
                                'asc'=>'DESC',
                                'show_title'=>1
                                )
                        )?>
        </div>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
