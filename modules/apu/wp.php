<?
$wdir = ABS_DIR."/files/wallpaper/";
$wdomain = 'http://www.apu.mn/files/wallpaper/';
$total_wp = 27;


$buf_wp = '<table width="100%" cellpadding="3" cellspacing="2" border="0">';

$k=1;
$total_cols = 3;
for($i=1;$i<=$total_wp;$i++){
	if(file_exists($wdir.'wallpaper'.$i.'.jpg')){
		if((($k-1)%$total_cols) == 0){
			$buf_wp .= '<tr>';
		}
		$buf_wp .= '<td width="33%">';
		$buf_wp .= '<img src="'.$wdomain.'wallpaper'.$i.'.jpg" vspace="2" />';
		$buf_wp .= '<div style="float:right;padding-top:20px; text-align:left; width:90px;">';
		if(file_exists($wdir.'wallpaper'.$i.'_1024x768.jpg')){
			$buf_wp .= '[ <a href="'.$wdomain.'wallpaper'.$i.'_1024x768.jpg" target="_blank">1024x768</a> ]';
		}
		if(file_exists($wdir.'wallpaper'.$i.'_1024x768.jpg')){
			$buf_wp .= '<br />[ <a href="'.$wdomain.'wallpaper'.$i.'_1280x960.jpg" target="_blank">1280x960</a> ]';
		}
		if(file_exists($wdir.'wallpaper'.$i.'_1024x768.jpg')){
			$buf_wp .= '<br />[ <a href="'.$wdomain.'wallpaper'.$i.'_1600x1200.jpg" target="_blank">1600x1200</a> ]';
		}
		if(file_exists($wdir.'wallpaper'.$i.'_1024x768.jpg')){
			$buf_wp .= '<br />[ <a href="'.$wdomain.'wallpaper'.$i.'_1680x1050.jpg" target="_blank">1680x1050</a> ]';
		}
		$buf_wp .= '</div>';
		//$buf_wp .= '<br />'.(($i-1)%4).' - '.(($i+1)%4);
		$buf_wp .= '</td>';
		if(($k%$total_cols) == 0){
			$buf_wp .= '</tr>';
			$buf_wp .= '<tr><td colspan="8" height="30"></td></tr>';
		}
		$k++;
	}
}

$buf_wp .= '</table>';

echo '<div style="margin-top:20px;">';
	echo '<div style="float:right; width:100px; text-align:right;">';
	echo '[ <a href="#" onclick="window.history.back();">'.mbmShowByLang(array('mn'=>'Буцах','en'=>'Back')).'</a> ]';
	echo '</div>';
	echo '<img src="/images/news/wallpapers_garchig.jpg" alt="wallpapers" />';
echo '</div>';
echo $buf_wp;

//echo '<br /><br /><br /><textarea rows="20" cols="150" style="font-size:9px; font-family:Tahoma;" >'.$buf_wp.'</textarea>';
//echo $buf_wp;
?>