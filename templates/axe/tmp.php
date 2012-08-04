<?

//jeton nemne. nemehdee busad buh asuudliig shalgaad sponsor n duursen bol sponsor iig copy-dno
function addJeton($sponsor_id=0,$username=''){
	global $DB, $DB2;

	$sponsor = mbmGetUserInfo(array('id'=>$sponsor_id));


	//JTABLE-s parent id oloh
	//$data['parent_id'] = getMaxInsertParentId($sponsor['username']);
	$data['parent_id'] = getInsertId($sponsor['username']);

	$maxRgt = getMaxRight($data ['parent_id'],JTABLE,$DB);

	$data['lft'] = $maxRgt + 1;
	$data['rgt'] = $maxRgt + 2;
	$data['depth'] = $DB->mbm_get_field($data['parent_id'],'id','depth',JTABLE)+1;

	$data['username'] = $username;
	$data['user_id'] = $DB2->mbm_get_field($username,'username','id','users');
	$data['sponsor_name'] = $sponsor['username'];
	$data['cnt'] = countJeton($data['username']) + 1;
	$data['date_added'] = mbmTime();
	$data['session_id'] = session_id();

	updateLeftRight($maxRgt,JTABLE, $DB);
	$DB->mbm_insert_row($data,JTABLE);

	//child n duursen bol parent iig copy hiine
	if(checkIsEmpty($data['parent_id'])==1){
		copyJeton($data['parent_id']);
	}

	$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE." SET session_id='' WHERE session_id='".session_id()."'");
}

function getInsertId($sponsor_name=''){
	global $DB;

	$q = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE username='".$sponsor_name."' ORDER BY cnt DESC LIMIT 1";
	$r = $DB->mbm_query($q);

	return $DB->mbm_result($r,0,"id");
}

//yag heden child bgaag toolno
function countJeton($username=''){
	global $DB;

	$q = "SELECT COUNT(id) FROM ".$DB->prefix.JTABLE." WHERE username='".$username."'";
	$r = $DB->mbm_query($q);

	return $DB->mbm_result($r,0);
}


//ugudsun id-r jeton iig copy hiine
function copyJeton($id=0){
	global $DB, $DB2;

	$current_jeton = extractJeton($id);


	$q = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE parent_id='".$id."'";
	$r = $DB->mbm_query($q);


	//sponsoriih n hooson hesgiig oloh
	$q_insert_id = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE user_id='".$current_jeton['parent_id']."' ORDER BY cnt DESC LIMIT 1";
	$r_insert_id = $DB->mbm_query($q_insert_id);
	//olood duuschlaa


	//duursen esehiig davhar shalgaj bna.
	if($DB->mbm_num_rows($r)==IS_FULL){

		addJeton($DB->mbm_result($r_insert_id ,0,"id"),$current_jeton['username']);

		$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE." SET is_paid=1 WHERE id='".$id."'");

		makeTransactions(PAYMENT_USER_ID, $current_jeton['user_id'], JETON_BONUS, 'Bonus');
	}

	/*
	$user = mbmGetUserInfo(array('username'=>$DB->mbm_get_field($id,'id','username',JTABLE)));
	$sponsor = mbmGetUserInfo(array('id'=>$user['parent_id']));

	$jeton = extractJeton($id);

	$jeton_parent_id = getMaxInsertParentId($sponsor['username']);


	addJeton($jeton_parent_id,$user['username']);

	$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE." SET is_paid=1 WHERE id='".$id."'");

	//jeton ii bonus uguh
	makeTransactions(PAYMENT_USER_ID, $user['id'], JETON_BONUS, 'Bonus');

	if(checkIsEmpty($user['parent_id'])==1){
		copyJeton($user['parent_id']);
	}
	*/

}


//insert hiih jetonii max id g oloh
function getMaxInsertParentId($username = ''){
	global $DB;

	$q = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE username='".$username."' ORDER BY cnt DESC LIMIT 1";
	$r = $DB->mbm_query($q);


	return $DB->mbm_result($r,0,"id");

	/*
	if($DB->mbm_num_rows($r) == 1){
		//olson max id-r n huuj duursen esehiig shalgana insert hiih parent id oloh. duureegui n todorhoi doo.
		//return getEmptyParentId($DB->mbm_result($r,0,'id'));

		return $DB->mbm_result($r,0,"id");
	}else{
		return 0;
	}
	*/
}

//duursen esehiig shalgaad insert hiih parent_id butsaah
function getEmptyParentId($sponsor_id=0){

	if($sponsor_id == 0){
		return PAYMENT_USER_ID;
	}

	$sponsor = mbmGetJetonInfo(array('id'=>$sponsor_id));

	if(countChild($sponsor['id'])<IS_FULL){
		return $sponsor['id'];
	}else{
		getEmptyParentId($sponsor['parent_id']);
	}

}
//yag dor n heden child bgaag tooloh
function countChild($parent_id=0){

	global $DB;

	$q = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE parent_id='".$parent_id."'";
	$r = $DB->mbm_query($q);

	return $DB->mbm_num_rows($r);
}
//duursen esehiig shalgah
function checkIsEmpty($id){

	global $DB;

	if(countChild($id)<IS_FULL){
		//duureegui bna

		return 0;
	}else{

		//duurchihsen bna
		return 1;
	}

}

