<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<div style="width:960px; padding:5px; margin:0px auto; background-color:#FFF;">
<div style="background-image:url(templates/everyday3/images/hd_bg.gif); background-repeat:repeat-x; background-position:bottom; height:108px;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="70"><a href="index.php"><img src="templates/everyday3/images/logo.gif" alt="everyday" width="200" height="49" hspace="10" border="0" /></a></td>
                <td width="400" align="right" valign="top" style="padding-top:8px;"><a href="index.php">Нүүр</a> | <a href="index.php?module=menu&amp;cmd=content&amp;menu_id=7">Холбоо тогтоох</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="30" align="center">
          	<?
			echo mbmShowMenuById(array('','','',''),52,'menuTop',0,0);
			?>
          </td>
        </tr>
      </table>
</div>
<div style="margin:0px auto; display:block; padding-top:5px;">
<? 
				if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
					?>
                    <div style="text-align:center;">
                    <?=mbmShowBanner('header')?>
                    </div>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td width="180" valign="top"><?
                        if($DB->mbm_check_field('menu_id',MENU_ID,'menus') == 1){
							$mmid = MENU_ID;
						}else{
							$mmid = $DB->mbm_get_field(MENU_ID,'id','menu_id','menus');
						}
						if($mmid == 0){
							$mmid = 52;
						}
						echo mbmShowMenuById(array('','','',''),$mmid,'menuLeft',0,0);
						?></td>
					    <td valign="top" width="10"></td>
					    <td valign="top">
                        <?
                        include_once(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php");
						?>
                        </td>
				      </tr>
                </table>
                <?
				if(MENU_ID == 38){
					echo '<div>
                  	<embed src="/images/logos.swf" width="950" height="65" ></embed>
                  </div>';
				}
				}else{
					include_once(ABS_DIR."templates/".TEMPLATE."/home.php");
				}
			  ?>
 
</div>
<div style="text-align:center; padding-top:20px; display:block; color:#999; background-image:url(templates/everyday3/images/ft_bg.gif); background-repeat:repeat-x; margin-top:20px; margin-bottom:20px;">
<?=COPYRIGHT?>
</div>
<br clear="all" />
</div>