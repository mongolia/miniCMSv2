<script language="javascript">
    mbmSetContentTitle("Add team");
    mbmSetPageTitle('Add team');
    show_sub('menu33');
</script>
<?
if ($mBm != 1 && $modules_permissions['menu'] > $_SESSION['lev']) {
    die('<div align="center"><font color="red">HACKING ATTEMPT....</font><br /> <a href="http://www.mng.cc">www.mng.cc</a></div>');
}

$r_football = $DB->mbm_query("SELECT * FROM ".$DB->prefix."football_teams WHERE id='".(int)$_GET['id']."'");

if (isset($_POST['button'])) {
    $data['name'] = $_POST['name'];
    $data['logo'] = $_POST['logo'];
    $data['games'] = $_POST['games'];
    $data['score'] = $_POST['score'];
    $data['url'] = $_POST['url'];
    $data['country'] = $_POST['country'];
    $data['date_added'] = time();
    $data['user_id'] = $_SESSION['user_id'];
//echo mbm_test($data);
    if (mbmCheckEmptyfield($data)) {
        $result_txt = $lang['error']['empty_field'];
    } else {
    $data['st'] = $_POST['st'];
        if ($DB->mbm_update_row($data, 'football_teams',$_GET['id']) == 1) {
            $result_txt = 'Updated';
            $b = 1;
        } else {
            $result_txt = 'Failed';
        }
    }
    echo '<div id="query_result">' . $result_txt . '</div>';
}
if($b!=1):
?>
<form action="" method="POST">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" class="tblContents">
        <tr class="list_header">
            <td width="50%" >&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">Logo:<br>
                <input type="text" name="logo" id="logo" value="<?=$DB->mbm_result($r_football,0,'logo')?>" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5"><?= $lang['main']['status'] ?>:<br>
                <select name="menu_status">
                    <option value="0">
                        <?= $lang['status'][0] ?>
                    </option>
                    <option value="1" <?php
                    if($DB->mbm_result($r_football,0,'st') == 1){
                        echo ' selected ';
                    }
                    ?>>
                        <?= $lang['status'][1] ?>
                    </option>
                </select></td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>

        <tr>
            <td bgcolor="#f5f5f5">Country:<br>
                <select name="country" id="country">
                    <?php
                    foreach($GLOBALS['football_countries'] as $k=>$v){
                        echo '<option value="'.$k.'" ';
                        if($k == $DB->mbm_result($r_football,0,'country')){
                            echo ' selected ';
                        }
                        echo '>'.$v.'</option>';
                    }
                    ?>
                </select>
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">URL:<br>
                <input type="text" name="url" id="url" value="<?=$DB->mbm_result($r_football,0,'url')?>" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">Team name:<br>
                <input type="text" name="name" id="name" value="<?=$DB->mbm_result($r_football,0,'name')?>" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">Total games:<br>
                <input type="text" name="games" id="games" value="<?=$DB->mbm_result($r_football,0,'games')?>" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">Score:<br>
                <input type="text" name="score" id="score" value="<?=$DB->mbm_result($r_football,0,'score')?>" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>

        <tr>
            <td bgcolor="#f5f5f5"><input type="submit" class="button" name="button" id="button" value="Save"></td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
    </table>
</form>
<? endif;?>