
    	<div id="r2_a">
        	<div style="margin-bottom:12px;"><?=mbmShowBanner('home_1_468x60')?></div>
            <div style="position:relative; margin-bottom:12px; height:250px;">
            	<div style="width:250px; position:absolute; left:0px;"><?=mbmShowBanner('home_1_250x250')?></div>
           	    <div style="width:215px; position:absolute; left:255px;"><?=mbmShowBanner('home_2_215x250')?></div>
            </div>
            <div id="news">
            	<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_header_y.png" /></div>
            	<div style="padding:5px; background-color:#fdead2; width:458px;">
            	  <h3>Шинэ видео</h3>
				  <?
				  echo mbmShowNewContents($htmls_video,4,"is_video",0,'date_added','DESC');
				  ?>
                  <!--
				  <marquee truespeed="truespeed" direction="left" scrollamount="1" scrolldelay="30"  onmouseover="this.stop()" onmouseout="this.start()" >
                  </marquee>
                  //-->
                  </div>
            	<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_footer_y.png" /></div>
            </div>
            <div style="margin-bottom:12px;"><?=mbmShowBanner('home_2_468x60')?></div>
            <div id="news">
            	<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_header_b.png" /></div>
            	<div style="padding:5px; background-color:#e2e7ed; width:458px;">
            	  <h3>Шинэ мэдээ</h3>
                  <? echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>314,'en'=>8888)),2,8,'id','DESC',0,1);?>
				  
				  <?  mbmContentScroller(
							array(
								'menu_id'=>314,
								'show_title'=>1,
								'show_content_short'=>1,
								'order_by'=>'date_added',
								'asc'=>'desc',
								'link'=>1,
								'st'=>1,
								'limit'=>5,
								'scroll_time'=>8000,
								'more'=>1,
								'variable_name'=>'news_8',
								'class'=>'artscroller',
								'limit'=>8
							));
							?> 
            	</div>
            	<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_footer_b.png" /></div>
            </div>
            <div>
            	<h3>Хамтын ажиллагаа</h3>
            	<div style="
                        padding:0px; 
                        display:block; 
                        width::468px; padding-bottom:6px;">
                <?=mbmShowBanner('partners')?>
                </div>
            </div>
            <?
           // include_once(ABS_DIR."templates/yadii/banner_webs.php");
			?>
            <div>
            	<div class="title_y">Шинэ Embed Видео</div>
            	<div style="
                		position:relative; 
                        padding:0px; 
                        display:block; 
                        overflow-y:auto;
                        padding:5px;
                        background-color:#fcedda;
                        width::468px;
                        margin-bottom:6px;">
                <?=mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>338,'en'=>8888)),1,10,'date_added','DESC',0,1)?>
                </div>
            	<div style="
                        padding:0px; 
                        display:block; 
                        width::468px;">
                <?
				echo mbmShowBanner('home_468x400');
				include_once(ABS_DIR."templates/yadii/youtube.php");
				?>
                </div>
       	  </div>
