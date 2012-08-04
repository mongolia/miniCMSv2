<title></title><style type="text/css">
<!--
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 11px;
}
a {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 11px;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Tahoma, Geneva, sans-serif;
}
h1 {
	font-size: 11px;
}
h2 {
	font-size: 11px;
}
h3 {
	font-size: 11px;
}
h4 {
	font-size: 11px;
}
h5 {
	font-size: 11px;
}
h6 {
	font-size: 11px;
}
-->
</style><table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="35" bgcolor="#FFFFFF">
      	<div class="title1">
        	Олон Улсын сургууль</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0">
        <tr>
		  <td width="9"></td>        
          <td valign="top" class="talbarBorder">
		   <marquee truespeed="truespeed" direction="left" scrollamount="1" scrolldelay="30" onmouseover="this.stop()" onmouseout="this.start()">
		  <?=mbmShowBanner('uls_banner')?>
          </marquee>
          </td>
          <td width="202" valign="top" class="talbarBorder"">
          <div>
		  <? echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="padding-left:10px;padding-bottom:4px;margin-bottom:3px;border-bottom:1px solid #DDDDDD;">','</div>'));?><br />
		  <?
		  if($_SESSION['lev'] == 0){
		  	echo mbmShowBanner('user_banner');
		  }
		  ?></td>
          <td width="5" valign="top"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="35" bgcolor="#FFFFFF">
      	<div class="title1">Шинэ мэдээ</div></td>
    </tr>
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td width="9"></td>        
          <td valign="top" style="border:0px solid #fa9e0e; padding:4px;">
          <?
					echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>4,'en'=>8888)),9,9,'date_added','DESC',0,1);
				  ?>
          </td>
          <td width="202" valign="top"><div class="talbarBorder">
		  <?
			  echo mbmShoutboxForm(18,190);
			  mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>393,'en'=>8888)),0,10,'date_added','DESC',0,1);
							?></div>
                            <div class="talbarBorder"><?=mbmShowBanner('right1')?></div>
                            <div class="talbarPadding"><?=mbmShowBanner('right2')?></div>
                            <div class="talbarPadding"><?=mbmShowBanner('right3')?></div>
                            <div class="talbarPadding"><?=mbmShowBanner('right4')?></div>
                            <div class="talbarPadding"><?=mbmShowBanner('right5')?></div>
                            <div class="talbarPadding"><?=mbmShowBanner('right6')?></div>
          </td>
          <td width="5" valign="top"></td>
        </tr>
        <tr>
          
          <td valign="top"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      
    </tr>
    <tr>
      <td height="35" bgcolor="#FFFFFF">
      	<div class="title1">Зургийн цомог</div>
      </td>
    </tr>
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td width="9"></td>        
          <td valign="top" style="border:0px solid #fa9e0e; padding:4px;"><div>
		  <?=mbmShowBanner('photo')?>
          </div></td>
          <td width="202" valign="top" class="talbarBorder"">
          <div>
            <?
				echo '<div class="title_poll">'.$lang['poll']['poll'].'</div>';
				echo mbmShowPoll(0,1);
			?>
          </div>
          <td width="5" valign="top"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="35" bgcolor="#FFFFFF">
      	<div class="title1">Дүрстэй мэдээ</div></td>
    </tr>
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td rowspan="2"><table width="100%" border="0">
            <tr>
              <td valign="top">
              <div><?=mbmShowBanner('video')?></div></td>
            </tr>
          </table></td>
          <td valign="top" height="130px"><div class="titleAcontent">
            <?=mbmShowBanner('footer_video')?>
          </div>
        </tr>
        <tr>
          <td width="595" valign="top" style="border:1px solid #333; padding:1px;"><div>
          <div class="title1footer">Ойрийн үед элсэлтээ авч буй сургууль</div>
          </div>
            <span style="border:0px solid #fa9e0e; padding:4px;">
                  <?=mbmShowBanner('school_links')?>
                  </span></td>
          <td width="5" valign="top"></td>
        </tr>
      </table></td>
    </tr>
</table>