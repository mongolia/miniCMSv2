<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
?><table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="61" style="background-image:url(templates/screenmn/images/top1.jpg); background-repeat:no-repeat; background-color:#1882b3;">
    <div style="width:170px; float:right; margin-top:20px; color:#FFF;">
    <?
    	if($_SESSION['lev'] == 0){
			echo '<a href="login.php" style="color:#FFF;">Register now</a>';
		}else{
			echo '<a href="index.php?action=logout&url=aW5kZXgucGhw" style="color:#FFF; font-weight:bold;">Logout</a>';
		}
	?>
    </div>
    <!--
    <img src="templates/screenmn/images/screen_logo.gif" alt="logo" width="217" height="51" hspace="50" />
    //--></td>
  </tr>
  <tr>
  	<td height="67" style="background-image:url(templates/screenmn/images/top2.jpg); background-repeat:no-repeat; color:#FFF;"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  	  <tr>
  	    <td width="390">
        	<div style="font-family:Century Gothic; font-size:14px; color:#000;">Today - <?=mbmDate("l, d M Y")?></div>
        	<div style="font-family:Arial; font-size:12px; color:#FFF; padding-left:40px; padding-top:5px;">Ulaanbaatar - <?=mbmDate("g:i a")?></div>
        </td>
  	    <td valign="top"><div id="screenWeather"></div></td>
  	    <td width="160"><img src="templates/screenmn/images/right1.png" width="142" height="34" /></td>
	    </tr>
	  </table>
    </td>
  </tr>
  <tr>
  	<td height="1" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
  	<td height="25" bgcolor="#000000"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  	  <tr>
  	    <td><?=mbmMenuDropDown()?></td>
  	    <td width="278" align="center" style="color:#FFF;"><?
        $get_lastupdate_time = "SELECT MAX(date_added) FROM ".$DB->prefix."menu_contents ";//"WHERE menu_id LIKE '%,15,%' OR menu_id LIKE '%,16,%' OR menu_id LIKE '%,17,%' OR menu_id LIKE '%,13,%'";
		$ret_lastupdate_time = $DB->mbm_query($get_lastupdate_time);
		echo 'Last updated at '.date("g:i a, d M Y",$DB->mbm_result($ret_lastupdate_time,0));
		?></td>
	    </tr>
	  </table>
    </td>
  </tr>
  <!--
  <tr>
    <td height="34" bgcolor="#1882b3" <?
    $headerMenu = '<div style="float:right; width:270px; display:block; color:#FFF;">
		<a href="index.php" style="padding-left:10px; color:#FFF; font-weight:bold;">Home</a>
		&nbsp;<a href="index.php?action=logout&url=aW5kZXgucGhw" style="padding-left:80px; color:#FFF; font-weight:bold;">Logout</a></div>';
	$screenTsag='Ulaanbaatar '.mbmDate("g:i A");
    if(isset($_GET['menu_id']) && isset($_GET['id'])  && (MENU_ID==2 || MENU_ID==15 || MENU_ID==16 || MENU_ID==17)){
		echo ' style="background-image:url(templates/screenmn/images/menu_bg2.gif); background-repeat:no-repeat" ';
	}
	?>>
    
    <?
    if(!isset($_GET['menu_id']) || !isset($_GET['id']) ){
	?>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td id="topMMENU" style="padding-left:40px;"><div id="menuHeader" style="width:600px;"><?=mbmMenuDropDown()?>
            </div></td>
        <td style="color:#FFF;">
        <?
        if(strlen($_SERVER['QUERY_STRING'])<5 && $_SESSION['lev'] == 0){
			?>
       		<a href="login.php"><img src="templates/screenmn/images/register.gif" alt="register" width="92" hspace="60" height="34" border="0" /></a><?
			//$screenTsag = '';
		}
		if($_SESSION['lev'] == 0){
		}else{
			$screenTsag = $screenTsag.' &nbsp;<a href="index.php?action=logout&url=aW5kZXgucGhw" style="padding-left:10px; color:#FFF; font-weight:bold;">Logout</a>';
			//echo $screenTsag;
			echo $headerMenu;
			$screenTsag = '';
		}
		?>
        </td>
      </tr>
    </table>
      <?
	}else{
		//content more heseg
		echo $headerMenu;
		//echo '<div id="menuHeader" style="width:600px;">'.mbmMenuDropDown().'</div>'; 
		echo '<div style="padding-left:240px; color:#FFF; float:left; width:150px;">'.$screenTsag.'</div>';
	}
	  ?></td>
  </tr>
  //-->
  <tr>
    <td height="6" style="background-image:url(templates/screenmn/images/menu_footer.jpg); background-repeat:repeat-x;"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" style="padding-left:40px; padding-right:20px;" id="screenContent">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <? 
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
				}else{
					mbm_include_file("templates/".TEMPLATE."/home.php");
				}
			  ?></td>
              </tr>
          </table></td>
        <?
        if(strlen($_SERVER['QUERY_STRING'])<5 || $_GET['action'] == 'userLogin'){
		?><td width="278" valign="top" style=" background-color:#000; color:#FFF; font-size:11px;">
        	<table width="258" border="0" align="center" cellpadding="0" cellspacing="2">
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td bgcolor="#444343" ><marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="40" direction="rtl"  style="font-weight:bold; width:258px; color:#fe0101; text-align:center;">
       		<?=mbmCleanUpHTML(mbmShowBanner('hansh'))?>
        </marquee></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td style="color:#74aeea;"><?
			echo mbmUserPanel_Screen();
           //echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="padding-left:10px;padding-bottom:4px;margin-bottom:3px;border-bottom:1px solid #DDDDDD;">','</div>'));
			?></td>
            </tr>
          <?
          if($_SESSION['lev'] == 0 ){
			   ?>
			  <tr>
			    <td>&nbsp;</td>
		      </tr>
			   <?
		  }
		  if($_SESSION['lev'] == 0){
				 '<tr>
            <td>'.mbmShowBanner('right_1').'</td>
            </tr>
			  <tr>
				<td>&nbsp;</td>
				</tr>
			  <tr>';
			}
		  ?>
             <td  style="color:#F00;"><u><strong>Popular News</strong></u></td>
            </tr>
		  <tr>
            <td><?
            if($_SESSION['lev'] == 0){
				//echo mbmShowBanner('right_1');
			}else{
				//echo mbmShowBanner('right_1a');
				//echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>2)),1,1,'hits','DESC',0,1);
				//echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>3)),1,1,'hits','DESC',0,1);
			}
			echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>15)),1,1,'date_added','DESC',0,1);
			echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>16)),1,1,'date_added','DESC',0,1);
			if($_SESSION['lev']>0){
				$limitMe = 2;
			}else{
				$limitMe = 1;
			}
			echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>17)),$limitMe,$limitMe,'date_added','DESC',0,1);
			?></td>
            </tr>
          <tr>
            <td align="right"><?
            
				if($_SESSION['lev']==5){
					echo mbmStatImage();
					echo '<br />';
					//echo '<a href="index.php?module=photogallery&cmd=photo_add">Add photo</a>';
				}
			?></td>
            </tr>
          </table></td><?
		}elseif(isset($_GET['menu_id']) && (MENU_ID==2 || MENU_ID==4 || MENU_ID==15 || MENU_ID==16 || MENU_ID==17)){
			?>
			<td width="278" valign="top" style="background-color:#1882b3 ; color:#FFF; font-size:11px;">
                <table width="258" border="0" align="center" cellpadding="0" cellspacing="2">
       
                  <tr>
                    <td class="right_title">Politics</td>
                  </tr>
                  <tr>
                    <td height="150" valign="top" class="right_talbar_more">
                    	<div class="right_list">
							<?=mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>15)),0,5,'date_added','DESC',0,0)?>
                        	<a href="index.php?module=menu&cmd=content&menu_id=15" style="color:#FFF; text-align: right; display:block;">More...</a>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="right_title">Economy</td>
                  </tr>
                  <tr>
                    <td height="150" valign="top" class="right_talbar_more">
                    	<div class="right_list">
							<?=mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>16)),0,5,'date_added','DESC',0,0)?>
                            <a href="index.php?module=menu&cmd=content&menu_id=16" style="color:#FFF; text-align: right; display:block;">More...</a>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="right_title">Mining</td>
                  </tr>
                  <tr>
                    <td height="150" valign="top" class="right_talbar_more">
                    	<div class="right_list">
							<?=mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>17)),0,5,'date_added','DESC',0,0)?>
                            <a href="index.php?module=menu&cmd=content&menu_id=17" style="color:#FFF; text-align: right; display:block;">More...</a>
                        </div>
                    </td>
                  </tr>
               </table>
            </td>
			<?
		
		}else{
			
			//art & culture, one-on-one, more bulanguudad garah
			if(($_GET['cmd'] =='monthly' ||  MENU_ID == 8 || MENU_ID == 9 || MENU_ID == 10 ||MENU_ID == 11 ) && !isset($_GET['id'])){
			}elseif(( MENU_ID == 13 || MENU_ID == 3 || MENU_ID == 5 || MENU_ID == 12) && isset($_GET['id'])){
			}else{
			?>
			<td width="278" valign="top" style="background-color:#1882b3 ; color:#FFF; font-size:11px;">
                <table width="258" border="0" align="center" cellpadding="0" cellspacing="2">
                  <tr>
                    <td><?=mbmShowBannerByMenu('right_2')?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
               </table>
            </td>
			<?
				
			}
		}
		?>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['id']) && isset($_GET['menu_id'])){
  }else{
	 ?>
	 
  <tr>
    <td >&nbsp;</td>
  </tr>
	 <?
  }
  ?>
  <tr>
    <td style="padding-left:40px;color:#1882b2; padding-top:30px;">
                <div id="footerM"><a href="index.php?module=contacts&amp;cmd=contact&amp;menu_id=11" style="border-left:1px solid #1882b2;" class="menu_footer">Contact us</a>
                  <?=mbmShowMenuById(array('',''),6,'menu_footer',0)?>
    </div></td>
  </tr>
      <td valign="top" style="padding-left:40px; padding-right:20px; font-family:Times New Roman; font-size:12px; color:#36aa4c; text-align:center;">
        <?
        echo COPYRIGHT;
        ?>
        </td>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </table>
  
  
 <div style="display:none;">
  <script src="http://weather.az.mn/share.php?c=MGXX0003&ln=en"></script>
 </div>
  
  <script language="javascript">
  	var screenWeather = '';
	
	wBox = document.getElementById('WeatherBox');
	
	sBox = document.getElementById('screenWeather');
	//alert();
	if (window.ActiveXObject){
		sBox.innerHTML = wBox.innerHTML.split('Wind speed',1);
	}else{
		sBox.innerHTML =wBox.innerHTML.split('<br><br>Wind speed',1);
	}
  </script>