<?php
$r_footballs = getFootballTeam(array(
    'country'=>$_GET['cid'],
    'name'=>'',
    'order_by'=>'score DESC'
));
?>
<table width="100%" border="1" cellspacing="2" cellpadding="3" style="border-collapse: collapse;">
    <tr >
        <td width="39" align="center">#</td>
        <td>Name</td>
        <td width="120" align="center" >Country</td>
        <td width="64" align="center">Games</td>
        <td width="64" align="center">Score</td>
        <td width="200" align="center">URL</td>
    </tr>
    <?php
    for ($i = 0; $i < $DB->mbm_num_rows($r_footballs); $i++) {
        ?>
        <tr>
            <td align="center" class="bold"><?= ($i + 1) ?>.</td>
            <td >
                <img src="<?= $DB->mbm_result($r_footballs, $i, "logo") ?>" align="left" hspace="10" />
                <a href="<?=$DB->mbm_result($r_footballs, $i, "url")?>">
                <?= $DB->mbm_result($r_footballs, $i, "name") ?>
                    </a>
                <br clear="all" />
            </td>
            <td align="center" ><?= $GLOBALS['football_countries'][$DB->mbm_result($r_footballs, $i, "country")] ?></td>
            <td align="center"><?= $DB->mbm_result($r_footballs, $i, "games") ?></td>
            <td align="center"><?= number_format($DB->mbm_result($r_footballs, $i, "score") ,0)?></td>
            <td align="center"><?= $DB->mbm_result($r_footballs, $i, "url") ?></td>
        </tr>
        <?php
    }
    ?>
</table>
