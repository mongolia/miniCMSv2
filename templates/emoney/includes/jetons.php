<?php


/*
 * @param : $data['username']
 * @param : $data['sponsor_name']
 * @param : $data['parent_id']
 * @param : $data['user_id']
 * @param : $data['']
 * @param : $data['']
*/
function mbmAddJeton($data,$jtable) {
    global $DB, $DB2;

	switch($jtable){
		case JTABLE1:
			$data['parent_id'] = mbmGetInsertPosition($data['sponsor_name'], JTABLE1);
		break;
		case JTABLE2:
			$data['parent_id'] = mbmGetInsertPosition2($data['sponsor_name'], JTABLE2);
		break;
		case JTABLE3:
			$data['parent_id'] = mbmGetInsertPosition3($data['sponsor_name'], JTABLE3);
		break;
	}
	
	
    $data['sponsor_name'] = $DB2->mbm_get_field($data['username'],'username','sponsor_name','users');
    $data['date_added'] = mbmTime();

    $data['cnt'] = mbmGetMaxCount($data['username'], $jtable)+1;
    $data['depth'] = $DB->mbm_get_field($data['parent_id'],'id','depth',$jtable)+1;

    //lft rgt tohirgoo
    $maxRgt = getMaxRight($data ['parent_id'],$jtable,$DB);

    $data['lft'] = $maxRgt + 1;
    $data['rgt'] = $maxRgt + 2;
    updateLeftRight($maxRgt,$jtable, $DB);

    //print_r($data);
    if($DB->mbm_insert_row($data,$jtable) == 1) {

        //sponsor iin sponsoriih n id-g duursen bol copydno.
        $sponsoriin_parent_id = $DB->mbm_get_field($data['parent_id'],'id','parent_id',$jtable);
        $sponsoriin_parent_id_username = $DB->mbm_get_field($data['parent_id'],'id','username',$jtable);
		
		$sponsoriin_parent_id2 = $DB->mbm_get_field($sponsoriin_parent_id,'id','parent_id',$jtable);
		$sponsoriin_parent_id2_username = $DB->mbm_get_field($sponsoriin_parent_id2,'id','username',$jtable);

        
		switch($jtable){
			case JTABLE1:
				if(mbmIsFullCycle($sponsoriin_parent_id2, JTABLE1) == 1) {
					//copy hii
					mbmCopyJeton($sponsoriin_parent_id2, $jtable);
					
					if($DB->mbm_get_field($sponsoriin_parent_id2,'id','cnt',JTABLE1) == 1){
						
						$sponsor2_username = $DB2->mbm_get_field($sponsoriin_parent_id2_username,'username','sponsor_name','users');
							
						if($DB->mbm_check_field('username',$sponsor2_username,JTABLE2) == 1){
							$jtable2_sponsor = $sponsor2_username;
						}else{
							
							$sponsor2_username2 = $DB2->mbm_get_field($sponsor2_username,'username','sponsor_name','users');
						
							if($DB->mbm_check_field('username',$sponsor2_username2,JTABLE2) == 1){
								$jtable2_sponsor = $sponsor2_username2;
							}else{
								$jtable2_sponsor = $DB->mbm_get_field(getDefaultInserPosition(JTABLE2),'id','username',JTABLE2);
							}
						}
						
						mbmAddJeton(array(
										'username'=>$DB->mbm_get_field($sponsoriin_parent_id2,'id','username',JTABLE1),
										'parent_id'=>$DB->mbm_get_field($sponsoriin_parent_id2,'id','parent_id',JTABLE1),
										'sponsor_name'=>$jtable2_sponsor,
										'user_id'=>$DB->mbm_get_field($sponsoriin_parent_id2,'id','user_id',JTABLE1)
										),JTABLE2);
						$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE1." SET is_paid=1 WHERE id='".$sponsoriin_parent_id2."'");
					}else{
						$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE1." SET is_paid=2 WHERE id='".$sponsoriin_parent_id2."'");
					}
				}
			break;
			case JTABLE2:
				if(mbmIsFullCycle2($sponsoriin_parent_id, JTABLE2) == 1 && $jtable == JTABLE2) {
					//copy hii
					mbmCopyJeton($sponsoriin_parent_id, $jtable);
					
					if($DB->mbm_get_field($sponsoriin_parent_id,'id','cnt',JTABLE2) == 2 ){
						$sponsor2_username = $DB2->mbm_get_field($sponsoriin_parent_id_username,'username','sponsor_name','users');
							
						if($DB->mbm_check_field('username',$sponsor2_username,JTABLE3) == 1){
							$jtable2_sponsor = $sponsor2_username;
						}else{
							
							$sponsor2_username2 = $DB2->mbm_get_field($sponsor2_username,'username','sponsor_name','users');
						
							if($DB->mbm_check_field('username',$sponsor2_username2,JTABLE3) == 1){
								$jtable2_sponsor = $sponsor2_username2;
							}else{
								$jtable2_sponsor = $DB->mbm_get_field(getDefaultInserPosition(JTABLE3),'id','username',JTABLE2);
							}
						}
						mbmAddJeton(array(
										'username'=>$DB->mbm_get_field($sponsoriin_parent_id,'id','username',JTABLE2),
										'parent_id'=>$DB->mbm_get_field($sponsoriin_parent_id,'id','parent_id',JTABLE2),
										'sponsor_name'=>$jtable2_sponsor,
										'user_id'=>$DB->mbm_get_field($sponsoriin_parent_id,'id','user_id',JTABLE2)
										),JTABLE3);
						$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE2." SET is_paid=1 WHERE id='".$sponsoriin_parent_id."'");
					}else{
						$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE2." SET is_paid=2 WHERE id='".$sponsoriin_parent_id."'");
					}
				}
			break;
			case JTABLE3:
				//JTABLE2 iin cnt 2-s ih jetonuud duurehed is_paid=2 bolgoh
				
				if(mbmIsFullCycle3($sponsoriin_parent_id, JTABLE3) == 1) {
					//copy hii
					mbmCopyJeton($sponsoriin_parent_id, $jtable);
				}
			break;
		}
		
		
    }
}

