<style>
#siteMap .tCon{
	display:none;
}
#siteMap sup{
	display:none;
}
</style>
<div id="siteMap">
<ul>
<?
//echo mbmShowMenuById(array('<li>','</li>'),0,'menuSitemap',0,1);

echo mbmMenuListById(array(
					'menu_id'=>0,
					'lev'=>0,
					'st'=>1,
					'lang'=>$_SESSION['ln']
					));
?>
</ul>
</div>