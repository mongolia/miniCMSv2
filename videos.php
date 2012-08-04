<?
	error_reporting(E_ALL ^ E_NOTICE);
	unset($_GET['mBm'],$_POST['mBm'],$_SESSION['mBm'],$_REQUEST['mBm']);
	$mBm=1;
	if(substr_count($_SERVER['QUERY_STRING'],"%20")>0){
		die("HACKING ATTEMP....");
	}
	unset($_GET['PHPSESSID']);
	if(isset($_GET['redirect'])){
		header("Location: ".base64_decode($_GET['redirect']));
	}
	require_once("config.php");
	include(INCLUDE_DIR."includes/common.php");
	
	if(!isset($_SESSION['ln'])){
		$_SESSION['ln']=DEFAULT_LANG;
	}
	if(!isset($_SESSION['lev'])){
		$_SESSION['lev']=0;
	}
	if($_SESSION['lev']<4){
		die("please login www.Yadii.Net");
	}
	include(INCLUDE_DIR."lang/".$_SESSION['ln']."/index.php");
	mbm_include(INCLUDE_DIR."classes",'php');
	mbm_include(INCLUDE_DIR."functions_php",'php');
	require_once(INCLUDE_DIR."includes/settings.php");

	include_once(ABS_DIR."editors/spaw2/spaw.inc.php");
	
	foreach($modules_active as $module_k=>$module_v){
		require_once(ABS_DIR."modules/".$module_v."/index.php");
	}
	foreach($module_include_dir as $include_folders_k=>$include_folders_v){
		mbm_include($include_folders_v,'php');
	}
	
	include(INCLUDE_DIR."includes/header.php");
	#include("templates/".TEMPLATE."/index.php");
	echo '<div style="margin:0px auto; width:800px;">';
	echo '<form action="" method="get"><select onchange="window.location=\'videos.php?n=\'+this.value">';
		echo '<option>Select folder </option>';
		echo '<option value="files/videos">Main videos</option>';

	mbmDirDropdown(ABS_DIR."videos/");
	/*
	$d = dir(ABS_DIR."videos/");
		while (false !== ($entry = $d->read())) {
			if(substr_count($entry,".")==0){
				echo '<option value="'.$entry.'">';
					echo $entry;
				echo '</option>';
			}elseif(strlen($entry)>2){
				$subdir = dir(ABS_DIR."videos/".$entry);
				while (false !== ($subentry = $subdir->read())) {
					if(substr_count($subentry,".")==0){
						echo '<option value="'.$subentry.'">';
							echo '--------';
							echo $subentry;
						echo '</option>';
					}
				}
			}
		}
	*/
	echo '</select><br />
			<input type="input" name="n" id="n"><input type="submit" name="go" value="next step"></form>';
	echo '<hr style="margin-bottom:20px;" />';
	if($_GET['n']){
		$video_dir = $_GET['n']."/";
		$d = dir(ABS_DIR.$video_dir);
		$i=0;
		$k=0;
		while (false !== ($entry = $d->read())) {
			if((strtolower(substr($entry,-3))=='flv' 
				&& substr_count($entry,'\'')==0) 
			   || 
			   (strtolower(substr($entry,-3))=='f4v' 
				&& substr_count($entry,'\'')==0) 
			   || 
			   (strtolower(substr($entry,-3))=='mp4' 
				&& substr_count($entry,'\'')==0)
			   || 
			   (strtolower(substr($entry,-3))=='mov' 
				&& substr_count($entry,'\'')==0)
			   ){
				if($DB->mbm_check_field('url',DOMAIN.DIR.$video_dir.$entry,'menu_videos')==0){
					if($k<30){
						unset($abs_filename);
						$abs_filename = ABS_DIR.$video_dir.$entry;
						$f_size = filesize($abs_filename);
						echo '<strong>'.($k+1).'.</strong>  <input type="text" size="100" value="'.addslashes(str_replace("_"," ",substr($entry,0,-4))).'" /> <br />';
							echo '<input type="text" size="100" value="'.DOMAIN.DIR.$video_dir.$entry.'" /> <br />';
							echo '<input type="text" size="100" value="'.substr($video_dir.$entry,0,-4).'" /> <br />';
								
								echo'<input type="text" size="50" value="'.$f_size.'" /> Filesize<br />';
								echo'<input type="text" size="50" value="';
								$duration = mbmGetFLVDuration($abs_filename);
								echo $duration;
								echo '" /> Duration ';
								if(isset($duration)){
									echo floor($duration/60).':'.($duration%60);
								}
								unset($duration);
								echo '<br />';
							echo '<img src="'.DOMAIN.DIR.$video_dir.substr($entry,0,-3).'jpg" width="100" align="right" />';
								echo '<embed src="http://lib.az.mn/data/jwplayer/player.swf" allowfullscreen="true" flashvars="logo=&amp;bufferlength=2&amp;file='.DOMAIN.DIR.$video_dir.$entry.'&amp;'
								//streamer=rtmp://yadii.net/live&amp;
								.'skin=http://lib.az.mn/data/jwplayer/skin/modieus.swf" width="642" height="387">';
							//echo '<input type="text" size="50" value="videos/'.substr($entry,0,-3).'jpg" /> Image url<br />';
						echo '<hr size="30" style="background-color:#DDD;margin-top:40px;" />';	
						$k++;
					}
					$i++;
				}
			}
		}
		$d->close();
		echo '<br /> Remaining: '.$i.' ';
	}
	echo '</div>';
	
	
	function mbmDirDropdown($directory=''){
		echo $directory.'.';
		$subdir = dir($directory);
		static $i=0;
		
		while (false !== ($subentry = $subdir->read())) {
			if(substr_count($subentry,".")==0){
				//echo '<option value="'.str_replace(ABS_DIR,$directory,$subentry).'">';
					//echo str_repeat("-",($i*2));
					$dirs[str_replace(ABS_DIR,"",$directory).$subentry] = str_replace(ABS_DIR,"",$directory).$subentry;
					$sub[$subentry]=$i;
				//echo '</option>';
				mbmDirDropdown($directory.$subentry.'/');
			}
		}
		$i++;
		if(is_array($dirs)){
			ksort($dirs);
			foreach($dirs as $k=>$v){
				echo '<option value="'.$k.'">';
					echo $v;
				echo '</option>';
			}
		}
	}
	include(ABS_DIR.INCLUDE_DIR."includes/footer.php");
?>