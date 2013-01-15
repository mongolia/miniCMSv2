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

   // $PHPMAILER->AddAttachment($cfile, $_FILES['fileCV']['name']);

    if (!$PHPMAILER->Send()) {
        $result_txt = 'Failed to send. Please try again.';
    } else {
        $b = 1;
        $result_txt = 'Your request has been sent.';
    }
    // Clear all addresses and attachments for next loop
    $PHPMAILER->ClearAddresses();
    $PHPMAILER->ClearAttachments();

    echo mbmError($result_txt);
}

if ($b != 1) {
    ?>
    <div style="width:500px; margin:0px auto;">
        If you would like to apply for any position, please upload your CV to our website. Your CV will be redirected to our Human Resources Department. Only shortlisted candidates will be contacted for further selection. Please include your contact information in the CV. 
        <br />
        <br />
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <input type="file" name="fileCV" id="fileCV" style="padding:3px; font-size:14px; font-family:Arial; border:1px solid #DDD;" />
            <br /><br />
            <input type="checkbox" name="verify" id="verify" value="1" /> Please confirm that your CV is complete and accurate by ticking the checkbox.
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