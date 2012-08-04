<?

function mbmListTree($jeton_id=0,$jtable=''){
	global $DB;
	
	$q = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$jeton_id."'";
	$r = $DB->mbm_query($q);
	$total = $DB->mbm_num_rows($r);
	
	$buf .= '<div style="width:250px; float:left;">';
	switch($total){
		case 0:
			$buf .= printNoJeton().printNoJeton();
		break;
		case 1:
			$buf .= printYesJeton($DB->mbm_result($r,0,"username"),$DB->mbm_result($r,0,"id"),$jtable);
			$buf .= printNoJeton();
		break;
		case 2:
			$buf .= printYesJeton($DB->mbm_result($r,0,"username"),$DB->mbm_result($r,0,"id"),$jtable);
			$buf .= printYesJeton($DB->mbm_result($r,1,"username"),$DB->mbm_result($r,1,"id"),$jtable);
		break;
	}
		$buf .= '</div><br clear="all" />';
	return $buf;
}
//mbmListTree() -d heregtei
function printNoJeton(){
	$buf = '<div><img src="/'.DIR.'images/medal1.gif" width="40" /><br />-</div>';
	return $buf;
}
//mbmListTree() -d heregtei
function printJeton($username='',$jeton_id=0,$cnt=1,$medal=1){
	global $DB2;

	$image_tsol = 'medal.gif';
	switch($medal){
		case 'jetons1':
			$image_tsol = 'medal-a1.gif';
		break;
		case 'jetons2':
			$image_tsol = 'medal-b1.gif';
		break;
		case 'jetons3':
			$image_tsol = 'medal-c1.gif';
		break;
	}
	
	if($username!='' && $jeton_id>0){
			$buf = '<div ><img title="'.$medal.'-'.$image_tsol.'" src="/'.DIR.'images/'.$image_tsol.'" width="40" /><br />';
				$buf .= '<a href="index.php?module=jetons&cmd='.addslashes($_GET['cmd']).'&parent_id='.$jeton_id.'">'.$username.'-'.$cnt.'</a>';
				$buf .= '<br />'
						.'('.$DB2->mbm_get_field($username,'username','sponsor_name','users').')';
			$buf .= '</div>';
	}else{
		$buf = printNoJeton();
	}
	return $buf;
}


function printJetonTree($username='',$id=0, $cnt=0, $jtable='',$medal=1){
	global $DB;
	
	$buf .= '<div id="jetonRow1">';
		$buf .= printJeton($username,$id,$cnt,$medal);
	$buf .= '</div>';
	$buf2 .= '<div id="jetonRow2">';
		$q2 = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$id."' ORDER BY id";
		$r2 = $DB->mbm_query($q2);
		//for($i2=0;$i2<$DB->mbm_num_rows($r2);$i2++){
		for($i2=0;$i2<2;$i2++){
			if($DB->mbm_num_rows($r2)>$i2){
				$buf2 .= printJeton($DB->mbm_result($r2,$i2,"username"),$DB->mbm_result($r2,$i2,"id"),$DB->mbm_result($r2,$i2,"cnt"),$medal);
			}else{
				$buf2 .= printNoJeton();
			}
			$buf3 .= '<div id="jetonRow3">';
				$q3 = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$DB->mbm_result($r2,$i2,"id")."' ORDER BY id";
				$r3 = $DB->mbm_query($q3);
				//for($i3=0;$i3<$DB->mbm_num_rows($r3);$i3++){
				for($i3=0;$i3<4;$i3++){
					
					if($DB->mbm_num_rows($r3)>$i3){
						$buf3 .= printJeton($DB->mbm_result($r3,$i3,"username"),$DB->mbm_result($r3,$i3,"id"),$DB->mbm_result($r3,$i3,"cnt"),$medal);
					}else{
						$buf3 .= printNoJeton();
					}
					
					$buf4 .= '<div id="jetonRow4">';
						$q4 = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$DB->mbm_result($r3,$i3,"id")."' ORDER BY id";
						$r4 = $DB->mbm_query($q4);
						//for($i4=0;$i4<$DB->mbm_num_rows($r4);$i4++){
						for($i4=0;$i4<8;$i4++){
							if($DB->mbm_num_rows($r4)>$i4){
								$buf4 .= printJeton($DB->mbm_result($r4,$i4,"username"),$DB->mbm_result($r4,$i4,"id"),$DB->mbm_result($r4,$i4,"cnt"),$medal);
							}else{
								//$buf4 .= printNoJeton();
							}
						}
					$buf4 .= '</div>';
			
				}
			$buf3 .= '</div>';
		}
			
	for($k2=0; $k2<(2-$DB->mbm_num_rows($r2));$k2++){
		//$buf2 .= printNoJeton();
	}	
	$buf2 .= '</div>';
	
	
	
	return $buf.'<br clear="all" />'
			.$buf2.'<br clear="all" />'
			.$buf3.'<br clear="all" />'
			.$buf4.'<br clear="all" />';
	
}

