<?

			$htmls_normal[0] = '<ul>';
			$htmls_normal[2] = '<li>';
			$htmls_normal[3] = '</li>';
			$htmls_normal[1] = '</ul>';
?><link href="templates/everyday4/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/everyday4/css/everydaymn.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<table width="952" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="952" height="200">
      <param name="movie" value="images/banners/flash/header.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="images/banners/flash/header.swf" width="952" height="200">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object></td>
  </tr>
  <tr>
    <td height="29"><?
			echo mbmShowMenuById(array('','','',''),52,'menuTop',0,0);
			?></td>
  </tr>
  <tr>
    <td style="background-color:#FFF;"><table width="100%" border="0" cellspacing="2" cellpadding="3">
      <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="templates/everyday4/images/tmp.jpg" width="582" height="310" alt="a" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong>Танилцуулга</strong><br />
<div style="padding:5px;">
<?
            echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>51,'en'=>76)),1,1,'id','DESC',0,1);
			?>
</div></td>
          </tr>
        </table></td>
        <td width="370" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="title_talbar">Шинэ бараа</td>
          </tr>
          <tr>
            <td style=" background-image:url(templates/everyday4/images/bg_new.gif); 
            background-position:5px 5px; background-repeat:no-repeat;">
           <div style="margin-left:15px;">
           <?
            echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>57,'en'=>76)),0,5,'id','DESC',0,0);
			?>
           </div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="title_talbar">Мэдээ мэдээлэл</td>
          </tr>
          <tr>
            <td style="padding:5px;">
             <?
			echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>57,'en'=>76)),2,2,'id','DESC',0,1);
			?>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="background-color:#FFF;">&nbsp;</td>
  </tr>
</table>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
