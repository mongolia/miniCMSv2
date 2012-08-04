<?
$con_r2_b_top_banners = ' <div style="margin-bottom:12px;">'.mbmShowBanner('home_1_468x60').'</div>
						<div style="position:relative; margin-bottom:12px; height:250px;">
							<div style="width:250px; position:absolute; left:0px;">'.mbmShowBanner('content_250x250').'</div>
							<div style="width:215px; position:absolute; left:255px;">'.mbmShowBanner('home_2_215x250').'</div>
						</div>';
$content_r2_b_news = '';'<div id="news">
						<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_header_y.png" /></div>
						<div style="padding:5px; background-color:#fdead2; width:458px;">
						  <h3>Мэдээ</h3>
						  '.mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>314,'en'=>8888)),1,1,'id','DESC',0,1).'
						</div>
						<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_footer_y.png" /></div>
					</div>';
$content_r2_b_photos = '<div id="photo">
							<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_header_b.png" /></div>
							<div style="padding:5px; background-color:#e2e7ed; width:458px;"> 
							  <h3>Дурын фото</h3>
						 		'.mbmShowNewContents($htmls_video,4,"is_photo",0,'RAND()','').'
						    </div>
							<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_footer_b.png" /></div>
					  </div>';
$content_r2_b_videos = '<div id="news">
							<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_header_y.png" /></div>
							<div style="padding:5px; background-color:#fdead2; width:458px;">
							  <h3>Дурын видео</h3>
							  '.mbmShowNewContents($htmls_video,4,"is_video",0,'RAND()','').'</div>
							<div style="height:12px; width:468px;"><img src="templates/yadii/images/talbar_footer_y.png" /></div>
						</div>
						<div style="margin-bottom:12px;">'.mbmShowBanner('home_2_468x60').'</div>';
echo '<div id="r2_b">';
	switch(mbmGetUpperMenuId(MENU_ID)){
		case 2: // mongol clip
			if(isset($_GET['id'])){
				echo '<div style="margin-bottom:12px;">'.mbmShowBanner('home_1_468x60').'</div>';
				echo '<div class="title_b">Хамааралтай видеонууд</div>';
				echo mbmShowNewContents($htmls_video,4,"is_video",MENU_ID,'RAND()','');
				echo '<div align="right" style="margin-bottom:12px; padding:5px; border:1px solid #DDDDDD; background-color:#F5F5F5;">
						<a href="index.php?module=menu&amp;cmd=content&amp;menu_id='.MENU_ID.'&amp;ob=title&amp;asc=asc">
							Хамааралтай бүх видеог харах
						</a>
					</div>';
			}else{
				echo $con_r2_b_top_banners;
			}
			echo '<div style="margin-bottom:8px;">';
			echo mbmShowBannerByMenu('singers');
			echo '</div>';
			echo $content_r2_b_photos;
			echo $content_r2_b_videos;
        break;
		case 316: //video
			if(isset($_GET['id'])){
				echo '<div style="margin-bottom:12px;">'.mbmShowBanner('home_1_468x60').'</div>';
				echo '<div class="title_b">Хамааралтай видеонууд</div>';
				if(MENU_ID!=338){
					echo mbmShowNewContents($htmls_video,4,"is_video",MENU_ID,'RAND()','');
				}else{ //herev embed video bol
					echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>338,'en'=>8888)),0,8,'RAND()','',0,1);
				}
			}else{
				echo $con_r2_b_top_banners;
			}
			echo $content_r2_b_news;
			echo $content_r2_b_photos;
			echo $content_r2_b_videos;
        break;
		default:
			echo $con_r2_b_top_banners;
			echo $content_r2_b_news;
			echo $content_r2_b_photos;
			echo $content_r2_b_videos;
		break;
	}
include_once(ABS_DIR."templates/yadii/banner_webs.php");
include_once(ABS_DIR."templates/yadii/youtube.php");
echo '</div>';
?>