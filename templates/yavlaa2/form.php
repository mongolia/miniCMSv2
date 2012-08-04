<h2><span class="title">И-мэйл илгээх</span></h2>
<?
	if(isset($_POST['submit'])) {
	$to = "mr.ganzorig@yahoo.com";

	$subject = "Form Tutorial";
	$name_field = $_POST['name'];
	$fname_field = $_POST['fname'];
	$add_field = $_POST['add'];
	$add2_field = $_POST['add2'];
	$city_field = $_POST['city'];
	$shuudan_field = $_POST['shuudan'];
	$tell_field = $_POST['tell'];
	$mobile = $_POST['mobile'];
	$mail = $_POST['mail'];
	$on = $_POST['on'];
	$salbar = $_POST['salbar'];
	$mergejil = $_POST['mergejil'];
	$uls = $_POST['uls'];
	$comment = $_POST['comment'];
	$huis=$_POST['huis'];

	   $body = "Нэр: $name_field<br /> 
				Овог:$fname_field<br /> 
				Хүйс:$huis<br />
				Хаяг:$add_field\n
				$add2_field\n 
				Хот аймаг:$city_field\n
				Шуудангийн хаяг:$shuudan_field\n
				Энгийн утас:$tell_field\n 
				Гар утас:$mobile\n
				И-майл:$mail\n 
				Ахлах сургууль төгссөн огноо:$on\n 
				Сонирхож буй салбар:$salbar\n 
				Сонирхож буй мэргэжил:$mergejil\n 
				Сонирхож буй улс:$uls\n 
				Сэтэгдэл:$comment\n";

	//mail($to, $subject, $body);
	mbmSendEmail('Yavlaa.MN|info@yavlaa.mn','Ganzorig|'.$to,$subject,$body);
	mbmSendEmail('Yavlaa.MN|info@yavlaa.mn','Ganzorig|info@administrator.mn',$subject,$body);
	echo "Танд баярлалаа! Таны илгээсэн майл $to! хаягруу амжилттай илгээгдлээ";
	
	} else {
echo "blarg!";
	}

