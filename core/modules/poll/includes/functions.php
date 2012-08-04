<?
function mbmShowPoll($id=0, $show_title=0) {
    global $lang, $DB;
   $q_question = "SELECT * FROM " . PREFIX . "poll WHERE st='1' ";
    if ($id != 0) {
        $q_question .= "AND id='" . $id . "' ";
    }
    $q_question .= "ORDER BY id DESC LIMIT 1";
    $r_question = $DB->mbm_query($q_question);
    $buf .= "<table width='98%' class='poll_tbl' align=center>";
    for ($i = 0; $i < $DB->mbm_num_rows($r_question); $i++) {
        $buf .= '<form';
        if ($_GET['module'] != 'poll') {
            $buf .= ' target="_blank"';
        }
        $buf .= ' action="modules/poll/dovote.php?';
        $buf .= 'id=' . $DB->mbm_result($r_question, $i, "id") . '" method="post">';
        if ($show_title == 1) {
            $buf .= '<tr align="center" class="poll_title">';
            $buf .= '<td colspan=2>';
            $buf .= stripslashes($DB->mbm_result($r_question, $i, "question_" . $_SESSION['ln']));
            $buf .= '</td>';
            $buf .= '</tr>';
        }
        $q_answer = "SELECT * FROM " . PREFIX . "poll_a WHERE poll_id='";
        $q_answer.=$DB->mbm_result($r_question, $i, "id") . "' ORDER BY id";
        $r_answer = $DB->mbm_query($q_answer);
        for ($j = 0; $j < $DB->mbm_num_rows($r_answer); $j++) {
            $buf .= '<tr height=17>';
            $buf .= '<td width=30 align=center>';
            $buf .= '<input type="radio" name="answer" value="' . $DB->mbm_result($r_answer, $j, "id") . '" ';
            if ($j == 0)
            $buf .= 'checked';
            $buf .= '></td>';
            $buf .= '<td>';
            $buf .= $DB->mbm_result($r_answer, $j, "answer_" . $_SESSION['ln']);
            $buf .= '</td>';
            $buf .= '</tr>';
        }
        $buf .= '<tr height="17">';
        $buf .= '<td>&nbsp;</td>';
        $buf .= '<td><input type=submit class="button" value="' . $lang['poll']['vote'] . '"></td>';
        $buf .= '</tr>';
        $t_result = $DB->mbm_num_rows($DB->mbm_query("SELECT * FROM " . PREFIX . "poll_r WHERE poll_id='" . $DB->mbm_result($r_question, $i, "id") . "'"));
        if ($t_result != 0) {
            $buf .= '<tr height="17">';
            $buf .= '<td>&nbsp;</td>';
            $buf .= '<td><a href="index.php?module=poll&amp;cmd=view_vote&amp;id=' . $DB->mbm_result($r_question, $i, "id") . '">' . $lang['poll']['view'];
            $buf .= '</a> (';
            $q_total_answer = "SELECT COUNT(*) FROM " . PREFIX . "poll_r WHERE poll_a_id IN 
											(SELECT id FROM " . PREFIX . "poll_a WHERE
													poll_id=" . $DB->mbm_result($r_question, $i, "id") . ")";
            $total_answer = $DB->mbm_query($q_total_answer);
            $buf .= $DB->mbm_result($total_answer, 0);
            $buf .= ')</td>';
            $buf .= '</tr>';
        }

        $buf .= '</form>';

        if ($i != ($DB->mbm_num_rows($r_question) - 1)) {

            $buf .= '<tr height=1 bgcolor=#dddddd><td colspan=2></td></tr>';

        }

    }

    $buf .= "</table>";

    return $buf;

}



