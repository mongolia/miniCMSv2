<?
//$lang['main']['erhlegch'] = "Эрхлэгч";
$upper_menu_dugaar = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
switch($upper_menu_dugaar){
	case 395:
		$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 396:
		$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 405:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 412:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 461:
		$lang["main"]["more"] = '';
	break;
	case 493:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	default:
		$lang["main"]["more"] = '<img src="'.DOMAIN.DIR.'templates/'.TEMPLATE.'/images/more_mn.gif" border="0" />';
	break;
}

switch(MENU_ID){
	case 395:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 396:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 404:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 412:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_2.gif" border="0" />';
	break;
	case 413:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_wallpaper.gif" border="0" />';
	break;
	case 414:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_flickr.gif" border="0" />';
	break;
	case 453:
			$lang["main"]["more"] = '<img src="http://www.suuder.com/templates/suudercom/images/more_mn_interest.gif" border="0" />';
	break;
	default:
		$lang["main"]["more"] = '<img src="'.DOMAIN.DIR.'templates/'.TEMPLATE.'/images/more_mn.gif" border="0" />';
	break;
}

$lang["main"]["hits"] = 'Уншигдсан';
$lang["menu"]["content_comment_add"] = 'Сэтгэгдлээ үлдээнэ үү:';

$q_topmenus = "SELECT * FROM ".PREFIX."menus WHERE st='1' AND lev<='".$_SESSION['lev']."' AND menu_id='387' ORDER BY pos";
$r_topmenus = $DB->mbm_query($q_topmenus);

$_top = '<div id="topMenus">';

$t_menus=0;
for($i=0;$i<$DB->mbm_num_rows($r_topmenus);$i++){
	$t_menus++;
	$_top .= ''
			 .'<a href="'.mbmMenuLink($DB->mbm_result($r_topmenus,$i,"id"),$DB->mbm_result($r_topmenus,$i,"link")).'" '
			 .'onMouseOver="mbmShowTopSubmenu('.$i.');" '
			 .'id="topmenu'.$i.'" class="">'
			 .$DB->mbm_result($r_topmenus,$i,"name")
			 .'</a>';
	$_top1 .= '<div id="topMenu'.$i.'" style="display:none;" '
			// .'onMouseOver="document.getElementById(\'topmenu'.$i.'\').style.className=\'topmenu_active_shuu\'" '
			  .'>'
			  .mbmShowMenuById(array('',' | '),$DB->mbm_result($r_topmenus,$i,"id"),'top_submenus')
			  .'</div>';
	if($DB->mbm_get_field(MENU_ID,'id','menu_id','menus')==$DB->mbm_result($r_topmenus,$i,"id") 
				|| $DB->mbm_result($r_topmenus,$i,"id")==MENU_ID
				|| $DB->mbm_get_field($DB->mbm_get_field(MENU_ID,'id','menu_id','menus'),'id','menu_id','menus')==$DB->mbm_result($r_topmenus,$i,"id") ){
		$make_active_topmenu = $i;
	}
}
$_top1 .= '<script language="Javascript">';
$_top1 .= '	function mbmShowTopSubmenu(id){
				for(i=0;i<'.$t_menus.';i++){
					//document.getElementById(\'topMenu\'+i).style.display=\'none\';
					$("#topMenu"+i).hide();
					$("#topmenu"+i).removeClass("topmenu_active_shuu");
				}
				document.getElementById(\'topMenu\'+id).style.display=\'block\';
				$("#topmenu"+id).addClass("topmenu_active_shuu");
				//$("#topMenu"+id).show();
			}'."\n";
		//$_top1 .= 'mbmShowTopSubmenu('.$make_active_topmenu.'); ';
$_top1 .= '</script>';
$_top .= '</div>';

	//deed menu-d zoriulav
	if(mbmGetUpperMenuId(MENU_ID,'id','menu_id','menus') == 389 || MENU_ID == 389){
		$mmmmm_topmenu_active = 0;
	}elseif($DB->mbm_get_field(MENU_ID,'id','menu_id','menus') == 395 || MENU_ID == 395){
		$mmmmm_topmenu_active = 1;
	}elseif($DB->mbm_get_field(MENU_ID,'id','menu_id','menus') == 409 || $DB->mbm_get_field(MENU_ID,'id','menu_id','menus') == 396 || MENU_ID == 396){
		$mmmmm_topmenu_active = 2;
	}elseif($DB->mbm_get_field(MENU_ID,'id','menu_id','menus') == 397 || MENU_ID == 397){
		$mmmmm_topmenu_active = 3;
	}elseif($DB->mbm_get_field(MENU_ID,'id','menu_id','menus') == 398 || MENU_ID == 398){
		$mmmmm_topmenu_active = 4;
	}elseif($DB->mbm_get_field(MENU_ID,'id','menu_id','menus') == 399 || MENU_ID == 399){
		$mmmmm_topmenu_active = 5;
	}elseif($DB->mbm_get_field(MENU_ID,'id','menu_id','menus') == 412 || MENU_ID == 412){
		$mmmmm_topmenu_active = 6;
	}else{
		$mmmmm_topmenu_active = 0;
	}
	if(mbmGetUpperMenuId(MENU_ID) == 390){
		$mmmmm_topmenu_active = 0;
	}