function mbmFullTree3Level($jeton_id=0,$jtable=''){
	global $DB;
	
	
	$i = array();
	
	$q = "SELECT * FROM ".$DB->prefix.$jtable." WHERE id='".$jeton_id."' ORDER BY id ASC";
	$r = $DB->mbm_query($q);
	
	$i['id'] = $jeton_id;
	$i['username'] = $DB->mbm_result($r,0,"username");
	$i['cnt'] = $DB->mbm_result($r,0,"cnt");
	$i['parent_id'] = $DB->mbm_result($r,0,"parent_id");
	
	
	$q1 = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$jeton_id."' ORDER BY id ASC";
	$r1 = $DB->mbm_query($q1);
	
	//mur 1
	for($i1=0;$i1<$DB->mbm_num_rows($r1);$i1++){
		
		//mur2
		$q2 = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$DB->mbm_result($r1,$i1,"id")."' ORDER BY id ASC";
		$r2 = $DB->mbm_query($q2);
		$i[$i1]['id'] = $DB->mbm_result($r1,$i1,"id");
		$i[$i1]['username'] = $DB->mbm_result($r1,$i1,"username");
		$i[$i1]['cnt'] = $DB->mbm_result($r1,$i1,"cnt");
		$i[$i1]['parent_id'] = $DB->mbm_result($r1,$i1,"parent_id");
		
		for($i2=0;$i2<$DB->mbm_num_rows($r2);$i2++){			
			
			$i[$i1][$i2]['id'] = $DB->mbm_result($r2,$i2,"id");
			$i[$i1][$i2]['username'] = $DB->mbm_result($r2,$i2,"username");
			$i[$i1][$i2]['cnt'] = $DB->mbm_result($r2,$i2,"cnt");
			$i[$i1][$i2]['parent_id'] = $DB->mbm_result($r2,$i2,"parent_id");
			//mur3
			$q3 = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$DB->mbm_result($r2,$i2,"id")."' ORDER BY id ASC";
			$r3 = $DB->mbm_query($q3);
			for($i3=0;$i3<$DB->mbm_num_rows($r3);$i3++){
				
				$i[$i1][$i2][$i3]['id'] = $DB->mbm_result($r3,$i3,"id");
				$i[$i1][$i2][$i3]['username'] = $DB->mbm_result($r3,$i3,"username");
				$i[$i1][$i2][$i3]['cnt'] = $DB->mbm_result($r3,$i3,"cnt");
				$i[$i1][$i2][$i3]['parent_id'] = $DB->mbm_result($r3,$i3,"parent_id");
				//mur4
				$q4 = "SELECT * FROM ".$DB->prefix.$jtable." WHERE parent_id='".$DB->mbm_result($r3,$i3,"id")."' ORDER BY id ASC";
				$r4 = $DB->mbm_query($q4);
				for($i4=0;$i4<$DB->mbm_num_rows($r4);$i4++){
				
					$i[$i1][$i2][$i3][$i4]['id'] = $DB->mbm_result($r3,$i3,"id");
					$i[$i1][$i2][$i3][$i4]['username'] = $DB->mbm_result($r3,$i3,"username");
					$i[$i1][$i2][$i3][$i4]['cnt'] = $DB->mbm_result($r3,$i3,"cnt");
					$i[$i1][$i2][$i3][$i4]['parent_id'] = $DB->mbm_result($r3,$i3,"parent_id");
				}
			}
		}
	}
	return $i;
}

