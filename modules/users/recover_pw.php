<?

if($mBm!=1){

	die('<div align="center"><font color="red">HACKING ATTEMPT....</font><br /> <a href="http://www.mng.cc">www.mng.cc</a></div>');

}
?>
<h2>Нууц үг сэргээх</h2>
<p>Та хэрэглэгчийн нэвтрэх эрхээ АЗ сүлжээний бусад сайтуудад ашиглаж болох бөгөөд нууц үгээ сэргээсэн тохиолдолд бусад сайтуудад хандах нууц үг бас солигдох болохыг анхаарна уу. Жишээ нь сэргээсэн нууц үгийг ашиглан АЗ сүлжээний сайтуудад хандах юм.</p>
<p>
  <?
if(isset($_POST['buttonRecover'])){

	$q_check_user = "SELECT * FROM ".USER_DB_PREFIX."users WHERE username='".addslashes($_POST['username'])

					."' AND email='".addslashes($_POST['email'])."'";

	$r_check_user = $DB2->mbm_query($q_check_user);

	if($DB2->mbm_num_rows($r_check_user)==1){

		$new_pass = rand(1000,9999).rand(1000,9999);

		$q_reset_pw = "UPDATE ".USER_DB_PREFIX."users SET password='".md5($new_pass)."' WHERE username='"

					.addslashes($_POST['username'])."'";

		$r_reset_pw = $DB2->mbm_query($q_reset_pw);

		if($r_reset_pw==1){

			$result_txt = 'Шинэ нууц үгийг имэйлээр илгээлээ.';

			$email_content = str_replace("{PASSWORD}",$new_pass,PASSWORD_RECOVERY_EMAIL);

			mbmSendEmail(ADMIN_NAME.'|'.ADMIN_EMAIL,$_POST['username'].'|'.$_POST['email'],DOMAIN.": Password has been resetted",$email_content);

		}else{

			$result_txt = 'Уг хэрэглэгч олдсонгүй';

		}

	}else{

		$result_txt = 'Уг хэрэглэгч олдсонгүй';

	}
	echo mbmError($result_txt);

}

?>
  
</p>
<form id="form1" name="form1" method="post" action="">

  <table width="100%" border="0" cellspacing="2" cellpadding="3">

    <tr>

      <td width="30%">Хэрэглэгчийн нэр</td>

      <td><label>

        <input type="text" name="username" id="username" class="input" />

      </label></td>

    </tr>

    <tr>

      <td>Имэйл хаяг</td>

      <td><input type="text" name="email" id="email" class="input" /></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><input type="submit" name="buttonRecover" id="buttonRecover" value="Нууц үг сэргээх" class="button" /></td>

    </tr>

  </table>

</form>