?><link href="templates/suudercom/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/suudercom/css/suudercom.css" rel="stylesheet" type="text/css" />
<table width="989" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background-image:url(templates/suudercom/images/top1.gif)">
    <div id="top1" style="position:relative; height:25px; display:block;">
    </div>
    <script language="javascript">
	//top1 = document.getElementById('top1');
   /*
    for(i=1;i<12;i++){
		bodyColor = 255 - ((i-1)*25);
		top1.innerHTML = top1.innerHTML + '<div onmouseover="document.body.style.backgroundColor=\'rgb('+bodyColor+','+bodyColor+','+bodyColor+')\'" style="float:left; width:86px; heihgt:25px;cursor:pointer;border:1px solid #FF0;">&nbsp;</div>';
	}
   */
   
    </script>
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="13" valign="top" style="font-size:9px;" >100%</td>
        <td width="140" align="center" valign="top"style="font-size:9px;">0%</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="95" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" style="padding:5px;"><a href="<?=DOMAIN.DIR?>index.php"><img src="templates/suudercom/images/logo.gif" alt="suuder.com" width="270" height="76" border="0" /></a></td>
        <td width="250" valign="top" style="padding:5px; border-right:1px solid #FFF;"><?=mbmUserPanel($_SESSION['user_id'],array('','','<div id="userCP">','</div>'));?></td>
      
	    <td width="312" valign="top" style="padding:8px;"> <?
       if($_SESSION['lev']==0){
	   ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25" align="center" class="bg_repeatx" style="background-image:url(templates/suudercom/images/top_bg_right.gif);"><a href="index.php?module=users&amp;cmd=registration"><img src="templates/suudercom/images/reg_title.gif" alt="register" width="92" height="12" border="0" /></a></td>
          </tr>
          <tr>
            <td style="text-align:justify; padding-top:10px;">СYYДЭР.КОМ   нийт   гэрэл    зурагчиддаа   зориулан <br />
              цоо шинэ ашиглахад амар илүү оргон хүрээг хамарсан <br />
              боловсронгуй    хувилбараа    санал    болгож    байна. <br />
              Та манай сайтад заавал бүртгүүлээрэй!</td>
          </tr>
          </table> <?
	   }else{
		 echo  mbmShowBanner('for_users'); 
		  }
	   ?></td>
	  
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="66">
    	<div style="display:block; z-index:88;" id="DEEDMENU">
				<?
                      mbmMenuListById(array(
                                            'menu_id'=>387,
                                            'lev'=>0,
                                            'st'=>1,
                                            'mainCatClass'=>'topMenu',
                                            'subCatClass'=>'topMenuSub'
                                            ));
                    echo $_top;
                    ?>
                <div id="topSubmenu">
                <?
                echo $_top1;
                ?>
                </div>
                <script language="javascript">
                
                var activeMenu = <?=$mmmmm_topmenu_active?>;
                mbmShowTopSubmenu(activeMenu);
                </script>
        </div>
    </td>
  </tr>
  <tr>
    <td height="10" class="bg_repeatx" style="background-image:url(templates/suudercom/images/menu_footer_bg.jpg);"></td>
  </tr>
  <tr>
    <td style="padding-left:7px; padding-right:7px; background-color:#FFF;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top">
        	<?
            if(strlen($_SERVER['QUERY_STRING'])<8 || isset($_GET['login'])){
				echo '<div class="talbar">'.mbmShowBanner('home_1').'</div>';
			}
			if($_GET['module'] == 'menu'){
				echo '<div class="talbar" style="padding:0px; border:2px solid #eeeeee;"><div id="menuPath">'.mbmBuildUserPath(MENU_ID).'</div></div>';
			}
			if(isset($_GET['menu_id']) && isset($_GET['id'])){
				$content_date_added = $DB->mbm_get_field($_GET['id'],'id','date_added','menu_contents');
				echo '<div class="talbar">';
					echo '<table cellspacing="0" cellpadding="0" border="0" width="99%" align="center">
							<tr>
								<td width="50%">'.mbmNextPrevContent($content_date_added,-1,MENU_ID).'</td>
								<td align="right">'.mbmNextPrevContent($content_date_added,1,MENU_ID).'</td>
							</tr>
						 </table>';
				echo '</div>';
			}
			?>
        	<div class="talbar"><?
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
				}else{
					include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
				}
			 ?>
            </div>
        </td>
        <?
        if($_GET['cmd']!='monthly'){
		?>
        <td width="2" valign="top">&nbsp;</td>
        <td width="316" valign="top">
        	<?
        		echo '<div class="talbar">'.mbmShowBanner('home_2').'</div>';
			?>
            <div class="title_right">
            	Категори
            </div>
        	<div class="talbar"><?
			if(MENU_ID == 0){
				$mmm_id = 390;
			}elseif($DB->mbm_check_field('menu_id',MENU_ID,'menus')==1){
				$mmm_id = MENU_ID;
			}else{
				$mmm_id = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
			}
            echo mbmMenuListByIdLi(array(
									'menu_id'=>$mmm_id,//390
									'lev'=>0,
									'st'=>1,
									'mainCatClass'=>'',
									'subCatClass'=>'',
									'show_total_contents'=>1
									));
			?></div>
               <div class="talbar">
            <?
        		echo mbmShowBanner('right_4');
			?>
            </div>         
            <div class="talbar">
            <?
        		echo mbmShowBanner('right_5');
			?>
            </div>
            
            <div class="title_right">Тэмцээн</div>
            <div class="talbar">
            <?
        		echo mbmShowBanner('right_3');
			?>
            </div>
            <?
        		echo '<div class="talbar">'.mbmShowBanner('broadband').'</div>';
			?>
            <div class="title_right">Сүүдэрт Шинээр</div>
        	<div class="talbar" id="newPosts">
            <strong>Мастер блог</strong>
            <?
                echo mbmContentNews(array('<ul>','</ul>','<li>','</li>'),mbmShowByLang(array('mn'=>390,'en'=>8888)),0,10,'date_added','desc',0,0,0,0,1);
            ?>
            <strong>Гишүүдийн блог</strong>
            <?
                echo mbmContentNews(array('<ul>','</ul>','<li>','</li>'),mbmShowByLang(array('mn'=>391,'en'=>8888)),0,10,'date_added','desc',0,0,0,0,1);
            ?>
            <strong>Зурагтай авдар</strong>
            <?
                echo mbmContentNews(array('<ul>','</ul>','<li>','</li>'),mbmShowByLang(array('mn'=>412,'en'=>8888)),0,10,'date_added','desc',0,0,0,0,1);
            ?>
            </div>
            <div class="title_right">
            	Зургын төхөөрөмж</div>
        	<div class="talbar" id="newPosts">
            <?
                echo mbmContentNews(array('<ul>','</ul>','<li>','</li>'),mbmSubmenusInArray(mbmShowByLang(array('mn'=>396,'en'=>8888))),0,10,'RAND()','',0,0,0,0,1);
            ?>
            </div>
            <div class="title_right">
            	Сүүдэрийн Toп 10
            </div>
        	<div class="talbar">
            <strong>Хамгийн их уншигдсан</strong>
            <?
                echo mbmContentNews(array('<ol>','</ol>','<li>','</li>'),mbmShowByLang(array('mn'=>0,'en'=>8888)),0,10,'hits','desc',0,0,1);
            ?>
            <strong>Хамгийн дуртай нийтлэл</strong>
            <?
                echo mbmContentNews(array('<ol>','</ol>','<li>','</li>'),mbmShowByLang(array('mn'=>0,'en'=>8888)),0,10,'total_ilike','desc',0,0,0,1);
            ?>
            </div>
            <div class="title_right">
            	Шинэ сэтгэгдлүүд
            </div>
        	<div class="talbar" style="height:600px; overflow-y:auto;">
             <?=mbmShowContentComment(array('content_id'=>0,
                                'limit'=>50,
                                'order_by'=>'date_added',
                                'asc'=>'DESC',
                                'show_title'=>1
                                )
                        )?>
            </div>
            <div class="title_right">
            	Хайлт</div>
        	<div class="talbar">
            <?
        		echo mbmSearchForm();
			?>
            </div>
            <div class="title_right">
            	Гэрэл Зургийн Үндсэн Төрлүүд</div>
        	<div class="talbar">
            <?
        		echo mbmShowBanner('right_1');
			?>
            </div>
        	<div class="talbar">
            <?
        		echo mbmShowBanner('right_2');
			?>
            </div>

            <div class="title_right">
            	Дурын зургууд</div>
        	<div class="talbar">
            	<?
					echo mbmGetImagesFromMenuContents(
								array(
									  'field_name'=>'content_more',
									  'menu_id'=>mbmSubmenusInArray(390),
									  'limit'=>6,
									  'vspace'=>2,
									  'img_width'=>300,
									  'order_by'=>'RAND()'
									  )	 
								);
					echo mbmGetImagesFromMenuContents(
								array(
									  'field_name'=>'content_more',
									  'menu_id'=>489,
									  'limit'=>1,
									  'vspace'=>2,
									  'img_width'=>300,
									  'order_by'=>'RAND()'
									  )	 
								);
					echo mbmGetImagesFromMenuContents(
								array(
									  'field_name'=>'content_more',
									  'menu_id'=>391,
									  'limit'=>3,
									  'vspace'=>2,
									  'img_width'=>300,
									  'order_by'=>'RAND()'
									  )	 
								);
					echo mbmGetImagesFromMenuContents(
								array(
									  'field_name'=>'content_more',
									 // 'menu_id'=>mbmSubmenusInArray(405,1),
									  'menu_id'=>array( 405=>'',468=>'',469=>'',470=>'',471=>'',473=>'',472=>'',474=>'',475=>'',476=>'',477=>'',478=>'',479=>'',480=>'',481=>'',482=>'',483=>'',484=>'',485=>'',486=>'',487=>''),
									  'limit'=>1,
									  'vspace'=>2,
									  'img_width'=>300,
									  'order_by'=>'RAND()'
									  )	 
								);
				?>
            </div>
            <div class="title_right">Бусад зургууд</div>
        	<div class="talbar">
            	<?
					echo mbmGetImagesFromMenuContents(
								array(
									  'field_name'=>'content_more',
									  'menu_id'=>array(404=>'',493=>'',406=>'',464=>''),
									  'limit'=>1,
									  'vspace'=>2,
									  'img_width'=>300,
									  'order_by'=>'RAND()'
									  )	 
								);
					echo mbmGetImagesFromMenuContents(
								array(
									  'field_name'=>'content_more',
									  'menu_id'=>mbmSubmenusInArray(412),
									  'limit'=>2,
									  'vspace'=>2,
									  'img_width'=>300,
									  'order_by'=>'RAND()'
									  )	 
								);
				?>
            </div>           
            <div class="title_right">
            	Сайтын үзүүлэлт</div>
        	<div class="talbar">
            <?
			$live_period_site = floor((mbmTime()-mktime(0,0,0,3,31,2007))/86400);
			echo ' Suuder.com нээгдээд <strong>'.$live_period_site.'</strong> хоног тантай хамт байна.<br />';
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
        	$qq_members_online = "select username from ".USER_DB_PREFIX."users where session_time>(UNIX_TIMESTAMP(NOW())-1200) ORDER BY username;";
			$rr_members_online = $DB2->mbm_query($qq_members_online);
			
			$total_users_online = $DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".SESSION_DB_PREFIX.SESSION_DB_TABLE." WHERE UNIX_TIMESTAMP(modified)>".(mbmTime()-1200).""),0);
			$total_guests_online = $DB2->mbm_num_rows($rr_members_online);
			//$total_guests_online = $DB2->mbm_result($DB2->mbm_query($qq_members_online),0);
			echo 'Яг одоо сүлжээнд холбогдсон <strong>'.($total_users_online-$total_guests_online).'</strong> зочин <strong >'.number_format($total_guests_online).'</strong> гишүүн нийт <strong>'.number_format($total_users_online).'</strong> хэрэглэгч байна.';
			
        	echo '<br />';
        	echo '<br />';
			$q_newusers = "SELECT COUNT(id) FROM ".USER_DB_PREFIX."users WHERE date_added>='".(time()-(24*60*60))."'";
			$r_newusers = $DB2->mbm_query($q_newusers);
			
			$q_newcontents_total = "SELECT COUNT(id) FROM ".PREFIX."menu_contents WHERE date_added>".(time()-24*60*60*7)."";
			$r_newcontents_total = $DB->mbm_query($q_newcontents_total);
			
			 echo 'Сүүлийн 24 цагийн байдлаар нийт <strong>'. $DB2->mbm_result($r_newusers,0).'</strong> гишүүн бүртгэгдэж өнгөрсөн 7 хоногт <strong> '.$DB->mbm_result($r_newcontents_total,0).'</strong> бичлэг нэмэгдсэн байна.';
			echo '<br /><br /><strong>Холбогдсон хэрэглэгчид:</strong><br />';
			for($i=0;$i<$total_guests_online;$i++){
				echo $DB2->mbm_result($rr_members_online,$i,"username").', ';
			}
			?>
            <br /><br />
<a id="mws4355105" href="http://webstats.motigo.com/">
<img width="80" height="15" border="0" alt="Free counter and web stats" src="http://m1.webstats.motigo.com/n80x15.gif?id=AEJ0IQ0XvsmTDKaklQNIE4XNAlhQ" /></a>
<script src="http://m1.webstats.motigo.com/c.js?id=4355105&amp;lang=EN&amp;i=26" type="text/javascript"></script>


        	</div>
        </td>
        <?
        }
		?>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#FFFFFF" style="padding:5px;"><?=COPYRIGHT;?></td>
  </tr>
</table>
<?=$footer_html?>