function extractJeton($id=0){
	global $DB;

	$q = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE id='".$id."'";
	$r = $DB->mbm_query($q);

	if($DB->mbm_num_rows($r) == 0){
		return false;
	}else{
		return array(
					 'user_id'=>$DB->mbm_result($r,0,"user_id"),
					 'username'=>$DB->mbm_result($r,0,"username"),
					 'sponsor_name'=>$DB->mbm_result($r,0,"sponsor_name"),
					 'parent_id'=>$DB->mbm_result($r,0,"parent_id"),
					 'lft'=>$DB->mbm_result($r,0,"lft"),
					 'rgt'=>$DB->mbm_result($r,0,"rgt"),
					 'depth'=>$DB->mbm_result($r,0,"depth"),
					 'is_paid'=>$DB->mbm_result($r,0,"is_paid"),
					 'date_added'=>$DB->mbm_result($r,0,"date_added")
					 );
	}
}











function jetonTree($jeton_id=0){

	global $DB;

	static $buf;

	$q = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE parent_id='".$jeton_id."' ORDER BY id";
	$r = $DB->mbm_query($q);

	for($i=0;$i<$DB->mbm_num_rows($r);$i++){

		$buf .= '<div style="width:'.(floor($DB->mbm_result($r,$i,"rgt")-$DB->mbm_result($r,$i,"lft")/2)*30).'px;
								display:block;
								text-align:center;
								float:left; border:1px solid #333;
								margin-left: 10px;
								margin-bottom:10px;
								background-color: rgb('.rand(0,255).','.rand(0,255).','.rand(0,255).')">';
			$buf .= ''.$DB->mbm_result($r,$i,"username").'-'.$DB->mbm_result($r,$i,"cnt")
					.'<span style="color:#ddd;">'.$DB->mbm_result($r,$i,"sponsor_name").'</span>'
					.' ('.$DB->mbm_result($r,$i,"lft").'-'.$DB->mbm_result($r,$i,"rgt").')'
					.' [id: '.$DB->mbm_result($r,$i,"id").'] '.$DB->mbm_result($r,$i,"depth");
			if(($DB->mbm_result($r,$i,"rgt")-$DB->mbm_result($r,$i,"lft")) > 1 ){
				$buf .= '<br clear="all">';
				jetonTree($DB->mbm_result($r,$i,"id"));
			}
			$buf .= '<br clear="all">';
		$buf .= '</div>';
	}

	return $buf;
}

function mbmGetJetonInfo($a = array('id'=>'1')){

	global $DB;

	if(!is_array($a)){
		$a['id'] = 0;
	}
	$extension = 'WHERE ';

	foreach($a as $k=>$v){
		$extension .= $k."='".$v."' AND ";
	}
	$extension = rtrim($extension, "AND ");


	$q = "SELECT * FROM ".$DB->prefix.JTABLE." ".$extension." LIMIT 1";
	//echo $q.'<br />';
	$r = $DB->mbm_query($q);
	if($DB->mbm_num_rows($r) == 0){
		return false;
	}else{
		return array(
					 'id'=>$DB->mbm_result($r,0,'id'),
					 'parent_id'=>$DB->mbm_result($r,0,'parent_id'),
					 'depth'=>$DB->mbm_result($r,0,'depth'),
					 'lft'=>$DB->mbm_result($r,0,'lft'),
					 'rgt'=>$DB->mbm_result($r,0,'rgt'),
					 'username'=>$DB2->mbm_result($r,0,'username'),
					 'sponsor_name'=>$DB2->mbm_result($r,0,'sponsor_name')
					 );
	}
}








/******************************************************************************************/
/*					Test function s									*/
/******************************************************************************************/

function addJetonTest($sponsor_id=0,$username=''){
	global $DB, $DB2;

	$sponsor = mbmGetUserInfo(array('id'=>$sponsor_id));


	//JTABLE-s parent id oloh
	//$data['parent_id'] = getMaxInsertParentId($sponsor['username']);
	$data['parent_id'] = getInsertId($sponsor['username']);

	$maxRgt = getMaxRight($data ['parent_id'],JTABLE,$DB);

	$data['lft'] = $maxRgt + 1;
	$data['rgt'] = $maxRgt + 2;
	$data['depth'] = $DB->mbm_get_field($data['parent_id'],'id','depth',JTABLE)+1;

	$data['username'] = $username;
	$data['user_id'] = $DB2->mbm_get_field($username,'username','id','users');
	$data['sponsor_name'] = $sponsor['username'];
	$data['cnt'] = countJeton($data['username']) + 1;
	$data['date_added'] = mbmTime();
	$data['session_id'] = session_id();

	//updateLeftRight($maxRgt,JTABLE, $DB);
	//$DB->mbm_insert_row($data,JTABLE);

	//child n duursen bol parent iig copy hiine
	if(checkIsEmpty($data['parent_id'])==1){
		copyJetonTest($data['parent_id']);
	}

	return $data;
	//$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE." SET session_id='' WHERE session_id='".session_id()."'");
}



function copyJetonTest($id=0){
	global $DB, $DB2;

	$current_jeton = extractJeton($id);


	$q = "SELECT * FROM ".$DB->prefix.JTABLE." WHERE parent_id='".$id."'";
	$r = $DB->mbm_query($q);


	//duursen esehiig davhar shalgaj bna.
	if($DB->mbm_num_rows($r)==IS_FULL){
		echo '<hr />';
		addJetonTest($current_jeton['parent_id'],$current_jeton['username']);

		//$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE." SET is_paid=1 WHERE id='".$id."'");

		//makeTransactions(PAYMENT_USER_ID, $current_jeton['user_id'], JETON_BONUS, 'Bonus');
	}else{
		echo 'not full';
	}

}
?>