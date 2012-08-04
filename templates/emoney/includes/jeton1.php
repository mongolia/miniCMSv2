<?php
//define ( "BONUS_AMOUNT", 16000 );
//define ( "FULL_JETON", 14 );
////username iin tuslamjtai jeton ii hamgiin ih buyu hamgiin suuld uussen jetoniig olno
//function getMaxCount($username = '') {
//	global $DB2, $DB;
//	$q = "SELECT MAX(cnt) FROM " . $DB->prefix . "jeton WHERE username='" . $username . "'";
//	$r = $DB->mbm_query ( $q );
//
//	return $DB->mbm_result ( $r, 0 );
//}
//
////username iin tuslamjtai jeton ii medeelliig avch array-d butsaah
//function setJetonInfo($username = '') {
//
//	global $DB2, $DB;
//
//	$q = "SELECT * FROM " . $DB->prefix . "jeton" . " WHERE username='" . $username . "' ORDER BY cnt DESC";
//	$r = $DB->mbm_query ( $q );
//
//	$userInfo = array ();
//
//	if ($DB->mbm_num_rows ( $r ) > 0) {
//		$userInfo ["jeton_id"] = $DB->mbm_result ( $r, 0, "jeton_id" );
//		$userInfo ["username"] = $DB->mbm_result ( $r, 0, "username" );
//		$userInfo ["user_id"] = $DB->mbm_result ( $r, 0, "user_id" );
//		$userInfo ["sponsor_name"] = $DB->mbm_result ( $r, 0, "sponsor_name" );
//		$userInfo ["sub"] = $DB->mbm_result ( $r, 0, "sub" );
//	} else {
//		return 0;
//	}
//
//	return $userInfo;
//}
//
////
//function checkIsFull($jeton_id = 0) {
//	global $DB2, $DB;
//
//	$db = $DB;
//
//	$q1 = "SELECT id FROM " . $DB->prefix . "jeton" . " WHERE jeton_id='" . $jeton_id . "' ORDER BY cnt DESC";
//	$r1 = $db->mbm_query ( $q1 );
//	$total_subjetons = 0;
//	$k = array ();
//	for($i1 = 0; $i1 < $db->mbm_num_rows ( $r1 ); $i1 ++) {
//		$q2 = "SELECT id FROM " . $DB->prefix . "jeton" . " WHERE jeton_id='" . $db->mbm_result ( $r1, $i1, "id" ) . "'";
//		$r2 = $db->mbm_query ( $q2 );
//		$k [] = $db->mbm_result ( $r1, $i1, "id" );
//		$total_subjetons++;
//		for($i2 = 0; $i2 < $db->mbm_num_rows ( $r2 ); $i2 ++) {
//			$q3 = "SELECT id FROM " . $DB->prefix . "jeton" . " WHERE jeton_id='" . $db->mbm_result ( $r2, $i2, "id" ) . "'";
//			$r3 = $db->mbm_query ( $q3 );
//			$k [] = $db->mbm_result ( $r2, $i2, "id" );
//			$total_subjetons++;
//			for($i3 = 0; $i3 < $db->mbm_num_rows ( $r3 ); $i3 ++) {
//				$q4 = "SELECT id FROM " . $DB->prefix . "jeton" . " WHERE jeton_id='" . $db->mbm_result ( $r3, $i3, "id" ) . "'";
//				$r4 = $db->mbm_query ( $q4 );
//
//				$k [] = $db->mbm_result ( $r3, $i3, "id" );
//				$total_subjetons++;
//				/*
//				ene orohguigeer 14 iig butsaaj bna. tiimees hasav
//				for($i4 = 0; $i4 < $db->mbm_num_rows ( $r4 ); $i4 ++) {
//					$k [] = $db->mbm_result ( $r4, $i4, "id" );
//					$total_subjetons++;
//				}
//				*/
//			}
//		}
//	}
//	/*
//	echo count ( $k ) . '<br />';
//	foreach ( $k as $kk => $vv ) {
//		echo $vv . '-';
//	}
//	exit ();
//	*/
//	if (count($k) == FULL_JETON) {
//		return 1;
//	} else {
//		return 0;
//	}
//}
//function getJetonIdByUsername($username) {
//	global $DB;
//	$q = "SELECT id FROM " . $DB->prefix . "jeton WHERE username='" . $username . "' ORDER BY cnt DESC LIMIT 1";
//	$r = $DB->mbm_query ( $q );
//	if ($DB->mbm_num_rows ( $r ) == 1) {
//		return $DB->mbm_result ( $r, 0, "id" );
//	} else {
//		return 0;
//	}
//}
//function getInsertPositionId($jeton_id,$jtable='') {
//	global $DB,$DB2;
//
//	$jeton_id = getJetonIdByUsername($DB->mbm_get_field($jeton_id,'id','username','jeton'));
//
//	$q = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE jeton_id='" . $jeton_id . "'";
//	$r = $DB->mbm_query ( $q );
//	if ($DB->mbm_num_rows ( $r ) < 2) {
//		return $jeton_id;
//	} else {
//		for($i = 0; $i < $DB->mbm_num_rows ( $r ); $i ++) {
//			$q2 = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE jeton_id='" . $DB->mbm_result ( $r, $i, "id" ) . "'";
//			$r2 = $DB->mbm_query ( $q2 );
//			if ($DB->mbm_num_rows ( $r2 ) < 2) {
//				return $DB->mbm_result ( $r, $i, "id" );
//			} else {
//				for($ii = 0; $ii < $DB->mbm_num_rows ( $r2 ); $ii ++) {
//					$q3 = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE jeton_id='" . $DB->mbm_result ( $r2, $ii, "id" ) . "'";
//					$r3 = $DB->mbm_query ( $q3 );
//					if ($DB->mbm_num_rows ( $r3 ) < 2) {
//						return $DB->mbm_result ( $r2, $ii, "id" );
//					} else {
//						/*for($iii = 0; $iii < $DB->mbm_num_rows ( $r3 ); $iii ++) {
//							$q4 = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE jeton_id='" . $DB->mbm_result ( $r3, $iii, "id" ) . "'";
//							$r4 = $DB->mbm_query ( $q4 );
//							if ($DB->mbm_num_rows ( $r4 ) < 2) {
//								return $DB->mbm_result ( $r3, $iii, "id" );
//							} else {
//
//							}
//						}*/
//					}
//				}
//			}
//
//		//getInsertPositionId ( $DB->mbm_result ( $r, $i, "id" ) );
//		}
//	}
//}
//function copyJeton($copy_username = '',$jtable='') {
//	global $DB;
//	$jeton_id = getJetonIdByUsername ( $copy_username );
//	if ($jeton_id == 0) {
//		return 0;
//	}
//	if (checkIsFull ( $jeton_id , $jtable) == 1) {
//
//		$sponsor_jeton_id = $DB->mbm_get_field ( $jeton_id, 'id', 'jeton_id', $jtable ); //deed jeton id
//
//		//deed jetonii hooson zaig oloh
//		$insertId = getInsertPositionId ( $sponsor_jeton_id , $jtable);
//		$username = $DB->mbm_get_field ( $jeton_id, 'id', 'username', 'jeton',$jtable );
//		$data ['jeton_id'] = $insertId;
//		$data ['sub'] = $DB->mbm_get_field ( $insertId, 'id', 'sub', 'jeton' ) + 1;
//		$data ['user_id'] = $DB->mbm_get_field ( $jeton_id, 'id', 'user_id', 'jeton' );
//		$data ['username'] = $username;
//		$data ['sponsor_name'] = $DB->mbm_get_field ( $jeton_id, 'id', 'sponsor_name', 'jeton' );
//		$data ['cnt'] = getMaxCount ( $username , $jtable) + 1;
//		$data ['date_added'] = mbmTime ();
//		$DB->mbm_insert_row ( $data, 'jeton' );
//		jetonBonus ( $data ['jeton_id'] );
//		//echo 'Yesssssssssssss  '.$copy_username.'---'.$jeton_id;
//	}else{
//		//echo 'NOoooooooooooooo  '.$copy_username.'---'.$jeton_id;
//		}
//}
//function mbmJetonList($jeton_id) {
//	global $DB;
//
//	$q = "SELECT * FROM " . $DB->prefix . "jeton WHERE jeton_id='" . $jeton_id . "'";
//	$r = $DB->mbm_query ( $q );
//
//	echo '<ul>';
//	for($i = 0; $i < $DB->mbm_num_rows ( $r ); $i ++) {
//		echo '<li >';
//		echo '<a href="index.php?module=jetons&amp;cmd=subjetons&jeton_id=' . $DB->mbm_result ( $r, $i, "id" ) . '">';
//		echo $DB->mbm_result ( $r, $i, "username" ) . $DB->mbm_result ( $r, $i, "cnt" );
//		echo '</a>';
//		echo '</li>';
//		mbmJetonList ( $DB->mbm_result ( $r, $i, "id" ) );
//	}
//	echo '</ul>';
//
//}
//function jetonTotalParentChilds($jeton_id = 0) {
//	global $DB;
//
//	$q = "SELECT COUNT(id) FROM " . $DB->prefix . "jeton WHERE jeton_id='" . $jeton_id . "'";
//	$r = $DB->mbm_query ( $q );
//
//	return $DB->mbm_result ( $r, 0 );
//}
////jeton_id gej jeton nemegdehed tuhain nemegdsen jeton ii sponsor jeton ii id yum
//function jetonBonus($jeton_id = 0, $amount=0,$comment='') {
//	global $DB;
//
//	$_jeton_id = $DB->mbm_get_field ( $jeton_id, "id", "user_id", "jeton" );
//        makeTransactions(ADMIN_ID, $_jeton_id, $amount, $comment);
//}
//
//function mbmListTree($jeton_id=0){
//	global $DB;
//
//	$q = "SELECT * FROM ".$DB->prefix."jeton WHERE jeton_id='".$jeton_id."'";
//	$r = $DB->mbm_query($q);
//	$total = $DB->mbm_num_rows($r);
//
//	$buf .= '<div style="width:250px; float:left;">';
//	switch($total){
//		case 0:
//			$buf .= printNoJeton().printNoJeton();
//		break;
//		case 1:
//			$buf .= printYesJeton($DB->mbm_result($r,0,"username"),$DB->mbm_result($r,0,"id"));
//			$buf .= printNoJeton();
//		break;
//		case 2:
//			$buf .= printYesJeton($DB->mbm_result($r,0,"username"),$DB->mbm_result($r,0,"id"));
//			$buf .= printYesJeton($DB->mbm_result($r,1,"username"),$DB->mbm_result($r,1,"id"));
//		break;
//	}
//		$buf .= '</div><br clear="all" />';
//	return $buf;
//}
////mbmListTree() -d heregtei
//function printNoJeton(){
//	$buf = '<div><img src="templates/'.TEMPLATE.'/images/medal1.png" width="40" /><br />-</div>';
//	return $buf;
//}
////mbmListTree() -d heregtei
//function printJeton($username='',$jeton_id=0,$cnt=1){
//	if($username!='' && $jeton_id>0){
//			$buf = '<div ><img src="templates/'.TEMPLATE.'/images/medal.png" width="40" /><br />';
//				$buf .= '<a href="index.php?module=jetons&cmd=subjetons&jeton_id='.$jeton_id.'">'.$username.$cnt.'</a>';
//			$buf .= '</div>';
//	}else{
//		$buf = printNoJeton();
//	}
//	return $buf;
//}
//function mbmFullTree3Level($jeton_id=0){
//	global $DB;
//
//
//	$i = array();
//
//	$q = "SELECT * FROM ".$DB->prefix."jeton WHERE id='".$jeton_id."'";
//	$r = $DB->mbm_query($q);
//
//	$i['id'] = $jeton_id;
//	$i['username'] = $DB->mbm_result($r,0,"username");
//	$i['cnt'] = $DB->mbm_result($r,0,"cnt");
//
//
//	$q1 = "SELECT * FROM ".$DB->prefix."jeton WHERE jeton_id='".$jeton_id."'";
//	$r1 = $DB->mbm_query($q1);
//
//	//mur 1
//	for($i1=0;$i1<$DB->mbm_num_rows($r1);$i1++){
//
//		//mur2
//		$q2 = "SELECT * FROM ".$DB->prefix."jeton WHERE jeton_id='".$DB->mbm_result($r1,$i1,"id")."'";
//		$r2 = $DB->mbm_query($q2);
//		$i[$i1]['id'] = $DB->mbm_result($r1,$i1,"id");
//		$i[$i1]['username'] = $DB->mbm_result($r1,$i1,"username");
//		$i[$i1]['cnt'] = $DB->mbm_result($r1,$i1,"cnt");
//
//		for($i2=0;$i2<$DB->mbm_num_rows($r2);$i2++){
//
//			$i[$i1][$i2]['id'] = $DB->mbm_result($r2,$i2,"id");
//			$i[$i1][$i2]['username'] = $DB->mbm_result($r2,$i2,"username");
//			$i[$i1][$i2]['cnt'] = $DB->mbm_result($r2,$i2,"cnt");
//			//mur3
//			$q3 = "SELECT * FROM ".$DB->prefix."jeton WHERE jeton_id='".$DB->mbm_result($r2,$i2,"id")."'";
//			$r3 = $DB->mbm_query($q3);
//			for($i3=0;$i3<$DB->mbm_num_rows($r3);$i3++){
//
//				$i[$i1][$i2][$i3]['id'] = $DB->mbm_result($r3,$i3,"id");
//				$i[$i1][$i2][$i3]['username'] = $DB->mbm_result($r3,$i3,"username");
//				$i[$i1][$i2][$i3]['cnt'] = $DB->mbm_result($r3,$i3,"cnt");
//				//mur4
//				$q4 = "SELECT * FROM ".$DB->prefix."jeton WHERE jeton_id='".$DB->mbm_result($r3,$i3,"id")."'";
//				$r4 = $DB->mbm_query($q4);
//				for($i4=0;$i4<$DB->mbm_num_rows($r4);$i4++){
//
//					$i[$i1][$i2][$i3][$i4]['id'] = $DB->mbm_result($r3,$i3,"id");
//					$i[$i1][$i2][$i3][$i4]['username'] = $DB->mbm_result($r3,$i3,"username");
//					$i[$i1][$i2][$i3][$i4]['cnt'] = $DB->mbm_result($r3,$i3,"cnt");
//				}
//			}
//		}
//	}
//	return $i;
//}
//
//function mbmPrintTree($jeton_id=0){
//
//	$jetons = mbmFullTree3Level($jeton_id);
//
//	$buf .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">
//					  <tr>
//						<td align="center">&nbsp;</td>
//						<td align="center">&nbsp;</td>
//						<td align="center">&nbsp;</td>
//						<td colspan="2" align="center">1'.printJeton($jetons['username'],$jetons['id'],$jetons['cnt']).'</td>
//						<td align="center">&nbsp;</td>
//						<td align="center">&nbsp;</td>
//						<td align="center">&nbsp;</td>
//					  </tr>
//					  <tr>
//						<td colspan="4" align="center">2'.printJeton($jetons[0]['username'],$jetons[0]['id'],$jetons[0]['cnt']).'</td>
//						<td colspan="4" align="center">3'.printJeton($jetons[1]['username'],$jetons[1]['id'],$jetons[1]['cnt']).'</td>
//					  </tr>
//					  <tr>
//						<td colspan="2" align="center">4'.printJeton($jetons[0][0]['username'],$jetons[0][0]['id'],$jetons[0][0]['cnt']).'</td>
//						<td colspan="2" align="center">5'.printJeton($jetons[0][1]['username'],$jetons[0][1]['id'],$jetons[0][1]['cnt']).'</td>
//						<td colspan="2" align="center">6'.printJeton($jetons[1][0]['username'],$jetons[1][0]['id'],$jetons[1][0]['cnt']).'</td>
//						<td colspan="2" align="center">7'.printJeton($jetons[1][1]['username'],$jetons[1][1]['id'],$jetons[1][1]['cnt']).'</td>
//					  </tr>
//					  <tr>
//						<td width="12%" align="center">8'.printJeton($jetons[0][0][0]['username'],$jetons[0][0][0]['id'],$jetons[0][0][0]['cnt']).'</td>
//						<td width="12%" align="center">9'.printJeton($jetons[0][0][1]['username'],$jetons[0][0][1]['id'],$jetons[0][0][1]['cnt']).'</td>
//						<td width="12%" align="center">10'.printJeton($jetons[0][1][0]['username'],$jetons[0][1][0]['id'],$jetons[0][1][0]['cnt']).'</td>
//						<td width="12%" align="center">11'.printJeton($jetons[0][1][1]['username'],$jetons[0][1][1]['id'],$jetons[0][1][1]['cnt']).'</td>
//						<td width="12%" align="center">12'.printJeton($jetons[1][0][0]['username'],$jetons[1][0][0]['id'],$jetons[1][0][0]['cnt']).'</td>
//						<td width="12%" align="center">13'.printJeton($jetons[1][0][1]['username'],$jetons[1][0][1]['id'],$jetons[1][0][1]['cnt']).'</td>
//						<td width="12%" align="center">14'.printJeton($jetons[1][1][0]['username'],$jetons[1][1][0]['id'],$jetons[1][1][0]['cnt']).'</td>
//						<td width="12%" align="center">15'.printJeton($jetons[1][1][1]['username'],$jetons[1][1][1]['id'],$jetons[1][1][1]['cnt']).'</td>
//					  </tr>
//					  </table>
//					';
//		return $buf;
//}
?>