//max cnt oloh
function mbmGetMaxCount($username=0,$jtable='') {
    global $DB;
    $q = "SELECT cnt FROM ".$DB->prefix.$jtable." WHERE username='".$username."' ORDER BY cnt DESC LIMIT 1";
    $r = $DB->mbm_query($q);
    return $DB->mbm_result($r,0,'cnt');
}


//parent id-g oloh. $username gedeg n sponsor_name
function mbmGetInsertPosition($username='',$jtable='') {
    global $DB,$DB2;
	
    $q_parent_id = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE username='" . $username . "' ORDER BY cnt DESC LIMIT 1";
	$r_parent_id = $DB->mbm_query($q_parent_id);

    $q = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $DB->mbm_result($r_parent_id,0,'id') . "' ORDER BY id ASC";
    $r = $DB->mbm_query ( $q );
	
	if ($DB->mbm_num_rows ( $r )  < FULL_CHILD) {
        return $DB->mbm_result($r_parent_id,0,'id');
    } else {
        for($i = 0; $i < $DB->mbm_num_rows ( $r ); $i ++) {
            $q2 = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $DB->mbm_result ( $r, $i, "id" ) . "' ORDER BY id ASC";
            $r2 = $DB->mbm_query ( $q2 );
            if ($DB->mbm_num_rows ( $r2 ) < FULL_CHILD) {
                return $DB->mbm_result ( $r, $i, "id" );
            } else {
                for($ii = 0; $ii < $DB->mbm_num_rows ( $r2 ); $ii ++) {
                    $q3 = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $DB->mbm_result ( $r2, $ii, "id" ) . "' ORDER BY id ASC";
                    $r3 = $DB->mbm_query ( $q3 );
                    if ($DB->mbm_num_rows ( $r3 ) < FULL_CHILD) {
                        return $DB->mbm_result ( $r2, $ii, "id" );
                    } else {
						//mbmGetInsertPosition($DB->mbm_result($r_parent_id,0,'sponsor_name'),$jtable);
                    }
                }
            }
        }
    }
}

