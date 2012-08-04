<script language="javascript">
    mbmSetContentTitle("Add team");
    mbmSetPageTitle('Add team');
    show_sub('menu33');
</script>
<?
if ($mBm != 1 && $modules_permissions['menu'] > $_SESSION['lev']) {
    die('<div align="center"><font color="red">HACKING ATTEMPT....</font><br /> <a href="http://www.mng.cc">www.mng.cc</a></div>');
}
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
        if ($DB->mbm_insert_row($data, 'football_teams') == 1) {
            $result_txt = 'Added';
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
                <input type="text" name="logo" id="logo" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5"><?= $lang['main']['status'] ?>:<br>
                <select name="menu_status">
                    <option value="0">
                        <?= $lang['status'][0] ?>
                    </option>
                    <option value="1">
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
                        echo '<option value="'.$k.'">'.$v.'</option>';
                    }
                    ?>
                </select>
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">URL:<br>
                <input type="text" name="url" id="url" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">Team name:<br>
                <input type="text" name="name" id="name" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">Total games:<br>
                <input type="text" name="games" id="games" />
            </td>
            <td bgcolor="#f5f5f5">&nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">Score:<br>
                <input type="text" name="score" id="score" />
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