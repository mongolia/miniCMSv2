<?

if ($mBm != 1) {
    die("direct access not allowed.");
} else {
    $upperMenuId = $DB->mbm_get_field(MENU_ID, 'id', 'menu_id', 'menus');
    $menu_sub = $DB->mbm_get_field(MENU_ID, 'id', 'sub', 'menus');

    if ($menu_sub == 0) {
        $has_submenu = $DB->mbm_check_field('menu_id', MENU_ID, 'menus');
    }else{
        $has_submenu = 1;
    }

    if($upperMenuId == 0){
        $activeMenuId = MENU_ID;
    }else{
        $activeMenuId = $DB->mbm_get_field(MENU_ID, 'id', 'menu_id', 'menus');
    }
    
    echo '<div class="grid_';
    if ($has_submenu == 1)
        echo 9;
    else
        echo 12;
    echo '">';
    echo mbmShowContents(array('', '', '', ''), MENU_ID, array(
        'show_briefInfo' => 0
    ));
    echo '</div>';

    if ($has_submenu == 1) {
        echo '<div class="grid_3">';
        echo '<div class="rightMenuTitle">';
            echo $DB->mbm_get_field($activeMenuId, 'id', 'name', 'menus');
        echo '</div>';
        echo mbmShowMenuById(array(
            0 => '<div class="rightSubmenu">',
            1 => '</div>'
                ), $activeMenuId, 'rightSubmenuItem', 0, 0);
        echo '</div>';
    }
    //echo '<h2>'.$DB->mbm_get_field(MENU_ID,'id','name','menus').'</h2>';
    $DB->mbm_query("UPDATE " . PREFIX . "menus SET hits=hits+" . HITS_BY . " WHERE id='" . MENU_ID . "' LIMIT 1");
}

