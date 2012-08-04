<?
$lang["menu"]["content_photo"] = 'Фото мэдээ';

echo mbmShowBanner('home_1');
echo '<hr class="hr" />';

echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>420,'en'=>8888)),1,5,'id','DESC',0,1);
echo '<hr class="hr" />';

?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="33%" class="talbar_title">Судалгаа - HRM</td>
    <td width="33%" class="talbar_title">MANPOWER AGENCY</td>
    <td width="33%" class="talbar_title">Төрийн мэдээлэл - HRM</td>
  </tr>
  <tr>
    <td bgcolor="#dedede" style="padding:5px;"><?=mbmShowBanner('home_A')?></td>
    <td bgcolor="#dedede" style="padding:5px;"><?=mbmShowBanner('home_B')?></td>
    <td bgcolor="#dedede" style="padding:5px;"><?=mbmShowBanner('home_C')?></td>
  </tr>
</table>
<?

echo '<hr class="hr" />';
echo '<h2>'.$DB->mbm_get_field(400,'id','name','menus').'</h2>';
echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>400,'en'=>8888)),1,5,'id','DESC',0,1);

echo '<hr class="hr" />';
echo mbmShowBanner('home_2');

$home_contents = explode(",",str_replace(" ","",HOME_CONTENTS));

foreach($home_contents as $k=>$v){
	echo '<hr class="hr" />';
	echo '<h2>'.$DB->mbm_get_field($v,'id','name','menus').'</h2>';
	echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>$v,'en'=>8888)),1,5,'id','DESC',0,1);
}
/*

echo '<hr class="hr" />';
echo '<h2>'.$DB->mbm_get_field(408,'id','name','menus').'</h2>';
echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>408,'en'=>8888)),1,5,'id','DESC',0,1);
echo '<hr class="hr" />';
echo '<h2>'.$DB->mbm_get_field(414,'id','name','menus').'</h2>';
echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>414,'en'=>8888)),1,5,'id','DESC',0,1);
echo '<hr class="hr" />';
echo '<h2>'.$DB->mbm_get_field(436,'id','name','menus').'</h2>';
echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>436	,'en'=>8888)),1,5,'id','DESC',0,1);
echo '<hr class="hr" />';
echo '<h2>'.$DB->mbm_get_field(415,'id','name','menus').'</h2>';
echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>415,'en'=>8888)),1,5,'id','DESC',0,1);
*/
echo '<hr class="hr" />';
echo '<h2>'.$lang["menu"]["content_photo"].'</h2>';
echo mbmShowNewContents($htmls_video,6,"is_photo",0,'id','DESC');
echo '<hr class="hr" />';
echo '<h2>'.$lang["menu"]["content_video"].'</h2>';
echo mbmShowNewContents($htmls_video,6,"is_video",0,'id','DESC');
echo '<hr class="hr" />';
?>