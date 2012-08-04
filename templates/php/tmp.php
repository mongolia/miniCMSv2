<link href="templates/php/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/php/css/phpazmn.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function mbmSubmitLogin(){
	document.userLogin.action="";
	document.userLogin.method="post";
	document.userLogin.submit();
}
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6888346-8");
pageTracker._trackPageview();
} catch(err) {}</script>

<script language="javascript">
	mbmSetPageTitle(document.title+" :: php, web development, code, scripts, functions, classes");
</script>
<div id="pageLoader" style="color:#333333; margin-top:100px;"><center>Хуудсыг ачаалж байна. Түр хүлээнэ үү.<br />
<img src="images/web/loading.gif" alt="loading..." border="0" vspace="5" /></center></div>
<div id="mainContainer" style="visibility:visible;">
  <div id="header">
        <div id="row1">
        </div>
        <div id="row2">
          <div id="row2a"><a href="index.php"><img src="templates/php/images/mng_header.gif" alt="php.az.mn" title="<?=$_SESSION['lev'].':'.$_SESSION['user_id'].':'.session_id()?>" width="244" height="57" border="0" /></a></div>
          <div id="dropDownComment"></div>
        </div>
        <div id="row_1a">
            <div id="menuHeader"><?=mbmMenuDropDown()?>
            </div>
            <div id="row4">
<form action="http://search.az.mn" id="cse-search-box" target="_blank">
  <div style="text-align:center;">
              <table width="300" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:12px;">
                <tr>
                  <td>
        <input type="hidden" name="cx" value="partner-pub-3377050199087606:dwz8075rawc" />
        <input type="hidden" name="cof" value="FORID:10" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" name="q" size="38" class="input" /></td>
                  <td>
        <input type="submit" name="sa" value="Хайх" class="button" /></td>
                </tr>
              </table>
      </div>
    </form>
            </div>
        </div>
       <div align="center" style="z-index:-3;">
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
		</script>
       </div>
  </div>
  <div id="row_content">
    <div id="talbar_left">
      <?
    		$htmls_normal[0] = '';
			$htmls_normal[2] = '<div style="margin-bottom:6px;margin-top:6px;">';
			$htmls_normal[3] = '</div>';
			$htmls_normal[1] = '';
			
			$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
			$htmls_video[2] = '<td align="center" width="25%" valign="top">';
			$htmls_video[3] = '</td>';
			$htmls_video[1] = '</tr></table>';
     echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>MENU_ID,'en'=>MENU_ID)),0,58,"hits","asc");
	  ?><br clear="all" />
    </div>
    <div id="path"><?=mbmMenuBuildPath(MENU_ID)?>
    </div>
        <div id="mainContent">
        <?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			}else{
				mbm_include_file("templates/".TEMPLATE."/home.php");
			}
		?>
        <br clear="all" />
        <div style="text-align:center; margin-top:6px; margin-bottom:6px; display:block;"><script type="text/javascript"><!--
google_ad_client = "pub-3377050199087606";
/* 728x90, created 12/16/07 */
google_ad_slot = "0477445965";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div><br clear="all" />
        </div>
        <div id="row8">
        </div>
        <div id="row9">
        </div>
  </div>
  <div style="width:952px; margin:0px auto; padding:5px;
	background-image:url(templates/php/images/row_content_bg.png);">
	<?
     include(INCLUDE_DIR.'aznet.php');
	?><br clear="all">
  </div>
    <div id="footer">
    	<div id="footer_inner">
        	<div id="footer_inner1">
	        	<div id="footer_inner1a"><?=mbmStatImage()?>&nbsp;&nbsp;&nbsp;<a href="index.php">Нүүр</a> | <a href="http://www.mng.cc" target="_blank">Бидний тухай</a> | <a href="http://www.az.mn" target="_blank">Аз сүлжээ</a> | <a href="http://www.yadii.net" target="_blank">Видео портал</a> | <a href="http://php.az.mn/rss.php?action=content" target="_blank">RSS</a>
                </div>
        	  <div id="footer_inner1b"><?=COPYRIGHT?></div>
            </div>
        </div>
    </div>
</div><? //echo mbmDHTMLXmenuLoad();?>
<script language="javascript" type="text/javascript">
document.getElementById('pageLoader').style.display='none';
document.getElementById('mainContainer').style.visibility='visible';


// unduruudiig todorhoiloh
function setHeightContent(){
	main_content = document.getElementById('row_content');
	left_talbar = document.getElementById('talbar_left');
	sub_content = document.getElementById('mainContent');
	
	if(sub_content.offsetHeight<left_talbar.offsetHeight){
		set_height = left_talbar.offsetHeight;
	}else{
		set_height = sub_content.offsetHeight;
		left_talbar.style.height = sub_content.offsetHeight+20+'px';
	}
	main_content.style.height = set_height+50+'px';
	setTimeout("setHeightContent()", 5000);
}
setHeightContent();

if (window.ActiveXObject){
  left_talbar.style.marginLeft= '-180px';
}
</script><?
/*
echo session_id(); echo '<hr />';
print_r($_SESSION); echo '<hr />';
print_r(session_get_cookie_params()); echo '<hr />';
print_r($_COOKIE);
*/
?>