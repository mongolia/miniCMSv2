<table width="100%" border="0">
  <tr>
    <td width="50%" valign="top"><div class="titleA">Мэндчилгээ</div>
      <div class="titleAcontent">
        <?
					echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>13,'en'=>8888)),1,1,'date_added','DESC',0,1);
				  ?>
      </div>
      <div class="titleA">Шинэ мэдээ</div>
      <div class="titleAcontent">
        <?
					echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>9,'en'=>8888)),4,4,'date_added','DESC',0,1);
				  ?>
      </div></td>
    <td width="50%" valign="top"><div class="titleA">Зар</div>
      <div class="titleAcontent"></div>
      <div class="titleA">Зургийн цомог</div>
      <div class="titleAcontent">
      	<?=mbmShowNewContents($GLOBALS['htmls_video'],3,"is_photo",mbmShowByLang(array('mn'=>0,'en'=>8888)));?>
      </div>
      <div class="titleA">Видео мэдээлэл</div>
      <div class="titleAcontent">
      	<?=mbmShowNewContents($GLOBALS['htmls_video'],3,"is_video",mbmShowByLang(array('mn'=>0,'en'=>8888)));?>
      </div></td>
  </tr>
</table>
