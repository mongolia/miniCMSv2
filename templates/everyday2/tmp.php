<link href="templates/everyday2/css/main.css" rel="stylesheet" type="text/css" />
<link href="templates/everyday2/css/everydaymn.css" rel="stylesheet" type="text/css" />

<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<div id="pageLoader" style="color:#333; margin-top:100px;"><center>Хуудсыг ачаалж байна. Түр хүлээнэ үү.<br />
<img src="images/web/loading.gif" alt="loading..." border="0" vspace="5" /></center></div>
<div id="mainContainer">
  <table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td><?=mbmShowBanner('header')?></td>
    </tr>
    <tr>
      <td height="36" background="templates/everyday2/images/menu_bg.jpg"><?=mbmMenuDropDown(52)?></td>
    </tr>
    <tr>
      <td height="5"></td>
    </tr>
    <tr>
      <td style="padding-left:5px; padding-right:5px;"><?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
					echo '<tr><td valign="top" width="180" id="l_menu">';
						if($DB->mbm_check_field('menu_id',MENU_ID,'menus')==1){
							$menu_left_id = MENU_ID;
						}else{
							$menu_left_id = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
						}
						
						switch($_GET['module']){
							case 'menu':
								echo '<div style="
													padding-top:5px;
													padding-bottom:5px; 
													font-weight:bold; 
													background-color:#79c6e5;
													color:#FFFFFF;
													text-align:center;
													margin-bottom:6px;
													background-image:url(templates/everyday2/images/talbar_bg_red.jpg);
													background-repeat:repeat-x;
													background-color:#ff0505;
													">';
								echo $DB->mbm_get_field($menu_left_id,'id','name','menus');
								echo '</div>';
								echo mbmShowMenuById(array('<div>','</div>','',''),$menu_left_id,'menu_left');
							break;
							case 'shopping':
								echo mbmShoppingCat1();
							break;
							default:
								echo '<script> document.getElementById(\'l_menu\').Width=\'0px\';</script>';
							break;
						}
					echo '</td><td valign="top" style="padding-left:5px;">';
						include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
					echo '</td>';
					echo '</tr>';
				echo '</table>';
			}else{
				include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
			}
		?></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="60" align="center" style="background-color:#f5f5f5; border:1px solid #dddddd;"><?
	  echo '<div style="color:#333; margin-bottom:12px;">'.mbmShowMenuById(array(' | ','','',''),53,'menu_footer').' |</div> ';
	  echo mbmStatImage().COPYRIGHT;
	  ?></td>
    </tr>
  </table>
  <div id="dropDownComment" style="display:none;"></div>
</div>
<script language="javascript" type="text/javascript">
document.getElementById('pageLoader').style.display='none';
document.getElementById('mainContainer').style.visibility='visible';


// unduruudiig todorhoiloh
function setHeightContent(){
	main_content = document.getElementById('row_content');
	left_talbar = document.getElementById('talbar_left');
	sub_content = document.getElementById('mainContent');
	
	if(sub_content.offsetHeight<left_talbar.offsetHeight){
		set_height = left_talbar.offsetHeight;
	}else{
		set_height = sub_content.offsetHeight;
		left_talbar.style.height = sub_content.offsetHeight+20+'px';
	}
	main_content.style.height = set_height+50+'px';
	setTimeout("setHeightContent()", 5000);
}
//setHeightContent();
if (window.ActiveXObject){
  
  mt = document.getElementsByTagName("td");
  for(i=0;i<mt.length;i++){
  	if(mt[i].className=='menu_dropdown'){
		mt[i].className = 'menu_dropdown_ie';
	}
  }
  
  for(j=1;j<10;j++){
 	document.getElementById("submenu"+j).style.marginTop='24px';
 	document.getElementById("submenu"+j).style.display='none';
  }  
}
//document.body.setAttribute["oncontextmenu"]="alert(\'Copyright Protected\'); return false;";
mbmSetAttribute("body",0,"oncontextmenu","alert(\'Copyright Protected\'); return false;");
</script>