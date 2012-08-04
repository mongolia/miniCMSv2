<div>
            	<h3>Бидний дэмжиж буй сайтууд</h3>
            	<div style="position:relative; height:350px; width:460px; padding:0px; display:block;">
                <?
                	$q_banners_web = "SELECT * FROM ".PREFIX."banners 
										WHERE type='webs' 
											  AND st=1 
											  AND lev<='".$_SESSION['lev']."' 
											  AND hits<=max_hits ";
					$q_banners_web .= "ORDER BY RAND() LIMIT 12";
					
					$r_banners_web = $DB->mbm_query($q_banners_web);
					
					$banner_info_update = array();
					
					for($i=0;$i<$DB->mbm_num_rows($r_banners_web);$i++){
						echo '<div title="'.addslashes($DB->mbm_result($r_banners_web,$i,'comment')).'" id="banner" ';
						if(strlen(str_replace("http://","",$DB->mbm_result($r_banners_web,$i,'link')))>8){
							echo  '
								onclick="window.open(\'index.php?action=banner&id='.$DB->mbm_result($r_banners_web,$i,'id')
								.'&amp;url='.base64_encode($DB->mbm_result($r_banners_web,$i,'link')).'\',\'banner\',\'scrollbars=1,toolbar=1,addressbar=1\')"';
						}
						echo ' style="position:absolute; width:150px; height:80px; margin-bottom:5px; display:block; ';
							
							//deerees avah zaig todorhoilno
							if($i==0 || $i==1 || $i==2){
								$b_height = 0;
							}elseif($i==3 || $i==4 || $i==5){
								$b_height = (80*1)+5;
							}elseif($i==6 || $i==7 || $i==8){
								$b_height = (80*2)+10;
							}elseif($i==9 || $i==10 || $i==11){
								$b_height = (80*3)+15;
							}
							//urdaas avah zai
							if($i==0 || $i==3 || $i==6 || $i==9){
								$b_width = 0;
							}elseif($i==1 || $i==4 || $i==7 || $i==10){
								$b_width = 155;
							}elseif($i==2 || $i==5 || $i==8 || $i==11){
								$b_width = 310;
							}
							
							echo 'left:'.($b_width).'px; top:'.($b_height).'px;';
						echo '"';
						echo  ' >';
								echo $DB->mbm_result($r_banners_web,$i,'content');
						echo '</div>';
						$banner_info_update[] = $DB->mbm_result($r_banners_web,$i,'id');
					}
					$q_banner_update_hits = "UPDATE ".PREFIX."banners set hits=hits+".HITS_BY." WHERE ";
					foreach($banner_info_update as $k=>$v){
						$q_banner_update_hits .= "id='".$v."' OR ";
					}
					$DB->mbm_query(rtrim($q_banner_update_hits,"OR "));
					
				?>
                </div>
       	  </div>