<script language="javascript">
    mbmSetContentTitle("List survey");
    mbmSetPageTitle('List survey');
    show_sub('menu34');
</script>
<?
if ($mBm != 1 && $modules_permissions['menu'] > $_SESSION['lev']) {
    die('<div align="center"><font color="red">HACKING ATTEMPT....</font><br /> <a href="http://www.mng.cc">www.mng.cc</a></div>');
}

switch($_GET['action']){
    
    case 'delete':
        $DB->mbm_query("DELETE FROM ".$DB->prefix."survey_results WHERE survey_id='".(int)$_GET['id']."'");
        $DB->mbm_query("DELETE FROM ".$DB->prefix."survey_answers WHERE survey_id='".(int)$_GET['id']."'");
        $DB->mbm_query("DELETE FROM ".$DB->prefix."survey WHERE id='".(int)$_GET['id']."'");
        
        echo mbmError('deleted');
        break;
    
}


$q_survey = "SELECT * FROM " . $DB->prefix . "survey WHERE lang='" . $_SESSION['ln'] . "' ORDER BY id DESC";
$r_survey = $DB->mbm_query($q_survey);
?>


<table width="100%" border="0" cellspacing="2" cellpadding="3" class="tblContents">
    <tr class="list_header">
        <td width="39" align="center">#</td>
        <td >Question</td>
        <td width="145" align="center"><?= $lang["main"]["action"] ?></td>
    </tr>
    <?
    if ((START + PER_PAGE) > $DB->mbm_num_rows($r_survey)) {
        $end = $DB->mbm_num_rows($r_survey);
    } else {
        $end = START + PER_PAGE;
    }
    for ($i = START; $i < $end; $i++) {
        ?>
        <tr <?= mbmonMouse("#e2e2e2", "#d2d2d2", "") ?> height="20">
            <td align="center" class="bold"><?= ($i + 1) ?>.</td>
            <td>
                <?php
                echo 'code: ' . $DB->mbm_result($r_survey, $i, 'code') . '<br />';
                echo $DB->mbm_result($r_survey, $i, 'question');
                
                $q_answers = "SELECT * FROM ".$DB->prefix."survey_answers WHERE survey_id='".$DB->mbm_result($r_survey, $i, 'id')."' ORDER BY id";
                $r_answers = $DB->mbm_query($q_answers);
                
                echo '<ul>';
                for($j=0;$j<$DB->mbm_num_rows($r_answers);$j++){
                    echo '<li>';
                        echo $DB->mbm_result($r_answers,$j,'answer');
                    echo '</li>';
                }
                echo '</ul>';
                ?>
            </td>
            <td align="center">
                <a href="index.php?module=survey&cmd=edit&id=<?= $DB->mbm_result($r_survey, $i, "id") ?>">
                    <img src="images/<?= $_SESSION['ln'] ?>/button_edit.png" border="0" alt="<?= $lang['main']['edit'] ?>" hspace="3" />
                </a>
                <a href="#" onclick="confirmSubmit('<?= addslashes($lang['menu']['confirm_delete_menu']) ?>','index.php?module=survey&cmd=list&action=delete&id=<?= $DB->mbm_result($r_survey, $i, "id") ?>')">
                    <img src="images/<?= $_SESSION['ln'] ?>/button_delete.png" border="0" alt="<?= $lang['main']['delete'] ?>" />
                </a>
            </td>

            <?
        }
        ?>
</table>