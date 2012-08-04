<?

function mbmStats() {
    global $DB, $DB2, $config;
    //check daily stats if not exists add it.
    $date = date("Y-m-d", mktime(date("H") + $config['time_zone'], date("i"), date("s"), date("m"), date("d"), date("Y")));

    $ognoo = explode("-", $date);

    $r_check_daily = $DB->mbm_query("SELECT COUNT(*) FROM " . PREFIX . "stat_daily
						WHERE y='" . $ognoo[0] . "' AND m='" . $ognoo[1] . "' AND d='" . $ognoo[2] . "'");
    if ($DB->mbm_result($r_check_daily, 0) == 0) {
        $DB->mbm_query("INSERT INTO " . PREFIX . "stat_daily(`y`,`m`,`d`)
						VALUES('" . $ognoo[0] . "','" . $ognoo[1] . "','" . $ognoo[2] . "')");
    }
    // update daily statics
    $DB->mbm_query("UPDATE " . PREFIX . "stat_daily SET hits=hits+" . HITS_BY . ",
					hits_u=hits_u+1,
					`h" . mbmDate("G") . "`=h" . mbmDate("G") . "+" . HITS_BY . ",
					`m" . mbmDate("i") . "`=m" . mbmDate("i") . "+" . HITS_BY . "
					WHERE `y`='" . $ognoo[0] . "' AND `m`='" . $ognoo[1] . "' AND `d`='" . $ognoo[2] . "'");
    //update browser info
    $browser = mbmGetBrowser();
    $r_browser_check = $DB->mbm_query("SELECT COUNT(*) FROM " . PREFIX . "stat_browsers WHERE browser='" . $browser . "'");
    if ($DB->mbm_result($r_browser_check, 0) == 0) {
        $DB->mbm_query("INSERT INTO " . PREFIX . "stat_browsers(browser) VALUES('" . $browser . "')");
    }
    $DB->mbm_query("UPDATE " . PREFIX . "stat_browsers SET hits=hits+" . HITS_BY . " WHERE browser='" . $browser . "'");

    //update referer info
    $referer = $_SERVER['HTTP_REFERER'];
    $r_domain = explode("/", $referer);
    if (substr_count($referer, $config['exclude_domain_stat']) == 0 &&
            substr_count($referer, DOMAIN) == 0 &&
            substr_count($referer, SERVER_IP) == 0 &&
            $referer != '') {

        $r_referer = $DB->mbm_query("SELECT COUNT(*) FROM " . PREFIX . "stat_referers WHERE domain='" . $referer . "'");
        if ($DB->mbm_result($r_referer, 0) == 0) {
            $DB->mbm_query("INSERT INTO " . PREFIX . "stat_referers(domain) VALUES('" . $referer . "')");
        }
        $DB->mbm_query("UPDATE " . PREFIX . "stat_referers SET hits=hits+" . HITS_BY . " WHERE domain='" . $referer . "'");
    }

    //page statistic
    $page = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
    $r_check_page = $DB->mbm_query("SELECT COUNT(*) FROM " . PREFIX . "stat_pages WHERE url='" . $page . "'");
    if ($DB->mbm_result($r_check_page, 0) == 0) {
        $DB->mbm_query("INSERT INTO " . PREFIX . "stat_pages(`url`) VALUES('" . $page . "')");
    }
    $DB->mbm_query("UPDATE " . PREFIX . "stat_pages SET hits=hits+" . HITS_BY . " WHERE `url`='" . $page . "'");

    //country statics
    $country = mbmCountry();
    $q_check_country = "SELECT COUNT(*) FROM " . PREFIX . "stat_countries WHERE name='" . $country . "'";
    $r_check_country = $DB->mbm_query($q_check_country);
    if ($DB->mbm_result($r_check_country, 0) == 0) {
        $DB->mbm_query("INSERT INTO " . PREFIX . "stat_countries(`name`) VALUES('" . $country . "')");
    }
    $DB->mbm_query("UPDATE " . PREFIX . "stat_countries SET hits=hits+" . HITS_BY . " WHERE `name`='" . $country . "'");
    /*
     */

    return true;
}

function mbmGetBrowser() {
    $result = $_SERVER['HTTP_USER_AGENT'];
    if ($result == '') {
        $result = 'UNKNOWN';
    }
    return $result;
}

function mbmStatImage() {
    $buf = '<a href="index.php?module=stats&amp;cmd=monthly">';
    $buf .= "<img src=\"" . DOMAIN . DIR . "images/web/stats.png\" alt=\"Web stats\" class=\"StatsImage\" />";
    $buf .= '</a>';

    return $buf;
}

//load functions

function mbmRefLog() {
    global $DB2, $page_title;

    $data_refLog['page'] = $_SERVER['HTTP_HOST'] . '/' . basename($_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    ;
    $data_refLog['ref'] = $_SERVER['HTTP_REFERER'];
    $data_refLog['qs'] = $_SERVER['QUERY_STRING'];
    $data_refLog['country'] = $_SESSION['country']['name'];
    $data_refLog['user_id'] = $_SESSION['user_id'];
    $data_refLog['date_added'] = mbmTime();
    $data_refLog['ip'] = getenv("REMOTE_ADDR");
//	$data_refLog['browser'] = $_SERVER['HTTP_USER_AGENT'];
    $data_refLog['page_title'] = $page_title;

    if (substr_count($data_refLog['page'], "ref.php") == 0
            && substr_count($data_refLog['ref'], "ref.php") == 0
            && substr_count($data_refLog['page'], "xml.php") == 0
            && substr_count($data_refLog['page'], "type=getContents") == 0
            && substr_count($data_refLog['page'], "%cache.php%") == 0
            && substr_count($data_refLog['ip'], "%202.131.237.43%") == 0
    ) {
        $DB2->mbm_insert_row($data_refLog, 'ref');
    }
    $DB2->mbm_query("DELETE FROM " . $DB2->prefix . "ref WHERE date_added<'" . (mbmTime() - 3600 * 24) . "'");
    //$DB2->mbm_query("DELETE FROM ".$DB2->prefix."ref WHERE page LIKE '%cache.php%'");
    // admin history ends
    return true;
}


//yag odoo heden zochin bgaag avah. ugugsun tsagaas hoish. 300 gevel suuliin 5 minutiin baidlaar avna
function getTotalLatestVisitors($time = 300){
    global $DB2, $DB;

    $q = "SELECT count(sesskey) FROM ".$DB2->prefix.SESSION_DB_TABLE." WHERE modified>'".date('Y-m-d H:i:s', mbmTime()-$time)."'";
    $r = $DB2->mbm_query($q);

//    echo $q.'<br />';
    return $DB2->mbm_result($r,0);
}

//ugugdsun udriin uzuuleltiig avahh
function getTotalDateVisitors($year='',$month='',$day=''){
    global $DB2, $DB;

    $q = "SELECT hits,hits_u FROM ".$DB->prefix."stat_daily WHERE `y`='".$year."' AND `m`='".$month."' AND `d`='".$day."'";
    $r = $DB->mbm_query($q);

//    echo $q.'<br />';
    return $r;

}

//ugugdsun udruus hoish uzuuleltiig avahh
//
function getTotalLatestDaysVisitors($year='',$month='',$day=''){
    global $DB2, $DB;

    $q = "SELECT SUM(hits) as hits,SUM(hits_u) as hits_u FROM ".$DB->prefix."stat_daily WHERE `y`>='".$year."' AND `m`>='".$month."' AND `d`>='".$day."'";
    $r = $DB->mbm_query($q);

//    echo $q.'<br />';
    return $r;

}

//ugugdsun udriin uzuuleltiig avahh
function getTotalCurrentMonthVisitors($year='',$month=''){
    global $DB2, $DB;

    $q = "SELECT SUM(hits) as  hits,SUM(hits_u) as hits_u FROM ".$DB->prefix."stat_daily WHERE `y`='".$year."' AND `m`='".$month."'";
    $r = $DB->mbm_query($q);

//    echo $q.'<br />';
    return $r;

}
//mbmRefLog();
?>