<?
	if($mBm!=1){
		die("direct access not allowed. ".$_SERVER['HTTP_HOST']);
	}
	if($DB->mbm_check_field('y',$_GET['y'],'stat_daily')==1 && $DB->mbm_check_field('m',$_GET['m'],'stat_daily')==1){
		$c_year = $_GET['y'];
		$c_month = $_GET['m'];
	}else{
		$c_year = mbmDate("Y");
		$c_month = mbmDate("m");
	}
	
	$q_daily = "SELECT SUM(hits),MAX(hits),MIN(hits),AVG(hits) 
				   FROM ".PREFIX."stat_daily WHERE y='".$c_year."' AND m='".$c_month."'";
	$r_daily = $DB->mbm_query($q_daily);
	
	$q_pages = "SELECT COUNT(*),SUM(hits) FROM ".PREFIX."stat_pages";
	$r_pages = $DB->mbm_query($q_pages);
	
	$q_referers = "SELECT COUNT(*),SUM(hits) FROM ".PREFIX."stat_referers WHERE domain!=''";
	$r_referers = $DB->mbm_query($q_referers);
	
	$q_browsers = "SELECT COUNT(*),SUM(hits) FROM ".PREFIX."stat_browsers";
	$r_browsers = $DB->mbm_query($q_browsers);
	
	$r_total_hits = $DB->mbm_query("SELECT SUM(hits),MAX(hits),FLOOR(AVG(hits)),MIN(hits) FROM ".PREFIX."stat_daily");
	
	$r_countries = $DB->mbm_query("SELECT COUNT(*),SUM(hits) FROM ".PREFIX."stat_countries");
	
	$row_bgcolor=array('#FFFFFF','#f5f5f5');
?>
<script language="javascript">
var simpleEncoding = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
 
function simpleEncode(valueArray,maxValue) {

var chartData = ['s:'];
  for (var i = 0; i < valueArray.length; i++) {
    var currentValue = valueArray[i];
    if (!isNaN(currentValue) && currentValue >= 0) {
    chartData.push(simpleEncoding.charAt(Math.round((simpleEncoding.length-1) * currentValue / maxValue)));
    }
      else {
      chartData.push('_');
      }
  }
return chartData.join('');
}

