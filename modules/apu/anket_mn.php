<br />
<img src="/images/title_anket_<?= $_SESSION['ln'] ?>.png" alt="anket" />
<br />
<br />
<br />
<?php
$send_to = 'hr@apu.mn';
//$send_to = 'admin@mng.cc';
$send_toname = 'APU';
if (isset($_POST['sendCV'])) {

//print_r($_FILES);

    $rel_name = 'files/career/' . $_FILES['fileCV']['name'];
    $cfile = ABS_DIR . $rel_name;
    move_uploaded_file($_FILES['fileCV']['tmp_name'], $cfile);


    $body = 'CV '.DOMAIN.$rel_name.' haygaar tataj avna uu';

    // Plain text body (for mail clients that cannot read HTML)
    $text_body = '*************************************************************************'
            . mbmCleanUpHTML($email_con);

    $PHPMAILER->From = 'hr@apu.mn';
//	$PHPMAILER->From = $_POST['a6'];
    $PHPMAILER->FromName = 'Zochin';
    $PHPMAILER->Subject = 'Web-s anket irlee';
    //$PHPMAILER->setFrom('hr@apu.mn','HR');

    $PHPMAILER->CharSet = "UTF-8";
    $PHPMAILER->Body = $body;
    $PHPMAILER->AltBody = $text_body;
    $PHPMAILER->AddAddress($send_to, $send_toname);

    $PHPMAILER->AddAttachment($cfile, $_FILES['fileCV']['name']);

    if (!$PHPMAILER->Send()) {
        $result_txt = 'Алдаа гарлаа. Дахин оролдоно уу.';
    } else {
        $b = 1;
        $result_txt = 'Таны материаллыг илгээлээ.';
    }
    // Clear all addresses and attachments for next loop
    $PHPMAILER->ClearAddresses();
    $PHPMAILER->ClearAttachments();

    echo mbmError($result_txt);
}

if ($b != 1) {
    ?>
    <div style="width:500px; margin:0px auto;">
        Та <a href="anket.docx">энд дарж</a> анкет татан авч бөглөөд илгээнэ үү. Таны материаллыг Хүний Нөөцийн Албанд илгээх болно. <br />
        <br />
      <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <input type="file" name="fileCV" id="fileCV" style="padding:3px; font-size:14px; font-family:Arial; border:1px solid #DDD;" />
      <br /><br />
            <input type="checkbox" name="verify" id="verify" value="1" /> 
          Үнэн зөв мэдээлэл оруулснаа баталгаажуулна уу.
          <br />
            <input type="submit" name="sendCV" id="sendCV"
                   style="padding:3px; font-size:14px; font-family:Arial; border:1px solid #DDD; margin-top:10px; color:#666;"
                   value="<?= mbmShowByLang(array('en' => 'Upload a CV', 'mn' => 'CV ээ илгээнэ үү')) ?>" />
      </form>
</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?
}
?>