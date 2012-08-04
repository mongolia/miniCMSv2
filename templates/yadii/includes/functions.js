$(document).ready(function(){
   var subcontent;
   
   function showDivHTML(element,content){
			$(element).html(content+'<br clear="both" />');
			$(element).fadeIn();
   }
   //$("#content_leftPanel").corner("keep");
   //$("#homeRightColumn").corner("10px");
   $('#donateLink').click(function(){
		$('#donateForm').submit();
   });
   
	$("#uploadVideo").click(function(){
		alert('Та видеогоо гадны аль нэг сервер (http://share.gogo.mn) дээр байрлуулаад татах хаягийг info@yadii.net хаягаар илгээнэ үү.');
	});
	$("#TopNavigation a").each(function(){
		$(this).click(function(){
			
			$("#Submenus").hide();
			switch($(this).attr("menu_id")){
				case '0':
					subcontent = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="donateForm" id="donateForm" style="float:right; width:75px;" target="_blank">';
					subcontent = subcontent+'<input type="hidden" name="cmd" value="_s-xclick">';
					subcontent = subcontent+'<input type="hidden" name="hosted_button_id" value="5486591">';
					subcontent = subcontent+'<input type="image" src="http://lib.az.mn/images/donate.png" border="0" name="submit" alt="Сайтын үйл ажиллагааг дэмжин хандив өргөх" style="border:0px;">';
					subcontent = subcontent+'<img alt="Сайтын үйл ажиллагааг дэмжих" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" style="border:0px;">';
					subcontent = subcontent+'</form>';
					subcontent = subcontent+'<a href="index.php">Сайтын эхлэл</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=314&id=10923" name="donateLink" id="donateLink">Хандив өгөх</a>';
					subcontent = subcontent+'<a href="index.php?module=faqs&cmd=list" title="Асуулт асуух">Асуулт/Хариулт</a>';
					showDivHTML("#Submenus",subcontent);
				break;
				case '1':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=3">Rock Pop</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=5">R & B, Techno, Trance</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=4">Hip Hop</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=6">Нийтийн дуу</a>';
					subcontent = subcontent+'<a href="index.php?action=banner&id=5&url=aHR0cDovL3d3dy53b3JsZHZpZGVvbXVzaWMuY29t" target="_blank">Гадаад дуу хөгжим</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=424">Бүжиг<sup>Шинэ</sup></a><br clear="all" />';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=347">Тоглолтууд</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=7">Бусад</a>';
					showDivHTML("#Submenus",subcontent);
				break;
				case '2':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=374">Уран Сайхны Кинонууд</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=378&ob=date_added&asc=asc">Бригади</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=465&ob=date_added&asc=asc">Mr.Bean<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=460&ob=date_added&asc=asc">Harry Potter</a>';
					subcontent = subcontent+'<a href="index.php?action=banner&amp;id=161&amp;url=aHR0cDovL3d3dy55a2luby5jb20vP3k=" target="_blank">Монгол хэл дээр<sup style="text-decoration:blink;">Шинэ</sup></a>';

					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=331&ob=date_added&asc=asc">Наруто</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=369&ob=date_added&asc=asc">Аватар</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=438">Хүүхэлдэйн кино</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=453">Tom & Jerry</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=429">Simpsons</a>';
					showDivHTML("#Submenus",subcontent);					
				break;
				case '3':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=349">PHP</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=350&ob=title&asc=asc">MySQL</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=351&ob=title&asc=asc">Web server</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=352">3d Max</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=368&ob=date_added&asc=asc">Flash</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=464&ob=date_added&asc=asc">Flash CS4 (дуугүй)<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=380&ob=date_added&asc=asc">Photoshop</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=394&ob=date_added&asc=asc">Dreamweaver</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=461&ob=date_added&asc=asc">After Effect CS3<sup>Beginner</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=432&ob=date_added&asc=asc">After Effect CS3<sup>Advanced</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=462&ob=date_added&asc=asc">Premiere CS4<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=463&ob=date_added&asc=asc">Premiere 7<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=427&ob=date_added&asc=asc">Maya</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=433&ob=date_added&asc=asc">Ubuntu<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=356&ob=date_added&asc=asc">Microsoft Excel</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=468&ob=date_added&asc=asc">Illustrator CS4<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=469&ob=date_added&asc=asc">AutoCad 2008<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=471&ob=date_added&asc=asc">Zend Framework<sup>Шинэ</sup></a>';
					showDivHTML("#Submenus",subcontent);	
					
				break;
				case '4':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=2">Монгол клип</a>';
					subcontent = subcontent+'<a href="index.php?action=banner&id=5&url=aHR0cDovL3d3dy53b3JsZHZpZGVvbXVzaWMuY29t" target="_blank">Гадаад дуу хөгжим</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=317">Хошин шог</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=347">Тоглолтууд</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=425">Спорт<sup>Шинэ</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=424">Бүжиг<sup>Шинэ</sup></a><br clear="all" />';
					subcontent = subcontent+'<a href="http://www.yadii.net/index.php?module=video&cmd=dl">Youtube-c видео татах<sup>***</sup></a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=338">Embed Video</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=332">Видео студиуд</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=379">Видео сурталчилгаа</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=319">Хэрэглэгчийн оруулсан</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=335">Бусад видео</a><br clear="all" />';
					showDivHTML("#Submenus",subcontent);
				break;
				case '5':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=317" title="Фото мэдээлэл">Фото мэдээлэл</a>';
					subcontent = subcontent+'<a href="index.php?module=photogallery&cmd=cats&cat_id=1" title="Хэрэглэгчийн оруулсан зургууд">Хэрэглэгчийн зургууд</a>';
					showDivHTML("#Submenus",subcontent);
				break;
				case '6':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=318" title="Tick Studio">Tick Studio</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=434" title="Унагалдайн мухлаг">Унагалдайн мухлаг</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=452" title="Түүх төрсөн түүх">Түүх төрсөн түүх</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=472" title="Өдөн дэр">Өдөн дэр</a>';
					showDivHTML("#Submenus",subcontent);
					
				break;
				case '7':
					window.location='index.php?module=menu&cmd=content&menu_id=373';
				break;
				case '8':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=314">Мэдээ</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=327">ТВ мэдээ</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=387">Сурталчилгаа</a>';
					showDivHTML("#Submenus",subcontent);
					//window.location='index.php?module=menu&cmd=content&menu_id=314';
				break;
				case '9':
					subcontent = '<a href="http://feedproxy.google.com/YadiiNetnew100" target="_blank"> Шинэ 100 Видео </a>';
					subcontent = subcontent+'<a href="rss.php?action=content&amp;type=photo" target="_blank"> Шинэ 100 Фото </a>';
					subcontent = subcontent+'<a href="rss.php?action=content&amp;type=normal" target="_blank"> Шинэ 100 мэдээлэл </a>';
					subcontent = subcontent+'<a href="http://feedproxy.google.com/YadiiNetTop100" target="_blank"> Их үзсэн 100 видео </a>';
					subcontent = subcontent+'<a href="rss.php?action=content&amp;type=photo&amp;order_by=hits" target="_blank"> Их үзсэн 100 фото</a>';
					subcontent = subcontent+'<a href="rss.php?action=content&amp;type=normal&amp;order_by=hits" target="_blank"> Их уншсан 100 мэдээлэл </a><br clear="all" />';
					subcontent = subcontent+'<a href="http://www.yadii.net/rss.php?action=content&amp;type=video&amp;order_by=session_time&amp;asc=desc" target="_blank">Сүүлд үзсэн видео</a>';
					subcontent = subcontent+'<a href="http://www.yadii.net/rss.php?action=content&amp;type=photo&amp;order_by=session_time&amp;asc=desc" target="_blank">Сүүлд үзсэн фото</a>';
					subcontent = subcontent+'<a href="http://www.yadii.net/rss.php?action=content&amp;type=photo&amp;order_by=downloaded&amp;asc=desc" target="_blank">Их татагдсан видео</a>';
					//subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=2">Монгол клип</a>';
					showDivHTML("#Submenus",subcontent);
					
				break;
				case '10':
					subcontent = '<a href="index.php?module=menu&cmd=content&menu_id=339">Скайтел</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=340">Мобиком</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=341">Юнитель</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&menu_id=342">Жи-Мобайл</a>';
					showDivHTML("#Submenus",subcontent);
					//window.location='index.php?module=menu&cmd=content&menu_id=314';
				break;
				case '17':
					subcontent = '<a href="index.php?module=menu&cmd=content&id=11126&menu_id=447">MNB</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&id=11125&menu_id=447">TV9</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&id=11127&menu_id=447" >UBS</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&id=11128&menu_id=447" >EAGLE TV</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&id=11129&menu_id=447" >TM</a>';
					subcontent = subcontent+'<a href="index.php?module=menu&cmd=content&id=11130&menu_id=447" >OLLOO TV</a>';
					showDivHTML("#Submenus",subcontent);
					
				break;
				case '18':
					subcontent = '<a href="index.php?module=grabber&cmd=fetch"> Урилга илгээх</a>';
					subcontent = subcontent+'<a href="index.php?module=video&cmd=dl">Youtube-с видео татах</a>';
					subcontent = subcontent+'<a href="http://www.yadii.net/download/flvplayer.zip" target="_blank">FLV тоглуулагч татах</a>';
					showDivHTML("#Submenus",subcontent);
					
				break;
			}
	   })
	});	
	$("#loginL").click(function(){
		$("#loginF").toggle("fast");
		login_html = $("#loginL").attr("checkval");
		switch(login_html){
			case '2':
				$("#loginL").html('форм хаах&raquo;');
				$("#loginL").attr({checkVal:4});
				$("#uAvatar").hide("fast");
			break;
			case '1':
				$("#loginL").html('комманд хаах&raquo;');
				$("#loginL").attr({checkVal:3});
				$("#uAvatar").hide("fast");
			break;
			case '4':
				$("#loginL").html('Нэвтрэх');
				$("#loginL").attr({checkVal:2});
				$("#uAvatar").show("fast");
			break;
			case '3':
				$("#loginL").html('Хэрэглэгчийн комманд');
				$("#loginL").attr({checkVal:1});
				$("#uAvatar").show("fast");
			break;
		}
	});
	$("#loginF center").hide("fast");
	$("#loginF img").hide("fast");
});

