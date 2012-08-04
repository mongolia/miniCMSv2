
<script type="text/javascript">

$().ready(function() {
	var country = $("#country");
	var countryResult = $("#countryResult");
	
	var firm = $("#firm");
	var firmResult = $("#firmResult");
	
	var mark = $("#mark");
	var markResult = $("#markResult");
	
	$("#country").live("keypress",function(){
		$('#countryResult').show();
		$("#countryResult").html('<img src="<?=DOMAIN.DIR?>images/loading.gif" border="0" />');
		$.ajax({
				type: "GET", url: "<?=DOMAIN.DIR?>xml.php?action=country&type=autocomplete", data: "q="+country.attr("value"),
				complete: function(data){
					countryResult.fadeIn();
					countryResult.html(data.responseText);
					$('#firmResult').hide('fast');
					$('#markResult').hide('fast');
				}
			 });
	});
	$("#countryResult").click(function(){
		$('#countryResult').fadeOut(500);
	});
	
	$("#firm").live("keypress",function(){
		$('#firmResult').show();
		$("#firmResult").html('<img src="<?=DOMAIN.DIR?>images/loading.gif" border="0" />');
		$.ajax({
				type: "GET", url: "<?=DOMAIN.DIR?>xml.php?action=auto&type=autocomplete&list_type=firms&country="+country.attr("value"), data: "q="+firm.attr("value"),
				complete: function(data){
					firmResult.fadeIn();
					firmResult.html(data.responseText);
					$('#countryResult').hide('fast');
					$('#markResult').hide('fast');
				}
			 });
	});
	$("#firmResult").click(function(){
		$('#firmResult').fadeOut(500);
	});
	$("#mark").live("keypress",function(){
		$('#markResult').show();
		$("#markResult").html('<img src="<?=DOMAIN.DIR?>images/loading.gif" border="0" />');
		$.ajax({
				type: "GET", url: "<?=DOMAIN.DIR?>xml.php?action=auto&type=autocomplete&list_type=marks&country="+country.attr("value")+"&firm="+firm.attr("value"), data: "q="+mark.attr("value"),
				complete: function(data){
					markResult.fadeIn();
					markResult.html(data.responseText);
					$('#countryResult').hide('fast');
					$('#firmResult').hide('fast');
				}
			 });
	});
	$("#markResult").click(function(){
		$('#markResult').fadeOut(500);
	});
	
});

</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div style="width:648px; height:16px;"><img src="templates/tojooaz/images/talbar_top_bg.gif" width="648" height="16" alt="tojoo" /></div>
      <div style="width:636px; border-right:1px solid #DDD; border-left:1px solid #DDD; background-color:#F5F5F5; padding:5px; position:relative; z-index:1;">
      		<div style="width:300px; right:10px; position:absolute; height:250px; z-index:2;"><?=mbmShowBanner('home_1')?></div>
            <div id="searchCarHome">
            	<h2><a href="#">дэлгэрэнгүй хайлт...</a>Хайлт</h2>
           	  <span><?=$lang['main']['country']?>:</span>
                <input name="country" type="text" id="country" value="<?=$_POST['country']?>" size="45" /><div id="countryResult" class="divResults"></div>
              <span><?=$lang['auto']['firm']?>:</span>
                <input name="firm" type="text" id="firm" size="45" value="<?=$_POST['firm']?>" /><div id="firmResult" class="divResults"></div>
              <span><?=$lang['auto']['mark']?>:</span>
                <input name="mark" type="text" id="mark" size="45" value="<?=$_POST['mark']?>" /><div id="markResult" class="divResults"></div>
               <div class="searchButton">Машин хайх</div>
               </div>
      </div>
      <div style="width:648px; height:16px;"><img src="templates/tojooaz/images/talbar_bottom_bg.gif" width="648" height="16" alt="tojoo" /></div></td>
  </tr>
  <tr>
    <td><?=mbmAutoCars(array('tags'=>'','limit'=>5))?></td>
  </tr>
  <tr>
    <td valign="top">
      <table width="100%" border="0" cellspacing="2" cellpadding="0">
        <tr>
          <td width="50%" valign="top" style="border:1px solid #DDD;">
             <div class="talbar_title">Захиалга</div>
              <div style="padding:5px;"><?= mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>457,'en'=>888888)),5,5,'date_added','desc',0,1)?></div></td>
          <td valign="top" style="border:1px solid #DDD;">
       		<div class="talbar_title">Зөвлөгөө</div>
   		  <div style="padding:5px;"><?= mbmContentNews($GLOBALS['htmls_normal'],mbmSubmenusInArray(mbmShowByLang(array('mn'=>389,'en'=>888888)),1),3,3,'RAND()',' ',0,1)?></div></td>
        </tr>
        <tr>
          <td valign="top" height="8"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top" style="border:1px solid #DDD;"><?=mbmShowBanner('home_2')?></td>
          <td valign="top" style="border:1px solid #DDD;">
          <div class="talbar_title">Авто мэдээ мэдээлэл</div>
              <div style="padding:5px;"><?= mbmContentNews($GLOBALS['htmls_normal'],mbmShowByLang(array('mn'=>392,'en'=>888888)),2,2,'date_added','desc',0,1)?></div>
          </td>
        </tr>
        <tr>
          <td valign="top" height="8"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top" style="border:1px solid #DDD;">
                <div class="talbar_title">Хуучны автомашинууд</div>
              <div style="padding:5px;">
              <?= mbmContentNews($GLOBALS['htmls_normal'],mbmSubmenusInArray(mbmShowByLang(array('mn'=>397,'en'=>888888)),1),2,2,'date_added','desc',0,1)?>
              </div></td>
          <td valign="top" style="border:1px solid #DDD;">
                <div class="talbar_title">Шинэ автомашинууд</div>
              <div style="padding:5px;">
              <?= mbmContentNews($GLOBALS['htmls_normal'],mbmSubmenusInArray(mbmShowByLang(array('mn'=>398,'en'=>888888)),1),2,2,'date_added','desc',0,1)?>
              </div>
          </td>
        </tr>
        <tr>
          <td valign="top" height="8"></td>
          <td valign="top"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div class="talbar_title">FAQs</div>
     		 <div style="padding:5px; position:relative; display:block;">
			 <?=mbmFAQsForm(30)?>
			 <?  mbmShoppingProducts2(0,0,'id','desc',10)?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