//parent id-g oloh. $username gedeg n sponsor_name
function mbmGetInsertPosition2($username='',$jtable='') {
    global $DB,$DB2;
	
    $q_parent_id = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE username='" . $username . "' ORDER BY cnt DESC LIMIT 1";
	$r_parent_id = $DB->mbm_query($q_parent_id);
	
	if($DB->mbm_num_rows($r_parent_id) == 0){
		$sponsoriin_sponsor = $DB2->mbm_get_field($username,'username','sponsor_name','users');
		if($DB->mbm_check_field('username',$sponsoriin_sponsor,JTABLE2) == 0){
			$sponsoriin_sponsor_id = getDefaultInserPosition(JTABLE2);
		}else{
			$q_parent_id2 = "SELECT * FROM " . $DB->prefix . JTABLE2 . " WHERE username='" . $sponsoriin_sponsor . "' ORDER BY cnt DESC LIMIT 1";
			$r_parent_id2 = $DB->mbm_query($q_parent_id2);
			$sponsoriin_sponsor_id = $DB->mbm_result($r_parent_id2,0,'id');
		}
	}else{
		$sponsoriin_sponsor_id = $DB->mbm_result($r_parent_id,0,'id');
	}

    $q = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $sponsoriin_sponsor_id . "' ORDER BY id ASC";
    $r = $DB->mbm_query ( $q );
	
	if ($DB->mbm_num_rows ( $r )  < FULL_CHILD) {
        return $DB->mbm_result($r_parent_id,0,'id');
    } else {
        for($i = 0; $i < $DB->mbm_num_rows ( $r ); $i ++) {
            $q2 = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $DB->mbm_result ( $r, $i, "id" ) . "' ORDER BY id ASC";
            $r2 = $DB->mbm_query ( $q2 );
            if ($DB->mbm_num_rows ( $r2 ) < FULL_CHILD) {
                return $DB->mbm_result ( $r, $i, "id" );
            } 
        }
		
    }
}

//parent id-g oloh. $username gedeg n sponsor_name
function mbmGetInsertPosition3($username='',$jtable='') {
    global $DB,$DB2;
	
    $q_parent_id = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE username='" . $username . "' ORDER BY cnt DESC LIMIT 1";
	$r_parent_id = $DB->mbm_query($q_parent_id);

    $q = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $DB->mbm_result($r_parent_id,0,'id') . "' ORDER BY id ASC";
    $r = $DB->mbm_query ( $q );
	
	if($DB->mbm_num_rows ( $r )==0 ){
		return getDefaultInserPosition($jtable);
	}elseif ($DB->mbm_num_rows ( $r )  < FULL_CHILD) {
        return $DB->mbm_result($r_parent_id,0,'id');
    } else {
        for($i = 0; $i < $DB->mbm_num_rows ( $r ); $i ++) {
            $q2 = "SELECT * FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $DB->mbm_result ( $r, $i, "id" ) . "' ORDER BY id ASC";
            $r2 = $DB->mbm_query ( $q2 );
            if ($DB->mbm_num_rows ( $r2 ) < FULL_CHILD) {
                return $DB->mbm_result ( $r, $i, "id" );
            } 
        }
    }
	return getDefaultInserPosition($jtable);
}

function getDefaultInserPosition($jtable){
	global $DB;
	
	$q_admin = "SELECT * FROM ".$DB->prefix.$jtable." WHERE user_id='".PAYMENT_USER_ID."' ORDER BY cnt DESC LIMIT 1";
	$r_admin = $DB->mbm_query($q_admin);
	
	//echo $q_admin;
	return $DB->mbm_result($r_admin,0,'id');
}
//dor n FULL_CHILD hun orson esehiig shalgah
function mbmIsFullChild($jeton_id=0, $jtable='') {
    global $DB;

    $q = "SELECT COUNT(id) FROM ".$DB->prefix.$jtable." WHERE parent_id='".$jeton_id."'";
    $r = $DB->mbm_query($q);

    if($DB->mbm_num_rows($r) < FULL_CHILD) {
        return 0;
    }else {
        return 1;
    }
}

