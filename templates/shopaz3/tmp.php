<div style="position:fixed;right:0px;top:150px;"><img src="templates/shopaz3/images/support_icon.jpg" width="120" height="240" /></div>
<div style="position:fixed;left:0px;top:0px;"><img src="templates/shopaz3/images/snow_icon.png" width="120" height="243" /></div>
<div style="width:970px; margin:0px auto;">
	<div style="height:80px; display:block; background-image:url(templates/shopaz3/images/header_bg.jpg); background-repeat:no-repeat;">
    	<div style="float:right; width:468px; height:68px; margin-top:5px; margin-right:5px;">
        	<?=mbmShowBanner("header_468x60");?>
        </div>
        <div style="width:480px; padding-top:5px;">
        	<div style="color:#333; padding-bottom:10px;">Өнөөдөр <?=mbmDate("Y")?> оны <?=mbmDate("m")?> сарын <?=mbmDate("d")?>, <?=$lang['day'][mbmDate("l")]?> гараг </div>
            <div><a href="index.php"><img src="templates/shopaz3/images/logo.gif" alt="shop.az.mn" width="216" height="26" border="0" /></a></div>
        </div>
    </div>
    <div style="height:5px; background-color:#0081c2;"></div>
    <br clear="all" />
    <div style="height:38px; background-image:url(templates/shopaz3/images/topmenu_bg.jpg); background-position:0px -9px; background-repeat:repeat-x;" id="topMenu">
        <a href="index.php" id="topMenu1" class="topMenus">Нүүр хуудас</a>
        <a href="#" id="topMenu2" class="topMenus">Хувцас, Цүнх</a>
        <a href="#" id="topMenu3" class="topMenus">Цахилгаан бараа</a>
        <a href="#" id="topMenu4" class="topMenus">Гэр ахуйн бараа</a>
        <a href="#" id="topMenu5" class="topMenus">Эрүүл мэнд, Гоо сайхан</a>
        <a href="#" id="topMenu6" class="topMenus">Спорт гутал</a>
        <a href="#" id="topMenu7" class="topMenus">Захиaлга, Төлбөр тооцоо</a>
    </div>
    <div id="topMenuSub">
    </div>
    <div id="smsZar">
        <div id="talbar2_1" 
                    style="
                        border:1px solid #e0e0e0;
                        position:relative;
                    ">
                <div 
                        style="
                            display:block;
                            background-repeat:repeat-x;
                            background-image:url(http://www.unegui.com/templates/unegui2/images/talbar2_1_title_bg.jpg);
                            border-bottom:1px solid #003663;
                            position:relative;
                            height:24px;
                            ">
                       	<div style="
	                        float:right;
                            right:0px;
                            margin-top:6px;
	                        width:870px;">
                            <marquee truespeed="truespeed" direction="left" scrollamount="1" scrolldelay="30"  onmouseover="this.stop()" onmouseout="this.start()" >
                            	<?=mbmShowZarHorizontal(array(
								 'user_id'=>0,
								 'phone'=>0,
								 'order_by'=>'id',
								 'asc'=>'DESC',
								 'type'=>'sms',
								 'content'=>'% %',
								 'limit'=>10
								 ))?>
                          </marquee>
                        </div>
                       	<div style="font-weight:bold;
                            color:#003663;
                            float:left;
                            margin-left:10px;
                            margin-top:6px;
                            width:88px;">Мессеж зар:
                        </div>
                </div>
                <div style="
                    display:block; 
                    background-image:url(http://www.unegui.com/templates/unegui2/images/talbar2_1_bg_footer.jpg);
                    background-repeat:repeat-x;
                    background-position:bottom;
                    color:#999;
                    padding-left:10px;
                    padding-right:10px;
                    padding-bottom:8px;
                    padding-top:8px;
                    clear:both;
                    ">
                Та Мобиком болон Скайтелийн утаснаас <strong class="red" style="text-decoration:blink;">156789</strong> дугаар руу зараа илгээснээр таны зар Аз сүлжээ сайтуудын оновчтой хэсгүүдэд хэдэн мянган удаа харагдах болно. </div>
              </div>
    <br clear="all" />
    </div>
    <div id="bannerTop" style="height:125px; margin-bottom:6px;">
    	<?=mbmShowBanner("hundlun_1");?>
    </div>
	<?
	if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
		if(isset($_GET['id'])){
			echo '<div style="float:left;width:653px; padding:5px;" class="title1_talbar_border">';
			mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			echo '</div>';
			include_once(ABS_DIR."templates/".TEMPLATE."/right_bagana.php");
			echo '<br clear="all" />';
		}else{
			echo '<div style="padding:5px;" class="title1_talbar_border">';
			mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			echo '<br clear="all" />';
			echo '</div>';
			echo '<br clear="all" />';
		}
	}else{
		mbm_include_file("templates/".TEMPLATE."/home.php");
	}
    if(!isset($_GET['id'])){
	?>
    <div id="bannerTop" style="height:125px; margin-top:6px;">
	    <?=mbmShowBanner("hundlun_2");?>
    </div>
    <div class="title1_talbar_border" style="margin-top:6px;">
        <div class="title1"> Дурын бараа </div>
        <div id="newBaraa" style="padding:5px;">
        <?=mbmShoppingProducts3(0,0,'RAND()','', 6,6, 1);?>
            <br clear="all" />
        </div>
    </div>
    <div id="bannerTop" style="height:125px; margin-top:6px;">
    	<?=mbmShowBanner("hundlun_3");?>
    </div>
    <?
	}
	?>
    <div style="display:block; padding-top:10px; text-align:center;">
        <?=mbmShowMenuById(array(' | ','','',' | '),40,'menu_footer').' |<br /><br />'.COPYRIGHT?>
    </div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6888346-2");
pageTracker._trackPageview();
} catch(err) {}</script>