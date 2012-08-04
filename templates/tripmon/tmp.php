<style type="text/css">
@import url("templates/tripmon/css/main.css");
@import url("templates/tripmon/css/tripmon.css");
</style>
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?=mbmShowBanner("header_".$_SESSION['ln'])?></td>
  </tr>
  <tr>
    <td height="26" align="center" style="background-image:url(templates/tripmon/images/bg_menu.jpg); background-repeat:repeat-x;">
    <?
    echo mbmShowMenuById(array('','','',''),389,'menuTop',1);
	?>
    </td>
  </tr>
  <tr>
    <td height="4" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="208" valign="top">
        	<div style="margin-bottom:2px;"><?
			if(strlen($_SERVER['QUERY_STRING'])<5){
				echo mbmShowBanner('video_1');
			}else{
				echo mbmShowBanner('video_2');
			}
			?></div>
        	<div class="talbar">
            	<?=mbmShowBanner('left_1_'.$_SESSION['ln'])?>
            </div>
        	<div class="talbar">
            	<div style="background-image:url(templates/tripmon/images/bg_menuleft.jpg); 
                			background-repeat:repeat-x;
                            color:#FFF;
                            font-weight:bold;
                            padding-bottom:6px;
                            padding-top:5px;
                            text-align:center;
                            height:10px;">
                	Navigations
                </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="24" bgcolor="#333333" style="background-image:url(templates/tripmon/images/menuleft_bg.jpg); background-repeat:repeat-y;"><img src="templates/tripmon/images/menu_left.gif" width="24" height="152" alt="tripmongolia" /></td>
                    <td valign="top" bgcolor="#ffc000"><? //mbmShowMenuById(array('','','',''),390,'menuLeft',0);
           echo mbmMenuListById(array(
								'menu_id'=>390,
								'lev'=>0,
								'st'=>1,
								'mainCatClass'=>'leftTitle',
								'subCatClass'=>'leftSubTitle'
								));
			?></td>
                  </tr>
                </table>
        	</div>
        	<div class="talbar" style="background-color:#107cb6; padding:5px; color:#FFF;">
        	  <form id="form1" name="form1" method="post" action="">
              <center>
                <strong>Quick search</strong>
              </center>
        	    <select name="select" id="select" style="width:196px; margin-bottom:12px; margin-top:12px;">
      	      </select><br />
Search tour by name.
      	      </form>
        	</div>
        	<div class="talbar" style="background-color:#ffcc00; padding:5px; display:none;">Tour Search</div>
        	<div class="talbar"><?=mbmShowBanner("left_2_".$_SESSION['ln'])?></div>
        	<div class="talbar" style="display:none;"></div>
        </td>
        <td width="2" valign="top"></td>
        <td valign="top">
        	<?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
                echo '<div style=" /*border:1px solid #1c5d93;*/ padding-left:10px; padding-right:10px;">';
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
				echo '</div>';
            }else{
                mbm_include_file("templates/".TEMPLATE."/home.php");
            }
			?>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td height="90" bgcolor="#1f8eff" style="color:#FFF;" align="center">
    	<div style="margin-bottom:14px; color:#FFF;">|
        <?
    echo mbmShowMenuById(array('',' | ','',''),389,'menuBottom',1);
	?>
        </div>
        <?=COPYRIGHT?>
    </td>
  </tr>
</table>
<div>
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="132" height="105">
      <param name="movie" value="basicMP3player.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="8.0.35.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="../Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="basicMP3player.swf" width="132" height="105">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="8.0.35.0" />
        <param name="expressinstall" value="../Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