function loadContents(limit,target_div,div_id,img_w,img_h,type,order_by,asc,menu_id,timer){
	
	$(target_div).html('<img src="images/loading.gif">');
		$.ajax({
				type: "POST", url: "xml_yadii.php?type=getContents", data: "limit="+limit+"&div_id="+div_id+"&order_by="+order_by+"&img_w="+img_w+"&img_h="+img_h+"&type="+type+"&asc="+asc+"&menu_id="+menu_id,
				complete: function(data){
					$(target_div).fadeIn();
					$(target_div).html(data.responseText);
				}
			 });
	if(timer>0){
		setTimeout("loadContents("+limit+",'"+target_div+"','"+div_id+"',"+img_w+","+img_h+",'"+type+"','"+order_by+"','"+asc+"',"+menu_id+","+timer+")",timer*1000);
	}
}

function videoInfoTab(id){
	var i = 0;
	for(i=1;i<5;i++){
		$("#videoInfoTab"+i+" ul").css({'display':'none'});
	}
	$('#videoInfoTab'+id+' ul').css({'display':'block'});
	switch(id){
		case 2:
			$('#videoInfoTab'+id+' ul').css({
											'left':'-130px'
											});
		break;
		case 3:
			$('#videoInfoTab'+id+' ul').css({
											'left':'-300px',
											'height':'40px'
											});
		break;
		case 4:
			$('#videoInfoTab'+id+' ul').css({
											'left':'-450px',
											'clear':'both'
											});
			$('#videoInfoTab'+id+' ul li').css({
											'width':'150px'
											});
		break;
	}
}