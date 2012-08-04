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
<div style="background-image:url(templates/freedom2/images/bg1.jpg); background-repeat:no-repeat; width:1024px; margin:0px auto;">
<div style="height:247px; display:block; position:relative;">
	<div style="height:247px; display:block;width:1024px; margin:0px auto;"><?=mbmShowBanner('header');?></div>
   		<div style="margin:0px auto; width:950px; text-align:left; padding-left:30px; display:none;"> 
        	<a href="index.php"><img src="templates/freedom2/images/menu1.png" alt="freedom" width="133" height="50" border="0"  /></a>
        	<a href="index.php?module=menu&cmd=content&menu_id=7"><img src="templates/freedom2/images/menu2.png" alt="freedom" width="133" height="50" border="0" /></a>
        	<a href="index.php?module=menu&cmd=content&menu_id=1"><img src="templates/freedom2/images/menu3.png" alt="freedom" width="133" height="50" border="0" /></a>
        	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=26"><img src="templates/freedom2/images/menu4.png" alt="freedom" width="133" height="50" border="0" /></a>
        	<a href="index.php?module=menu&cmd=content&menu_id=20"><img src="templates/freedom2/images/menu5.png" alt="freedom" width="133" height="50" border="0" /></a>
        	<a href="index.php?module=menu&cmd=content&menu_id=32"><img src="templates/freedom2/images/menu6.png" alt="freedom" width="133" height="50" border="0" /></a>
        </div>
    </div>
    <div style="width:920px; margin:0px auto; background-image:url(templates/freedom2/images/bg_content.png); background-repeat:no-repeat; padding-left:20px; padding-top:20px; padding-right:40px; padding-bottom:20px; height:1200px; overflow-y:auto;">
    	<!--
        Baruun bagana ehlel
        //-->
        <div id="talbarRight">
        	<div style="
            			background-image:url(templates/freedom2/images/bg-right_top.png); 
                        background-repeat:no-repeat; 
                        height:65px; 
                        background-position:bottom;
                        display:block; text-align:center; padding-top:5px;
                        width:378px;">
                        <img src="templates/freedom2/images/tmp2.jpg" width="300" height="60" />
            </div>
        	<div style="background-image:url(templates/freedom2/images/bg_right_middle.jpg); background-repeat:repeat-y; margin-top:0px;
                        display:block; padding-right:10px; padding-left:15px; padding-top:5px;
                        width:358px;"><?
					   if($DB->mbm_get_field(MENU_ID,'id','menu_id','menus')>0 ){
							$mmmid = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
					   }else{ 
						  $mmmid = MENU_ID;
					   }
					   if($mmmid != 0){
					 	 echo mbmMenuListById(array(
										'menu_id'=>$mmmid,
										'lev'=>0,
										'st'=>1,
										'mainCatClass'=>'leftTitle',
										'subCatClass'=>'leftSubTitle'
										));
					   }
						?>
            	<div class="titleRight">ХЭРЭГЛЭГЧИЙН БУЛАН</div>
                <div class="contentRight"><?=mbmUserPanel($_SESSION['user_id'],array('','','<div style="margin-top:5px;margin-bottom:5px;border-bottom:1px solid #DDDDDD;">','</div>'));?></div>
                <br clear="all" />
            	<div class="titleRight">FREEDOM VIDEO</div>
                <div class="contentRight">
                <?=mbmShowNewContents($GLOBALS['htmls_video'],3,"is_video",mbmShowByLang(array('mn'=>0,'en'=>8888)),'date_added','DESC');?>
                </div>
                <br clear="all" />
            	<div class="titleRight">FREEDOM PHOTOS</div>
                <div class="contentRight">
                	<?=mbmShowNewContents($GLOBALS['htmls_video'],3,"is_photo",mbmShowByLang(array('mn'=>0,'en'=>8888)),'RAND()','');?>
                </div>
                <br clear="all" />
            	<div class="titleRight">ҮГ ХЭЛЭХ ЭРХ ЧӨЛӨӨ</div>
                <div class="contentRight">
                	<?=mbmShoutboxForm(15,360)?>
                </div>
                <br clear="all" />
            </div>
        	<div style="background-image:url(templates/freedom2/images/right_bottom.png); background-repeat:no-repeat; height:59px; background-position:top;
                        display:block; padding:10px;
                        widows:360px;">
            </div>
        </div>
    	<!--
        Baruun bagana tugsgul
        //-->
    	<!--
        Zuun bagana ehlel
        //-->
        <div id="talbarLeft">
        <? 
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
				}else{
					mbm_include_file("templates/".TEMPLATE."/home.php");
				}
			  ?>
        </div>    
    	<!--
        Zuun bagana ehlel
        //-->
    </div>
</div>