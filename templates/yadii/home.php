<?
$cache = new Memcache;
$cache->addServer('127.0.0.1',11218);

$yadiiHomeContent = 'yadiiHomeContent';
if(!$cache->get($yadiiHomeContent)){
	ob_start(); // start the output buffer
?><div id="Home" style="clear:both; display:block;">
	<div id="homeRightColumn">
    	<?
        echo '<div  class="marqueeZar">';
		echo '<marquee onmouseover="this.stop()" onmouseout="this.start()">'.mbmShowBanner('marquee').'</marquee></div>';
		?>
    	<div style="margin-bottom:6px;height:250px;"> 
    	<?=mbmShowBanner('B1')?>
        </div>
    	<div style="margin-bottom:6px;"> 
    	<?=mbmSMSprint();?>
        </div>
        <div class="home_title" style="background-color:#f7df80; border-color:#f7df80;"><?=(mbmToggleImage("$('#homeNews').toggle('fast')"))?><?=mbmShowByLang(array('mn'=>'Шинэ мэдээ, мэдээлэл','en'=>'News'))?></div>
    	<div id="homeNews" class="news"> <?  echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>314,'en'=>8888)),2,8,'date_added','DESC',0,1);
							?> 
        </div>
        <br clear="all" />
    	<div style="margin-bottom:6px;height:250px;"> 
    	<?=mbmShowBanner('B2')?>
         </div>
         <div class="home_title" style="background-color:#4cb7fb; border-color:#4cb7fb;"><?=(mbmToggleImage("$('#homeNewComments').toggle('fast')")).mbmShowByLang(array('mn'=>'Шинэ сэтгэгдлүүд','en'=>'User comments'))?></div>
          <div id="homeNewComments" style="padding:5px;margin-bottom:6px; border:1px solid #DDDDDD; background-color:#f5f5f5; height:450px; overflow:auto;">
			<?=mbmShowContentComment(array('content_id'=>0,
                                            'limit'=>50,
                                            'order_by'=>'date_added',
                                            'asc'=>'DESC',
                                            'show_title'=>1
                                            )
                                    )?>
        </div>
        <br clear="all" />
    	<div style="margin-bottom:6px;height:250px;"> 
    	<?=mbmShowBanner('B3')?>
         </div>
        <div>
            <div class="home_title" style="background-color:#f7df80; border-color:#f7df80;"><?=(mbmToggleImage("$('#homeSiteStats').toggle('fast');")).mbmShowByLang(array('mn'=>'Сайтын үзүүлэлт','en'=>'Site statistic'))?></div>
            <div id="homeSiteStats">
                <div style="float:right; width:145px;" ondblclick="alert('<?=number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".SESSION_DB_PREFIX.SESSION_DB_TABLE." WHERE UNIX_TIMESTAMP(modified)>".(mbmTime()-30)." OR UNIX_TIMESTAMP(created)>".(mbmTime()-30).""),0))?>')"><?
                    echo '<strong>'.mbmShowByLang(array('mn'=>'Шинэхэн гишүүд','en'=>'Newest members')).'</strong><br />';
                    $q_new_users = "SELECT id,username FROM ".USER_DB_PREFIX."users ORDER BY id DESC LIMIT 10";
                    $r_new_users = $DB2->mbm_query($q_new_users);
                    for($i=0;$i<$DB2->mbm_num_rows($r_new_users);$i++){
                        echo (10-$i).'. '.$DB2->mbm_result($r_new_users,$i,"username").'<br />';
                    }
                    
                    $q_newusers = "SELECT COUNT(id) FROM ".USER_DB_PREFIX."users WHERE date_added>='".(time()-(24*60*60))."'";
                    $r_newusers = $DB2->mbm_query($q_newusers);
                    
                    $q_newcontents_total = "SELECT COUNT(id) FROM ".PREFIX."menu_contents WHERE date_added>".(mbmTime()-24*60*60*7)."";
                    $r_newcontents_total = $DB->mbm_query($q_newcontents_total);
                    
                    ?>
                </div>
                <div style="float:left; width:145px;"><?
                    echo mbmShowByLang(array('mn'=>'Нийт хэрэглэгч','en'=>'Total members')).': <strong>'
                        .number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(id) FROM ".USER_DB_PREFIX."users "),0))
                        .'</strong><br />';
                    //echo 'Нийт мэдээлэл:<br />';
                    //echo 'Нийт видео:<br />';
                    //echo 'Нийт фото:<br />';
                    echo mbmShowByLang(array('mn'=>'Нийт сэтгэгдэл','en'=>'Total comments')).': <strong>'
                        .number_format($DB->mbm_result($DB->mbm_query("SELECT COUNT(id) FROM ".PREFIX."menu_content_comments"),0))
                        .'</strong><br />';
                    //echo 'Нийт суртачилгаа үзэлт:<br />';
                    //echo 'Нийт сурталчилгаа даралт:<br />';
                    echo mbmShowByLang(array('mn'=>'Нийт урилга','en'=>'Total invitations')).': <strong>'
                        .number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(id) FROM ".USER_DB_PREFIX."schedules "),0))
                        .'</strong><br />';
                    echo mbmShowByLang(array('mn'=>'Хүлээгдэж буй урилга','en'=>'Waiting for delivering')).': <strong>'
                            .number_format($DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".USER_DB_PREFIX."schedules WHERE st=0"),0))
                            .'</strong><br />';
                    echo mbmShowByLang(array('mn'=>'Нийт видео таталт','en'=>'Total video downloaded')).': <strong>'
                        .number_format($DB->mbm_result($DB->mbm_query("SELECT SUM(downloaded) FROM ".PREFIX."menu_videos"),0))
                        .'</strong><br />';
                    $h_stat = $DB->mbm_query("SELECT SUM(hits),SUM(hits_u) FROM ".PREFIX."stat_daily ");
                    echo '<br />'.mbmShowByLang(array('mn'=>'2007 оны 7 сарын 22-ноос хойш','en'=>'Since 22 June 2007')).'<br />';
                    echo mbmShowByLang(array('mn'=>'Нийт хуудас сөхөлт','en'=>'Total page views')).': <strong>'
                            .number_format($DB->mbm_result($h_stat,0,0)+10056880)
                            .'</strong><br />';
                    /*
                    echo 'Давхцаагүй хандалт: <strong>'
                            .number_format($DB->mbm_result($h_stat,0,1)+6022752)
                            .'</strong><br />';*/
                    echo '<br />';
                  ?>
                </div>
                    <?
					$live_period_site = floor((mbmTime()-mktime(0,0,0,7,22,2007))/86400);
                    echo '<div style="border:1px solid #DDD;clear:both;margin-bottom:6px;margin-top:6px; background-color:#F5F5F5; padding:5px;">';
					echo 'Yadii.Net нээгдээд <strong>'.$live_period_site.'</strong> хоног тантай хамт байна.<br />';
					
					//$qq_guests = "SELECT COUNT(*) FROM ".SESSION_DB_PREFIX.SESSION_DB_TABLE." WHERE UNIX_TIMESTAMP(modified)>".(mbmTime()-600)." AND sessdata LIKE '%".rawurlencode(';lev|i:0;')."%'";
					$qq_members_online = "select username from mbm2_users where session_time>(UNIX_TIMESTAMP(NOW())-600) ORDER BY username;";
					$rr_members_online = $DB2->mbm_query($qq_members_online);
					
					$total_users_online = $DB2->mbm_result($DB2->mbm_query("SELECT COUNT(*) FROM ".SESSION_DB_PREFIX.SESSION_DB_TABLE." WHERE UNIX_TIMESTAMP(modified)>".(mbmTime()-600).""),0);
					$total_guests_online = $DB2->mbm_num_rows($rr_members_online);
					//$total_guests_online = $DB2->mbm_result($DB2->mbm_query($qq_members_online),0);
					echo 'Яг одоо АЗ сүлжээнд холбогдсон <strong>'.($total_users_online-$total_guests_online).'</strong> зочид <strong >'.$total_guests_online.'</strong> гишүүд нийт <strong>'.$total_users_online.'</strong> хэрэглэгч байна.';
					echo '<br />'
                            .mbmShowByLang(array('mn'=>'Сүүлийн 24 цагийн байдлаар','en'=>'For last 24 hours')).': '.'<strong>'
                            . $DB2->mbm_result($r_newusers,0).'</strong> '.mbmShowByLang(array('mn'=>'шинэ хэрэглэгч','en'=>'new users')).'<br />'.mbmShowByLang(array('mn'=>'Өнгөрсөн 7 хоногт','en'=>'For last week')).': <strong> '.$DB->mbm_result($r_newcontents_total,0).'</strong> '.mbmShowByLang(array('mn'=>'шинэ мэдээллүүд','en'=>'new contents')).'</div>';
					
					echo '<strong>Холбогдсон хэрэглэгчид:</strong><br />';
					for($i=0;$i<$total_guests_online;$i++){
						echo $DB2->mbm_result($rr_members_online,$i,"username").', ';
					}
                    ?>
             </div>
        </div>
        <br clear="all" />
        <div>
        	<?
            $weather_code=rand(1,41);
			if($weather_code<10) $weather_code = '0'.$weather_code;
			?>
        	<script src="http://weather.az.mn/share.php?c=MGXX00<?=$weather_code?>" type="text/javascript"></script>        
        </div>
    </div>
    <!-- right talbar end//-->
	<div id="homeLeftColumn">
        <div style="color:#69a2fb; font-weight:bold;"><?=mbmShowByLang(array('mn'=>'Яг одоо үзэгдэж буй видеонууд','en'=>'Being watched'))?>:</div>
        <div id="videosBeingWatchedList" style="height:170px;"></div><br clear="all" />
        
        <div class="home_title" style="background-color:#ddd;">
			<?=(mbmToggleImage("$('#homeNewVideos').toggle('fast')")).mbmShowByLang(array('mn'=>'Шинэ видео','en'=>'New videos'))?>
            <a href="#" onclick="loadContents(18,'#homeNewVideos','videosBeingWatched',80,60,'video','date_added','DESC',0);return false;">
            	<small><?=mbmShowByLang(array('mn'=>'илүү','en'=>'more'))?>&raquo;...</small>
            </a>
        </div>
        <div class="homeBox" style="background-color:#f9f9f9;" id="homeNewVideos"></div><br clear="all" />
        
        <div style="clear:both; margin-bottom:12px;">
	        <?=mbmShowBanner('A2')?>
        </div>
        
        <div class="home_title" style="background-color:#eaeaea;">
			<?=(mbmToggleImage("$('#homeNewPhotos').toggle('fast')")).mbmShowByLang(array('mn'=>'Шинэ фото','en'=>'New photos'))?>
            <a href="#" onclick="loadContents(12,'#homeNewPhotos','videosBeingWatched',80,60,'photo','date_added','DESC',0);return false;">
            	<small><?=mbmShowByLang(array('mn'=>'илүү','en'=>'more'))?>&raquo;...</small>
            </a>
        </div>
        <div class="homeBox" id="homeNewPhotos"></div><br clear="all" />
        
        <div>
            <div style="width:430px; float:left;">
                <div class="home_title"  style="background-color:#f7df80; color:#037ddd; border-color:#f7df80;"><?=(mbmToggleImage("$('#homeFeatured').toggle('fast')")).mbmShowByLang(array('mn'=>'Онцлох уран бүтээлч','en'=>'Featured')).' - '.$DB->mbm_get_field(FEATURED_SINGER_ID,'id','name','menus')?></div>
                <div class="homeBox" id="homeFeatured" style="background-color:#f9f9f9;"></div>
            </div>
            <div style="width:200px; float:right; display:block; height:195px; border:1px solid #DDD; overflow-y:auto;">
            <?=mbmShowPoll(0,1);?>
            </div>
        </div>
        <br clear="all" />
        
        <div class="home_title" style="background-color:#eaeaea;">
			<?=(mbmToggleImage("$('#homeRandomVideos').toggle('fast')")).mbmShowByLang(array('mn'=>'Дурын видео','en'=>'Random videos'))?>
            <a href="#" onclick="loadContents(18,'#homeRandomVideos','videosBeingWatched',80,60,'video','RAND()','',0);return false;">
            	<small><?=mbmShowByLang(array('mn'=>'илүү','en'=>'more'))?>&raquo;...</small>
            </a>
        </div>
        <div class="homeBox" id="homeRandomVideos"></div><br clear="all" />
		<script language="javascript" type="text/javascript">
        loadContents(6,'#videosBeingWatchedList','videosBeingWatched',80,60,'video','session_time','DESC',0,60);
        loadContents(6,'#homeNewVideos','videosBeingWatched',80,60,'video','date_added','DESC',0);
        loadContents(6,'#homeNewPhotos','videosBeingWatched',80,60,'photo','date_added','DESC',0);
        loadContents(4,'#homeFeatured','videosBeingWatched',80,60,'video','RAND()','DESC',<?=FEATURED_SINGER_ID?>);
        loadContents(6,'#homeRandomVideos','videosBeingWatched',80,60,'video','RAND()','',0);
        </script>
        <div class="home_title" style="background-color:#4cb7fb; border-color:#4cb7fb; display:none;"><?=(mbmToggleImage("$('#embedVideos').toggle('fast')"))?>Embed Videos</div>
        <div style="clear:both; margin-bottom:6px; display:none;" id="embedVideos">
	        <? mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>338,'en'=>8888)),1,10,'date_added','DESC',0,1)?>
        </div>
    	<div id="duuchid">
            <?
			$yadiiHomeSingersList = '<div class="duuchid"><h2>Rock Pop</h2>'.mbmShowMenuById(array('',', '),3,'menu_duuchid').'</div>
									  <div class="duuchid">
										 <h2>R &amp; B, Techno, Trance</h2>'.mbmShowMenuById(array('',', '),5,'menu_duuchid')
										 .'<h2>Hip Hop</h2>'.mbmShowMenuById(array('',', '),4,'menu_duuchid').
									 '</div>
           							  <div class="duuchid">
									  	<h2>Нийтийн дуу</h2>'.mbmShowMenuById(array('',', '),6,'menu_duuchid')
										.'<h2>'.mbmShowByLang(array('mn'=>'Бусад','en'=>'Others'))
										.'</h2>'.mbmShowMenuById(array('',', '),7,'menu_duuchid').'</div>';
			echo $yadiiHomeSingersList;
			
			?>
        </div>
    </div>
</div>
	<?
	ob_end_flush();
	$cache->set($yadiiHomeContent,ob_get_contents(),MEMCACHE_COMPRESSED,600);
}
echo $cache->get($yadiiHomeContent);
?>