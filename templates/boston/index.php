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

<div id="mainContainer">
    <div style="height:3px; background-color:#000066; display:block;"></div>
    <div id="bannerTop">
        <?php echo mbmShowBanner('header');?>
    </div>
    <div id="menuTOP">
        <?
            echo mbmShowMenuById(array('','','',''),0,'menu_top',0,0);
        ?>
        <br clear="all" />
    </div>
    <div id="mainContent">
    <?
                if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
                    echo '<div class="column1">';
					echo 'aaa</div>';
                    echo '<div class="column2">';
                   	 mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
					echo '</div>';
                    echo '<div class="column3">';
					echo 'bb</div>';
                }else{
					mbm_include_file("templates/".TEMPLATE."/home.php");
					
                }
            ?>
    	
    </div>
</div>


