<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="90"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="160"><img src="templates/cyber/images/logo.gif" width="142" height="52" alt="cybercom.mn" /></td>
        <td>
        	<div id="topMenus">
            	<?
                    echo mbmShowMenuById(array('','','',''),0,'menuTOp',0,0);
                    ?>
            </div>
        </td>
        <td width="160" align="right">
        <form action="<?=DOMAIN.DIR.'modules/search/redirect.php'?>" method="post" style="margin:0px;">
        	<input type="text" value="Search..." name="q" id="q" class="searchField" />
        </form>
        </td>
      </tr>
    </table></td>
  </tr>
  <?
  	/*
	echo '<tr> <td>';
			//echo mbmShoppingShowCats($htmls=array(0=>'',1=>'',2=>'',3=>''),0,0,'topCats');
		echo '<div id="topCats">'.mbmShoppingCats__(0).'</div>';
	echo '</td></tr>';
	*/
	?>
  <tr>
    <td height="38" bgcolor="#f9f9fb">&nbsp;</td>
  </tr>
  <tr>
    <td>
    
    <?
		if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
			mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
		}else{
			mbm_include_file("templates/".TEMPLATE."/home.php");
		}
	?>
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="14" style="background-image:url(templates/cyber/images/down_shadow.jpg);">&nbsp;</td>
  </tr>
  <tr>
    <td height="40"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td align="right"><?=COPYRIGHT?></td>
      </tr>
    </table></td>
  </tr>
</table>
