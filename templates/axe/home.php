
    <div>
        <div class="homeCol">
            <h2><?=$DB->mbm_get_field(535,'id','name','menus')?></h2>
            <ul>
               <?
				echo mbmShowMenuById(array('<li>','</li>','',''),535,'menuHome',1);
				?>
            </ul>
        </div>
        <div class="homeCol">
            <h2><?=$DB->mbm_get_field(541,'id','name','menus')?></h2>
            <ul>
               <?
				echo mbmShowMenuById(array('<li>','</li>','',''),541,'menuHome',1);
				?>
            </ul>
        </div>
        <div class="homeCol">
            <h2><?=$DB->mbm_get_field(542,'id','name','menus')?></h2>
            <ul>
               <?
				echo mbmShowMenuById(array('<li>','</li>','',''),542,'menuHome',1);
				?>
            </ul>
        </div>
        <div class="homeCol">
            <h2><?=$DB->mbm_get_field(550,'id','name','menus')?></h2>
            <ul>
               <?
				echo mbmShowMenuById(array('<li>','</li>','',''),550,'menuHome',1);
				?>
            </ul>
        </div>
        <br clear="all" />
    </div>
    