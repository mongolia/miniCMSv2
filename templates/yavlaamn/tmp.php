<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<br clear="both" /><ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
	
	
?><style type="text/css">
<!--
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
}
-->
</style><div style="margin:0px auto; width:950px; padding-left:15px; padding-right:15px; background-image:url(templates/yavlaa2/images/bg_con.jpg); background-repeat:repeat-y;">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td width="300"><?=mbmShowBanner('logo')?></td>
          <td align="right"> <?=mbmShowBanner('header')?> </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td bgcolor="#353333" class="topmenu">
		<div>
		  <?=mbmDropDownMenus(0)?>
		</div></td>
    </tr>
    <tr>
      <td height="6"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="9"></td>
          <td width="237" valign="top" style="border:1px solid #fa9e0e; padding:4px;">
          <div id="menuLEFT">
		   <h2>Хөтөлбөр</h2>
		   <?
			echo mbmShowMenuById(array('','','',''),7,'menu_left',0);
			?>
			</div>
          </td>
          <td width="4" valign="top"></td>
          <td valign="top" style="border:1px solid #fa9e0e; height:271px; background-image:url(templates/yavlaa2/images/top2bg.jpg); background-repeat:no-repeat;">
          	<div style="margin-right:50px; margin-top:25px; width:180px; float:right; text-align:center;">
            	<form action="" method="post" onsubmit="uniOl();return false;" style="margin:0px;" id="searchU">
                	<h3>Сургуулиа хайх</h3>
                    <select id="zereg" name="zereg">
                    	<?=mbmUniZeregDropDown()?>
                    </select>
                    <select id="mergejil" name="mergejil">
                    	<?=mbmUniMergejilDropDown()?>
                    </select>
                    <select id="uls" name="uls">
                    	<?=mbmUniUlsDropDown()?>
                    </select>
                    <input type="submit" name="findButton" class="findButton" value="FIND A SCHOOL" />
                </form>
            </div>
          </td>
          <td width="5" valign="top"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    </table>
    <? 
		if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
			
			echo '<div style="border:1px solid #fa9e0e; padding:9px; margin-left:9px; margin-right:5px;">';
			include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
			echo '</div>';
		}else{
			include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
		}
	  ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="80" align="center" bgcolor="#353333" style="color:#FFF;"><?=mbmStatImage().COPYRIGHT?></td>
    </tr>
  </table>
</div>