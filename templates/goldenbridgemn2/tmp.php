<link href="templates/goldenbridgemn2/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/goldenbridgemn2/css/goldenbridgemn.css" rel="stylesheet" type="text/css" />

 <?
 $hasSubmenu = $DB->mbm_check_field('menu_id',MENU_ID,'menus');
  if($hasSubmenu == 0){
  	$upMenuId = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
	if($upMenuId == 0){
		$rightMenuId = 456;
  		$active_top_menu_id = 456;
	}else{
		$rightMenuId = $upMenuId;
  		$active_top_menu_id = $upMenuId;
	}
  }else{
	$rightMenuId = MENU_ID;
	$active_top_menu_id = MENU_ID;

  }
  if($rightMenuId == 0 ){
	$letfMenuTitle = 'Navigations';
  }else{
	$letfMenuTitle = $DB->mbm_get_field($rightMenuId,'id','name','menus');
  }
	if(strlen($_SERVER['QUERY_STRING'])<3){
		$rightMenuId = 456;
	}
 ?>
<div style="background-image:url(templates/goldenbridgemn2/images/bg_top.jpg); background-repeat:repeat-x; background-position:top; height:100px; background-color:#FFF;">
    <div style="margin:0px auto; width:980px;">
        <div style="width:100px; margin-right:60px; float:right;"><img src="templates/goldenbridgemn2/images/button_contact.gif" width="90" height="24" alt="contact us" /></div>
        <div style="width:308px; float:left;">
        <img src="templates/goldenbridgemn2/images/logo_top.gif" width="308" height="93" alt="golden bridge" /></div>
        <div style="width:180px; margin:0px auto;"><img src="templates/goldenbridgemn2/images/button_login.gif" width="180" height="35" alt="login" /></div>
        <br clear="all" />
    </div>
</div>
<div style="background-image:url(templates/goldenbridgemn2/images/bg.jpg); background-repeat:repeat-x; background-position:top;">
    <div style="margin:0px auto; width:980px;">
    	<div style="height:34px;"><?=mbmDropDownMenus2(456)?></div>
    	<div style="height:28px;"></div>
    	<div style=" background-color:#f2f1d3;">
        	<div style="float:right; width:200px;">
           	  <div class="title title_g"><?=$letfMenuTitle?></div>
                <?  echo  '<div id="RIGHTMENU" class="talbar_g" style="height:330px; ">'
				.mbmShowMenuById(array('',''),$rightMenuId,'menuRight',0,1,1)
				.'<br clear="all" /></div>';?>
           	  <div class="title title_b">title 1</div>
           	  <div class="talbar_b talbar_right"> talbar 1</div>
              <div class="title title_b">title 2</div>
           	  <div class="talbar_b talbar_right"> talbar 2</div>
              <div class="title title_b">title 3</div>
           	  <div class="talbar_b talbar_right"> talbar 3</div>
              <div class="title title_b">title 4</div>
           	  <div class="talbar_b talbar_right"> talbar 4</div>
              <div class="title title_b">title 5</div>
           	  <div class="talbar_b talbar_right"> talbar 5</div>
        </div>
        	<div style="float:left; width:780px;">
            	<?
                if(strlen($_SERVER['QUERY_STRING'])<3){
					//echo mbmShowBanner('home');
				}
				echo mbmShowBanner('header');
				?>
            	<div id="mainContent" style=" background-color:#f1f0d2; padding:10px;">
                	<?
					if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
						mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
					}else{
						mbm_include_file("templates/".TEMPLATE."/home.php");
					}
					?>
                </div>
          </div>
        </div>
    	<br clear="all" />
      <div style="background-color:#733318; padding-left:20px; color:#FFF; font-size:14px; padding-bottom:6px; padding-top:6px;">
      	<div style="width:470px; float:right;">Contact us</div>
        User Comments
      </div>
        <div style="background-color:#883c1a; padding:10px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="padding:10px;">
              <?=mbmShowContentComment(array('content_id'=>0,
                                            'limit'=>3,
                                            'order_by'=>'date_added',
                                            'asc'=>'DESC',
                                            'show_title'=>1
                                            )
                                    )?>
              	<div class="readmoreFooter">Readmore ...</div>
              </td>
              <td width="10" bgcolor="#733318"></td>
              <td width="460" style="padding:10px;">
              <?=mbmShowBanner('contactus_'.$_SESSION['ln']);?>
              	<div class="readmoreFooter">Readmore ...</div>
              </td>
            </tr>
          </table>
        </div>
  <div style="background-color:#733318; padding-left:20px; text-align:center; color:#FFF; padding-top:5px;">
        	<?=COPYRIGHT?>
        </div>
        <div style="background-image:url(templates/goldenbridgemn2/images/footer.gif); background-repeat:no-repeat; height:51px;">
        	
        </div>
    </div>
</div>

<script language="javascript">
<?
$lefmenuSubClass = 'menuleft_selected';
if($menuSUB == 2){
	$lefmenuSubClass .= ' subM';
}
?>
//$("#LEFTMENU .menupriavte<?=MENU_ID?>").attr("class","<?=$lefmenuSubClass?>");
active_menu = Array();
active_menu[0] = 0;
active_menu[389] = 1;
active_menu[390] = 2;
active_menu[391] = 3;
active_menu[392] = 4;
active_menu[393] = 5;
active_menu[394] = 6;
active_menu[395] = 7;
function makeTopMenuActive(){
	$("#Menu"+active_menu[<?=$active_top_menu_id?>]+" a:first").addClass("menu_active");
	$("#Menu"+active_menu[<?=$active_top_menu_id?>]+" a:first").css("color","#FFF");
//alert(<?=$active_top_menu_id?>);
}
makeTopMenuActive();

</script>