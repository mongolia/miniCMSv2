
<div class="talbar"><?=mbmShowBanner("home_".$_SESSION['ln'])?></div>
<div class="talbar" style="background-color:#fbdfb8; padding-top:12px; padding-left:20px; padding-right:20px; padding-bottom:12px;">
  <?  
  echo mbmShowContents(array('','','',''),395,array(
												   'show_briefInfo'=>0
												   ));
  // mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>395)),4,4,'date_added','DESC',0,1);?>
</div>
<div style="margin-top:2px;" class="talbar">
<?
echo mbmShowBanner('home_footer_'.$_SESSION['ln']);
?>
</div>