</div>
<div id="r2_b">
    <div class="title_b">Онцлох уран бүтээлч - Дуучин Сарантуяа</div>
    <div style="padding:10px;"><?
          echo mbmShowNewContents($htmls_video,4,"is_video",73,'rand()');
    ?></div>
    <div class="title_y">Шинэ фото</div>
    <div style="padding:10px;"><?
         echo mbmShowNewContents($htmls_video,4,"is_photo",0,'id','DESC');
    ?></div>
    <div class="title_b">Дурын видео</div>
    <div style="padding:10px;"><?
          echo mbmShowNewContents($htmls_video,4,"is_video",0,'rand()');
    ?></div>
    <div class="title_y">Хамтлаг дуучид</div>
    <div style="float:right; width:120px; height:910px; margin-top:10px; background-color:#F5F5F5; border:1px solid #DDDDDD;">
		<?=mbmShowBanner('home_120x300')?>
        <?
              $w_rand_code = rand(1,43);
			  if($w_rand_code<10){
				  $w_rand_code = '0'.$w_rand_code;
		      }
			  ?>
			  <script src="http://weather.az.mn/share.php?c=MGXX00<?=$w_rand_code?>&size=small"></script>
        <div style="padding-top:5px;">
		<?=mbmShowBanner('home_120x600a')?>
        </div>
    </div>
    <div style="padding:10px; padding-right:130px; margin-bottom:10px;">
      <h2>Rock Pop</h2><?=mbmShowMenuById(array('',', '),3,'menu_duuchid')?>
      <h2>R & B, Techno, Trance</h2><?=mbmShowMenuById(array('',', '),5,'menu_duuchid')?>
      <h2>Hip Hop</h2><?=mbmShowMenuById(array('',', '),4,'menu_duuchid')?>
      <h2>Нийтийн дуу</h2><?=mbmShowMenuById(array('',', '),6,'menu_duuchid')?>
      <h2>Бусад</h2><?=mbmShowMenuById(array('',', '),7,'menu_duuchid')?>
    </div>
    <div class="title_b">Шинэ сэтгэгдэлүүд</div>
    <div style="float:right; width:120px; height:600px; margin-top:3px; margin-left:3px; background-color:#F5F5F5; border:1px solid #DDDDDD;"><?=mbmShowBanner('home_120x600')?></div>
    <div style="padding:5px; border:1px solid #DDDDDD; background-color:#f5f5f5; height:590px; overflow:auto; margin-top:3px;">
        <?=mbmShowContentComment(array('content_id'=>0,
                                        'limit'=>50,
                                        'order_by'=>'date_added',
                                        'asc'=>'DESC',
                                        'show_title'=>1
                                        )
                                )?>
    </div>
    <div>
        <h2>Сайтын үзүүлэлт</h2>
        <table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="50%"><?
        	echo 'Нийт хэрэглэгч: <strong>'
				.number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(id) FROM ".USER_DB_PREFIX."users "),0))
				.'</strong><br />';
        	//echo 'Нийт мэдээлэл:<br />';
        	//echo 'Нийт видео:<br />';
        	//echo 'Нийт фото:<br />';
        	echo 'Нийт сэтгэгдэл: <strong>'
				.number_format($DB->mbm_result($DB->mbm_query("SELECT COUNT(id) FROM ".PREFIX."menu_content_comments"),0))
				.'</strong><br />';
        	//echo 'Нийт суртачилгаа үзэлт:<br />';
        	//echo 'Нийт сурталчилгаа даралт:<br />';
        	echo 'Нийт урилга: <strong>'
				.number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(id) FROM ".USER_DB_PREFIX."schedules "),0))
				.'</strong><br />';
        	echo 'Хүлээгдэж буй урилга: <strong>'
					.number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".USER_DB_PREFIX."schedules WHERE st=0"),0))
					.'</strong><br />';
        	echo 'Нийт видео таталт: <strong>'
				.number_format($DB->mbm_result($DB->mbm_query("SELECT SUM(downloaded) FROM ".PREFIX."menu_videos"),0))
				.'</strong><br />';
			$h_stat = $DB->mbm_query("SELECT SUM(hits),SUM(hits_u) FROM ".PREFIX."stat_daily ");
        	echo '<br />2007 оны 7 сарын 22-ноос хойш<br />';
        	echo 'Нийт хуудас сөхөлт: <strong>'
					.number_format($DB->mbm_result($h_stat,0,0)+10056880)
					.'</strong><br />';
			/*
        	echo 'Давхцаагүй хандалт: <strong>'
					.number_format($DB->mbm_result($h_stat,0,1)+6022752)
					.'</strong><br />';*/
        	echo '<br />';
        	echo 'Яг одоо сүлжээнд холбогдсон хэрэглэгч <strong>'
					.number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".SESSION_DB_PREFIX.SESSION_DB_TABLE." WHERE UNIX_TIMESTAMP(modified)>".(mbmTime()-900).""),0))
					.'</strong> байна. <br />';
        	echo '<br />';
        	echo '<br />';
		?></td>
            <td width="50%" ondblclick="alert('<?=number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".SESSION_DB_PREFIX.SESSION_DB_TABLE." WHERE UNIX_TIMESTAMP(modified)>".(mbmTime()-30)." OR UNIX_TIMESTAMP(created)>".(mbmTime()-30).""),0))?>')"><?
			echo '<strong>Шинэхэн гишүүд</strong><br />';
            $q_new_users = "SELECT id,username FROM ".USER_DB_PREFIX."users ORDER BY id DESC LIMIT 10";
			$r_new_users = $DB2->mbm_query($q_new_users);
			for($i=0;$i<$DB2->mbm_num_rows($r_new_users);$i++){
				echo (10-$i).'. '.$DB2->mbm_result($r_new_users,$i,"username").'<br />';
			}
			
			$q_newusers = "SELECT COUNT(id) FROM ".USER_DB_PREFIX."users WHERE date_added>='".(time()-(24*60*60))."'";
			$r_newusers = $DB2->mbm_query($q_newusers);
			
			$q_newcontents_total = "SELECT COUNT(id) FROM ".PREFIX."menu_contents WHERE date_added>".(mbmTime()-24*60*60*7)."";
			$r_newcontents_total = $DB->mbm_query($q_newcontents_total);
			
			?></td>
          </tr>
          <tr>
            <td colspan="2" >
            <?
            echo '<div style="border:1px solid #DDD; background-color:#F5F5F5; padding:5px; color:#F7941C;">Сүүлийн 24 цагийн байдлаар нийт <strong>'. $DB2->mbm_result($r_newusers,0).'</strong> гишүүн бүртгэгдэж өнгөрсөн 7 хоногт <strong> '.$DB->mbm_result($r_newcontents_total,0).'</strong> бичлэг нэмэгдсэн байна.</div>';
			?></td>
          </tr>
        </table>
  </div>
</div>