<?

function mbmSendEmail($from='BATMUNKH Moltov|admin@mng.cc',$to='M.Batmunkh|info@mng.cc',$subject='hi. test',$content='test'){
		
	$from = explode("|",$from);
	$to = explode("|",$to);
	
	
	if(mbmScheduleAdd(array(
						'name_from'=>$from[0],
						'name_to'=>$to[0],
						'email_from'=>$from[1],
						'email_to'=>$to[1],
						'st'=>0,
						'subject'=>$subject,
						'content'=>$content,
						'date_added'=>mbmTime(),
						'date_sent'=>0
						)
					)==1){
		return 1;
	}else{
		return 0;
	}
	
}
function mbmCheckEmail($email)
{
	if(!eregi("^[a-z]+[a-z0-9_-]*(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.([a-z]+){2,}$", $email))
	{
		return false; // invalid email address
	}
	else{
		return true;
	}
}
?>