<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
?>
<div style="height:150px; display:block; background-color:#0a0a0a;">
	<div style="border-bottom:1px solid #000;">
    	<div style="padding-top:7px; padding-bottom:8px; color:#999; width:950px; margin:0px auto; height:10px;">
        	<div style="float:right;">
                <a href="#" class="menuTopRight">Нэвтрэх</a> | 
                <a href="#" class="menuTopRight">Тусламж</a> | 
                <a href="#" class="menuTopRight">Захиалга</a> | 
                <a href="#" class="menuTopRight" style="padding-right:0px;">Сагс</a>
            </div>
        	<div style="float:left;">
           		<a href="index.php" class="menuTopLeft" style="padding-left:0px;">Нүүр хуудас</a>
           		&raquo; <?=mbmDate("Y.m.d, H:i");?>
            </div>
        </div>
    </div>
	<div style="border-top:1px solid #333; ">
    	<div style="width:950px; margin:0px auto;">
            <div style="width:125px; float:left; padding-top:41px;"> <a href="index.php"><img src="templates/tojoo2/images/logotop.gif" alt="tojoo" width="125" height="53" border="0" /></a>
        </div>
            <div style="width:825px; float:left;">
                <div style="color:#999; font-size:16px; font-family:Arial; padding-top:24px; height:28px;">
                    <a href="index.php" style="color:#999; padding-right:18px;">Үйлчилгээ</a> 
                    <a href="#" style="color:#999; padding-right:18px; padding-left:18px;">Захиалах</a> 
                    <a href="#" style="color:#999; padding-right:18px; padding-left:18px;">Хамтран ажиллах</a>
                 </div>
                  <div style="color:#fff;height:30px; background-image:url(templates/tojoo2/images/topmenu_bg.jpg); background-repeat:repeat-x;">
                        <img src="templates/tojoo2/images/topmenu_left.jpg" align="left" />
                        <img src="templates/tojoo2/images/topmenu_right.jpg" align="right" />
                        <?=mbmDropDownMenus(0)?>
                  </div>
              <div style="color:#FFF; font-weight:bold; text-align:right; padding-top:20px;">1948 Авто лавлах</div>
            </div>
        </div>
    </div>
</div>
<div style="width:970px; margin:0px auto; background-image:url(templates/tojoo2/images/content_bg.jpg); background-repeat:repeat-y;">
	<div style="background-color:#FFF; width:940px; margin:0px auto; padding:5px;">
    	<!-- zuun bagana//-->
        <div style="float:left;width:190px;">
        	<div class="title">Автомашин хайх</div>
<form action="" method="post" name="carSearchMiniForm" id="carSearchMiniForm">
            	<input type="text" name="firm" class="carSearchMiniFormInput" /> 
            	<span>Фирм</span>
       	        <input type="text" name="firm" class="carSearchMiniFormInput" />
       	        <span>Загвар</span>
                <input type="text" name="firm" class="carSearchMiniFormInput" style="width:70px;" /> -c 
          <select name="price" id="price" class="carSearchMiniFormInput" style="width:50px;">
            <option>Их</option>
            <option>Бага</option>
        </select>
            	<span>Үнэ</span>
   	            <input type="submit" name="firm" class="carSearchMiniFormSubmit" value="Хайх" />
            </form>
            <p>&nbsp;</p>
            <div class="title_33">Сэлбэгийн худалдаа</div>
            <div><?=mbmShoppingCat1()?></div>
            <p>&nbsp;</p>
            <div class="title_33">Үйлчилгээ</div>
            <div><?=mbmCompanyServicesList()?></div>
        </div>
        <!-- zuun bagan duusaad baruun bagana ehlev//-->
        <div style="float:left; margin-left:5px; padding-left:10px; padding-bottom:30px; width:730px; border-left:1px solid #d6d6d6;">
        	<?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			}else{
				mbm_include_file("templates/".TEMPLATE."/home.php");
			}
		?>
        </div>
        <br clear="all" />
        <!-- baruun bagana duusaa//-->
  </div>
</div>
<div style="height:130px; padding-top:10px; display:block; background-color:#0a0a0a;">
<div style="width:950px; margin:0px auto; color:#FFF;" id="mainFooter">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="2">
    <tr>
      <td width="20%" valign="top"><h2>Компани</h2>
        <a href="#">Бидний тухай</a>
        <a href="#">Холбоо тогтоох</a>
      </td>
      <td width="20%" valign="top">
      	<h2>Манай Үйлчилгээ</h2>
      </td>
      <td width="20%" valign="top">
     	 <h2>Тусламж</h2>
        <a href="#">Асуулт/Хариулт</a>
        <a href="#">Сурталчилгаа байрлуулах</a>
        <a href="#">Хамтын ажиллагаа</a>
      </td>
      <td width="20%" valign="top">&nbsp;</td>
      <td width="20%" align="right"><?=COPYRIGHT?></td>
    </tr>
  </table>
</div>
</div>