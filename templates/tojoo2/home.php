<div style="text-align:center;"><img src="templates/tojoo2/images/tmp1.jpg" width="728" height="117" alt="tojoo" /></div>
            <div class="title">Авто худалдаа</div>
            	<div style="text-align:center;"><?=mbmAutoCars(array('tags'=>'','limit'=>6))?></div>
                <hr style="clear:both;" />
            <div>
            	<div style="width:362px; float:left;">
                	<div class="title">1948-д ирсэн зарууд</div>
                	<div><img src="templates/tojoo2/images/talbar_top.gif" width="362" height="10" alt="tojoo" /></div>
                    <div style="border-right:1px solid #d6d6d6; border-left:1px solid #d6d6d6; padding:5px; height:280px;">
                    	<?
                       echo mbmZarList(array(
							   'user_id'=>0,
							   'cat_ids'=>'',
							   'st'=>1,
							   'zar_type_id'=>0,
							   'phone'=>'1948',
							   'order_by'=>'date_added',
							   'asc'=>'desc',
							   'limit'=>3,
							   'per_page'=>10
							   ))
						?>
                        <br clear="all" />
                    </div>
                    <div><img src="templates/tojoo2/images/talbar_bottom.gif" width="362" height="10" alt="tojoo" /></div>
                </div>
                <div style="width:362px; float:right;">
                	<div class="title">Мэдээ мэдээлэл</div>
                	<div><img src="templates/tojoo2/images/talbar_top.gif" width="362" height="10" alt="tojoo" /></div>
                    <div style="border-right:1px solid #d6d6d6; border-left:1px solid #d6d6d6; padding:5px; height:280px;">
                    	<?= mbmContentNews($GLOBALS['htmls_normal'],mbmSubmenusInArray(mbmShowByLang(array('mn'=>392,'en'=>888888)),1),2,2,'date_added','DESC',0,1)?>
                    </div>
                    <div><img src="templates/tojoo2/images/talbar_bottom.gif" width="362" height="10" alt="tojoo" /></div>
                </div>
       			<br clear="all" />
            </div>
            <div class="title">Сэлбэг худалдаа</div>
            	<div >
                	<? echo mbmShoppingProducts2(0,0,'RAND()','desc',4);?>
                </div>
                <hr style="clear:both;" />
            <div>
            	<div style="width:362px; float:left;">
                	<div class="title">Хамтрагч байгууллагууд</div>
                	<div><img src="templates/tojoo2/images/talbar_top.gif" width="362" height="10" alt="tojoo" /></div>
                    <div style="border-right:1px solid #d6d6d6; border-left:1px solid #d6d6d6; padding:5px; height:200px;">
                    <?
                        	echo mbmCompanyList(array(
									 'cat_id'=>0,
									 'name_mn'=>'',
									 'name_en'=>'',
									 'st'=>1,
									 'district'=>'',
									 'limit'=>2,
									 'order_by'=>'RAND()',
									 'asc'=>'asc'
									 ));
						?>
                        <br clear="all" />
                    </div>
                    <div><img src="templates/tojoo2/images/talbar_bottom.gif" width="362" height="10" alt="tojoo" /></div>
                </div>
                <div style="width:362px; float:right;">
                	<div class="title">Зөвлөгөө</div>
                	<div><img src="templates/tojoo2/images/talbar_top.gif" width="362" height="10" alt="tojoo" /></div>
                    <div style="border-right:1px solid #d6d6d6; border-left:1px solid #d6d6d6; padding:5px; height:200px;">
                    	<?= mbmContentNews($GLOBALS['htmls_normal'],mbmSubmenusInArray(mbmShowByLang(array('mn'=>389,'en'=>888888)),1),2,2,'RAND()','DESC',0,1)?>
                    </div>
                    <div><img src="templates/tojoo2/images/talbar_bottom.gif" width="362" height="10" alt="tojoo" /></div>
                </div>
       			<br clear="all" />
            </div>