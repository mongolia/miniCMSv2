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
    <td style="background-color:#FFF;"><? 
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td width="180" valign="top"><?
                        if($DB->mbm_check_field('menu_id',MENU_ID,'menus') == 1){
							$mmid = MENU_ID;
						}else{
							$mmid = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
						}
						if($mmid == 0){
							$mmid = 52;
						}
						echo mbmShowMenuById(array('','','',''),$mmid,'menuLeft',0,0);
						?></td>
					    <td valign="top" width="10"></td>
					    <td valign="top">
                        <?
                        include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
						?>
                        </td>
				      </tr>
  </table>
  <?
				}else{
					include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
				}
			  ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFF;">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="center" style="background-color:#FFF; 
    background-image:url(templates/everyday4/images/footer_bg.jpg);
     background-repeat:repeat-x;
     border-top:1px solid #2299fe;">
    	<?=COPYRIGHT?>
    </td>
  </tr>
</table>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
