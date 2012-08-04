<div style="float:left; margin-left:5px; width:300px;">
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_1')?></div> 
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_2')?></div>
	<div class="rightBaganaDiv">
    	 <div class="title1">Зөвлөгөө/Тусламж</div>
    	<div style="height:200px; overflow:auto; padding:5px;">
	   <?  
            echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>35,'en'=>8888)),2,8,'date_added','DESC',0,1);
        ?> 
        </div>
    </div> 
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_3')?></div>
	<div class="rightBaganaDiv">
	    <div class="title1">Шинэ сэтгэгдлүүд</div>
    	 <div style="height:300px; overflow:auto;">
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
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_4')?></div>
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_5')?></div>
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_6')?></div>
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_7')?></div>
	<div class="rightBaganaDiv"><?=mbmShowBanner('right_8')?></div>
</div>