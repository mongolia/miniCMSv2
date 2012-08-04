<?
function userTree($user_id=0,$table) {

    global $DB2;

    static $buf;

    $q = "SELECT * FROM ".$table." WHERE parent_id='".$user_id."' ORDER BY id";
    $r = $DB2->mbm_query($q);

    for($i=0;$i<$DB2->mbm_num_rows($r);$i++) {

        $buf .= '<div style="width:'.(floor($DB2->mbm_result($r,$i,"rgt")-$DB2->mbm_result($r,$i,"lft")/2)*30).'px;
								display:block; 
								text-align:center; 
								float:left; border:1px solid #333; 
								margin-left: 10px;
								margin-bottom:10px;
								background-color: rgb('.rand(0,255).','.rand(0,255).','.rand(0,255).')">';
        $buf .= $DB2->mbm_result($r,$i,"username").' ('.floor(($DB2->mbm_result($r,$i,"rgt")-$DB2->mbm_result($r,$i,"lft"))/2).')';
        if(($DB2->mbm_result($r,$i,"rgt")-$DB2->mbm_result($r,$i,"lft")) > 1 && $DB2->mbm_result($r,$i,"id")!=$DB2->mbm_result($r,$i,"parent_id")) {
            $buf .= '<br clear="all">';
            userTree($DB2->mbm_result($r,$i,"id"),$table);
        }
        $buf .= '<br clear="all">';
        $buf .= '</div>';
    }

    return $buf;
}
function listTree($parent,$table) {

    global $DB;

    $result = $DB->mbm_query('SELECT * FROM '.$table
            .' WHERE parent_id="'.$parent.'";');
    echo '<ol>';
    for($i=0;$i<$DB->mbm_num_rows($result);$i++) {
        echo '<li><span style="color:#DDD;">('.$DB->mbm_result($result,$i,"lft").')</span> '
				.$DB->mbm_result($result,$i,"username").' - '
				.$DB->mbm_result($result,$i,"cnt")
                //.$row['lft'].' : '.$row['rgt'].') '
                //.$row['depth']
                .' [id: '.$DB->mbm_result($result,$i,"id").']'
				.' <span style="color:#DDD;">('.$DB->mbm_result($result,$i,"rgt").')</span> '
				.'</li>';
        listTree($DB->mbm_result($result,$i,"id"),$table);
    }
	echo '</ol>';
}

?>