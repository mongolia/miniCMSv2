<script language="javascript">
    mbmSetContentTitle("Teams");
    mbmSetPageTitle('Teams');
    show_sub('menu33');
</script>
<?
if ($mBm != 1 && $modules_permissions['menu'] > $_SESSION['lev']) {
    die('<div align="center"><font color="red">HACKING ATTEMPT....</font><br /> <a href="http://www.mng.cc">www.mng.cc</a></div>');
}
switch($_GET['action']){
    case 'delete':
        $DB->mbm_query("DELETE FROM ".$DB->prefix."football_teams WHERE id='".$_GET['id']."' LIMIT 1");
        echo mbmError('Deleted');
        break;
}
?>
<?php
$r_footballs = $DB->mbm_query("SELECT * FROM " . $DB->prefix . "football_teams ORDER BY score DESC");
?>
<table width="100%" border="0" cellspacing="2" cellpadding="3" class="tblContents">
    <tr class="list_header">
        <td width="39" align="center">#</td>
        <td>Name</td>
        <td width="120" align="center" >Country</td>
        <td width="64" align="center">Games</td>
        <td width="64" align="center">Score</td>
        <td width="200" align="center">URL</td>
        <td width="80" align="center">User</td>
        <td width="145" align="center"><?= $lang["main"]["action"] ?></td>
    </tr>
    <?php
    for ($i = 0; $i < $DB->mbm_num_rows($r_footballs); $i++) {
        ?>
        <tr>
            <td align="center" class="bold"><?= ($i + 1) ?>.</td>
            <td >
                <img src="<?= $DB->mbm_result($r_footballs, $i, "logo") ?>" align="left" hspace="10" />
                <?= $DB->mbm_result($r_footballs, $i, "name") ?>
                <br clear="all" />
            </td>
            <td align="center" ><?= $GLOBALS['football_countries'][$DB->mbm_result($r_footballs, $i, "country")] ?></td>
            <td align="center"><?= $DB->mbm_result($r_footballs, $i, "games") ?></td>
            <td align="center"><?= $DB->mbm_result($r_footballs, $i, "score") ?></td>
            <td align="center"><?= $DB->mbm_result($r_footballs, $i, "url") ?></td>
            <td align="center"><?= $DB2->mbm_get_field($DB->mbm_result($r_footballs, $i, "user_id"), 'id', 'username', 'users') ?></td>

            <td align="center">
                <a href="index.php?module=football&cmd=edit&id=<?= $DB->mbm_result($r_footballs, $i, "id") ?>">
                    <img src="images/<?= $_SESSION['ln'] ?>/button_edit.png" border="0" alt="<?= $lang['main']['edit'] ?>" hspace="3" />
                </a>
                <a href="#" onclick="confirmSubmit('<?= addslashes('Do you really want to delete it?') ?>','index.php?module=football&cmd=list&action=delete&id=<?= $DB->mbm_result($r_footballs, $i, "id") ?>')">
                    <img src="images/<?= $_SESSION['ln'] ?>/button_delete.png" border="0" alt="<?= $lang['main']['delete'] ?>" /></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
