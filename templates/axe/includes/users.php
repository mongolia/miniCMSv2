<?
function mbmGetUserInfo($a = array('id'=>'1')){
	
	global $DB2;
	
	if(!is_array($a)){
		$a['id'] = 0;
	}
	$extension = 'WHERE ';
	
	foreach($a as $k=>$v){
		$extension .= $k."='".$v."' AND ";
	}
	$extension = rtrim($extension, "AND ");
	
	
	$q = "SELECT * FROM ".$DB2->prefix."users ".$extension." LIMIT 1";
	//echo $q.'<br />';
	$r = $DB2->mbm_query($q);
	if($DB2->mbm_num_rows($r) == 0){
		return false;
	}else{
		return array(
					 'id'=>$DB2->mbm_result($r,0,'id'),
					 'parent_id'=>$DB2->mbm_result($r,0,'parent_id'),
					 'sub'=>$DB2->mbm_result($r,0,'sub'),
					 'lft'=>$DB2->mbm_result($r,0,'lft'),
					 'rgt'=>$DB2->mbm_result($r,0,'rgt'),
					 'username'=>$DB2->mbm_result($r,0,'username'),
					 'sponsor_name'=>$DB2->mbm_result($r,0,'sponsor_name')
					 );
	}
}

/*
 * burtgel hiigdsenii daraa hiih uildluud
 * @param : $user['username']
 * @param : $user['id']
 * @param : $user['parent_id']
 * @param : $user['sponsor_name']
 */
function processAfterRegistration($user = array(),$card_id=''){
	
	global $DB, $DB2;
	
	//jeton nemeh
        $user['user_id'] = $user['id'];
        unset($user['id']);
	mbmAddJeton($user,JTABLE1);
	//mbmAddJeton($user,JTABLE2);
	
	//guilgee hiih
	//hereglegchid burtgeliin dung hiih
	makeTransactions(PAYMENT_USER_ID, $user['id'], BURTGEL1_FEE, 'Бүртгэлийн төлбөр');
        
	//hereglegchees burtgeliin mungu tatah
	makeTransactions($user['id'], PAYMENT_USER_ID, BURTGEL1_FEE, 'Бүртгэлийн төлбөр');

        //cart nii dungees hasalt hiih
	cardTransaction($card_id,'-1',BURTGEL1_FEE,'Бүртгэлийн төлбөр ['.$user['username'].']',$user['id']);
	
}
?>