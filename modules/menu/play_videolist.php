<script language="javascript">

mbmSetPageTitle('<?=$lang["menu"]["video_playlist"]?>');

</script><?

echo '<h2>'.$lang["menu"]["video_playlist"].'</h2>';
if($_SESSION['lev'] > 0){
?>
<script language="javascript">

function mbmGetVideosFromPlaylist(playlist_id){
	target_div = $("#videosLists");
	player_id = $("#videoPlaylistPlayer");
	$(target_div).html('<img src="images/loading.gif">');
	$.ajax({
			type: "POST", url: "xml.php?action=playlist&type=getVideosForPlaylistPlayer&", data: "playlist_id="+playlist_id+"&user_id="+<?=$_SESSION['user_id']?>,dataType:'html',
			complete: function(data){
				target_div.fadeIn();
				target_div.html(data.responseText);
			}
		 });
	//$("#videoPlaylistPlayer").SetVariable("player:jsStartImage", "http://mng.cc/mnglogo.jpg");
}
function mbmPlayVideoByURL(player_id,video_url){
	so.SetVariable('player:jsUrl', video_url);
	so.SetVariable('player:jsStop', '');
	so.SetVariable('player:jsPlay', '');
}
function mbmRemoveFromPlaylist(playlist_video_id){
	target_div = $("#video"+playlist_video_id);
	player_id = $("#videoPlaylistPlayer");
	$(target_div).html('<img src="images/loading.gif">');
	$.ajax({
			type: "POST", url: "xml.php?action=playlist&type=removeFromPlaylist&", data: "id="+playlist_video_id+"&user_id="+<?=$_SESSION['user_id']?>,dataType:'html',
			complete: function(data){
				target_div.fadeIn();
				target_div.html(data.responseText);
			}
		 });
	mbmGetVideosFromPlaylist(document.getElementById('playLists').value);
}
</script>
<div id="videoPlaylist" style="float:right; width:300px; direction:block;">
	<form name="selectPlaylist">
	  <select name="playLists" id="playLists" onchange="mbmGetVideosFromPlaylist(this.value);">
      	<?
        	$q_playlist = "SELECT * FROM ".$DB2->prefix."video_playlists WHERE st='1' AND user_id='".$_SESSION['user_id']."' ORDER BY name";
			$r_playlist = $DB2->mbm_query($q_playlist);
			
			echo '<option value="0" >default</option>';
			for($i=0;$i<$DB2->mbm_num_rows($r_playlist);$i++){
				echo '<option value="'.$DB2->mbm_result($r_playlist,$i,"id").'">'.$DB2->mbm_result($r_playlist,$i,"name").'</option>';
			}
		?>
      </select>    
    </form>
    <div id="videosLists">
    </div>
    <script language="javascript">mbmGetVideosFromPlaylist(0)</script>
</div>
<div id="flashPlayer" style="width:650px; float:left; display:block;">
<?
echo mbmFlvPlayerMulti(array(
								'height'=>387,
								'width'=>642,
								'title'=>FLV_PLAYER_TITLE,
								'titlesize'=>FLV_PLAYER_TITLESIZE,
								'xml_file'=>'rss.php?action=playlist&type=xml',
								'name'=>'videoPlaylistPlayer'
								)
							);
?>
</div><?
}else{
	echo mbmError("login first");
}
?>
<div style="height:30px; clear:both; display:block;"></div>