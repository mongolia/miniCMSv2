<?
/*
$htmls_normal[0] = '<ul>';
$htmls_normal[2] = '<li>';
$htmls_normal[3] = '</li>';
$htmls_normal[1] = '</ul>';
*/
$htmls_normal[0] = '';
$htmls_normal[2] = '<div style="margin-bottom:6px;margin-top:6px;">';
$htmls_normal[3] = '</div>';
$htmls_normal[1] = '';

$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
$htmls_video[2] = '<td align="center" width="25%" valign="top">';
$htmls_video[3] = '</td>';
$htmls_video[1] = '</tr></table>';
?>
<table width="960" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" align="center" bgcolor="#F9F9F9" class="border1">
    	<form action="" method="post">
        	<input type="text" name="q" style="width:400px;" /> <input type="submit" value="search..." />
        </form>
    </td>
  </tr>
  <tr>
    <td height="6"></td>
  </tr>
  <tr>
    <td bgcolor="#333333">
    	<div id="topMenus">
        <?
		/*
		$menus = array(
					   'Эхлэл'=>'/',
					   'Улс төр'=>'#',
					   'Эдийн засаг'=>'#',
					   'Дэлхий дахинд'=>'#',
					   'Урлаг Спорт'=>'#',
					   'Гэр бүл'=>'#',
					   'Технологи'=>'#',
					   'Нийгэм'=>'#'
					   );
		$kkk=0;
        foreach($menus as $k=>$v){
			echo '<a href="'.$v.'" ';
			if($kkk>0){
				echo 'onclick="alert(\'no contents yet.....\'); return false;" ';
			}
			echo '>'.$k.'</a>';
			$kkk++;
		}
    	 echo mbmDropDownMenus2(0);
		*/
		echo mbmShowMenuById(array('','','',''),0,'menuTOP',0);
	 ?>
        </div>
    </td>
  </tr>
  <tr>
    <td height="6"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="200" valign="top" bgcolor="#f9f9f9" class="border1">
        <div style="padding:5px;">
        <h2>Gogo.MN</h2>
		<div id="gogo"></div>
        <h2>CNN.COM</h2>
		<div id="cnn"></div>
        </div>
        </td>
        <td width="5" valign="top"></td>
        <td valign="top">
         <? 
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
				}else{
					include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
				}
			  ?>
        </td>
        <td width="5" valign="top"></td>
        <td width="120" valign="top" bgcolor="#F5F5F5" class="border1"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40" bgcolor="#F9F9F9" class="border1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<script language="javascript">
$(document).ready(function(){
    getRSS('#gogo', '<?=base64_encode('http://news.gogo.mn/feed')?>','rss_title');
    getRSS('#cnn', '<?=base64_encode('http://rss.cnn.com/rss/cnn_topstories.rss')?>','rss_title');
});
</script>