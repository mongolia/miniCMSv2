$(document).ready(function(){
   var subcontent;
   
   function showDivHTML(element,content){
	   		closeDiv = '<div style="width:50px; position:absolute; top:5px; right:5px; cursor:pointer; text-align:right;" onclick="$(\'#topMenuSub\').slideUp(\'fast\')">';
			closeDiv = closeDiv+ '<img src="http://lib.az.mn/images/button_cancel.png" border="0" width="16" />';
			closeDiv = closeDiv+ '</div>';
			content = closeDiv+content;
			$(element).html(content+'<br clear="both" />');
			$(element).slideDown("fast");
   }
	$("#topMenu a").each(function(){
		$(this).click(function(){
			
			$("#topMenuSub").hide();
			switch($(this).attr("id")){
				case 'topMenu1':
					window.location = $(this).attr("href");
				break;
				case 'topMenu2':
					subcontent = '<h3>Эмэгтэй хувцас</h3>';
					subcontent = subcontent+'<a href="#">Гадуур хувцас</a>';
					subcontent = subcontent+'<a href="#">Цамц</a>';
					subcontent = subcontent+'<a href="#">Өмд, шорт, юбка</a>';
					subcontent = subcontent+'<a href="#">Гутал</a>';
					subcontent = subcontent+'<a href="#">Дотуур хувцас</a>';
					subcontent = subcontent+'<a href="#">Спорт хувцас</a>';
					subcontent = subcontent+'<a href="#">Ажил хэрэгч хувцас</a>';
					subcontent = subcontent+'<a href="#">Малгай ороолт</a>';
					subcontent = subcontent+'<a href="#"></a>';
					subcontent = subcontent+'<a href="#">Даашинз</a>';
					subcontent = subcontent+'<a href="#">XXXL</a>';
					subcontent = subcontent+'<a href="#">Жирэмсэн эмэгтэйчүүд</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Эрэгтэй хувцас</h3>';
					subcontent = subcontent+'<a href="#">Гадуур хувцас</a>';
					subcontent = subcontent+'<a href="#">Цамц, зангиа</a>';
					subcontent = subcontent+'<a href="#">Өмд, шорт</a>';
					subcontent = subcontent+'<a href="#">Гутал</a>';
					subcontent = subcontent+'<a href="#">Дотуур хувцас</a>';
					subcontent = subcontent+'<a href="#">Спорт хувцас</a>';
					subcontent = subcontent+'<a href="#">Малгай, ороолт, бүс</a>';
					subcontent = subcontent+'<a href="#">Ажил хэрэгч хувцас</a>';
					subcontent = subcontent+'<a href="#"></a>';
					subcontent = subcontent+'<a href="#">XXXL</a>';
					subcontent = subcontent+'<a href="#">Hip Hop Style</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Хүүхдийн хувцас</h3>';
					subcontent = subcontent+'<a href="#">Нярай хүүхдийн хэрэгсэл</a>';
					subcontent = subcontent+'<a href="#">Эрэгтэй хүүхдийн хувцас</a>';
					subcontent = subcontent+'<a href="#">Эмэгтэй хүүхдийн хувцас</a>';
					subcontent = subcontent+'<a href="#">Тоглоом</a>';
					subcontent = subcontent+'<a href="#">Хүүхдийн гутал</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Цүнх, түрүүвч</h3>';
					subcontent = subcontent+'<a href="#">Эмэгтэй цүнх</a>';
					subcontent = subcontent+'<a href="#">Эрэгтэй цүнх</a>';
					subcontent = subcontent+'<a href="#">Хүүхдийн цүнх</a>';
					subcontent = subcontent+'<a href="#">Аялыл цүнх</a>';
					subcontent = subcontent+'<a href="#">Түрүүвч</a>';
					subcontent = subcontent+'<a href="#">Эр, эм тэлээ</a>';
					showDivHTML("#topMenuSub",subcontent);					
				break;
				case 'topMenu3':
					subcontent = '<h3>Компьютер</h3>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=13">Ширээний компьютер</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=12">Зөөврийн компьютер</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=98">Дэлгэц</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=96">Хулгана, гар, чихэвч, Спикер</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=95">Сэлбэг хэрэгсэл</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=14">Принтер, скайнер, канон</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=93">Хуучин desktop, laptop</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=42">USB Flash, зөөврийн хард</a>';
					subcontent = subcontent+'<a href="#"></a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=97">Бусад</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Цахилгаан бараа</h3>';
					subcontent = subcontent+'<a href="#">LCD TV</a>';
					subcontent = subcontent+'<a href="#">Хөргөгч</a>';
					subcontent = subcontent+'<a href="#">Угаалгын машин</a>';
					subcontent = subcontent+'<a href="#">Будаа агшаагч, Тоос сорогч</a>';
					subcontent = subcontent+'<a href="#">Tалх шарагч, баригч</a>';
					subcontent = subcontent+'<a href="#">Плитка, Шарах шүүгээ</a>';
					subcontent = subcontent+'<a href="#">Home theater, DVD player</a>';
					subcontent = subcontent+'<a href="#">Хөгжим</a>';
					subcontent = subcontent+'<a href="#"></a>';
					subcontent = subcontent+'<a href="#">Бусад</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Камера, гар утас, MP3</h3>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=32">Digital camera</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=33">DSLR camera</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=27">MP3, MP4, I-pod, Гар утас</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=34">Video camera</a>';
					showDivHTML("#topMenuSub",subcontent);	
					
				break;
				case 'topMenu4':
					subcontent = '<h3>Тавилга</h3>';
					subcontent = subcontent+'<a href="#">Зочны өрөө</a>';
					subcontent = subcontent+'<a href="#">Унтлагын өрөө</a>';
					subcontent = subcontent+'<a href="#">Гал тогоо</a>';
					subcontent = subcontent+'<a href="#">Хүүхдийн өрөө</a>';
					subcontent = subcontent+'<a href="#">Оффис</a>';
					subcontent = subcontent+'<a href="#">Бусад</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Хөшиг, хөнжил, даавуу</h3>';
					subcontent = subcontent+'<a href="#">Хөшиг</a>';
					subcontent = subcontent+'<a href="#">Хөнжил</a>';
					subcontent = subcontent+'<a href="#">Хөнжлийн даавуу дэр</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Бусад</h3>'
					subcontent = subcontent+'<a href="#">Гэр ахуйн бусад бараа</a>';
					subcontent = subcontent+'<a href="#">Ахуйн үйлчилгээний бараа</a>';
					showDivHTML("#topMenuSub",subcontent);	
				break;
				case 'topMenu5':
					subcontent = '<h3>Гоо сайхны бараа</h3>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=58">Эрэгтэй гоо сайхан</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=59">Эмэгтэй гоо сайхан</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=46">Үнэгтэй ус</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=57">Бусад</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Эрүүл мэндийн хэрэгсэл</h3>';
					subcontent = subcontent+'<a href="#">Даралтын аппарат</a>';
					subcontent = subcontent+'<a href="#">Тураах бүтээгдэхүүн</a>';
					subcontent = subcontent+'<a href="#">Витамин, цай</a>';
					subcontent = subcontent+'<a href="#">Массажны аппарат</a>';
					subcontent = subcontent+'<a href="#">Бусад</a>';
					subcontent = subcontent+'<br clear="all" />';
					subcontent = subcontent+'<h3>Үнэт эдлэл, чимэглэл</h3>';
					subcontent = subcontent+'<a href="#">Ээмэг, зүүлт, бөгж</a>';
					subcontent = subcontent+'<a href="#">Цаг</a>';
					subcontent = subcontent+'<a href="#">Бусад</a>';
					showDivHTML("#topMenuSub",subcontent);	
				break;
				case 'topMenu6':
					subcontent = '<a href="index.php?module=shopping&cmd=products&cat_id=16">Nike</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=20">Jordan</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=17">Adidas</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=18">Reebok</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=19">Converse</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=67">Fila</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=48">Puma</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=45">Everlast</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=70">Хүүдийн пүүз</a>';
					subcontent = subcontent+'<a href="index.php?module=shopping&cmd=products&cat_id=80">Бусад</a>';
					showDivHTML("#topMenuSub",subcontent);	
					
				break;
				case 'topMenu7':
					subcontent = '<a href="#">Захиалга өгөх журам</a>';
					subcontent = subcontent+'<a href="#">Төлбөр тооцоо</a>';
					subcontent = subcontent+'<a href="#">Бараа буцаах, солих</a>';
					subcontent = subcontent+'<a href="#">Мэдээ, мэдээлэл</a>';
					subcontent = subcontent+'<a href="#">Зөвлөгөө</a>';
					subcontent = subcontent+'<a href="#">Холбоо барих</a>';
					subcontent = subcontent+'<a href="#">Байршил, хаяг</a>';
					showDivHTML("#topMenuSub",subcontent);	
				break;
			}
	   })
	});	
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
