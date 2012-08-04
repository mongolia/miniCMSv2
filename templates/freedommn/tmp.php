<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<br clear="both" /><ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
?>
<link href="templates/freedom3/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/freedom3/css/freedommn.css" rel="stylesheet" type="text/css" />
<div style="background-image:url(templates/freedom3/images/h1.jpg); background-repeat:repeat-x; height:177px;">
  <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="123"><img src="templates/freedom3/images/hlogo1.jpg" width="400" height="123" alt="freedom" /></td>
    </tr>
    <tr>
      <td align="center">
    <div id="topMenuNovember">
     <?
     echo mbmDropDownMenus2(0);
	 ?>
     <!--
      <a href="index.php">Home</a>
      <a href="index.php?module=menu&cmd=content&menu_id=7">News</a>
      <a href="index.php?module=menu&cmd=content&menu_id=1">Music</a>
                <a href="http://urbancity.freedom.mn" target="_blank">Club life</a>
                <a href="index.php?module=menu&cmd=content&menu_id=20">Sport</a>
                <a href="index.php?module=menu&cmd=content&menu_id=32">Gallery</a>
     //-->
    </div>
      </td>
    </tr>
  </table>
</div>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--
  <tr>
    <td height="40"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#FFF;">
      <tr>
        <td>Сайнуу... Өдрийн мэнд. FREEDOM.MN сайтд тавтай морил</td>
        <td align="right"><a href="index.php?module=users&amp;cmd=registration" style="color:#FFF;">Бүртгүүлэх үү</a> ?</td>
        <td width="80" align="right"> <a href="#loginFormSh" style="color:#FFF;">Нэвтрэх</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="templates/freedom3/images/top1.gif" width="960" height="12" alt="freedom" /></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><img src="templates/freedom3/images/tmp0.gif" width="920" height="107" alt="freedom" /></td>
  </tr>
  <tr>
    <td><img src="templates/freedom3/images/top2.gif" width="960" height="12" alt="freedom" /></td>
  </tr>
  <tr>
    <td height="3"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6"><img src="templates/freedom3/images/menuleft.gif" width="6" height="45" alt="freedom" /></td>
        <td bgcolor="#F59C26">
        	<a href="index.php"><img src="templates/freedom3/images/menu1.png" alt="freedom" border="0"  /></a>
                <a href="index.php?module=menu&cmd=content&menu_id=7"><img src="templates/freedom3/images/menu2.png" alt="freedom" border="0" /></a>
                <a href="index.php?module=menu&cmd=content&menu_id=1"><img src="templates/freedom3/images/menu3.png" alt="freedom"  border="0" /></a>
                <a href="http://urbancity.freedom.mn" target="_blank"><img src="templates/freedom3/images/menu4.png" alt="freedom" border="0" /></a>
                <a href="index.php?module=menu&cmd=content&menu_id=20"><img src="templates/freedom3/images/menu5.png" alt="freedom" border="0" /></a>
                <a href="index.php?module=menu&cmd=content&menu_id=32"><img src="templates/freedom3/images/menu6.png" alt="freedom" border="0" /></a>
        </td>
        <td width="6"><img src="templates/freedom3/images/menu_right.gif" width="6" height="45" alt="freedom" /></td>
      </tr>
    </table></td>
  </tr>
  //-->
  <tr>
    <td height="3"></td>
  </tr>
  <tr>
    <td height="40"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="670"><?=mbmShowBanner('home_2')?></td>
        <td></td>
        <td width="285"><?=mbmShowBanner('home_3')?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="571" valign="top">
        	<div><img src="templates/freedom3/images/top3a.gif" width="571" height="10" alt="aa" /></div>
            <div style="border-right:1px solid #cccccc;border-left:1px solid #cccccc; padding-top:10px; padding-left:25px; padding-right:25px; background-color:#FFF;">
            
            <? 
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
				}else{
					mbm_include_file("templates/".TEMPLATE."/home.php");
				}
			  ?>
              <br clear="all" />
            </div>
        	<div><img src="templates/freedom3/images/top4a.gif" width="571" height="10" alt="aa" /></div>
        </td>
        <td valign="top"></td>
        <td width="382" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="templates/freedom3/images/top3b.gif" width="382" height="4" alt="aa" /></td>
          </tr>
          <tr>
            <td bgcolor="#1d4381" style="background-image:url(templates/freedom3/images/login_bg.gif); background-repeat:no-repeat;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="130" valign="top"><a name="loginFormSh" id="loginFormSh"></a></td>
                <td id="commandsUser">
                	<?=mbmUserPanel($_SESSION['user_id'],array('','','<div style="margin-top:5px;margin-bottom:5px;border-bottom:1px solid #DDDDDD;">','</div>'));?>
                </td>
                <td width="10"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><img src="templates/freedom3/images/top4b.gif" width="382" height="4" alt="aa" /></td>
          </tr>
          <tr>
            <td height="8"></td>
          </tr>
          <tr>
            <td><img src="templates/freedom3/images/top3c.gif" width="382" height="5" alt="aa" /></td>
          </tr>
          <tr>
            <td bgcolor="#F59C26"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td class="titleRight">FREEDOM VIDEO</td>
               </tr>
               <tr>
                 <td>
                    <div class="contentRight">
                    <?=mbmShowNewContents($GLOBALS['htmls_video'],3,"is_video",mbmShowByLang(array('mn'=>0,'en'=>8888)),'date_added','DESC');?>
                    </div>
                    <br clear="all" />
                    <div class="titleRight">FREEDOM PHOTOS</div>
                    <div class="contentRight">
                        <?=mbmShowNewContents($GLOBALS['htmls_video'],3,"is_photo",mbmShowByLang(array('mn'=>0,'en'=>8888)),'RAND()','');?>
                    </div>
                    <br clear="all" />
                 </td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
               </tr>
             </table></td>
          </tr>
          <tr>
            <td><img src="templates/freedom3/images/top4c.gif" width="382" height="5" alt="aa" /></td>
          </tr>
          <tr>
            <td height="8"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
              
              <div style="background-color:#CCC; padding-left:10px; color:#333; font-weight:bold; padding-top:4px; height:18px;">
                Шинэ сэтгэгдлүүд
                </div>
              <div class="talbar" style="height:300px; overflow-y:auto; overflow-x:auto; width:380px;">
                <?=mbmShowContentComment(array('content_id'=>0,
                                'limit'=>50,
                                'order_by'=>'date_added',
                                'asc'=>'DESC',
                                'show_title'=>1
                                )
                        )?>
                </div>
              </td>
          </tr>
          <tr>
            <td height="8"></td>
          </tr>
          <tr>
            <td style="border:1px solid #cccccc; background-color:#FFF;">
            <div style="background-color:#CCC; padding-left:10px; color:#333; font-weight:bold; padding-top:4px; height:18px;">Сайтын үзүүлэлт</div>
            <div style="padding-left:1px; padding-right:10px;">
              <?
			  /*
			  
			$live_period_site = floor((mbmTime()-mktime(0,0,0,3,31,2007))/86400);
			echo ' Suuder.com нээгдээд <strong>'.$live_period_site.'</strong> хоног тантай хамт байна.<br />';
			  */
			echo 'Нийт хэрэглэгч: <strong>'
				.number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(id) FROM ".USER_DB_PREFIX."users "),0))
				.'</strong><br />';
        	//echo 'Нийт мэдээлэл:<br />';
        	//echo 'Нийт видео:<br />';
        	//echo 'Нийт фото:<br />';
        	echo 'Нийт сэтгэгдэл: <strong>'
				.number_format($DB->mbm_result($DB->mbm_query("SELECT COUNT(id) FROM ".PREFIX."menu_content_comments"),0))
				.'</strong><br />';
        	echo 'Нийт нийтлэл: <strong>'
				.number_format($DB->mbm_result($DB->mbm_query("SELECT COUNT(id) FROM ".PREFIX."menu_contents"),0))
				.'</strong><br />';
        	$h_stat = $DB->mbm_query("SELECT SUM(hits),SUM(hits_u) FROM ".PREFIX."stat_daily ");
        	echo 'Нийт хуудас сөхөлт: <strong>'
					.number_format($DB->mbm_result($h_stat,0,0))
					.'</strong><br />';
        	echo '<br />';
        	echo 'Яг одоо сүлжээнд холбогдсон хэрэглэгч <strong>'
					.number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".SESSION_DB_PREFIX.SESSION_DB_TABLE." WHERE UNIX_TIMESTAMP(modified)>".(time()-600).""),0))
					.'</strong> байна. <br />';
        	echo '<br />';
			$q_newusers = "SELECT COUNT(id) FROM ".USER_DB_PREFIX."users WHERE date_added>='".(time()-(24*60*60))."'";
			$r_newusers = $DB2->mbm_query($q_newusers);
			
			$q_newcontents_total = "SELECT COUNT(id) FROM ".PREFIX."menu_contents WHERE date_added>".(time()-24*60*60*7)."";
			$r_newcontents_total = $DB->mbm_query($q_newcontents_total);
			
			 echo 'Сүүлийн 24 цагийн байдлаар нийт <strong>'. $DB2->mbm_result($r_newusers,0).'</strong> гишүүн бүртгэгдэж өнгөрсөн 7 хоногт <strong> '.$DB->mbm_result($r_newcontents_total,0).'</strong> бичлэг нэмэгдсэн байна.';
			?>
            </div>
            </td>
          </tr>
          <tr>
            <td height="8"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td valign="top" width="2"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" style="color:#FFF;">
    	<a href="#" class="footerMenu">Нүүр хуудас</a>
    	<a href="#" class="footerMenu">Мэдээ, мэдээлэл</a>
    	<a href="#" class="footerMenu">Дуу хөгжим</a>
    	<a href="#" class="footerMenu">Клубын соёл</a>
    	<a href="#" class="footerMenu">Спорт</a>
    	<a href="#" class="footerMenu">Зургийн цомог</a>
   	  <a href="#" class="footerMenu" style="border-right:0px;">Холбоо барих</a>
    </td>
  </tr>
  <tr>
    <td align="center"><?=COPYRIGHT?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<script language="javascript">
<?
if($DB->mbm_check_field('menu_id',MENU_ID,'menus') == 1){
	$active_top_menu_id = MENU_ID;
  }else{
	$active_top_menu_id = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus') ;
	if($active_top_menu_id == 0){
		$active_top_menu_id = MENU_ID;
	}
  } 
?>
active_menu = Array();
active_menu[0] = 0;
active_menu[1] = 1;
active_menu[7] = 2;
active_menu[20] = 3;
active_menu[26] = 4;
active_menu[32] = 5;
function makeTopMenuActive(){
	$("#Menu"+active_menu[<?=$active_top_menu_id?>]+" a:first").addClass("menu_active");
	$("#Menu"+active_menu[<?=$active_top_menu_id?>]+" a:first").css("color","#FFF");
	//alert(<?=$active_top_menu_id?>);
}
makeTopMenuActive();

</script>