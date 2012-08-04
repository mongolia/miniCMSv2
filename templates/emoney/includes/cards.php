<?
function extractCode($code=''){
	global $DB;
	
	$q = "SELECT * FROM ".$DB->prefix."cards WHERE code='".$code."' LIMIT 1";
	$r = $DB->mbm_query($q);
	
	$card = array();
	
	if($DB->mbm_num_rows($r) == 1){
		
		$card['id'] = $DB->mbm_result($r,0,'id');
		$card['amount'] = $DB->mbm_result($r,0,'amount');
		$card['st'] = $DB->mbm_result($r,0,'st');
		$card['date_added'] = $DB->mbm_result($r,0,'date_added');
		
		return $card;
		
	}else{
		
		return 0;
	}
}

function mbmCheckCode($code=''){
	
	global $DB;
	
	return $DB->mbm_check_field('code',$code,'cards');
	
}

function generateCode($length=16,$chars='abcdefghijklmnopqrstuvwxyz'){
	
	global $DB;
	
	$code = rand_str($length, $chars);
	$q = "SELECT code FROM ".$DB->prefix."cards WHERE code='".$code."'";
	$r = $DB->mbm_query($q);
	if($DB->mbm_num_rows($r) == 0){
		return $code;
	}else{
		generateCode($length,$chars);
	}
}

function cardTransaction($card_id=0,$type='-1',$amount=0,$comment='',$user_id=0){
	global $DB;
	
	$data['card_id'] = $card_id;
	$data['user_id'] = $user_id;
	$data['type'] = $type;
	$data['amount'] = $amount;
	$data['comment'] = $comment;
	$data['ip'] = getenv('REMOTE_ADDR');
	$data['browser'] =  mbmGetBrowser();
	$data['date_added'] = mbmTime();
	
	$DB->mbm_insert_row($data,'card_logs');
	
	//update card amount
	$DB->mbm_query("UPDATE ".$DB->prefix."cards SET amount=amount-".$amount." WHERE id='".$data['card_id']."'");
}
function getCardIdByCode($code=''){
    global $DB;

    return $DB->mbm_get_field($code,'code','id','cards');
}
?>