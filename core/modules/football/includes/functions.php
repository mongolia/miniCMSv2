<?php
function getFootballTeam($v = array(
    'country'=>'-1',
    'name'=>'',
    'order_by'=>'score DESC'
)){
    
    global $DB, $DB2;
    
    
    if(!isset($v['order_by'])){
        $v['order_by'] = 'score DESC';
    }
    if(!isset($v['name'])){
        $v['name'] = '';
    }
    if(!isset($v['country'])){
        $v['country'] = '-1';
    }
    
    $q = "SELECT * FROM ".$DB->prefix."football_teams WHERE id!=0 ";
    if($v['country'] != '-1'){
        $q .= "AND country='".$v['country']."'";
    }
    if($v['name'] != '0'){
        $q .= "AND name LIKE '%".$v['name']."%'";
    }
    
    $q .= "ORDER BY ".$v['order_by'];
    
    $r = $DB->mbm_query($q);
    
    return $r;
}
?>.