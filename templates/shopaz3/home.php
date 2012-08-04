<div class="title1_talbar_border">
        <div class="title1"> Шинэ бараа бүтээгдэхүүн
        </div>
        <div id="newBaraa" style="padding:5px;">
        	<?=mbmShoppingProducts3(0,0,'id','desc', 12,6, 1);?>
            <br clear="all" />
        </div>
    </div>
    <div style="margin-top:6px; display:block; clear:both;">
        <div class="title2_talbar_border" style="float:left; width:315px; margin-right:6px;">
            <div class="title2">Зөвлөгөө/Тусламж</div>
            <div style="padding:5px;">
                <div style="height:200px; overflow:auto;">
               <?  
			   		echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>35,'en'=>8888)),2,8,'date_added','DESC',0,1);
				?> 
                </div>
            </div>
        </div>
        <div class="title2_talbar_border" style="float:left; width:315px; margin-right:6px;">
            <div class="title2">Шинэ сэтгэгдлүүд</div>
            <div style="padding:5px;">
                <div style="height:200px; overflow:auto;">
                <?
                echo  mbmCommentsList(array(
                                        'shop'=>0,
                                        'code_like'=>1,
                                        'order_by'=>'id',
                                        'asc'=>'desc',
                                        'limit'=>50
                                        ));
                ?>
                </div>
            </div>
        </div>
        <div style="float:left; width:315px; background-color:#b30000;">
            <?=mbmShowBanner("home_1")?>
        </div>
        <br clear="all" />
    </div>