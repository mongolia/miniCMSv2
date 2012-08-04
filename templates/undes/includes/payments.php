<?php 
function makeBonusPayment($data=array()){
	global $DB;
	
	/*
	makeBonusPayment ( array (
								  'type' => 1, 
								  'amount' => BONUS_AMOUNT, 
								  'comment' => 'bonus', 
								  'user_id' => $DB->mbm_get_field ( $sponsor2_jeton_id, "id", "user_id", "jeton" ), 
								  'jeton_id' => $sponsor2_jeton_id, 'date_added' => mbmTime (), 
								  'ip' => getenv ( "REMOTE_ADD" ), 
								  'browser' => mbmGetBrowser () 
								  ) 
						  );
	*/
	
	if($DB->mbm_insert_row($data,"payments")==1){
		$DB->mbm_query("UPDATE SET is_paid=1 ".$DB->prefix."jeton WHERE id='".$data['jeton_id']."' LIMIT 1");
		return 1;
	}else{
		return 0;
	}
}
function makeMakePayment($data=array()){
	global $DB;
	
	/*
	makeBonusPayment ( array (
								  'type' => 1, 
								  'amount' => BONUS_AMOUNT, 
								  'comment' => 'bonus', 
								  'user_id' => $DB->mbm_get_field ( $sponsor2_jeton_id, "id", "user_id", "jeton" ), 
								  'jeton_id' => $sponsor2_jeton_id, 'date_added' => mbmTime (), 
								  'ip' => getenv ( "REMOTE_ADD" ), 
								  'browser' => mbmGetBrowser () 
								  ) 
						  );
	*/
	
	if($DB->mbm_insert_row($data,"payments")==1){
		return 1;
	}else{
		return 0;
	}
}
?>