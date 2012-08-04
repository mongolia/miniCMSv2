<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6888346-2");
pageTracker._trackPageview();
} catch(err) {}</script>
<div id="dropDownComment" align="center" style="display:none;"></div>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5" bgcolor="#0081d4"></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
      
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td></td>
                    </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="3"><img src="templates/shopazmn2/images/header.jpg" /></td>
          </tr>
          <tr>
            <td bgcolor="#f7941c"><?=mbmMenuDropDown()?></td>
          </tr>
          <tr>
            <td height="3"></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
			  <?
              if($_GET['cmd']!='monthly'){
              ?>
            <td width="215" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td><?=mbmShoppingCat1()?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
               <tr>
            <td><center><?=mbmShowBanner('banner_zuun1')?></center></td>
          </tr>
         <!-- <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="talbar_title_b">Таны үгийг сонсъё</td>
              </tr>
              <tr>
                <td><?=mbmShoutboxForm(15,150)?></td>
              </tr>
         //-->
              <tr>
            <td><?=mbmShowBanner('banner_zuun2')?></td>
          </tr>
          <tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="talbar_title_b">Санал асуулга</td>
              </tr>
              <tr>
                <td bgcolor="#f8f8f8"><?=mbmShowPoll(0,1);?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><?=mbmShowBanner('banner_baruun2')?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
            <?
            }
			?>
            <td width="3" valign="top">&nbsp;</td>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?
            if(strlen($_SERVER['QUERY_STRING'])<5){
				echo '
              <tr>
                <td class="talbar_title_b">Шинэ мэдээ</td>
              </tr>
              <tr>
                <td style="padding:5px;">'.mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>35,'en'=>8888)),1,1,'date_added','DESC',0,1).'</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr></td>
              </tr>
              <tr>
                <td class="talbar_title_grey">Сүүлд нэмэгдсэн бараанууд</td>
              </tr>
              <tr>
                <td>';
				echo mbmShoppingProducts2(0,0,'id','desc',1000);
			}elseif(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			}else{
				mbm_include_file("templates/".TEMPLATE."/home.php");
			}
			?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="center"><?=mbmShowBanner('banner_center_f')?>
                </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="10" valign="top">&nbsp;</td>
        <?
        if($_GET['cmd']!='monthly'){
		?>
        <td width="200" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
              <tr>
                <td class="talbar_title_b">Улаанбаатарын цаг агаар</td>
              </tr>
              <tr>
                <td style="padding:5px;"><script src="http://weather.az.mn/share.php?c=MGXX0003">
                </script></td>
              </tr>
              <tr>
                <td class="talbar_title_b">Хайлт хийх</td>
              </tr>
              <tr>
                <td align="center" >
                <div class="cse-branding-bottom" style="background-color:#FFFFFF;color:#000000">
  <div class="cse-branding-form">
    <form action="http://search.az.mn" id="cse-search-box" target="_blank">
      <div>
        <input type="hidden" name="cx" value="partner-pub-3377050199087606:dwz8075rawc" />
        <input type="hidden" name="cof" value="FORID:10" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" name="q" size="31" />
        <input type="submit" name="sa" value="Search" />
      </div>
    </form>
  </div>
  <div class="cse-branding-logo"></div>
  <div class="cse-branding-text">
  </div>
</div>
                </td>
              </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
              <tr>
                <td class="talbar_title_b">Эрэлттэй бараанууд</td>
              </tr>
              <tr>
                  <td style="background-color:#edf6fc; padding:5px; border:1px solid #d4eefe;"><?=mbmShoppingProducts2(0,0,'hits','desc', 5,1,0)?></td>
              </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><center><?=mbmShowBanner('banner_baruun1')?></center></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td><center><?=mbmShowBanner('banner_baruun11')?></center></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="talbar_title_b">Сэтгэгдэлүүд</td>
          </tr>
          <tr>
            <td><div style="height:800px; width:210px; overflow-x:auto;">
            <?
            echo  mbmCommentsList(array(
									'shop'=>0,
									'code_like'=>1,
									'order_by'=>'id',
									'asc'=>'desc',
									'limit'=>50
									));
			?>
            </div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <?
        }
		?>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5" bgcolor="#0081d4"></td>
  </tr>
  <tr>
    <td height="40"><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td><?=mbmShowMenuById(array(' | ','','',' | '),40,'menu_footer')?></td>
        <td align="right"><?=mbmStatImage().COPYRIGHT?></td>
      </tr>
    </table></td>
  </tr>
</table>