</script>
<h1><?=$lang["stats"]["statistic"]?></h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><?
	$q_start_date = "SELECT * FROM ".PREFIX."stat_daily ORDER BY id LIMIT 1";
	$r_start_date = $DB->mbm_query($q_start_date);
	/*
	echo '<div style="margin-bottom:12px;margin-top:12px;border: 1px solid #DDDDDD; background-color:#f5f5f5; padding:5px;">';
	echo 'Уг үзүүлэлтүүд нь '.$DB->mbm_result($r_start_date,0,'y').' оны '
		 .$DB->mbm_result($r_start_date,0,'m').' сарын '
		 .$DB->mbm_result($r_start_date,0,'d').'-c эхэлэн тооцогдсон болно.';
	echo '</div>';
	*/
	echo '<h1>'.$c_month.'.'.$c_year.'</h1>';
	?></td>
      </tr>
      <tr>
        <td><table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
            <tr bgcolor="#e2e2e2">
              <td height="25" colspan="2" class="bold"><?
    echo '<strong>'.mbmDate("d").'.'.mbmDate("m").'.'.mbmDate("Y").' '.mbmDate("H").':'.mbmDate("i").':'.mbmDate("s").'</strong>';
	?></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["total_hits"]?></td>
              <td width="25%" align="right"><strong>
                <?=mbmPercent($DB->mbm_result($r_daily,0,0),$DB->mbm_result($r_total_hits,0,0),0)?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["max_hits"]?></td>
              <td align="right"><strong>
                <?=mbmPercent($DB->mbm_result($r_daily,0,1),$DB->mbm_result($r_daily,0,0),1)?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["min_hits"]?></td>
              <td align="right"><strong>
               <?=mbmPercent($DB->mbm_result($r_daily,0,2),$DB->mbm_result($r_daily,0,0),2)?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["average_hits"]?></td>
              <td align="right"><strong>
                <?=mbmPercent(ceil($DB->mbm_result($r_daily,0,3)),$DB->mbm_result($r_daily,0,0),3)?>
              </strong></td>
            </tr>
        </table>
            <table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse; margin-top:12px;">
              <tr bgcolor="#ff6600">
                <td height="25" class="bold"><?=$lang["stats"]["daily"]?></td>
                <td height="25" align="center" width="25%" class="bold"><strong>
                  <?=$lang["stats"]["hits"]?>
                </strong></td>
              </tr>
              <?
      	$q_monthly = "SELECT * FROM ".PREFIX."stat_daily WHERE y='".$c_year."' AND m='".$c_month."' ORDER BY d";
		$r_monthly = $DB->mbm_query($q_monthly);
		
		for($i=0;$i<$DB->mbm_num_rows($r_monthly);$i++){
			echo '
				  <tr bgcolor="'.$row_bgcolor[$i%2].'">
					<td>'.$DB->mbm_result($r_monthly,$i,"y").'.'.$DB->mbm_result($r_monthly,$i,"m").'.'.$DB->mbm_result($r_monthly,$i,"d").'</td>
					<td align="right" class="bold"> <div style="float:left">'.number_format($DB->mbm_result($r_monthly,$i,"hits_u")).'</div>'
					.mbmPercent($DB->mbm_result($r_monthly,$i,"hits"),$DB->mbm_result($r_daily,0,0),4)
					.'</td>
				  </tr>';
		}
	  ?>
          </table>
          </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><h1><?=$lang["stats"]["site_statistic"]?></h1></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
            <tr bgcolor="#e2e2e2">
              <td height="25"><strong><?=$lang["stats"]["general_information"]?></strong></td>
              <td align="center"><strong><?=$lang["stats"]["hits"]?></strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["total_hits"]?></td>
              <td align="right"><strong><?=number_format($DB->mbm_result($r_total_hits,0,0))?></strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["max_hits"]?></td>
              <td align="right"><strong>
                <?=number_format($DB->mbm_result($r_total_hits,0,1))?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["average_hits"]?></td>
              <td align="right"><strong>
                <?=number_format($DB->mbm_result($r_total_hits,0,2))?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["min_hits"]?></td>
              <td align="right"><strong>
                <?=number_format($DB->mbm_result($r_total_hits,0,3))?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["total_pages"]?></td>
              <td width="25%" align="right"><strong>
                <?=number_format($DB->mbm_result($r_pages,0,0));?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["total_browsers"]?></td>
              <td align="right"><strong>
                <?=number_format($DB->mbm_result($r_browsers,0,0))?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["total_referer_sites"]?></td>
              <td align="right"><strong>
                <?=number_format($DB->mbm_result($r_referers,0,0))?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["total_referers"]?></td>
              <td align="right"><strong>
                <?=number_format($DB->mbm_result($r_referers,0,1))?>
              </strong></td>
            </tr>
            <tr>
              <td><?=$lang["stats"]["total_countries"]?></td>
              <td align="right"><strong>
                <?=number_format($DB->mbm_result($r_countries,0,0))?>
              </strong></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
            <tr bgcolor="#00c0ff">
              <td height="25"><strong><?=$lang["stats"]["monthly"]?></strong></td>
              <td align="center"><strong><?=$lang["stats"]["hits"]?></strong></td>
            </tr>
            <?
     		
		$q_monthly2 = "SELECT y,m,SUM(hits) FROM ".PREFIX."stat_daily GROUP BY y,m LIMIT 20";
		$r_monthly2 = $DB->mbm_query($q_monthly2);
		
		for($i=0;$i<$DB->mbm_num_rows($r_monthly2);$i++){
			echo '<tr bgcolor="'.$row_bgcolor[$i%2].'"><td>';
			echo '<a title="Тухайн сарын үзүүлэлтийг харах" 
					href="index.php?module=stats&cmd=monthly&y='
					.$DB->mbm_result($r_monthly2,$i,0)
					.'&m='.$DB->mbm_result($r_monthly2,$i,1).'">';
			echo $DB->mbm_result($r_monthly2,$i,0).'.'.$DB->mbm_result($r_monthly2,$i,1);
			echo '</a>';
			echo '</td><td width="25%" align="right" class="bold">';
			echo mbmPercent($DB->mbm_result($r_monthly2,$i,2),$DB->mbm_result($r_total_hits,0,0),0);
			echo '</td></tr>';
		}
	 ?>
        </table>
      <?
		' <table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse; margin-top:12px;">
              <tr bgcolor="#660033">
                <td height="25" class="bold"><?=$lang["stats"]["hourly"]?>Цаг, цагаар</td>
                <td height="25" align="center" width="25%" class="bold"><strong>
                  '.$lang["stats"]["hits"].'
                </strong></td>
              </tr>';
      	echo '<h3>Цаг, цагаар</h3>';
		$q_hourly = "SELECT ";
		for($i=0;$i<24;$i++){
			$q_hourly .= "SUM(h".$i."),";
		}
		$q_hourly = rtrim($q_hourly , ",");
		
		$q_hourly .= " FROM ".PREFIX."stat_daily";
		$r_hourly  = $DB->mbm_query($q_hourly);
		
		
		$chart_value = '';
		$chart_label = '';
		
		for($i=0;$i<24;$i++){
			 '
				  <tr bgcolor="'.$row_bgcolor[$i%2].'">
					<td>'.$i.' цагт</td>
					<td align="right" class="bold">'
					.mbmPercent($DB->mbm_result($r_hourly,0,$i),$DB->mbm_result($r_total_hits,0,0),5)
					.'</td>
				  </tr>';
		$chart_value .= ceil(($DB->mbm_result($r_hourly,0,$i)*100)/$DB->mbm_result($r_total_hits,0,0)).',';
		$chart_label .= $i.'|';
		}
		$chart_value = rtrim($chart_value,',');
		$chart_label = rtrim($chart_label,'|');
		
		'</table>';
		
	  ?>
          <div align="center">
          <script language="javascript">
          var valueArray = new Array(<?=$chart_value?>);
			var maxValue = 10; 
			document.write('<img src="http://chart.apis.google.com/chart?chxt=x,y,r,x&chxl=0:|<?=$chart_label?>|1:|0|10|2:|0%|5%|10%|3:|<?=str_replace(",","%|",$chart_value)?>%&cht=lc&chd='+simpleEncode(valueArray,maxValue)+'&chco=003663&chls=2.0&chs=800x250" />');
          </script>
          </div>
        <?
		'
            <table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse; margin-top:12px;">
              <tr bgcolor="#CC00FF">
                <td height="25" class="bold"><?=$lang["stats"]["hourly"]?>Минут минутаар</td>
                <td height="25" align="center" width="25%" class="bold"><strong>
                  <?=$lang["stats"]["hits"]?>
                </strong></td>
              </tr>';
			  
		echo '<h3>Минут минутаар</h3>';
			  
      	$q_minutely = "SELECT ";
		for($i=0;$i<60;$i++){
			if($i<10){
				$qqqqqq = '0'.$i;
			}else{
				$qqqqqq = $i;
			}
			$q_minutely .= "SUM(m".$qqqqqq."),";
		}
		$q_minutely = rtrim($q_minutely , ",");
		
		$q_minutely .= " FROM ".PREFIX."stat_daily";
		$r_minutely  = $DB->mbm_query($q_minutely);
		
		$chart_value = '';
		$chart_label = '';
		
		for($i=0;$i<60;$i++){
			 '
				  <tr bgcolor="'.$row_bgcolor[$i%2].'">
					<td>'.$i.' минутанд</td>
					<td align="right" class="bold">'
					.mbmPercent($DB->mbm_result($r_minutely,0,$i),$DB->mbm_result($r_total_hits,0,0),3)
					.'</td>
				  </tr>';
		$chart_value .= number_format(($DB->mbm_result($r_minutely,0,$i)*100)/$DB->mbm_result($r_total_hits,0,0),2).',';
		$chart_label .= $i.'|';
		}
		$chart_value = rtrim($chart_value,',');
		$chart_label = rtrim($chart_label,'|');
		
		'</table>';
	  ?>  
            <div align="center">
          <script language="javascript">
          var valueArray1 = new Array(<?=$chart_value?>);
			var maxValue1 = 3; 
			document.write('<img src="http://chart.apis.google.com/chart?chxt=x,y,r,x&chxl=0:|<?=$chart_label?>|1:|0|3|2:|0%|1%|2%|3%|3:|0|20|40|60|&cht=lc&chd='+simpleEncode(valueArray1,maxValue1)+'&chco=f7941c&chls=2.0&chs=800x250" />');
          </script>
          </div>
          </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
            <tr bgcolor="#3cb878">
              <td height="25" colspan="2"><strong><?=$lang["stats"]["top_countries"]?>
              </strong></td>
              <td align="center"><strong><?=$lang["stats"]["hits"]?></strong></td>
            </tr>
            <?
			
		$q_countries2 = "SELECT * FROM ".PREFIX."stat_countries WHERE name!='UNKNOWN' ORDER BY hits DESC LIMIT 20";
		$r_countries2 = $DB->mbm_query($q_countries2);
		
		for($i=0;$i<$DB->mbm_num_rows($r_countries2);$i++){
			echo '<tr bgcolor="'.$row_bgcolor[$i%2].'"><td width="30" align="center" class="bold">'.($i+1).'.</td><td>';
			echo '<img align="absmiddle" width="30" hspace="3"
					src="images/flags/'.strtolower($DB2->mbm_get_field($DB->mbm_result($r_countries2,$i,"name"),"name","iso2","ip2country")).'.png" />';
			echo $DB->mbm_result($r_countries2,$i,"name").'';
			echo '</td><td width="25%" align="right" class="bold">';
			echo mbmPercent($DB->mbm_result($r_countries2,$i,"hits"),$DB->mbm_result($r_countries,0,1),1);
			echo '</td></tr>';
		}
	?>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
            <tr bgcolor="#ff8000">
              <td height="25" colspan="2"><strong><?=$lang["stats"]["top_referers"]?></strong></td>
              <td align="center"><strong><?=$lang["stats"]["hits"]?></strong></td>
            </tr>
            <?
     		
		$q_referers2 = "SELECT * FROM ".PREFIX."stat_referers WHERE domain!='' 
					  ORDER BY hits DESC LIMIT 20";
		$r_referers2 = $DB->mbm_query($q_referers2);
		
		for($i=0;$i<$DB->mbm_num_rows($r_referers2);$i++){
			echo '<tr bgcolor="'.$row_bgcolor[$i%2].'"><td width="30" align="center" class="bold">'.($i+1).'.</td><td>';
			if($DB->mbm_result($r_referers2,$i,"domain")==''){
				echo 'Шууд хандалт';
			}else{
				echo '<a href="';
				if(substr_count($DB->mbm_result($r_referers2,$i,"domain"),"http://")==0){
					echo 'http://';
				}
				echo $DB->mbm_result($r_referers2,$i,"domain").'" target="_blank">';
				echo substr($DB->mbm_result($r_referers2,$i,"domain"),0,55);
				if(strlen($DB->mbm_result($r_referers2,$i,"domain"))>55){
					echo '...';
				}
				echo '</a>';
			}
			echo '</td><td width="25%" align="right" class="bold">';
			echo mbmPercent($DB->mbm_result($r_referers2,$i,"hits"),$DB->mbm_result($r_referers,0,1),2);
			echo '</td></tr>';
		}
	 ?>
        </table></td>
      </tr>
     <!--
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
            <tr bgcolor="#f06eaa">
              <td height="25" colspan="2"><strong>Хамгийн их сөхөгдсөн 20 хуудас</strong></td>
              <td align="center"><strong>Хандалт</strong></td>
            </tr>
            <?
			
		$q_pages2 = "SELECT * FROM ".PREFIX."stat_pages ORDER BY hits DESC LIMIT 20";
		$r_pages2 = $DB->mbm_query($q_pages2);
		
		for($i=0;$i<$DB->mbm_num_rows($r_pages2);$i++){
			echo '<tr bgcolor="'.$row_bgcolor[$i%2].'"><td width="30" align="center" class="bold">'.($i+1).'.</td><td>';
			echo '<a href="'.$config['domain'].$config['dir'].substr($DB->mbm_result($r_pages2,$i,"url"),1).'">'
					.$DB->mbm_result($r_pages2,$i,"url").'</a>';
			echo '</td><td width="25%" align="right" class="bold">'
				 .mbmPercent($DB->mbm_result($r_pages2,$i,"hits"),$DB->mbm_result($r_pages,0,1),3);
			echo '</td></tr>';
		}
	?>
        </table></td>
      </tr>
     //-->
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="2" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
            <tr bgcolor="#c7b299">
              <td height="25" colspan="2"><strong><?=$lang["stats"]["top_browsers"]?></strong></td>
              <td align="center"><strong><?=$lang["stats"]["hits"]?></strong></td>
            </tr>
            <?
			
		$q_browsers2 = "SELECT * FROM ".PREFIX."stat_browsers ORDER BY hits DESC LIMIT 20";
		$r_browsers2 = $DB->mbm_query($q_browsers2);
		
		for($i=0;$i<$DB->mbm_num_rows($r_browsers2);$i++){
			echo '<tr bgcolor="'.$row_bgcolor[$i%2].'">
				<td width="30" align="center" class="bold">'.($i+1).'.</td>
				<td>';
			echo $DB->mbm_result($r_browsers2,$i,"browser");
			echo '</td><td width="25%" align="right" class="bold">'
				 .mbmPercent($DB->mbm_result($r_browsers2,$i,"hits"),$DB->mbm_result($r_browsers,0,1),4);
			echo '</td></tr>';
		}
	?>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?
	$q_stat_this_page = 'SELECT SUM(hits) FROM '.PREFIX."stat_pages WHERE url LIKE '%index.php?module=stats&cmd=monthly%';";
	$r_stat_this_page = $DB->mbm_query($q_stat_this_page);
	echo '<strong>-=:'.$DB->mbm_result($r_stat_this_page,0).':=-</strong>';
?>