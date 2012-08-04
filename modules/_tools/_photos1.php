<style>
    #myPhotos1{
        width: 300px;
        display: block;
        padding: 5px;
        border: 0px solid #DDD;
    }
    #myPhotos1 .firstPhoto{
        width: 300px;
        display: block;
        padding: 5px;
        border: 0px solid #DDD;
        margin-bottom: 5px;
    }
    #myPhotos1 .firstPhoto img{
        width: 300px;
        border: 0px;
		margin-bottom:10px;
    }
    #myPhotos1 .firstPhoto h3{
        font-weight: bold;
        text-align: center;
        font-size: 14px;
        color:  #333;
		padding:1px;
    }
    #myPhotos1 .firstPhoto img:hover{
        background-color:  #F5F5F5;
    }
    #myPhotos1 .otherPhotos{
        width: 300px;
        display: block;
        padding: 5px;
        border: 0px solid #DDD;
        margin-bottom: 5px;
    }
    #myPhotos1 .otherPhotos .otherPhoto{
        margin-right: 3px;
        float: left;
        padding: 2px;
        text-align: center;
    }
    #myPhotos1 .otherPhotos img{
        width: 90px;
        border: 0px;
        border: 1px solid #DDD;
    }
    #myPhotos1 .otherPhotos img:hover{
        background-color:  #F5F5F5;
    }
</style>
<?php

$photoMenuId = 1;
$photoLimit = 4;
$photoOrderBy = 'date_added DESC';

$qPhotos = "SELECT * FROM ".$DB->prefix."menu_contents WHERE is_photo=1 AND menu_id LIKE '%,".$photoMenuId.",%' ORDER BY ".$photoOrderBy." LIMIT ".$photoLimit;
$rPhotos = $DB->mbm_query($qPhotos);

echo '<div id="myPhotos1">';
for($i=0;$i<$DB->mbm_num_rows($rPhotos);$i++){
    //ehnii zurgiig zohitsuulj ehleh
    if($i == 0){
        echo '<div class="firstPhoto">';
        echo '<a href="'.DOMAIN.DIR.'index.php?module=menu&cmd=content&menu_id='.mbmReturnMenuId($DB->mbm_result($rPhotos,$i,"menu_id")).'&id='.$DB->mbm_result($rPhotos,$i,"id").'">';
        echo '<h3>'.$DB->mbm_result($rPhotos,$i,"title").'</h3>';
        echo '<br clear="all" />';
        echo getPhotoByContentId($DB->mbm_result($rPhotos,$i,"id"));
        echo '</a><br clear="all" />';
        echo '</div>';
        echo '<div class="otherPhotos">';
    //busad photo ehleh
    }else{
        echo '<div class="otherPhoto">';
        echo '<a href="'.DOMAIN.DIR.'index.php?module=menu&cmd=content&menu_id='.mbmReturnMenuId($DB->mbm_result($rPhotos,$i,"menu_id")).'&id='.$DB->mbm_result($rPhotos,$i,"id").'">';
        echo getPhotoByContentId($DB->mbm_result($rPhotos,$i,"id"));
        echo '<br clear="all" />';
        echo $DB->mbm_result($rPhotos,$i,"title");
        echo '</a>';
        echo '</div>';
    }
    if($i == ($DB->mbm_num_rows($rPhotos)-1)){
        echo '<br clear="all" /></div>';
    }
}
echo '</div>';

unset($photoLimit, $photoMenuId, $photoOrderBy, $qPhotos, $rPhotos);
?>
