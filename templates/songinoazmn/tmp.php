<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
?><link href="templates/songinoazmn/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/songinoazmn/css/songinoazmn.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6888346-11");
pageTracker._trackPageview();
} catch(err) {}</script>
<div style="margin:0 auto; width:972px; position:relative;">
<div id="topButtons" style="margin-bottom:-8px; padding-right:20px; display:block;">
    	<table width="100%" border="0" align="right" cellpadding="0" cellspacing="1">
          <tr>
            <td height="26" align="left" style="color:#FFF; padding-left:20px;">Таны хандаж буй улс: [<?=$_SESSION['country']['name']?>], Одоо Улаанбаатар хотод : <?=date("Y/m/d H:i")?></td>
            <td width="125" height="26" class="buttonTop"><a href="#">Фото</a></td>
            <td width="125" class="buttonTop"><a href="#">Видео</a></td>
            <td width="125" class="buttonTop"><a href="#">Холбоо тогтоох</a></td>
          </tr>
        </table>
    </div>
</div>
<div id="mainContainer">
	<div style="background-image:url(templates/songinoazmn/images/bg_con_top.jpg); height:22px; top:0px; background-repeat:no-repeat; background-position:top;">
  </div>
    <div style="padding-left:10px; padding-right:10px; background-image:url(templates/songinoazmn/images/bg_con.jpg); background-repeat:repeat-y;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="100" align="center"><img src="templates/songinoazmn/images/tolgoi.jpg" width="940" height="100" alt="songino sum" /></td>
        </tr>
        <tr>
          <td height="32" style="padding-left:5px; padding-right:5px; background-color:#01549c;"><?=mbmDropDownMenus()?></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <tr>
          <td style="padding:5px;background-color:#FFF; border-left:5px solid #d2e4f9; border-right:5px solid #d2e4f9;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr style="padding-right:10px; padding-left:10px;"><?
            if(strlen($_SERVER['QUERY_STRING'])<5){
				mbm_include_file("templates/songinoazmn/col1.php");
			}
			?>
              <td valign="top"><?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			}else{
				mbm_include_file("templates/".TEMPLATE."/home.php");
			}
		?></td>
              <td width="5" valign="top"></td><?
            if(strlen($_SERVER['QUERY_STRING'])>5){
				//require_once(ABS_DIR."templates/songinoazmn/col1.php");
			}
			?>
              <td width="240" valign="top">
              <?
				echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="padding-left:10px;padding-bottom:4px;margin-bottom:3px;border-bottom:1px solid #DDDDDD;">','</div>'));
				echo '<div class="title_poll">'.$lang['poll']['poll'].'</div>';
				echo mbmShowPoll(0,1);
				echo mbmShoutboxForm(15,230);
				
				echo '<div style="margin-bottom:6px; margin-top:6px;">'.mbmShowBanner('right_1').'</div>';
				echo '<div style="margin-bottom:6px; margin-top:6px;">'.mbmShowBanner('right_2').'</div>';
			?>
              </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
          <div style="display:block;">
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td width="20%">
          <h2>Сүлжээ сайтууд</h2></td>
              <td width="20%"><h2>Түнш сайтууд</h2></td>
              <td width="20%"><h2>Хийгдэж буй ажлууд</h2></td>
              <td width="20%"><h2>АЗ сүлжээ</h2></td>
              <td width="20%"><h2>Тусламж</h2></td>
            </tr>
            <tr>
              <td valign="top">
              	<a href="http://www.az.mn" target="_blank" class="footer_links">Аз сүлжээ</a>
              	<a href="http://www.yadii.net" target="_blank" class="footer_links">Яадий.Нэт</a>
              	<a href="http://shop.az.mn" target="_blank" class="footer_links">Интернэт худалдаа</a>
              	<a href="http://share.az.mn" target="_blank" class="footer_links">Файл түгээх сайт</a>
              	<a href="http://www.unegui.com" target="_blank" class="footer_links">Үнэгүй.Ком</a>
              	<a href="http://www.unegui.net" target="_blank" class="footer_links">Үнэгүй.Нэт</a>
              	<a href="http://php.az.mn" target="_blank" class="footer_links">PHP хичээл</a>
              	<a href="http://weather.az.mn" target="_blank" class="footer_links">Монгол орны цаг агаар</a>
              	<a href="http://good.az.mn" target="_blank" class="footer_links">Маркетингийн сайт</a>
              	<a href="http://www.worldvideomusic.com" target="_blank" class="footer_links">Гадаад дуу хөгжим</a>
              	<a href="http://mobile.az.mn" target="_blank" class="footer_links">Гар утас</a>
              </td>
              <td valign="top">
              	<a href="http://www.pms.mn" target="_blank" class="footer_links">www.PMS.mn</a>
              	<a href="http://www.mhri.mn" target="_blank" class="footer_links">www.MHRI.mn</a>
              	<a href="http://www.geree.mn" target="_blank" class="footer_links">www.Geree.mn</a>
              	<a href="http://www.pambaga.net" target="_blank" class="footer_links">www.pambaga.net</a>
              	<a href="http://www.gnus.mn" target="_blank" class="footer_links">www.GNUS.mn</a>
              </td>
              <td valign="top">
                  <a href="#" target="_blank" class="footer_links">Цахим ил шуудан </a>
                  <a href="#" target="_blank" class="footer_links">Интернэт ТВ, ФМ</a> 
                  <a href="#" target="_blank" class="footer_links">Имэйл үйлчилгээ</a> 
                  <a href="#" target="_blank" class="footer_links">Вэб байрлуулах талбар</a> 
                  <a href="#" target="_blank" class="footer_links">Вэб сервер түрээслэх</a> 
                  <a href="#" target="_blank" class="footer_links">Нөөцийн систем </a>
              </td>
              <td valign="top">
              	<a href="http://www.mng.cc" target="_blank" class="footer_links">Компаний үндсэн сайт</a>
              	<a href="#" target="_blank" class="footer_links">Сурталчилгаа байрлуулах</a>
              	<a href="#" target="_blank" class="footer_links">Технологи</a>
              	<a href="#" target="_blank" class="footer_links">Санал илгээх</a>
              	<a href="#" target="_blank" class="footer_links">Ажлын байр</a>
              	<a href="#" target="_blank" class="footer_links">Хийсэн ажлууд</a>
              	<a href="#" target="_blank" class="footer_links">miniCMS&trade;</a>
              	<a href="#" target="_blank" class="footer_links">Холбоо тогтоох</a>
              </td>
              <td valign="top">
              	<a href="index.php?module=faqs&cmd=list" class="footer_links">Асуулт/Хариулт</a>
              	<a href="#" class="footer_links">Хэлэлцүүлэг</a>
              	<a href="#" class="footer_links">Тусламж хүсэх</a>
              	<a href="#" class="footer_links">Зохиогчийн эрх</a>
              </td>
            </tr>
          </table>
      </div>
    </div>
  <div style="background-image:url(templates/songinoazmn/images/bg_con_bottom.jpg); height:22px; bottom:0px; background-repeat:no-repeat; background-position:top; margin-bottom:25px;"></div>
</div>
<div id="footer">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="50">&nbsp;</td>
      <td width="300" align="right"><?=mbmStatImage().COPYRIGHT?></td>
    </tr>
  </table>
</div>