//jijig tsolnii duurgelt
function mbmIsFullCycle($parent_id=0, $jtable='') {

    global $DB2, $DB;

    $db = $DB;
	$jtable = JTABLE1;
	
    $q1 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $parent_id . "' ORDER BY cnt DESC";
    $r1 = $db->mbm_query ( $q1 );
    $total_subjetons = 0;
    $k = array ();
    for($i1 = 0; $i1 < $db->mbm_num_rows ( $r1 ); $i1 ++) {
        $q2 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $db->mbm_result ( $r1, $i1, "id" ) . "'";
        $r2 = $db->mbm_query ( $q2 );
        $k [] = $db->mbm_result ( $r1, $i1, "id" );
        $total_subjetons++;
        for($i2 = 0; $i2 < $db->mbm_num_rows ( $r2 ); $i2 ++) {
            $q3 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $db->mbm_result ( $r2, $i2, "id" ) . "'";
            $r3 = $db->mbm_query ( $q3 );
            $k [] = $db->mbm_result ( $r2, $i2, "id" );
            $total_subjetons++;
            for($i3 = 0; $i3 < $db->mbm_num_rows ( $r3 ); $i3 ++) {
                $q4 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $db->mbm_result ( $r3, $i3, "id" ) . "'";
                $r4 = $db->mbm_query ( $q4 );

                $k [] = $db->mbm_result ( $r3, $i3, "id" );
                $total_subjetons++;
            }
        }
    }
    if (count($k) == FULL_CYCLE1) {
        return 1;
    } else {
        return 0;
    }
}

//tom tsolnii duurgelt
function mbmIsFullCycle2($parent_id=0, $jtable='') {

    global $DB2, $DB;

    $db = $DB;
	$jtable = JTABLE2;

    $q1 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $parent_id . "' ORDER BY cnt DESC";
    $r1 = $db->mbm_query ( $q1 );
    $total_subjetons = 0;
    $k = array ();
    for($i1 = 0; $i1 < $db->mbm_num_rows ( $r1 ); $i1 ++) {
        $q2 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $db->mbm_result ( $r1, $i1, "id" ) . "'";
        $r2 = $db->mbm_query ( $q2 );
        $k [] = $db->mbm_result ( $r1, $i1, "id" );
        $total_subjetons++;
        for($i2 = 0; $i2 < $db->mbm_num_rows ( $r2 ); $i2 ++) {
            $k [] = $db->mbm_result ( $r2, $i2, "id" );
            $total_subjetons++;
        }
    }
    if (count($k) == FULL_CYCLE2) {
        return 1;
    } else {
        return 0;
    }
}


//tom tsolnii duurgelt
function mbmIsFullCycle3($parent_id=0, $jtable='') {

    global $DB2, $DB;

    $db = $DB;
	$jtable = JTABLE3;

    $q1 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $parent_id . "' ORDER BY cnt DESC";
    $r1 = $db->mbm_query ( $q1 );
    $total_subjetons = 0;
    $k = array ();
    for($i1 = 0; $i1 < $db->mbm_num_rows ( $r1 ); $i1 ++) {
        $q2 = "SELECT id FROM " . $DB->prefix . $jtable . " WHERE parent_id='" . $db->mbm_result ( $r1, $i1, "id" ) . "'";
        $r2 = $db->mbm_query ( $q2 );
        $k [] = $db->mbm_result ( $r1, $i1, "id" );
        $total_subjetons++;
        for($i2 = 0; $i2 < $db->mbm_num_rows ( $r2 ); $i2 ++) {
            $k [] = $db->mbm_result ( $r2, $i2, "id" );
            $total_subjetons++;
        }
    }
    if (count($k) == FULL_CYCLE3) {
        return 1;
    } else {
        return 0;
    }
}
function mbmExtractJeton($id=0,$jtable) {
    global $DB;

    $q = "SELECT * FROM ".$DB->prefix.$jtable." WHERE id='".$id."'";
    $r = $DB->mbm_query($q);

    if($DB->mbm_num_rows($r) == 0) {
        return false;
    }else {
        return array(
                'user_id'=>$DB->mbm_result($r,0,"user_id"),
                'username'=>$DB->mbm_result($r,0,"username"),
                'sponsor_name'=>$DB->mbm_result($r,0,"sponsor_name"),
                'parent_id'=>$DB->mbm_result($r,0,"parent_id"),
                'lft'=>$DB->mbm_result($r,0,"lft"),
                'rgt'=>$DB->mbm_result($r,0,"rgt"),
                'depth'=>$DB->mbm_result($r,0,"depth"),
                'is_paid'=>$DB->mbm_result($r,0,"is_paid"),
                'date_added'=>$DB->mbm_result($r,0,"date_added")
        );
    }
}