?>
<form action="" method="post">
        <table width="100%" border="0" >

          <tr> 

            <td width="38%"><div align="right" class="style10">Нэр:</font></div></td>

            <td width="62%">

          

			  <input type="text" name="name" size="20" id="name">

              </font></td>

          </tr>

          <tr> 

            <td><div align="right" class="style10">Овог:</font> </div></td>

				

            <td><input type="text" name="fname" size="20" id="fname"></td>

          </tr>

          <tr> 

            <td><div align="right">Хүйс:</div></td>

			  

            <td><select name="huis" size="1" id="huis">
              <option>Select one...</option>
              <option>Эрэгтэй</option>
              <option>Эмэгтэй</option>
            </select></td>

          </tr>

          <tr> 

            <td><div align="right">Хаяг:</div></td>

            <td><input type="text" name="add" size="20" id="add"></td>

          </tr>

          <tr> 

            <td><div align="right"></div></td>

            <td><input type="text" name="add2" size="20" id="add2"></td>

          </tr>

          <tr> 

            <td><div align="right">Хот аймаг:</font></div></td>

            <td><input type="text" name="city" size="20" id="city"> </td>

          </tr>

          <tr> 

            <td><div align="right">Шуудангийн хаяг:</div></td>

            <td><input name="shuudan" type="text" size="20" id="shuudan" /></td>

          </tr>

          <tr> 

            <td><div align="right">Энгийн утас:</font></div></td>

            <td><input name="tell" type="text" size="20" id="tell" /></td>

          </tr>

          <tr> 

            <td><div align="right">Гар утас:</div></td>

            <td><input type="text" name="mobile" size="20" id="mobile"></td>

          </tr>

          <tr> 

            <td><div align="right">И-майл:</span> 

              </div></td>

            <td><input type="text" name="mail" size="20"></td>

          </tr>

          <tr> 

            <td><div align="right">Ахлах сургууль төгссөн огноо:</div></td>

            <td><input type="text" name="on" size="20" id="on" /></td>

          </tr>

          <tr> 

            <td><div align="right" >Сонирхож буй салбар:</div></td>

            <td><select name="salbar" size="1" id="salbar">

                <option>Select one...</option>
                <option>Урлаг/ Дизайн/ Загвар</option>
				<option>Нүсэх хүчин</option>
				<option>Гоо сайхан</option>
				<option>Бизнес</option>
				<option>Хууль, эрх зүй</option>
				<option>Хоолны урлаг</option>
				<option>Боловсрол</option>
				<option>Эрүүл мэнд</option>
				<option>Уламжлалт мэргэжил</option>
				<option>Mассаж/ Эрүүл ахуй</option>
				<option>Мэдээлэл технологи</option>
				<option>Худалдаа</option>

                </select></td>

          </tr>

          <tr>
            <td><div align="right">Сонирхож буй мэргэжил:</div></td>
            <td><select name="mergejil" size="1" id="mergejil">
              <option>select one...</option>
			   <option>+ Урлаг/ Дизайн/ Загвар</option></option>
			   <option>Зар сурталчилгаа, Дизайн</option>
			   <option>Animation</option>
			   <option>Архитектур</option>
			   <option>Урлаг, Дизайн</option>
			   <option>Аудио инженер</option>
			   <option>Телевиз</option>
			   <option>Худалдааны Урлаг</option>
			   <option>Комьпютер Дизайн</option>
			   <option>Комьпютер Найруулга</option>
			   <option>Бүжиг</option>
			   <option>Дижитал Урлаг, Дизайн</option>
			   <option>Загварын Дизайн</option>
			   <option>Загварын Маркетинг</option>
			   <option>Жүжиглэлт</option>
			   <option>+ Кино</option>
			   <option>Дүрслэх урлаг</option>
			   <option>Тоглоомын урлаг, боловсруулалт</option>
			   <option>График урлаг, Дизайн</option>
			   <option>Үйлдвэрлэлийн дизайн</option>
			   <option>Интерактив хэвлэл мэдээлэл</option>
			   <option>Интерьер дизайн</option>
			   <option>Засал чимэглэлийн дизайн</option>
			   <option>Хэвлэл мэдээллийн урлаг</option>
			   <option>Хэвлэл мэдээллийн бүтээгдэхүүн</option>
			   <option>Хөгжим</option>
			   <option>Хөгжмийн театр</option>
			   <option>Уран зураг</option>
			   <option>Гэрэл зураг</option>
			   <option>Бичлэгийн урлаг</option>
			   <option>Визуал урлаг</option>
			   <option>Веб дизайн, мультмедиа</option>
			   <option>+ Нисэх хүчин</option>
			   <option>Онгоцны диспетчер</option>
			   <option>Онгоцны их бие, Хөдөлгүүр</option>
			   <option>Нисэхийн засвар,техникч</option>
			   <option>Нисэх төхөөрөмж</option>
			   <option>Ерөнхий нисэх хүчин</option>
			   <option>Нисдэг тэрэгний нислэг</option>
			   <option>Мэргэжлийн нислэг</option>
			   <option>+ Гоо сайхан</option>
			   <option>Мэргэшил дээшлүүлэх сургалт</option>
			   <option>Гоо сайхны мэс засал</option>
			   <option>Электрологи</option>
			   <option>Арьс арьчилгаа</option>
			   <option>Үсний дизайн</option>
			   <option>Мэргэжлийн сургалт</option>
			   <option>Лазер</option>
			   <option>Нүүр будалт</option>
			   <option>Хумс АГС/ Гар ХГС</option>
			   <option>Тогтмол нүүр будалт</option>
			   <option>Рашаан эмчилгээ</option>
			   <option>+ Бизнес</option>
			   
			   <option>Нягтлан бодох бүртгэл</option>
			   <option>Зар сурталчилгаа</option>
			   <option>Санхүүгийн шалгалт</option>
			   <option>Бизнесийн удирдлага, менежмент</option>
			   <option>Утасны лавлахын менежмент</option>
			   <option>Харилцааны менежмент</option>
			   <option>Комьпютерийн менежмент</option>
			   <option>Хэрэглэгчийн тусламж</option>
			   <option>М.С-ийн удирдлага/ менежмент</option>
			   <option>Е-Худалдаа/ Е-Бизнес</option>
			   <option>Эдийн Засаг</option>
			   <option>Энтертайнмент бизнес</option>
			   <option>Санхүү</option>
			   <option>Санхүүгийн төлөвлөгөө</option>
			   <option>Дэлхий нийтийн менежмент</option>
			   <option>Аялал жуулчлал,менежмент</option>
			   <option>Хүний нөөц</option>
			   <option>Мэдээллийн аюулгүй байдал</option>
			   <option>Олон улсын бизнес</option>
			   <option>Мэдээллийн технологийн менежмент</option>
			   <option>Хууль, эрх зүй</option>
			   <option>Менежмент</option>
			   <option>Худалдаа</option>
			   <option>Сүлжээний менежмент</option>
			   <option>Оффисын удирдлага/ менежмент</option>
			   <option>Үйл ажиллагааны менежмент</option>
			   <option>Төслийн менежмент</option>
			   <option>Борлуулалт</option>
			   <option>Жижиг, дунд бизнесийн менежмент</option>
			   <option>Спортын менежмент</option>
			   <option>Хангалтын системийн менежмент</option>
			   <option>Системийн удирдлага</option>
			   <option>Харилцаа холбоо</option>
			   <option>Аялал жуулчлал</option>
			   <option>+ Хууль, эрх зүй</option>
			   
			   <option>Шийтгэл</option>
			   <option>Шүүхийн тайлан</option>
			   <option>Шүүх</option>
			   <option>Улс орны аюулгүй байдал</option>
			   <option>Шүүхийн бизнесийн технологи</option>
			   <option>Хууль</option>
			   <option>Хууль хэрэгжилт/ Цагдаа</option>
			   <option>Хууль ёсны оффисын удирдлага</option>
			   <option>Доод түвшингийн хуульч</option>
			   <option>+ Хоолны урлаг</option>
			   
			   <option>Нарийн боов</option>
			   <option>Хоол хүнсний менежмент</option>
			   <option>Хоолны урлаг</option>
			   <option>Хоолны менежмент</option>
			   <option>Үйлчилгээний менежмент</option>
			   <option>Рестораны менежмент</option>
			   <option>Вино судлал</option>
			   <option>+ Боловсрол</option>
			   
			   <option>Сургалтын хөтөлбөр</option>
			   <option>Сургуулийн өмнөх боловсрол</option>
			   <option>Боловсрол</option>
			   <option>Англи хэл</option>
			   <option>Ерөнхий сургалт</option>
			   <option>Дунд боловсрол</option>
			   <option>Хичээл</option>
			   <option>Онол</option>
			   <option>+ Эрүүл мэнд</option>
			   
			   <option>Донтолт, мансуурлын эмч</option>
			   <option>Уламжлалт эмчилгээ</option>
			   <option>Амьтан судлал</option>
			   <option>Зүрх судасны эмч</option>
			   <option>Бариа засал</option>
			   <option>Клиникийн эмнэлгийн дагалдан</option>
			   <option>Зөрчилдөөнийг намжаах</option>
			   <option>Зөвлөгөө өгөх</option>
			   <option>Шүдний эмнэлгийн бага эмч</option>
			   <option>Шүдний эрүүл ахуйч</option>
			   <option>Диализын эмч</option>
			   <option>Эхокардиографын мэргэжилтэн</option>
			   <option>Зүрхний бичлэгийн мэргэжилтэн</option>
			   <option>ОБЭ-гийн үйлчилгээ EMS</option>
			   <option>Геронтологи</option>
			   <option>Э.М-ийн нөхөн төлжилт</option>
			   <option>Э.М-ийн мэдээллийн технологи</option>
			   <option>Эрүүл мэндийн багийн удирдагч</option>
			   <option>Биологийн мэдээлэл зүй</option>
			   <option>Хүний үйлчилгээ</option>
			   <option>Даатгалын индекс</option>
			   <option>Хууль ёсны сувилагчийн зөвлөх</option>
			   <option>Сувилагч</option>
			   <option>Гэрлэлт, гэр бүлийн эмчилгээ</option>
			   <option>Сувилахуйн магистр</option>
			   <option>Э.М-ийн удирдлага, менежмент</option>
			   <option>Эмнэлгийн бага эмч</option>
			   <option>Эмнэлгийн индекс</option>
			   <option>Клиникийн эмч</option>
			   <option>Эмнэлгийн диагноз</option>
			   <option>Лабораторийн эмч</option>
			   <option>Эмнэлгийн оффисын бага эмч</option>
			   <option>Эмнэлгийн рентген зураг</option>
			   <option>Эмнэлгийн сонографикч</option>
			   <option>Эмнэлгийн мэргэшүүлэлт</option>
			   <option>Эмнэлгийн соронзон бичлэг</option>
			   <option>Сэтгэл судлал/зөвлөгөө</option>
			   <option>Ортопедик</option>
			   <option>Өвчтөн асаргаа</option>
			   <option>Эмийн санч</option>
			   <option>Флеботоми</option>
			   <option>Физик эмч</option>
			   <option>Психологи</option>
			   <option>Радиологи</option>
			   <option>Нөхөн сэргээх эмчилгээний бага эмч</option>
			   <option>Амьсгалын замын өвчний эмчилгээ</option>
			   <option>Арьс эмчилгээ</option>
			   <option>Спортын дасгал, психологи</option>
			   <option>Мэс заслын технологи</option>
			   <option>Хэт авианы эмч</option>
			   <option>Малын эмч</option>
			   <option>Мэргэжлийн сувилагч</option>
			   <option>Рентген туяаны эмч</option>
			   <option>+ Уламжлалт мэргэжил</option>
			   
			   <option>Америк судлал</option>
			   <option>Антропологи</option>
			   <option>Урлагын түүх</option>
			   <option>Биохими, молекулын биологи</option>
			   <option>Биоинформатик</option>
			   <option>Биологи</option>
			   <option>Хими</option>
			   <option>Англи хэл</option>
			   <option>Байгалийн шинжлэх ухаан</option>
			   <option>Ерөнхий урлаг, шинжлэх ухаан</option>
			   <option>Ерөнхий судалгаа</option>
			   <option>Газарзүй</option>
			   <option>Түүх</option>
			   <option>Хүний биологи</option>
			   <option>Хэл, уран зохиол</option>
			   <option>Гадаад хэл /Англи хэлээс бусад/</option>
			   <option>Ардын урлаг</option>
			   <option>Уран зохиол</option>
			   <option>Математик</option>
			   <option>Улс төрийн шинжлэх ухаан</option>
			   <option>Психологи</option>
			   <option>Нийгмийн шинжлэх ухаан</option>
			   <option>Социологи</option>
			   <option>Испани хэл</option>
			   <option>+ Mассаж/ Эрүүл ахуй</option>

			   <option>Зүү, дорно дахины эмчилгээ</option>
			   <option>Бусад эмчилгээ</option>
			   <option>Aromatherapy</option>
			   <option>Бариа засал</option>
			   <option>Бүдүүн гэдэсний усан эмчилгээ</option>
			   <option>Фенг Шүй</option>
			   <option>Өвсөн эмчилгээний судалгаа</option>
			   <option>Удаан хугацааны курс эмчилгээ</option>
			   <option>Ховс эмчилгээ</option>
			   <option>Кинесиологи</option>
			   <option>Зөв амьдрах арга</option>
			   <option>Гар эмчилгээ</option>
			   <option>Массаж эмчилгээ</option>
			   <option>Метафизик</option>
			   <option>Эмийн бус ургамлын эмчилгээ</option>
			   <option>Тэжээл</option>
			   <option>Хөдөлгөөнөн эмчилгээ</option>
			   <option>Дасгал/ фитнесс</option>
			   <option>Физик эмчилгээ</option>
			   <option>Рефлекс</option>
			   <option>Рашаан сувилал</option>
			   <option>Йог</option>
			   <option>+ Мэдээллийн технологи</option>
			   
			   <option>A+ сертификат</option>
			   <option>Орчин үеийн /advanced/ электроник</option>
			   <option>Архитектур</option>
			   <option>Аудио технологи</option>
			   <option>Биомедик</option>
			   <option>Кабелийн сүлжээний инженер</option>
			   <option>Интернет вебмастер</option>
			   <option>Cisco</option>
			   <option>Харилцаа холбооны инженер</option>
			   <option>CompTIA /ТТҮ-Холбоо/</option>
			   <option>Ком телеком. Электроник</option>
			   <option>CAD технологи</option>
			   <option>Ком апликешн</option>
			   <option>Ком инженерчлэл</option>
			   <option>Ком техник хангамж</option>
			   <option>Ком мэдээллийн систем – CIS/IT</option>
			   <option>Ком сүлжээ</option>
			   <option>Ком оффис технологи</option>
			   <option>Ком програмчлал</option>
			   <option>Комьпютерийн засвар</option>
			   <option>Ком шинжлэх ухаан</option>
			   <option>Ком системийн аюулгүй байдал</option>
			   <option>Ком системийн инженер</option>
			   <option>Ком техникийн тусламж</option>
			   <option>Ком технологи</option>
			   <option>Ком оффисын апликешн</option>
			   <option>Мэдээллийн сангийн боловсруулалт</option>
			   <option>Десктоп, веб хэвлэл</option>
			   <option>Инженерийн менежмент</option>
			   <option>Enterprise Applications Developer</option>
			   <option>Тоглоомын програм хангамж</option>
			   <option>Сургалтын технололги</option>
			   <option>Интернет програмист</option>
			   <option>JAVA програмист</option>
			   <option>Майкрософт системийн инженер/</option>
			   <option>Механик инженер</option>
			   <option>Майкрософт сертификат</option>
			   <option>Сүлжээний хамгаалалт Оракл</option>
			   <option>Комьпютерийн тусламжийн инженер</option>
			   <option>Робот техник</option>
			   <option>Програм хангамжийн боловсруулалт</option>
			   <option>Програм хангамжийн инженерчлэл</option>
			   <option>Програм хангамжийн технологи</option>
			   <option>Технологийн менежмент</option>
			   <option>Визуал харилцаа холбоо</option>
			   <option>Веб хөгжүүлэлт</option>
			   <option>+ Худалдаа</option>
			   
			   <option>Агааржуулалт/ хөргөлт, халаалт</option>
			   <option>Амьтан сургалт</option>
			   <option>Авто эд ангийн технологи</option>
			   <option>Автомашины технологи</option>
			   <option>Автобус, жолооны эрх</option>
			   <option>Барилгын менежмент</option>
			   <option>Усан шумбагч</option>
			   <option>Цахилгааны инженер</option>
			   <option>Электрон үйлчилгээний инженер</option>
			   <option>Гал түймэртэй тэмцэх</option>
			   <option>Зэвсгийн үйлдвэрлэл</option>
			   <option>Хүнд машин механизмын сургалт</option>
			   <option>Барилгын үзлэгийн сургалт</option>
			   <option>Үйлдвэрлэлийн технологи</option>
			   <option>Хөлөг онгоцны механик</option>
			   <option>Мотоциклын механик</option>
			   <option>NASCAR авто уралдааны техникч</option>
			   <option>Слесарь</option>
			   <option>Үл хөдлөх хөрөнгийн үнэлгээ</option>
			   <option>Цаг засвар/ үйлдвэрлэл</option>
			   <option>Гагнуур</option>

            </select></td>
          </tr>
          <tr> 

            <td><div align="right">Сонирхож буй улс:</div></td>

            <td><select name="uls" size="1" id="uls">
              <option>Select one...</option>
			   <option>Австри</option>
			   <option>Америк</option>
			   <option>Герман</option>
			   <option>Голланд</option>
			   <option>Кипр</option>
			   <option>Их Британи</option>
			   <option>Солонгос</option>
			   <option>Франц</option>
			   <option>Хятад</option>
			   <option>Энэтхэг</option>
			   <option>Япон</option>
                           </select></td>

          </tr>

          <tr> 

            <td><div align="right">Мэдээлэл:</font> 

              </div></td>

            <td><textarea name="comment" cols="20" wrap="virtual" ></textarea></td>

          </tr>

          <tr> 

            <td><div align="right"> </div></td>

            <td ><input name="submit" type="submit" class="style15" value="Send" />

              <input name="reset" type="reset" id="Reset2" onClick="resetfeilds()" value="Reset" /></td>

          </tr>

        </table>

</form>