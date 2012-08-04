<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="200"><a href="index.php"><img src="templates/monundes/images/logo.png" alt="monundes logo" width="180" height="94" border="0" /></a></td>
          <td><div style="font-size:18px; color:#FFF; font-family:Arial, Helvetica, sans-serif">Үндэсний үйлдвэрлэлээ дэмжье</div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?=mbmMenuDropDown(0,'menuTop')?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					echo '<tr>
   							 <td><div class="talbarContent">';
					mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
					echo '</div></td>
  						</tr>';
				}else{
					echo '<tr>
   							 <td><div class="homeContent">';
					mbm_include_file("templates/".TEMPLATE."/home.php");
					echo '</div></td>
  						</tr>';
				}
			 ?>
     </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
  </tr>
</table>