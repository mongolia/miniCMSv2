<?
$lang['main']['hits'] = 'Хууралт';
?>
<table width="950" border="0" align="center" cellpadding="5" cellspacing="0" style="background-color:#FFF;">
  <tr>
    <td align="center"><script type="text/javascript"><!--
google_ad_client = "pub-3377050199087606";
/* 728x90, created 12/20/08 */
google_ad_slot = "6641775160";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
  </tr>
  <tr>
    <td><div class="talbar">
             <?
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
				}else{
					mbm_include_file("templates/".TEMPLATE."/home.php");
				}
			 ?>
            </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr> <tr>
    <td align="center"><script type="text/javascript"><!--
google_ad_client = "pub-3377050199087606";
/* 728x90, created 12/20/08 */
google_ad_slot = "6641775160";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
  </tr>
</table>
