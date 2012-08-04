<div class="col">
        	<div>
            	<?
					echo '<h2>';
						echo mbmShowByLang(array(
											  'mn'=>'Ontsgoi medee',
											  'en'=>'Featured news'
											  ));
					echo '</h2>';
					echo  mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array(
																					  'mn'=>392,
																					  'en'=>408
																					  )),1,8,'date_added','DESC',0,0);
					//echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>0,'en'=>8888)),0,18);
				?>
            </div>
        </div>
        <div class="col">
        	<?
					echo  mbmContentNews($GLOBALS['htmls_normal'],392,2,2,'date_added','DESC',0,0);
					//echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>0,'en'=>8888)),0,18);
				?>
        </div>
        <div class="col">c</div>
        <br clear="all" />