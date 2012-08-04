<div style="padding:5px; height:25px; text-decoration:blink;">
<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="40" direction="rtl"  style="font-weight:bold; color:#000; text-align:center;">
<?=mbmShowBanner('home_scroll');?>
</marquee>
</div>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
         <div style="padding-right:10px;">
            <div style="height:668px; overflow-y:auto; border:1px solid #DDD; padding:5px; display:block; margin-right:12px;">
            <div style="font-weight:bold; color:#F00; margin-bottom:6px; font-size:14px; text-transform:uppercase;">
            	MONGOLIAN DAILY PRINT HEADLINES
             <div style="font-size:10px; text-transform:none; color:#000;">Daily update at 11am </div>
             </div>
            <?
            echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>13)),1,1,'date_added','DESC',0,1);
            ?>
            </div>
         </div>
    </td>
    <td width="285" valign="top">
	<div style="width:285px; display:block;">
	<?
	echo mbmShowBanner('home');
	//echo '<br /><br />';
    echo '<div id="homeGol">';
	//echo mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>8888,'en'=>15)),1,1,'date_added','DESC',0,0);
	
	//echo '<div style="border-top:1px solid #000; padding-top:6px; font-weight:bold;">Popular news</div>';
	//echo mbmContentNews($GLOBALS['htmls_normal'],/*mbmSubmenusInArray(2,1)*/array(15=>'',16=>'',17=>''),0,4,'hits','DESC',0,0);
	//echo '</div>';
	
	echo '<div style="border-top:1px solid #000; padding-top:6px; font-weight:bold;">Free news</div>';
	echo mbmContentFreeNews($GLOBALS['htmls_normal'],/*mbmSubmenusInArray(2,1)*/array(15=>'',16=>'',17=>''),0,4,'hits','DESC',0,0);
	echo '</div>';
	?>
    </div>
    </td>
  </tr>
</table>