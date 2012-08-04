<script language="javascript">

function toggleDate1(st,target_div){
	
	switch(st){
		case 0:
			$(target_div+" select").each(function(){
				$(this).attr("disabled", true); 
			});
			$(target_div+" table tr td img").hide("fast");
		break;
		case 1:
			$(target_div+" select").each(function(){
				$(this).attr("disabled", false); 
			});
			$(target_div+" table tr td img").show("fast");
		break;
	}
}
function switchDivSh(id,total_div){
	for(i=1;i<=total_div;i++){
		document.getElementById('schedule_'+i).style.display='none';
	}
	$('#schedule_'+id).fadeIn(1000);
}
</script><?
$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
?>
<div id="mainContainer">
    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF; margin-top:17px;">

      <tr>
        <td style="padding:0px;">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" height="34" style="margin:0px;">
	    <tr>
	      <td width="180"><a href="index.php"><img src="templates/airticketmn/images/logo.gif" alt="airticket.mn" width="178" height="34" border="0" /></a></td>
	      <td align="center" valign="bottom">
          	<div style="padding-bottom:4px;"><?=mbmShowBanner('tsag')?></div>
          </td>
	      <td width="200" valign="bottom">
      	        <div style="padding-bottom:4px;">
        	    <table width="100%" border="0" cellspacing="0" cellpadding="0"><form id="form1" name="form1" method="post" action="modules/search/redirect.php" >
        	      <tr>
        	        <td align="right"><input name="q" type="text" id="q" size="21" style="height:12px;" /></td>
        	        <td width="55"><input type="image" src="templates/airticketmn/images/search_<?=$_SESSION['ln']?>.gif" style="border:0px; float:right; margin:0px;"  /></td>
      	        </tr></form>
      	      </table>
        	    </div>
       	  </td>
	      <td width="70" align="right">
          	<a href="index.php?action=lang&amp;lang=mn"><img src="templates/airticketmn/images/mn.gif" alt="Mongolian" width="24" height="15" border="0" /></a>
            <a href="index.php?action=lang&amp;lang=en"><img src="templates/airticketmn/images/en.gif" alt="English" width="24" height="15" border="0" /></a>
          </td>
        </tr>
      </table></td>
      </tr>
      <tr>
        <td height="31" style="
										background-color:#ffd400; border-bottom:3px solid #ed1e25;  ">
		<?=str_replace("<ul></ul>","",mbmDropDownMenus(0));//mbmMenuDropDown(0);?>
        </td>
      </tr>
      <tr>
        <td><?=mbmShowBanner('header_'.$_SESSION['ln'])?></td>
      </tr>
      <tr>
        <td height="6"></td>
      </tr>
      <?
      if(MENU_ID != 0){
	  ?>
      <tr>
        <td>
        	<div style="background-image:url(templates/airticketmn/images/content_top_bg.gif); background-repeat:no-repeat; background-position:bottom; padding-left:290px; padding-top:3px; height:35px;">
	        	<h2><?=$DB->mbm_get_field(MENU_ID,'id','name','menus')?></h2>
            </div>
        </td>
      </tr>
      <?
	  }
	  ?>
      <tr>
        <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="202" valign="top">
                <?
                if(MENU_ID == 392){
				?>
					 <object id="pingbox8mm71wk1xjw0⁗" type="application/x-shockwave-flash" data="http://wgweb.msg.yahoo.com/badge/Pingbox.swf" width="200" height="320"><param name="movie" value="http://wgweb.msg.yahoo.com/badge/Pingbox.swf" /><param name="allowScriptAccess" value="always" /><param name="flashvars" value="wid=UECPZSa6SnD9A7S14dNIpV0-" /></object>
				<?
				}elseif(MENU_ID == 406){
				?>
					<object id="pingbox4u0xuwwap8000" type="application/x-shockwave-flash" data="http://wgweb.msg.yahoo.com/badge/Pingbox.swf" width="200" height="320"><param name="movie" value="http://wgweb.msg.yahoo.com/badge/Pingbox.swf" /><param name="allowScriptAccess" value="always" /><param name="flashvars" value="wid=35ltuUO6SnAUOukDItohXec-" /></object>
				<?
				}else{
				?>
                
            	<div class="talbar_title"><?=mbmShowByLang(array('mn'=>'Нислэг захиалга','en'=>'Online booking'))?></div>
                <div class="tablar_left">
                  <form id="Zahialga" name="Zahialga" method="post" action="index.php?module=airticket&cmd=booking&menu_id=392" style="margin:0px;">
                  <?=mbmShowByLang(array('mn'=>'Чиглэл','en'=>'Destination'))?><br />
                    <input name="haanaas" type="text" id="haanaas" value="<?=mbmShowByLang(array('mn'=>'Хаанаас','en'=>'From'))?>" size="32" onfocus="if(this.value=='<?=mbmShowByLang(array('mn'=>'Хаанаас','en'=>'From'))?>') this.value=''" />
                    <br />
                    <input name="haashaa" type="text" id="haashaa" value="<?=mbmShowByLang(array('mn'=>'Хаашаа','en'=>'To'))?>" size="32" onfocus="if(this.value=='<?=mbmShowByLang(array('mn'=>'Хаашаа','en'=>'To'))?>') this.value=''" />
                    <br /><br />
                    <input name="helber" type="radio" id="helber" value="2" checked="checked" onclick="toggleDate1(1,'#butsah1')" />
                    <?=mbmShowByLang(array('mn'=>'Хоёр тал','en'=>'Round trip'))?>
                    <input type="radio" name="helber" id="helber2" value="1" onclick="toggleDate1(0,'#butsah1');" /> 
                    <?=mbmShowByLang(array('mn'=>'Нэг тал','en'=>'One way'))?>
                    <br /><br />
                    <?=mbmShowByLang(array('mn'=>'Нисэх өдөр','en'=>'Departure date'))?>
					<script>
					  DateInput('date_tofly', true, 'YYYY-MM-DD');
				    </script>
                    <br />
                   <div id="butsah1">
                    <?=mbmShowByLang(array('mn'=>'Буцаж ирэх','en'=>'Return date'))?><br />
					<script>
					  DateInput('date_tocome', true, 'YYYY-MM-DD');
				  </script>
                   </div>
                    <center><img src="templates/airticketmn/images/<?=mbmShowByLang(array('mn'=>'flight_button_mn.jpg','en'=>'flight_button_en.jpg'))?>" onclick="document.Zahialga.submit()" hspace="5" vspace="5" style="cursor:pointer; margin-top:10px;" />
                    <!--//<input type="submit" name="button" id="button" value="<?=mbmShowByLang(array('mn'=>'Нислэг захиалах','en'=>'Book flight'))?>" class="zakhialakhButton" />--></center>
                  </form>
                </div>
                <div><img src="templates/airticketmn/images/talbar_footer.gif" width="202" height="12" alt="a" /></div>
                 <?
				}
				 ?>
                <?
                if(strlen($_SERVER['QUERY_STRING'])>5){
					echo '<div style="margin-bottom:5px;margin-top:5px;">'.mbmShowBanner('left_1_'.$_SESSION['ln']).'</div>';
					echo '<div  style="margin-bottom:5px;margin-top:5px; text-align:center;">
						  <form action="index.php?module=airticket&cmd=emaillist&menu_id='
						  		.mbmShowByLang(array('mn'=>403,'en'=>422))
								.'" method="post">
							  <div  style="margin-bottom:5px;margin-top:5px;">
							  	'.mbmShowByLang(array('mn'=>'Та манай мэйл листэд бүртгүүлэх бол мэйлээ оруулна уу.','en'=>'If you are not signed up for our e-mail list, please provide your e-mail.'))
							  .'</div>
						  
							  <div  style="margin-bottom:5px;margin-top:5px;">
								<table border="0" width="100%">
									<tr>
										<td valign="top" style="padding-top:8px;" align="right">
											<input type="text" size="22" name="emailID" id="emailID" style="height:21px;margin:0px;" />
										</td>
										<td valign="top" align="left">
											'
											//.'<input type="submit" class="button" value="'.mbmShowByLang(array('mn'=>'Join','en'=>'Join')).'" style="margin:0px;" />'
											.'<input type="image" src="templates/airticketmn/images/button_join.jpg" style="margin:0px; margin-top:1px; margin-left:-1px;border:0px;" />
										</td>
									</tr>
								</table>
							  </div>
						  </form>
						  </div>';
				}
				?>
            </td>
            <td valign="top">
             <?
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					echo '<div class="talbarContent">';
					mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
					echo '</div>';
				}else{
					mbm_include_file("templates/".TEMPLATE."/home.php");
				}
			 ?>
            
            </td>
            <?
            if(strlen($_SERVER['QUERY_STRING'])<5){
				echo '<td width="248" valign="top">';
					echo '<div style="margin-bottom:5px;">'.mbmShowBanner('right_1_'.$_SESSION['ln']).'</div>';
					echo '<div style="margin-bottom:5px;">'.mbmShowBanner('right_2_'.$_SESSION['ln']).'</div>';
					echo '<div style="margin-bottom:5px;">'.mbmShowBanner('right_3_'.$_SESSION['ln']).'</div>';
				echo '</td>';
			}else{
				echo '<td width="10" valign="top"></td>';
			}
			?>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="6"></td>
      </tr>
      <?
      if(strlen($_SERVER['QUERY_STRING'])<5){
	  	?>		
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><?=mbmShowBanner('footer_1_'.$_SESSION['ln'])?></td>
            <td width="5" valign="top"></td>
            <td width="229" valign="top">
            
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="12" style=" border-right:2px solid #F00;"><img src="templates/airticketmn/images/footer_top1.gif" border="0" /></td>
                </tr>
                <tr>
                  <td style="border-right:2px solid #F00;border-left:2px solid #F00; padding:5px;"><h3><?=mbmShowByLang(array('mn'=>'Валютын ханш','en'=>'Exchange rate'))?></h3>
            	<iframe src="<?=mbmShowByLang(array('mn'=>'http://www.golomtbank.com/whansh.aspx?lang=1','en'=>'http://www.golomtbank.com/whansh.aspx?lang=2'))?>" style="border:0px; padding:0px; margin:0px; width:215px; height:192px;" scrolling="no" border="0"></iframe></td>
                </tr>
                <tr>
                  <td height="12" style=" border-right:2px solid #F00;"><img src="templates/airticketmn/images/footer_bottom1.gif" border="0" /></td>
                </tr>
              </table>
            </td>
            <td width="5" valign="top"></td>
            <td width="230" valign="top">
            	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="12" style=" border-left:2px solid #F00;"><img src="templates/airticketmn/images/footer_top2.gif" border="0" /></td>
                </tr>
                <tr>
                  <td style="border-right:2px solid #F00;border-left:2px solid #F00;" height="236">
                   <h3 style="padding-left:5px;"><?=mbmShowByLang(array('mn'=>'Цаг агаар','en'=>'Weather'))?></h3>
					<div style="padding:5px;">
                    <?
                    $weather_code=rand(1,41);
                    if($weather_code<10) $weather_code = '0'.$weather_code;
                    echo  mbmYahooWearther(array(
                                    'location_code'=>'USNY0996',
                                    'image_size'=>'small',
                                    'unit'=>'c'
                                  ));
                    ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td height="12" style=" border-left:2px solid #F00;"><img src="templates/airticketmn/images/footer_bottom2.gif" border="0" /></td>
                </tr>
              </table>
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
		<?
	  }
	  ?>
      <tr>
        <td><?=mbmShowBanner('footer_2_'.$_SESSION['ln'])?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><?=COPYRIGHT?></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table>
    <br clear="all" />
</div>
<?=$bbbbbbbbbb?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11530505-1");
pageTracker._trackPageview();
} catch(err) {}</script>
