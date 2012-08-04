<?	
function mbmShowContentsYadii(
						 $htmls=array('','','',''),
						 $menu_id=0,
						 $var = array(
								   'show_briefInfo'=>0,
								   'username'=>0,
								   )
						 ){
	global $DB;
	
	$buf = '';
	$r = mbmShowContentShortYadii($menu_id,$var);
	
	if(isset($_GET['id']) && $_GET['cmd']=='content'){
		$buf .= mbmShowContentMoreYadii($htmls, $_GET['id']);
		//$buf .= '<hr style="clear:both;" /><h2>Ð¨Ð¸Ð½Ñ? Ð¼Ñ?Ð´Ñ?Ñ?Ð»Ð»Ò¯Ò¯Ð´</h2>';
		//$buf .= mbmShowNewContents($htmls,PER_PAGE_CONTENTS,"normal",$menu_id);
	}else{
		$buf .= $r;
	}

	return $buf;
}
function mbmShowContentShortYadii($menu_id,$var = array(
												   'show_briefInfo'=>0,
												   'username'=>0,
												   'div_id'=>'contentShort',
												   'type'=>'video',
												   'limit'=>10,
												   'img_width'=>120,
												   'img_height'=>90,
												   'order_by'=>'date_added',
												   'asc'=>'DESC'
												   )){
	global $DB,$lang;
	
	
	switch($var['type']){
		case 'video':
			$q_type = "AND is_video!='0' ";
		break;
		case 'photo':
			$q_type = "AND is_photo='1' ";
		break;
		case 'all':
			$q_type = " ";
		break;
		default:
			$q_type = "AND is_video='0' AND is_photo='0' ";
		break;
	}
	
	$q = "SELECT * FROM ".PREFIX."menu_contents WHERE date_added<'".mbmTime()."' ";

	if(isset($_GET['f']) && $_GET['f']==1){
		
	}else{
		$q .= "AND st='1' ";
	}
	if(is_array($menu_id)){
		//menu_id -g array bolgoj oruulval array-d bui menunuudiin medeelliig haruulna
		$q .= "AND ( ";
		foreach($menu_id as $k=>$v){
			$q .= "menu_id LIKE '%,".$k.",%' OR ";
		}
		$q = rtrim($q,"OR ");
		$q .= ") ";
	}elseif($menu_id!=0){
		$q .= "AND menu_id LIKE '%,".$menu_id.",%' ";
	}
	$query_string = '&amp;';
	
	$q .= $q_type;
	$q .= "ORDER BY ";
	if(isset($_GET['ob'])){
		$q .= $_GET['ob']." ";
		$query_string .= '&amp;ob='.$_GET['ob'];
	}elseif(isset($var['order_by'])){
		$q .= $var['order_by']." ";
	}else{
		$q .= "date_added ";
	}
	
	if(isset($_GET['asc'])){
		$q .= $_GET['asc']." ";
		$query_string .= '&amp;asc='.$_GET['asc'];
	}elseif(isset($var['asc'])){
		$q .= $var['asc']." ";
	}else{
		$q .= "DESC ";
	}
	if(isset($var['limit'])){
		$q .= " LIMIT ".$var['limit'];
	}
	
	if(!isset($var['img_width'])){
		$var['img_width'] = 120;
	}
	if(!isset($var['img_height'])){
		$var['img_height'] = 90;
	}
	
	$r = $DB->mbm_query($q);
	
	$buf = '';
	if((START+PER_PAGE_CONTENTS) > $DB->mbm_num_rows($r)){
		$end= $DB->mbm_num_rows($r);
	}else{
		$end= START+PER_PAGE_CONTENTS; 
	}
	
	$cache = new Memcache;
	$cache->addServer('127.0.0.1',11218);
	
	$buf .= '<div id="'.$var['div_id'].'"><ul>';
	for($i=START;$i<$end;$i++){
		
		$memcacheKey = 'contentShort'.$var['img_width'].$DB->mbm_result($r,$i,"id");
		
		if(!$cache->get($memcacheKey)){
			$c_title = $DB->mbm_result($r,$i,"title");
			if(mbm_strlen($c_title)>18){
				$c_title = mbm_substr($c_title,18).'...';
			}
			if($DB->mbm_result($r,$i,"show_title")==1){
				$content_title  = '<span class="contentTitle" onclick="window.location=\'index.php?module=menu&amp;cmd=content&amp;id='
					.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
					.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'\'" '
							.' title="'.addslashes($DB->mbm_result($r,$i,"title")).'"'
							.'>'.mbmCleanUpHTML($c_title).'</span>';
			}
			$c_title = '';
			if($DB->mbm_result($r,$i,"is_video") == '1' ){
				$is_content = 'video';
			}elseif($DB->mbm_result($r,$i,"is_video") == '2' ){
				$is_content = 'youtube';
			}elseif($DB->mbm_result($r,$i,"is_photo") == '1' ){
				$is_content = 'photo';
			}else{
				$is_content = 'normal';
			}
			switch($is_content){
				case 'video':
					$memcachedValue .= '<li>';
					$q_video_content = "SELECT * FROM ".PREFIX."menu_videos WHERE content_id='"
										.$DB->mbm_result($r,$i,"id")."' ORDER BY RAND() LIMIT 1";
					$r_video_content = $DB->mbm_query($q_video_content);
					$memcachedValue .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
						.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
						.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'">';
					$memcachedValue .= '<img hspace="5" border="0" src="http://www.yadii.net/img.php?type='
						.$DB->mbm_result($r_video_content,0,"image_filetype")
						.'&amp;f='
						.base64_encode($DB->mbm_result($r_video_content,0,"image_url"))
						.'&amp;w='.$var['img_width'].'&amp;h='.$var['img_height']
						.'" class="thumb_img" alt="'.addslashes($DB->mbm_result($r,$i,"title")).'" />'
						.'</a>';
					$memcachedValue .= $content_title;
					//$memcachedValue .= number_format($DB->mbm_result($r,$i,"hits")).' '.$lang['main']['hits'];
					$memcachedValue .= mbmRatingResult("content_".$DB->mbm_result($r,$i,"id"),0);
					$memcachedValue .= '</li>';
				break;
				case 'youtube':
					$memcachedValue .= '<li>';
					$q_video_content = "SELECT * FROM ".PREFIX."menu_youtube WHERE content_id='"
										.$DB->mbm_result($r,$i,"id")."' ORDER BY RAND() LIMIT 1";
					$r_video_content = $DB->mbm_query($q_video_content);
					$memcachedValue .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
						.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
						.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'">';
					$memcachedValue .= '<img hspace="5" border="0" src="'.DOMAIN.DIR.'img.php?type='
						.$DB->mbm_result($r_video_content,0,"image_filetype")
						.'&amp;f='
						.base64_encode($DB->mbm_result($r_video_content,0,"image_url"))
						.'&amp;w='.$var['img_width'].'&amp;h='.$var['img_height']
						.'" align="left" class="thumb_img" />'
						.'</a>';
					$memcachedValue .= $content_title;
					//$memcachedValue .= number_format($DB->mbm_result($r,$i,"hits")).' '.$lang['main']['hits'];
					$memcachedValue .= mbmRatingResult("content_".$DB->mbm_result($r,$i,"id"),0);
					$memcachedValue .= '</li>';
				break;
				case 'photo':
					$memcachedValue .= '<li>';
					$q_photo_content = "SELECT * FROM ".PREFIX."menu_photos WHERE content_id='"
										.$DB->mbm_result($r,$i,"id")."' ORDER BY RAND() LIMIT 1";
					$r_photo_content = $DB->mbm_query($q_photo_content);
					if($DB->mbm_num_rows($r_photo_content)==1){
						$memcachedValue .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
							.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
							.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'">';
						$memcachedValue .= '<img hspace="5" border="0" src="http://www.yadii.net/img.php?type='
							.$DB->mbm_result($r_photo_content,0,'filetype')
							.'&amp;f='
							.base64_encode($DB->mbm_result($r_photo_content,0,'url'))
							.'&amp;w='.$var['img_width'].'&amp;h='.$var['img_height']
							.'" align="left" class="thumb_img" alt="'.addslashes($DB->mbm_result($r,$i,"title")).'" />';
						$memcachedValue .= '</a>';
					}
					$memcachedValue .= $content_title;
					//$memcachedValue .= number_format($DB->mbm_result($r,$i,"hits")).' '.$lang['main']['hits'];
					$memcachedValue .= mbmRatingResult("content_".$DB->mbm_result($r,$i,"id"),0);
					$memcachedValue .= '</li>';
				break;
				default:
					$memcachedValue .= '<li>';
					$memcachedValue .= $content_title;
					if($var['show_briefInfo']==1){
						$buf1 .= mbmContentBriefInfo(array(
													  'content_id'=>$DB->mbm_result($r,$i,"id"),
													  'user_id'=>$DB->mbm_result($r,$i,"user_id"),
													  'menu_id'=>$DB->mbm_result($r,$i,"menu_id"),
													  'hits'=>$DB->mbm_result($r,$i,"hits"),
													  'rating'=>$DB->mbm_result($r,$i,"id")
													  ));
					}
					if($DB->mbm_result($r,$i,"cleanup_html")==1){
						$content_short = mbmCleanUpHTML($DB->mbm_result($r,$i,"content_short"));
					}else{
						$content_short = $DB->mbm_result($r,$i,"content_short");
					}
					$memcachedValue .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
						.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
						.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'" class="contentMoreLink">';
						$memcachedValue .= $lang["main"]["more"];
					$memcachedValue .= '</a>';
					$memcachedValue .= '</li>';
				break;
			}
			$content_title = '';
			$cache->set($memcacheKey,$memcachedValue,MEMCACHE_COMPRESSED,38888);
		}
		$buf .= $cache->get($memcacheKey);
		unset($memcachedValue,$memcacheKey);
		
		/*
		$c_title = $DB->mbm_result($r,$i,"title");
		if(mbm_strlen($c_title)>18){
			$c_title = mbm_substr($c_title,18).'...';
		}
		if($DB->mbm_result($r,$i,"show_title")==1){
			$content_title  = '<span class="contentTitle" onclick="window.location=\'index.php?module=menu&amp;cmd=content&amp;id='
				.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
				.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'\'" '
						.' title="'.addslashes($DB->mbm_result($r,$i,"title")).'"'
						.'>'.mbmCleanUpHTML($c_title).'</span>';
		}
		$c_title = '';
		if($DB->mbm_result($r,$i,"is_video") == '1' ){
			$is_content = 'video';
		}elseif($DB->mbm_result($r,$i,"is_video") == '2' ){
			$is_content = 'youtube';
		}elseif($DB->mbm_result($r,$i,"is_photo") == '1' ){
			$is_content = 'photo';
		}else{
			$is_content = 'normal';
		}
		switch($is_content){
			case 'video':
				$buf .= '<li>';
				$q_video_content = "SELECT * FROM ".PREFIX."menu_videos WHERE content_id='"
									.$DB->mbm_result($r,$i,"id")."' ORDER BY RAND() LIMIT 1";
				$r_video_content = $DB->mbm_query($q_video_content);
				$buf .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
					.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
					.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'">';
				$buf .= '<img hspace="5" border="0" src="http://www.yadii.net/img.php?type='
					.$DB->mbm_result($r_video_content,0,"image_filetype")
					.'&amp;f='
					.base64_encode($DB->mbm_result($r_video_content,0,"image_url"))
					.'&amp;w='.$var['img_width'].'&amp;h='.$var['img_height']
					.'" class="thumb_img" alt="'.addslashes($DB->mbm_result($r,$i,"title")).'" />'
					.'</a>';
				$buf .= $content_title;
				$buf .= number_format($DB->mbm_result($r,$i,"hits")).' '.$lang['main']['hits'];
				$buf .= '<br />'.mbmRatingResult("content_".$DB->mbm_result($r,$i,"id"),0);
				$buf .= '</li>';
			break;
			case 'youtube':
				$buf .= '<li>';
				$q_video_content = "SELECT * FROM ".PREFIX."menu_youtube WHERE content_id='"
									.$DB->mbm_result($r,$i,"id")."' ORDER BY RAND() LIMIT 1";
				$r_video_content = $DB->mbm_query($q_video_content);
				$buf .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
					.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
					.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'">';
				$buf .= '<img hspace="5" border="0" src="'.DOMAIN.DIR.'img.php?type='
					.$DB->mbm_result($r_video_content,0,"image_filetype")
					.'&amp;f='
					.base64_encode($DB->mbm_result($r_video_content,0,"image_url"))
					.'&amp;w='.$var['img_width'].'&amp;h='.$var['img_height']
					.'" align="left" class="thumb_img" />'
					.'</a>';
				$buf .= $content_title;
				$buf .= number_format($DB->mbm_result($r,$i,"hits")).' '.$lang['main']['hits'];
				$buf .= '<br />'.mbmRatingResult("content_".$DB->mbm_result($r,$i,"id"),0);
				$buf .= '</li>';
			break;
			case 'photo':
				$buf .= '<li>';
				$q_photo_content = "SELECT * FROM ".PREFIX."menu_photos WHERE content_id='"
									.$DB->mbm_result($r,$i,"id")."' ORDER BY RAND() LIMIT 1";
				$r_photo_content = $DB->mbm_query($q_photo_content);
				if($DB->mbm_num_rows($r_photo_content)==1){
					$buf .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
						.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
						.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'">';
					$buf .= '<img hspace="5" border="0" src="http://www.yadii.net/img.php?type='
						.$DB->mbm_result($r_photo_content,0,'filetype')
						.'&amp;f='
						.base64_encode($DB->mbm_result($r_photo_content,0,'url'))
						.'&amp;w='.$var['img_width'].'&amp;h='.$var['img_height']
						.'" align="left" class="thumb_img" alt="'.addslashes($DB->mbm_result($r,$i,"title")).'" />';
					$buf .= '</a>';
				}
				$buf .= $content_title;
				$buf .= number_format($DB->mbm_result($r,$i,"hits")).' '.$lang['main']['hits'];
				$buf .= '<br />'.mbmRatingResult("content_".$DB->mbm_result($r,$i,"id"),0);
				$buf .= '</li>';
			break;
			default:
				$buf .= '<li>';
				$buf .= $content_title;
				if($var['show_briefInfo']==1){
					$buf1 .= mbmContentBriefInfo(array(
												  'content_id'=>$DB->mbm_result($r,$i,"id"),
												  'user_id'=>$DB->mbm_result($r,$i,"user_id"),
												  'menu_id'=>$DB->mbm_result($r,$i,"menu_id"),
												  'hits'=>$DB->mbm_result($r,$i,"hits"),
												  'rating'=>$DB->mbm_result($r,$i,"id")
												  ));
				}
				if($DB->mbm_result($r,$i,"cleanup_html")==1){
					$content_short = mbmCleanUpHTML($DB->mbm_result($r,$i,"content_short"));
				}else{
					$content_short = $DB->mbm_result($r,$i,"content_short");
				}
				$buf .= '<a href="index.php?module=menu&amp;cmd=content&amp;id='
					.$DB->mbm_result($r,$i,"id").'&amp;menu_id='
					.mbmReturnMenuId($DB->mbm_result($r,$i,"menu_id")).'" class="contentMoreLink">';
					$buf .= $lang["main"]["more"];
				$buf .= '</a>';
				$buf .= '</li>';
			break;
		}
		$content_title = '';
		*/
		
	}
	$buf .= '</ul></div>';
	$buf .= mbmNextPrev('index.php?module=menu&amp;cmd=content&amp;menu_id='.MENU_ID.$query_string,$DB->mbm_num_rows($r),START,PER_PAGE_CONTENTS);
	
	if($DB->mbm_num_rows($r)==0){
		return $lang['menu']['no_content'];
	}else{
		return $buf;
	}
}
function mbmShowContentMoreYadii($htmls=array('','','',''), $id){
	global $DB,$DB2,$lang;

	$q_cnt = "SELECT * FROM ".PREFIX."menu_contents WHERE id='".$id."' ";
	if(isset($_GET['f']) && $_GET['f']==1){
	
	}else{
		$q_cnt .= "AND st='1' ";
	}
	$r_cnt = $DB->mbm_query($q_cnt); 
	if($DB->mbm_num_rows($r_cnt)==1){
		
		$buf .= '<div style="float:right;width:300px; display:block;">';
			
			$buf .= '<div class="marqueeZar">';
			$buf .= '<marquee onmouseover="this.stop()" onmouseout="this.start()">'.mbmShowBanner('marquee').'</marquee></div>';
			
			$buf .= '<div style="margin-bottom:5px; display:block; height:250px;">';
				$buf .= mbmShowBanner('B1');
			$buf .= '</div>';
				$buf .= mbmSMSprint();
			$buf .= '<div class="title_arial">';
				$buf .= mbmToggleImage("$('#randomVideoPlaying').toggle('fast')").'Дурын видео';
			$buf .= '</div>';
			$buf .= '<div id="randomVideoPlaying">';
				$buf .= '<div id="randomVideoPlayingContent"></div>';
				//$buf .= mbmShowContentShortYadii(0,array('type'=>'video','limit'=>8,'img_height'=>75,'img_width'=>100,'order_by'=>'RAND()'));
			$buf .= '</div>';
			$buf .= '<div style="margin-bottom:5px; display:block; height:250px;">';
				$buf .= mbmShowBanner('B2');
			$buf .= '</div>';
			$buf .= '<div class="title_arial">';
				$buf .= mbmToggleImage("$('#randomPhotoPlaying').toggle('fast')").'Дурын фото';
			$buf .= '</div>';
			$buf .= '<div id="randomPhotoPlaying">';
				$buf .= '<div id="randomPhotoPlayingContent"></div>';
				//$buf .= mbmShowContentShortYadii(0,array('type'=>'photo','limit'=>8,'img_height'=>75,'img_width'=>100,'order_by'=>'RAND()'));
			$buf .= '</div>';
			$buf .= '<div style="margin-bottom:5px; display:block; height:250px;">';
				$buf .= mbmShowBanner('B3');
			$buf .= '</div>';
			$buf .= '<br clear="all" />';
			$buf .= '<div>';
				$weather_code=rand(1,43);
				if($weather_code<10) $weather_code = '0'.$weather_code;
				$buf .= '<script src="http://weather.az.mn/share.php?c=MGXX00'.$weather_code.'"></script>';
			$buf .= '</div>';
		$buf .= '</div>';
		
		$buf .= '<div style="width:650px; float:left; display:block;">'; 
		
		$buf .= '<div style="margin-bottom:6px;padding:5px; display:block; border:1px solid #DDD; background-color:#F5F5F5;">';
		$buf .= '<span style="float:right; margin-right:5px; width:320px; text-align:right;">'.mbmNextPrevContent($DB->mbm_result($r_cnt,0,"date_added"),1,MENU_ID). '</span><span>';
		$buf .= mbmNextPrevContent($DB->mbm_result($r_cnt,0,"date_added"),0,MENU_ID).'</span><br clear="all" />';
		$buf .= '</div>';
		
		if($DB->mbm_result($r_cnt,0,"show_title")==1){
			$buf .= '<div class="contentTitle">'.$DB->mbm_result($r_cnt,0,"title").'</div>';
		}
		$content_short = $DB->mbm_result($r_cnt,0,"content_short");
		$content_more = $DB->mbm_result($r_cnt,0,"content_more");
		
		if($DB->mbm_result($r_cnt,0,"lev")<=$_SESSION['lev']){
			if($DB->mbm_result($r_cnt,0,"show_content_short")==1){
				if($DB->mbm_result($r_cnt,0,"cleanup_html")==1){
					$content_short = mbmCleanUpHTML($content_short);
				}else{
					$content_short = $content_short;
				}
			}else{
				$content_short = '';
			}
			$buf .= '<div id="contentMore">';
			if($DB->mbm_result($r_cnt,0,"is_video")==1){
				$buf .= mbmShowContentVideosYadii($DB->mbm_result($r_cnt,0,"id"),array('content_short'=>$content_short));
				//$buf .= $content_short;
			}elseif($DB->mbm_result($r_cnt,0,"is_video")==2){
				$buf .= mbmShowContentYoutube($DB->mbm_result($r_cnt,0,"id"));
			}elseif($DB->mbm_result($r_cnt,0,"is_photo")==1){
				$buf .= mbmShowContentPhotos($DB->mbm_result($r_cnt,0,"id"));
				$buf .= $content_short;
			}else{
				$buf .= $content_short;
				$buf .=$content_more;
			}
			$buf .= '</div>';
			if($DB->mbm_result($r_cnt,0,"is_video")==1){
				$content_type = 'video';
			}elseif($DB->mbm_result($r_cnt,0,"is_photo")==1){
				$content_type = 'photo';
			}else{
				$content_type = 'normal';
			}
			$buf .= mbmContentInformation(array(
													'id'=>$id,
													'title'=>$DB->mbm_result($r_cnt,0,"title"),
													'user_id'=>$DB->mbm_result($r_cnt,0,"user_id"),
													'hits'=>$DB->mbm_result($r_cnt,0,"hits"),
													'date_added'=>$DB->mbm_result($r_cnt,0,"date_added"),
													'session_time'=>$DB->mbm_result($r_cnt,0,"session_time"),
													'content_type'=>$content_type
												)
										  );

			if($content_type == 'video'){
				$buf .= '<div id="relativeVideoPlaying">';
					$buf .= '<div class="title_arial">';
						$buf .= 'Хамааралтай видео';
					$buf .= '</div>';
					$buf .= '<div id="videosRelative">';
					$buf .= '</div>';
					//$buf .= mbmShowContentShortYadii(MENU_ID,array('type'=>'video','limit'=>5,'img_height'=>75,'img_width'=>100,'order_by'=>'RAND()'));
				$buf .= '<br clear="both" /><br /><a href="#" onclick="loadContents(20,\'#videosRelative\',\'relativeVideoPlaying\',100,75,\'video\',\'RAND()\',\'\','.MENU_ID.',0);return false;">Илүү ихийг харах</a>';
				$buf .= '</div><br clear="both" />';
			}
			
			//more iin door gardag banner
			$buf .= '<div style="clear:both; margin-bottom:6px margin-top:6px; display:block;">
						'.mbmShowBanner('A4').'
					</div>';
			
			$buf .= '<script>';
			if($content_type == 'video') $buf .='loadContents(5,\'#videosRelative\',\'relativeVideoPlaying\',100,75,\'video\',\'RAND()\',\'DESC\','.MENU_ID.',140);';
			$buf .= 'loadContents(18,\'#randomVideoPlaying\',\'randomVideoPlayingContent\',100,75,\'video\',\'RAND()\',\'DESC\',0,88);
					loadContents(18,\'#randomPhotoPlaying\',\'randomPhotoPlayingContent\',100,75,\'photo\',\'RAND()\',\'DESC\',0,115);
				</script>';
			if($DB->mbm_result($r_cnt,0,"use_comment")==1){
				$buf .= mbmShowContentCommentForm($id);
			}
		}else{
			$buf .= '<div id="query_result">'.$lang['error']['low_level_content'].'</div>';
		}
		$buf .= $htmls[3]; 
	
		$buf .= '</div>'; 
		$DB->mbm_query("UPDATE ".PREFIX."menu_contents SET hits=hits+".HITS_BY.",session_time='".mbmTime()."' WHERE id='".$id."'");
		
	}else{
			$buf = mbmError($lang["menu"]["no_such_content_exists"]); 
	}
	return $buf;
}
function mbmCloseImage($onclick_action=''){
	
	$buf = '<img src="templates/yadii/images/close.png" border="0" width="15" style="cursor:pointer" onclick="'.$onclick_action.'" align="right" />';
	return $buf;
}
function mbmShowContentVideosYadii($content_id=0,$var = array('content_short'=>'')){
	global $DB;
	
	$q_videos = "SELECT * FROM ".PREFIX."menu_videos WHERE content_id='".$content_id."' ORDER BY id ";
	$r_videos = $DB->mbm_query($q_videos);

	for($i=0;$i<$DB->mbm_num_rows($r_videos);$i++){
		$buf11 .= mbmFlvPlayer(array(
								'height'=>387,
								'width'=>642,
								'swf_player'=>FLV_PLAYER_URL,
								'title'=>FLV_PLAYER_TITLE,
								'titlesize'=>FLV_PLAYER_TITLESIZE,
								'flv_url'=>$DB->mbm_result($r_videos,$i,"url"),
								'name'=>FLV_PLAYER_NAME,
								'autoplay'=>FLV_PLAYER_AUTOPLAY,
								'showvolume'=>FLV_PLAYER_SHOWVOLUMEBUTTON,
								'showfullscreen'=>FLV_PLAYER_SHOWFULLSCREEN,
								'showstop'=>FLV_PLAYER_SHOWSTOPBUTTON,
								'showtime'=>FLV_PLAYER_SHOWTIME,
								'bgcolor'=>FLV_PLAYER_BGCOLOR,
								'buttoncolor'=>FLV_PLAYER_BUTTONCOLOR,
								'playercolor'=>FLV_PLAYER_PLAYERCOLOR,
								'bgcolor1'=>FLV_PLAYER_BGCOLOR1,
								'bgcolor2'=>FLV_PLAYER_BGCOLOR2,
								'buttonovercolor'=>FLV_PLAYER_BUTTONOVERCOLOR,
								'slidercolor1'=>FLV_PLAYER_SLIDERCOLOR1,
								'slidercolor2'=>FLV_PLAYER_SLIDERCOLOR2,
								'sliderovercolor'=>FLV_PLAYER_SLIDEROVERCOLOR,
								'loadingcolor'=>FLV_PLAYER_LOADINGCOLOR,
								'autoload'=>1,
								'showiconplay'=>0,
								'showplayer'=>'always',
								'buffer'=>5
								)
							);
		
		$buf .= mbmFlvPlayer(array('width'=>642,'height'=>382,'flv_url'=>$DB->mbm_result($r_videos,$i,"url")));
		
		$DB->mbm_query("UPDATE ".PREFIX."menu_videos SET hits=hits+".HITS_BY.",session_time='".mbmTime()."' WHERE id='".$DB->mbm_result($r_videos,$i,"id")."'");

		$buf .= '<div class="contentTitleVideo">'.$DB->mbm_result($r_videos,$i,"title").'</div>';
		$buf .= $var['content_short'];
		$buf .= '<div id="videoComment">';
		$buf .= $DB->mbm_result($r_videos,$i,"comment");
		$buf .= '</div>';
		if(VIDEO_INFO_SHOW=='1'){
			$buf .= mbmShowVideoInfoYadii(array(
										'id'=>$DB->mbm_result($r_videos,$i,"id"),
										'title'=>$DB->mbm_result($r_videos,$i,"title"),
										'downloaded'=>$DB->mbm_result($r_videos,$i,"downloaded"),
										'flv_url'=>$DB->mbm_result($r_videos,$i,"url"),
										'filesize'=>$DB->mbm_result($r_videos,$i,"filesize"),
										'duration'=>$DB->mbm_result($r_videos,$i,"duration"),
										'date_added'=>$DB->mbm_result($r_videos,$i,"date_added"),
										'date_lastupdated'=>$DB->mbm_result($r_videos,$i,"date_lastupdated"),
										'total_updated'=>$DB->mbm_result($r_videos,$i,"total_updated"),
										'hits'=>$DB->mbm_result($r_videos,$i,"hits"),
										'video_url'=>$DB->mbm_result($r_videos,$i,"url"), //yadii -d 
										'image_url'=>$DB->mbm_result($r_videos,$i,"image_url") //yadii -d
										)
									);
		}
	}
	return $buf;
}


function mbmShowVideoInfoYadii($info=array()){

	global $lang;
	
	$buf ='<div id="ContentVideoInfoYadii"><ul>';
		$buf .= '<li id="videoInfoTab1" onclick="videoInfoTab(1)">';
			$buf .= '<span>';
			$buf .= $lang["menu"]["video_share"];
			$buf .= '</span>';
				$buf .= '<ul id="Tugeegchid">';
					$buf .= '<li>';
					$buf .= mbmShareThisPage(array(
												  'title'=>$info['video_title']
												 )
										   );
					$buf .= '</li>';
					$buf .= '<li>';
					$buf .= mbmAddRSSPage(array(
												'content_type'=>'video'
											   )
										 );
					$buf .= '</li>';
					$buf .= '<li>';
					$buf .= mbmSend2Friend();
					$buf .= '</li>';
					$buf .= '<li>';
						$buf .= '<img src="'.INCLUDE_DOMAIN.'images/icons/icon_embedcode.png" border="0" onclick="mbmToggleDisplay(\'videoEmbedCode\'); document.getElementById(\'send2Friend\').style.display=\'none\';" style="cursor:pointer;" />';
						
						// embed code start
						$info['textarea_cols'] = 45;
						$info['textarea_rows'] = 8;
						$buf .= mbmVideoEmbedCode($info);
						//embed code ends
					$buf .= '</li>';
				$buf .= '</ul>';
		$buf .= '</li>';
		
		$buf .= '<li id="videoInfoTab2" onclick="videoInfoTab(2)">';			
			$buf .= '<span>';
				$buf .= $lang["menu"]["video_save"];
			$buf .= '</span>';
				$buf .= '<ul id="Hadgalagchid">';
					$buf .= '<li><a href="rss.php?dl=content_video&amp;id='.$info['id'].'" target="_blank" ';
					if($_SESSION['lev']==0){
						$buf .= 'onclick="alert(\'Та хэрэглэгчийн эрхээр нэвтэрч орсны дараа видео татах боломжтой.\'); return false;"';
					}
					$buf .= '>'.$lang["menu"]["video_download"].'</a></li>';
					$buf .= '<li>
								<a href="#" onclick="mbmAddBookmark(\''
																.'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'\',
																document.title,
																\''.$lang["main"]["bookmark_success"].'\');
													 return false;">'
								.$lang["menu"]["video_favorite_it"]
								.'</a>
							 </li>';
				$buf .= '</ul>';
			$buf .= '</li>';
			
			
		$buf .= '<li id="videoInfoTab3" onclick="videoInfoTab(3)">';
			$buf .= '<span>';
				$buf .= $lang["menu"]["video_info"];
			$buf .= '</span>';
				$buf .= '<ul id="Medeelegchid" >';
					$buf .= '<li>'.$lang["main"]["hits"].': <strong>'.number_format($info['hits']).'</strong></li>';
					$buf .= '<li>'.$lang['menu']['video_duration'].': <strong>'.mbmFLVDurationToMinute($info['duration']).'</strong></li>';
					$buf .= '<li>'.$lang["menu"]["filesize"].': <strong>'.mbmFileSizeMB($info['filesize']).'</strong></li>';
					$buf .= '<li>'.$lang["menu"]["video_downloaded"].': <strong>'.number_format($info['downloaded']).'</strong></li>';
					$buf .= '<li>'.$lang["main"]["date_added"].': <strong>'.date("d/m/Y",$info['date_added']).'</strong></li>';
				$buf .= '</ul>';
		$buf .= '</li>';
			
		$buf .= '<li id="videoInfoTab4" onclick="videoInfoTab(4)">';
			$buf .= '<span>';
				$buf .= $lang["menu"]["video_playlist"];
			$buf .= '</span>';
			$buf .= '<ul id="Jagsaagchid" >';
				$buf .= '<li>'
							//.'<a href="#" onclick="alert(\'updating...\');return false;">'
							.mbmShowVideoPlaylistButton($var = array(
												 'video_url'=>$info['video_url'],
												 'image_url'=>$info['image_url'],
												 'text'=>$lang["menu"]["video_save_to_playlist"],
												 'duration'=>''
												 ))
							//.'</a>'
						 .'</li>';
				$buf .= '<li>
							<a href="index.php?module=menu&amp;cmd=play_videolist">'
							.$lang["menu"]["video_play_playlist"]
							.'</a>
						 </li>';
				$buf .= '<li>
							<a href="#" onclick="alert(\'Sorry, not available yet\');return false;">'
							.$lang["menu"]["video_manage_playlist"]
							.'</a>
						 </li>';
			$buf .= '</ul>';
		$buf .= '</li>';
	$buf .= '</ul></div><br clear="all" />';
	
	return $buf;
}
?>