<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td valign="top"><?=mbmShowBanner('home_1')?></td>
        <td width="434" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="432" height="24" background="templates/everyday2/images/title_red.png" style="background-repeat:no-repeat; padding-left:10px; font-weight:bold; color:#FFFFFF;">Шинэ мэдээ</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="padding:5px;"><?
    $htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li>';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
	echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>57,'en'=>76)),1,5);
	?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" style="border:1px solid #DDDDDD; background-color:#f5f5f5; padding:5px;"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','930','height','65','src','images/logos','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','images/logos' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="930" height="65">
      <param name="movie" value="images/logos.swf" />
      <param name="quality" value="high" />
      <embed src="images/logos.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="930" height="65"></embed>
    </object></noscript></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="521" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="24" background="templates/everyday2/images/title_pink.png" style="background-repeat:no-repeat; padding-left:10px; font-weight:bold; color:#FFFFFF;">Шинэ бараа</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><?
                  echo mbmShoppingProducts2(0,0,'id','desc',4);
				  ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" align="right" valign="top"><?=mbmShowBanner('home_2')?></td>
            <td width="50%" align="right" valign="top"><?=mbmShowBanner('home_3')?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25"><table width="411" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16" height="25">&nbsp;</td>
                <td width="131" class="tab_active" id="tab1" onclick="showtab(1)">Шинэ үйлчилгээ</td>
                <td width="1"></td>
                <td width="131" class="tab_inactive" id="tab2" onclick="showtab(2)">Эрүүл хүнс</td>
                <td width="1"></td>
                <td width="131" class="tab_inactive" id="tab3" onclick="showtab(3)">Бизнес санал</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td ><img src="templates/everyday2/images/talbar_top.gif" /></td>
          </tr>
          <tr>
            <td background="templates/everyday2/images/talbar_middle.gif" style="background-repeat:repeat-y; padding:5px;"><div id="homeTabContent"></div>
                    <div id="homeTabContent1" style="display:none;">
                        <?=mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>64,'en'=>76)),2,2,'id','DESC',0,1);?>
                    </div>
              <div id="homeTabContent2" style="display:none;">
                  <?=mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>67,'en'=>76)),2,2,'id','DESC',0,1);?>
              </div>
              <div id="homeTabContent3" style="display:none;">
                  <?=mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>55,'en'=>76)),2,2,'id','DESC',0,1);?>
              </div>
              <script type="text/javascript">
                  function showtab(id){
				  	for(i=1;i<4;i++){
						document.getElementById('tab'+i).className='tab_inactive';
					}
						document.getElementById('tab'+id).className='tab_active';
						document.getElementById('homeTabContent').innerHTML=document.getElementById('homeTabContent'+id).innerHTML;
				  }
				  showtab(1);
                  </script>
            </td>
          </tr>
          <tr>
            <td><img src="templates/everyday2/images/talbar_footer.gif" width="521" height="11" /></td>
          </tr>
        </table></td>
        <td align="right" valign="top"><?=mbmShowBanner('home_video')?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
