
statistic:
Current users online : <?php echo (int)getTotalLatestVisitors(300);?>

<script type="text/javascript" src="http://analytics.az.mn/get">
</script>
<br clear="all" />
Today: <?php
$vToday = getTotalDateVisitors(mbmDate('Y'),mbmDate('m'),mbmDate('d'));
echo '<br />';
echo 'page hits: '.(int)$DB->mbm_result($vToday,0,'hits').'<br />';
echo 'davhtsaagui: '.(int)$DB->mbm_result($vToday,0,'hits_u').'<br />';
?>
<br clear="all" />
<br clear="all" />
Uchdur: <?php
$vYesterday = getTotalDateVisitors(date('Y',  mbmTime()-3600*24),date('m',  mbmTime()-3600*24),date('d',  mbmTime()-3600*24));
echo '<br />';
echo 'page hits: '.(int)$DB->mbm_result($vYesterday,0,'hits').'<br />';
echo 'davhtsaagui: '.(int)$DB->mbm_result($vYesterday,0,'hits_u').'<br />';
?>
<br clear="all" />
<br clear="all" />
Suuliin 7 honog: <?php
echo '<br />';
$vLast7 = getTotalLatestDaysVisitors(date('Y',mbmTime()-(3600*24*7)),date('m',mbmTime()-(3600*24*7)),mbmdate('d',mbmTime()-(3600*24*7)));
echo 'page hits: '.(int)$DB->mbm_result($vLast7,0,'hits').'<br />';
echo 'davhtsaagui: '.(int)$DB->mbm_result($vLast7,0,'hits_u').'<br />';
?>
<br clear="all" />
<br clear="all" />
Ene sar: <?php
$vCMonth = getTotalCurrentMonthVisitors(mbmDate('Y'),mbmDate('m'));
echo '<br />';
echo 'page hits: '.(int)$DB->mbm_result($vCMonth,0,'hits').'<br />';
echo 'davhtsaagui: '.(int)$DB->mbm_result($vCMonth,0,'hits_u').'<br />';
?>
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<?
die('<hr />');
$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
$htmls_video[2] = '<td align="center" width="25%" valign="top">';
$htmls_video[3] = '</td>';
$htmls_video[1] = '</tr></table>';

$htmls_normal[0] = '<ul>';
$htmls_normal[2] = '<li style="margin-bottom:6px;">';
$htmls_normal[3] = '</li>';
$htmls_normal[1] = '</ul>';
?>
<?php //require(ABS_DIR . 'modules/_tools/_photos1.php');  ?>
<br clear="all" />
<?php require(ABS_DIR . "modules/poll/_ajax.php"); ?>
<hr />
<?
if (file_exists(ABS_DIR . "modules/" . $_GET['module'] . "/" . $_GET['cmd'] . ".php")) {
    include_once(ABS_DIR . "modules/" . $_GET['module'] . "/" . $_GET['cmd'] . ".php");
} else {
    include_once(ABS_DIR . "templates/" . TEMPLATE . "/home.php");
}
?>
<br clear="all" />
<br clear="all" />
<br clear="all" />