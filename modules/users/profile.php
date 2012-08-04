<?

if($mBm!=1){

	die('<div align="center"><font color="red">HACKING ATTEMPT....</font><br /> <a href="http://www.mng.cc">www.mng.cc</a></div>');

}elseif($DB2->mbm_check_field('id',$_SESSION['user_id'],'users')==0){

	echo '<div id="errorMain">Please login first.</div>';

}else{

	$q_user_profile = "SELECT * FROM ".USER_DB_PREFIX."users WHERE id='".$_SESSION['user_id']."'";

	$r_user_profile = $DB2->mbm_query($q_user_profile);
	

?>
<a href="index.php?module=users&amp;cmd=profile_edit">Хувийн мэдээллээ шинэчилэх</a>
<table width="100%" border="0" cellspacing="2" cellpadding="5">

  <tr class="tblHeader">

    <td colspan="2">Хувийн мэдээлэл</td>

    <td colspan="2">Нэмэлт мэдээлэл</td>

  </tr>

  <tr>

    <td width="25%" valign="top" bgcolor="#F5F5F5">Нэр: </td>

    <td width="25%" valign="top" bgcolor="#F5F5F5"><strong>

      <?=$DB2->mbm_result($r_user_profile,0,"firstname")?>

    </strong></td>

    <td width="25%" valign="top" bgcolor="#F5F5F5">Бүртгүүлсэн огноо:</td>

    <td width="25%" valign="top" bgcolor="#F5F5F5"><strong>

      <?=date("Y/m/d H:i:s",$DB2->mbm_result($r_user_profile,0,"date_added"))?>

      <br />

    </strong></td>

  </tr>

  <tr>

    <td valign="top" bgcolor="#F5F5F5">Овог: </td>

    <td valign="top" bgcolor="#F5F5F5"><strong>

      <?=$DB2->mbm_result($r_user_profile,0,"lastname")?>

    </strong></td>

    <td valign="top" bgcolor="#F5F5F5">Сүүлд нэвтэрсэн:</td>

    <td valign="top" bgcolor="#F5F5F5"><strong>

      <?=date("Y/m/d H:i:s",$DB2->mbm_result($r_user_profile,0,"date_lastlogin"))?>

    </strong></td>

  </tr>
  <tr>
    <td valign="top" bgcolor="#F5F5F5">Мэргэжил:</td>
    <td valign="top" bgcolor="#F5F5F5"><strong>
      <?=$DB2->mbm_result($r_user_profile,0,"occupation")?>
    </strong></td>
    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>
    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F5F5F5">Имэйл:</td>
    <td valign="top" bgcolor="#F5F5F5"><strong>
      <?=$DB2->mbm_result($r_user_profile,0,"email")?>
    </strong></td>
    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>
    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>
  </tr>

  <tr>

    <td valign="top" bgcolor="#F5F5F5">Утас:</td>

    <td valign="top" bgcolor="#F5F5F5"><strong>

      <?=$DB2->mbm_result($r_user_profile,0,"phone")?>

    </strong></td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

  </tr>

  <tr>

    <td valign="top" bgcolor="#F5F5F5">Гэрийн утас:</td>

    <td valign="top" bgcolor="#F5F5F5"><strong>

      <?=$DB2->mbm_result($r_user_profile,0,"mobile")?>

    </strong></td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

  </tr>

  <tr>
    <td valign="top" bgcolor="#F5F5F5">Факc:</td>
    <td valign="top" bgcolor="#F5F5F5"><strong>
      <?=$DB2->mbm_result($r_user_profile,0,"fax")?>
    </strong></td>
    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>
    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>
  </tr>
  <tr>

    <td valign="top" bgcolor="#F5F5F5">Вэб:</td>

    <td valign="top" bgcolor="#F5F5F5"><strong>

      <?=$DB2->mbm_result($r_user_profile,0,"website")?>

    </strong></td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

  </tr>

  <tr>

    <td valign="top" bgcolor="#F5F5F5">Хот:</td>

    <td valign="top" bgcolor="#F5F5F5"><strong>

      <?=$DB2->mbm_result($r_user_profile,0,"city")?>

    </strong></td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

  </tr>

  <tr>

    <td valign="top" bgcolor="#F5F5F5">Улс:</td>

    <td valign="top" bgcolor="#F5F5F5"><strong>

      <?=$DB2->mbm_result($r_user_profile,0,"country")?>

    </strong></td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

    <td valign="top" bgcolor="#F5F5F5">&nbsp;</td>

  </tr>

</table>

<?

}

?>

