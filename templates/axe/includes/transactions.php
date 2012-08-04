<?php
function makeBonusPayment ( $a = array ()){
    makeTransactions($a['f_uid'], $a['to_uid'], $a['amount'], $a['comment']);
}
function makeTransactions($from_uid=0, $to_uid=0, $amount=0, $comment=''){
	
	global $DB;
	
	$data['from_uid'] = $from_uid;
	$data['to_uid'] = $to_uid;
	$data['amount'] = $amount;
	$data['comment'] = $comment;
	$data['ip'] = getenv('REMOTE_ADDR');
	$data['browser'] = mbmGetBrowser();
	$data['date_added'] = mbmTime();
	
	if($data['from_uid'] > 0 && $data['to_uid'] > 0 && $data['amount'] > 0){
		$DB->mbm_insert_row($data,'transactions');
	}else{
		return 0;
	}
}

function userTotalIncome($user_id=0){
	
	global $DB;
	
	$q = "SELECT SUM(amount) FROM ".$DB->prefix."transactions WHERE to_uid = '".$user_id."'";
	$r = $DB->mbm_query($q);
	
	return $DB->mbm_result($r,0);
}
function userTotalOutcome($user_id=0){
	
	global $DB;
	
	$q = "SELECT SUM(amount) FROM ".$DB->prefix."transactions WHERE from_uid = '".$user_id."'";
	$r = $DB->mbm_query($q);
	
	return $DB->mbm_result($r,0);
}
function userRemainBalance($user_id=0){
	return (userTotalIncome($user_id) - userTotalOutcome($user_id));
}
?>