function mbmCopyJeton($id=0,$jtable='') {
    global $DB, $DB2;

    $current_jeton = mbmExtractJeton($id,$jtable);

    //sponsoriih n hooson hesgiig oloh
    $q_insert_id = "SELECT * FROM ".$DB->prefix.$jtable." WHERE user_id='".$current_jeton['user_id']."' ORDER BY cnt DESC LIMIT 1";
    $r_insert_id = $DB->mbm_query($q_insert_id);
    //olood duuschlaa


        switch($jtable) {
            case JTABLE1:
   				//duursen esehiig davhar shalgaj bna.
				if(mbmIsFullCycle($DB->mbm_result($r_insert_id ,0,"id"),$jtable) == 1) {
					mbmAddJeton(array(
							'username' => $DB->mbm_result($r_insert_id ,0,"username"),
							'sponsor_name' => $DB->mbm_result($r_insert_id ,0,"sponsor_name"),
							'parent_id' => $DB->mbm_result($r_insert_id ,0,"parent_id"),
							'user_id' => $DB->mbm_result($r_insert_id ,0,"user_id")
							),$jtable);
                	$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE1." SET is_paid=2 WHERE id='".$DB->mbm_result($r_insert_id ,0,"id")."'");
				}
				if($DB->mbm_result($r_insert_id ,0,"cnt") == 2){
					//verify hiih tul tulbur hiigdehgui
                	//makeTransactions(PAYMENT_USER_ID, $current_jeton['user_id'], BONUS1, BONUS1_TXT);
				}else{
					makeTransactions(PAYMENT_USER_ID, $current_jeton['user_id'], BONUS1_FIRST_PAYMENT, BONUS1_TXT);
				}
                break;
            case JTABLE2:
				if(mbmIsFullCycle2($DB->mbm_result($r_insert_id ,0,"id"),$jtable) == 1) {
					mbmAddJeton(array(
							'username' => $DB->mbm_result($r_insert_id ,0,"username"),
							'sponsor_name' => $DB->mbm_result($r_insert_id ,0,"sponsor_name"),
							'parent_id' => $DB->mbm_result($r_insert_id ,0,"parent_id"),
							'user_id' => $DB->mbm_result($r_insert_id ,0,"user_id")
							),$jtable);
					
					
					if($DB->mbm_result($r_insert_id ,0,"cnt") == 2){
						mbmAddJeton(array(
								'username' => $DB->mbm_result($r_insert_id ,0,"username"),
								'sponsor_name' => $DB->mbm_result($r_insert_id ,0,"sponsor_name"),
								'parent_id' => $DB->mbm_result($r_insert_id ,0,"parent_id"),
								'user_id' => $DB->mbm_result($r_insert_id ,0,"user_id")
								),JTABLE3);
						$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE2." SET is_paid=1 WHERE id='".$id."'");
						//verify hiih tul tulbur hiigdehgui
						//makeTransactions(PAYMENT_USER_ID, $current_jeton['user_id'], BONUS2, BONUS2_TXT);
					}else{
						$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE2." SET is_paid=2 WHERE id='".$id."'");
						makeTransactions(PAYMENT_USER_ID, $current_jeton['user_id'], BONUS2, BONUS2_TXT);
					}
				}
                break;
            case JTABLE3:
				if(mbmIsFullCycle3($DB->mbm_result($r_insert_id ,0,"id"),$jtable) == 1) {
					mbmAddJeton(array(
							'username' => $DB->mbm_result($r_insert_id ,0,"username"),
							'sponsor_name' => $DB->mbm_result($r_insert_id ,0,"sponsor_name"),
							'parent_id' => $DB->mbm_result($r_insert_id ,0,"parent_id"),
							'user_id' => $DB->mbm_result($r_insert_id ,0,"user_id")
							),$jtable);
					makeTransactions(PAYMENT_USER_ID, $current_jeton['user_id'], BONUS3, BONUS3_TXT);
					$DB->mbm_query("UPDATE ".$DB->prefix.JTABLE2." SET is_paid=1 WHERE id='".$id."'");
				}
			
                break;
        }


}
?>