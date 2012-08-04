<?
$cache = new Memcache;
$cache->addServer('127.0.0.1',11218);

$yadiiSingers = 'yadiiSingers';
if(!$cache->get($yadiiSingers)){
	ob_start(); // start the output buffer


if($DB->mbm_check_field('id',MENU_ID,'menus')==1 && MENU_ID!=2){

	echo '<h2>'.$DB->mbm_get_field(MENU_ID,'id','name','menus').'</h2>';

	echo '<div id="r2_a">';

	echo mbmShowMenuById(array('','<br />'),MENU_ID,'menu_duuchid');

	echo '</div>';

	include_once(ABS_DIR.$template_files['r2_b']);

}else{
	
	?>
	
	<table width="100%" border="0" cellspacing="2" cellpadding="0">
	
	  <tr>
	
		<td width="20%"><h2>Rock Pop</h2></td>
	
		<td width="20%"><h2>Hip Hop</h2></td>
	
		<td width="20%"><h2>Нийтийн дуу</h2></td>
	
		<td width="20%"><h2>R & B, Techno, Trance</h2></td>
	
	  </tr>
	
	  <tr style="line-height:17px;">
	
		<td valign="top"><?=mbmShowMenuById(array('','<br />'),3,'menu_duuchid')?></td>
	
		<td valign="top"><?=mbmShowMenuById(array('','<br />'),4,'menu_duuchid')?></td>
	
		<td valign="top"><?=mbmShowMenuById(array('','<br />'),6,'menu_duuchid')?></td>
	
		<td valign="top"><?=mbmShowMenuById(array('','<br />'),5,'menu_duuchid')?>
	
		<h2>Бусад</h2><?=mbmShowMenuById(array('','<br />'),7,'menu_duuchid')?></td>
	
	  </tr>
	
	</table>
	
	<?
	
	}
	ob_end_flush();
	$cache->set($yadiiSingers,ob_get_contents(),MEMCACHE_COMPRESSED,3000);
}
echo $cache->get($yadiiSingers);
?>