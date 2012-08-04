<?php
if (isset($_POST['answer'])) {

    $data['poll_id'] = $_POST['pollId'];
    $data['poll_a_id'] = $_POST['answer'];
    $data['ip'] = gethostbyaddr(getenv('REMOTE_ADDR'));
    $data['datetime'] = mbmDate("Y-m-d H:i:s");
    $data['pcname'] = getenv("COMPUTERNAME");
    $r = $DB->mbm_insert_row($data, 'poll_r');
}



//$txt .= getPollResult($_POST['pollId']);


$txt .=  mbmShowPollAjax($_POST['pollId'], 0);
//echo $_POST['pollId'];
//$isNotXML = 1;
?>
