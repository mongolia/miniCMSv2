 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
      <?
      echo mbmShowBanner('header');
	  //<embed width="858" height="298" src="images/main.swf" wmode="opaque"></embed>
	  ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top">
          <div class="title_3"><h3>Онцгой бараа</h3>
          </div>
          <p>
          <?
		  echo mbmShowBanner('home_baraa');
		  ?>
          </p>
          </td>
          <td valign="top" width="5"></td>
          <td valign="top" width="235" >
          <div class="title_3">
          <h3>Онцгой бараа</h3></div>
          <p>
          <?
		  echo mbmShoppingProducts2(0,0,'id','desc',1);
		  ?>
          </p>
          </td>
          <td valign="top" width="5"></td>
          <td valign="top" >
          <div class="title_3">
          <h3>Онлайн шоп</h3></div></td>
          <td valign="top" width="5"></td>
          <td valign="top" width="235" >
          <div class="title_3"><h3>Шинэ мэдээ</h3></div>
          <?
			$htmls_normal[0] = '<ul>';
			$htmls_normal[2] = '<li>';
			$htmls_normal[3] = '</li>';
			$htmls_normal[1] = '</ul>';
			echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>57,'en'=>76)),1,5,'date_added','DESC',0,1);
			?>
          </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>