function mbmShowPollAjax($id=0, $show_title=0) {

    global $lang, $DB;
    $q_question = "SELECT * FROM " . PREFIX . "poll WHERE st='1' ";
    if ($id != 0) {
        $q_question .= "AND id='" . $id . "' ";

    }

    $q_question .= "ORDER BY id DESC LIMIT 1";

    $r_question = $DB->mbm_query($q_question);





    $buf .= "<table width='98%' class='poll_tbl' align='center' id='pollTable'>";

    for ($i = 0; $i < $DB->mbm_num_rows($r_question); $i++) {



        $buf .= getPollResults($DB->mbm_result($r_question,$i,'id'));

        $buf .= '<form id="pollForm" name="pollForm"';

        $buf .= '  onsubmit="return false;" ';



//        $buf .= 'id=' . $DB->mbm_result($r_question, $i, "id") . '"  ';

        $buf .= 'method="post">';

        if ($show_title == 1) {

            $buf .= '<tr align="center" class="poll_title">';

            $buf .= '<td colspan=2>';

            $buf .= stripslashes($DB->mbm_result($r_question, $i, "question_" . $_SESSION['ln']));

            $buf .= '</td>';

            $buf .= '</tr>';

        }

        $q_answer = "SELECT * FROM " . PREFIX . "poll_a WHERE poll_id='";

        $q_answer.=$DB->mbm_result($r_question, $i, "id") . "' ORDER BY id";

        $r_answer = $DB->mbm_query($q_answer);

        for ($j = 0; $j < $DB->mbm_num_rows($r_answer); $j++) {

            $buf .= '<tr height=17>';

            $buf .= '<td width=30 align=center>';

            $buf .= '<input onclick="$(\'#checked_answer\').val(this.value)" type="radio" name="answer" value="' . $DB->mbm_result($r_answer, $j, "id") . '" class="answerPoll" ';

            if ($j == 0)

                $buf .= 'checked="checked"';

            $buf .= ' /></td>';

            $buf .= '<td>';

            $buf .= $DB->mbm_result($r_answer, $j, "answer_" . $_SESSION['ln']);

            $buf .= '</td>';

            $buf .= '</tr>';

        }

        $buf .= '<input type="hidden" name="pollId" id="pollId" value="' . $DB->mbm_result($r_question, 0, 'id') . '" />';

        $buf .= '<input type="hidden" name="answer_it" value="1" />';

        $buf .= '<input type="hidden" name="checked_answer" id="checked_answer" value="0" />';

        $buf .= '<tr height="17">';

        $buf .= '<td>&nbsp;</td>';

        $buf .= '<td><input type="submit" onclick="submitAjaxPoll($(\'#pollId\').val(),$(\'#checked_answer\').val()); " class="button" value="' . $lang['poll']['vote'] . '"></td>';

        $buf .= '</tr> ';



        $t_result = $DB->mbm_num_rows($DB->mbm_query("SELECT * FROM " . PREFIX . "poll_r WHERE poll_id='" . $DB->mbm_result($r_question, $i, "id") . "'"));

        if ($t_result != 0) {

            $buf .= '<tr height="17">';

            $buf .= '<td>&nbsp;</td>';

            $buf .= '<td><a href="index.php?module=poll&amp;cmd=view_vote&amp;id=' . $DB->mbm_result($r_question, $i, "id") . '">' . $lang['poll']['view'];

            $buf .= '</a> (';

            $q_total_answer = "SELECT COUNT(*) FROM " . PREFIX . "poll_r WHERE poll_a_id IN 

											(SELECT id FROM " . PREFIX . "poll_a WHERE

													poll_id=" . $DB->mbm_result($r_question, $i, "id") . ")";

            $total_answer = $DB->mbm_query($q_total_answer);

            $buf .= $DB->mbm_result($total_answer, 0);

            $buf .= ')</td>';

            $buf .= '</tr>';

        }

        $buf .= '</form>';

        if ($i != ($DB->mbm_num_rows($r_question) - 1)) {

            $buf .= '<tr height=1 bgcolor=#dddddd><td colspan=2></td></tr>';

        }

    }

    $buf .= "</table>";

    return $buf;

}



function getPolls($limit=5, $is_ajax=0, $target_div='ssss') {

    global $lang, $DB, $DB2;
    $buf = '';



    $q_polls = "SELECT * FROM " . PREFIX . "poll WHERE st=1 ORDER BY id DESC LIMIT 5";
    $r_polls = $DB->mbm_query($q_polls);
    for ($j = 0; $j < $DB->mbm_num_rows($r_polls); $j++) {

        $buf .= '<a href="index.php?module=poll&cmd=view_vote&id=' . $DB->mbm_result($r_polls, $j, "id") . '"';

        if ($is_ajax == 1) {

            $buf .= ' onclick="getPollResult(' . $DB->mbm_result($r_polls, $j, "id") . ',\'' . $target_div . '\'); return false;" ';

        }

        $buf .= '>';

        $buf .= ($j + 1) . '. ';
        $buf .= $DB->mbm_result($r_polls, $j, "question_" . $_SESSION['ln']) . '</a>';

    }
    return $buf;

}

function getPollResults($pollId=0) {

    global $lang, $DB, $DB2;
    $q_vanswers = "SELECT * FROM " . PREFIX . "poll_a WHERE poll_id='" . $pollId . "'";

    $r_vanswers = $DB->mbm_query($q_vanswers);

    $q_total_result = "SELECT * FROM " . PREFIX . "poll_r WHERE poll_id='" . $pollId . "'";

    $r_total_result = $DB->mbm_query($q_total_result);

    $total_result = $DB->mbm_num_rows($r_total_result);

    $txt .= '<h3>';
    $txt .= stripslashes($DB->mbm_get_field($pollId, "id", 'question_' . $_SESSION['ln'], 'poll'));

    $txt .= '</h3>';

    $txt .= $lang['poll']['total_votes'] . ' : <strong>' . $total_result . '</strong><br /><br />';


    for ($i = 0; $i < $DB->mbm_num_rows($r_vanswers); $i++) {

        $q_total_answer = "SELECT id FROM " . PREFIX . "poll_r WHERE poll_a_id='" . $DB->mbm_result($r_vanswers, $i, "id") . "'";

        $total_answer = $DB->mbm_num_rows($DB->mbm_query($q_total_answer));
        $txt .= $DB->mbm_result($r_vanswers, $i, "answer_" . $_SESSION['ln']);
        if ($total_result != 0) {
            $k = 1;
            $n = ceil(($total_answer * 100) / $total_result);
            for ($j = 1; $j <= ($n * 3); $j++) {
                $k++;
            }



            //$txt .=  mbmPercent($total_answer, $total_result,$i);



            $txt .= '<br /><img height="10" src="modules/poll/gr' . $i . '.gif" width="' . $k . '" align=absmiddle />';

            $txt .= ' (<b>' . $total_answer . '</b> : ' . number_format((($total_answer * 100) / $total_result), 2) . '%)<br />';

        } else {



            $txt .= '';

        }



        $txt .= '<br />';

    }



    return $txt;

}



?>