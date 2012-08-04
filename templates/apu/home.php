<div id="bannerHomeTop" style="text-align:center; display:block; margin-top:12px; margin-bottom:12px;">
    <?=mbmShowBanner("home_".$_SESSION['ln'])?>
</div>
<br clear="all" />
<div id="apuContent">
    <div style="
                width:350px; 
                float:right;
                background-image:url(templates/apu/images/bg_home_con2.gif);
                background-repeat:no-repeat;
                background-position:center 30px;
                height:300px;">
        <div style="padding-bottom:9px; border-bottom:1px solid #f2f2f2">
            <img src="templates/apu/images/<?=mbmShowByLang(array('mn'=>'home_con2_title_mn.gif','en'=>'home_con2_title_en.png'))?>" align="news" />
        </div>
        <div id="homeHighlights" style="padding-top:13px; padding-left:14px;">
        <?
                //echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>96,'en'=>97)),1,1,'date_added','DESC',0,1);
				$q_highlights = "SELECT * FROM ".$DB->prefix."menu_contents 
									WHERE 
										is_video=0 
										AND is_photo=0 
										AND st=1 
										AND date_added<=".mbmTime()." 
										AND menu_id LIKE '%,".mbmShowByLang(
																			array(
																				  'mn'=>96,
																				  'en'=>97
																				  )
																			).",%' 
										ORDER BY date_added DESC LIMIT 1";
				$r_highlights = $DB->mbm_query($q_highlights);
				if($DB->mbm_num_rows($r_highlights) == 1){
					echo $DB->mbm_result($r_highlights,0,"content_short");
					echo '<div style="text-align:right;">
							<a href="index.php?module=menu&cmd=content&menu_id='.mbmReturnMenuId($DB->mbm_result($r_highlights,0,"menu_id")).'&id='.$DB->mbm_result($r_highlights,0,"id").'">
								<img src="templates/apu/images/readmore2_'.$_SESSION['ln'].'.png" border="0" vspace="20" />
						 	</a>
						 </div>';
				}
            ?>
        </div>
    </div>
    <div style="
                width:390px;  
                float:left;
                background-image:url(templates/apu/images/bg_home_con1.jpg); 
                background-repeat:repeat-y;
                background-position:right; height:300px;">
        <div style="padding-bottom:5px; padding-top:6px; border-bottom:1px solid #f2f2f2; margin-right:40px;">
            <img src="templates/apu/images/<?=mbmShowByLang(array('mn'=>'home_con1_title_mn.gif','en'=>'home_con1_title_en.png'))?>" align="news" />
        </div>
        <div id="homeNews" style="padding-right:40px; padding-top:13px;">
        <?
                echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>24,'en'=>70)),2,2,'date_added','DESC',0,1);
            ?>
        </div>
        <br clear="all" />
        <div style="padding-top:8px; padding-bottom:8px; text-align:right; display:block;">
        	<a href="index.php?module=menu&cmd=content&menu_id=<?=mbmShowByLang(array('mn'=>24,'en'=>70))?>">
            	<img src="images/presscenter_en.gif" border="0" />
            </a>
        </div>
    </div>
    <br clear="all" />
</div>