function mbmPrintTree($jeton_id=0,$jtable='',$medal=1){
		
	$jetons = mbmFullTree3Level($jeton_id,$jtable);
	if($_SESSION['lev']>3){
		echo '<a href="index.php?module=jetons&cmd=';
		switch($jtable){
			case JTABLE1:
				echo 'subjetons';
			break;
			case JTABLE2;
				echo 'subjetons1';
			break;
		}
		echo '&parent_id=';
		if(!$jetons['parent_id']) echo 0;
		else echo $jetons['parent_id'];
		echo '">';
			echo 'Up one level';
		echo '</a>';
	}
	$buf .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td colspan="2" align="center">1'.printJeton($jetons['username'],$jetons['id'],$jetons['cnt'],$jtable,$medal).'</td>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
					  </tr>
					  <tr>
						<td colspan="4" align="center">2'.printJeton($jetons[0]['username'],$jetons[0]['id'],$jetons[0]['cnt'],$jtable,$medal).'</td>
						<td colspan="4" align="center">3'.printJeton($jetons[1]['username'],$jetons[1]['id'],$jetons[1]['cnt'],$jtable,$medal).'</td>
					  </tr>
					  <tr>
						<td colspan="2" align="center">4'.printJeton($jetons[0][0]['username'],$jetons[0][0]['id'],$jetons[0][0]['cnt'],$jtable,$medal).'</td>
						<td colspan="2" align="center">7'.printJeton($jetons[0][1]['username'],$jetons[0][1]['id'],$jetons[0][1]['cnt'],$jtable,$medal).'</td>
						<td colspan="2" align="center">10'.printJeton($jetons[1][0]['username'],$jetons[1][0]['id'],$jetons[1][0]['cnt'],$jtable,$medal).'</td>
						<td colspan="2" align="center">11'.printJeton($jetons[1][1]['username'],$jetons[1][1]['id'],$jetons[1][1]['cnt'],$jtable,$medal).'</td>
					  </tr>
					  <tr ';
					  
					  if($_GET['cmd'] != 'subjetons'){
						  $buf .= 'style="display:none;"';
					  }
					  
					  $buf .= '>
						<td width="12%" align="center">5'.printJeton($jetons[0][0][0]['username'],$jetons[0][0][0]['id'],$jetons[0][0][0]['cnt'],$jtable,$medal).'</td>
						<td width="12%" align="center">6'.printJeton($jetons[0][0][1]['username'],$jetons[0][0][1]['id'],$jetons[0][0][1]['cnt'],$jtable,$medal).'</td>
						<td width="12%" align="center">8'.printJeton($jetons[0][1][0]['username'],$jetons[0][1][0]['id'],$jetons[0][1][0]['cnt'],$jtable,$medal).'</td>
						<td width="12%" align="center">9'.printJeton($jetons[0][1][1]['username'],$jetons[0][1][1]['id'],$jetons[0][1][1]['cnt'],$jtable,$medal).'</td>
						<td width="12%" align="center">12'.printJeton($jetons[1][0][0]['username'],$jetons[1][0][0]['id'],$jetons[1][0][0]['cnt'],$jtable,$medal).'</td>
						<td width="12%" align="center">13'.printJeton($jetons[1][0][1]['username'],$jetons[1][0][1]['id'],$jetons[1][0][1]['cnt'],$jtable,$medal).'</td>
						<td width="12%" align="center">14'.printJeton($jetons[1][1][0]['username'],$jetons[1][1][0]['id'],$jetons[1][1][0]['cnt'],$jtable).'</td>
						<td width="12%" align="center">15'.printJeton($jetons[1][1][1]['username'],$jetons[1][1][1]['id'],$jetons[1][1][1]['cnt'],$jtable,$medal).'</td>
					  </tr>
					  </table>
					';
		return $buf;
}
?>