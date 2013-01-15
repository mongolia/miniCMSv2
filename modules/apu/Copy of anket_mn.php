<br />
<img src="/images/title_anket_<?=$_SESSION['ln']?>.png" alt="anket" />
<br />
<br />
<br />
<?php
$send_to = 'dorjbat@apu.mn';
if(isset($_POST['a'])){
	$email_con = '<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td><table width="100%" border="0" cellpadding="3" cellspacing="2" class="anket_table">
					  <tr>
						<td width="25%" align="right" valign="top">Сонирхож буй албан тушаал:</td>
						<td width="25%" valign="top">'.$_POST['a'].'</td>
						<td width="25%" align="right" valign="top">Гэрийн утас: </td>
						<td width="25%" valign="top">'.$_POST['a4'].'</td>
					  </tr>
					  <tr>
						<td align="right" valign="top">Таны хүсч буй цалин:</td>
						<td valign="top">'.$_POST['a2'].'</td>
						<td align="right" valign="top">Гар утас: </td>
						<td valign="top">'.$_POST['a5'].'</td>
					  </tr>
					  <tr>
						<td align="right" valign="top">Ажилд орох боломжтой огноо:</td>
						<td valign="top">'.$_POST['a3'].'</td>
						<td align="right" valign="top">Э-шуудан: </td>
						<td valign="top">'.$_POST['a6'].'</td>
					  </tr>
					  <tr>
						<td align="right" valign="top">Одоо эрхэлж буй ажил:</td>
						<td valign="top">'.$_POST['a7'].'</td>
						<td align="right" valign="top">&nbsp;</td>
						<td valign="top">&nbsp;</td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><h2>НЭГ. Үндсэн мэдээлэл</h2></td>
				  </tr>
				  <tr>
					<td><table width="100%" border="0" cellspacing="2" cellpadding="3" class="anket_table">
					  <tr>
						<td width="25%" align="right" valign="top">1.1.	Ургийн овог: </td>
						<td width="25%" valign="top">'.$_POST['a8'].'</td>
						<td width="25%" align="right" valign="top">1.3. Өөрийн нэр:</td>
						<td valign="top">'.$_POST['a21'].'</td>
					  </tr>
					  <tr>
						<td align="right" valign="top">1.2. Эцэг /эх/-ийн нэр: </td>
						<td valign="top">'.$_POST['a9'].'</td>
						<td align="right" valign="top">1.4. Хүйс                   Эрэгтэй               Эмэгтэй:</td>
						<td valign="top">'.$_POST['a14'].'</td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><h2>ХОЁР. Боловсрол</h2></td>
				  </tr>
				  <tr>
					<td height="6"></td>
				  </tr>
				  <tr>
					<td>'.$_POST['select4'].'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>2.1</td>
				  </tr>
				  <tr>
					<td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
					  <tr>
						<td align="center" >Хаана <br>
						  /гадаад улс, аймаг хот/</td>
						<td align="center" >Ямар сургууль төгссөн <br>
						  /сургуулийн нэр/</td>
						<td align="center" >&nbsp;Элссэн огноо</td>
						<td align="center">&nbsp;Төгссөн огноо</td>
						<td align="center" >Эзэмшсэн мэргэжил</td>
						<td align="center" >Үнэмлэхний дугаар</td>
						<td align="center" >Голч оноо</td>
						<td align="center">Зэрэг цол</td>
					  </tr>
					  <tr>
						<td align="center" valign="top">'.$_POST['a87'].'</td>
						<td align="center" valign="top">'.$_POST['a871'].'</td>
						<td align="center" valign="top">'.$_POST['a872'].'</td>
						<td align="center" valign="top">'.$_POST['a873'].'</td>
						<td align="center" valign="top">'.$_POST['a874'].'</td>
						<td align="center" valign="top">'.$_POST['a875'].'</td>
						<td align="center" valign="top">'.$_POST['a876'].'</td>
						<td align="center" valign="top">'.$_POST['a877'].'</td>
					  </tr>
					  <tr>
						<td align="center" valign="top">'.$_POST['a10'].'</td>
						<td align="center" valign="top">'.$_POST['a15'].'</td>
						<td align="center" valign="top">'.$_POST['a19'].'</td>
						<td align="center" valign="top">'.$_POST['a24'].'</td>
						<td align="center" valign="top">'.$_POST['a32'].'</td>
						<td align="center" valign="top">'.$_POST['a35'].'</td>
						<td align="center" valign="top">'.$_POST['a38'].'</td>
						<td align="center" valign="top">'.$_POST['a48'].'</td>
					  </tr>
					  <tr>
						<td align="center" valign="top">'.$_POST['a11'].'</td>
						<td align="center" valign="top">'.$_POST['a16'].'</td>
						<td align="center" valign="top">'.$_POST['a20'].'</td>
						<td align="center" valign="top">'.$_POST['a30'].'</td>
						<td align="center" valign="top">'.$_POST['a33'].'</td>
						<td align="center" valign="top">'.$_POST['a36'].'</td>
						<td align="center" valign="top">'.$_POST['a39'].'</td>
						<td align="center" valign="top">'.$_POST['a49'].'</td>
					  </tr>
					  <tr>
						<td align="center" valign="top">'.$_POST['a12'].'</td>
						<td align="center" valign="top">'.$_POST['a17'].'</td>
						<td align="center" valign="top">'.$_POST['a22'].'</td>
						<td align="center" valign="top">'.$_POST['a31'].'</td>
						<td align="center" valign="top">'.$_POST['a34'].'</td>
						<td align="center" valign="top">'.$_POST['a37'].'</td>
						<td align="center" valign="top">'.$_POST['a47'].'</td>
						<td align="center" valign="top">'.$_POST['a50'].'</td>
					  </tr>
					  <tr>
						<td align="center" valign="top">'.$_POST['a13'].'</td>
						<td align="center" valign="top">'.$_POST['a18'].'</td>
						<td align="center" valign="top">'.$_POST['a23'].'</td>
						<td align="center" valign="top">'.$_POST['a25'].'</td>
						<td align="center" valign="top">'.$_POST['a26'].'</td>
						<td align="center" valign="top">'.$_POST['a27'].'</td>
						<td align="center" valign="top">'.$_POST['a28'].'</td>
						<td align="center" valign="top">'.$_POST['a29'].'</td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>2.2. Гадаад хэлний мэдлэг </td>
				  </tr>
				  <tr>
					<td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
					  <tr>
						<td width="20%" align="right" valign="top">Англи</td>
						<td width="5%" align="center" valign="top">';
						
						if($_POST['english'] == 1){
							echo '+';
						}
						
						$email_con .= '</td>
						<td width="20%" align="right" valign="top">Орос</td>
						<td width="5%" align="center" valign="top">';
						
						if($_POST['russian'] == 1){
							echo '+';
						}
						
						$email_con .= '</td>
						<td width="20%" align="right" valign="top">Хятад</td>
						<td width="5%" align="center" valign="top">';
						
						if($_POST['chinese'] == 1){
							echo '+';
						}
						
						$email_con .= '</td>
						<td width="20%" align="right" valign="top">Солонгос</td>
						<td width="5%" align="center" valign="top">';
						
						if($_POST['korean'] == 1){
							echo '+';
						}
						
						$email_con .= '</td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><h2>ГУРАВ. Ажил хөдөлмөрийн туршлага</h2></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>3.1. (Одоо эрхэлж буй ажлаасаа эхлэн бичнэ үү)</td>
				  </tr>
				  <tr>
					<td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
					  <tr>
						<td align="center">&nbsp;
						  Байгууллагын нэр</td>
						<td align="center">&nbsp;
						  Бизнесийн төрөл</td>
						<td align="center">Эрхэлж байсан албан    тушаал</td>
						<td align="center">Ажилд орсон огноо</td>
						<td align="center">Ажлаас гарсан огноо</td>
						<td align="center">Сарын цалин /төг /</td>
					  </tr>
					  <tr>
						<td align="center" >'.$_POST['a410'].'</td>
						<td align="center" >'.$_POST['a411'].'</td>
						<td align="center" >'.$_POST['a60'].'</td>
						<td align="center" >'.$_POST['a412'].'</td>
						<td align="center" >'.$_POST['a73'].'</td>
						<td align="center" >'.$_POST['a74'].'</td>
					  </tr>
					  <tr>
						<td align="center" >'.$_POST['a51'].'</td>
						<td align="center" >'.$_POST['a56'].'</td>
						<td align="center" >'.$_POST['a61'].'</td>
						<td align="center" >'.$_POST['a65'].'</td>
						<td align="center" >'.$_POST['a72'].'</td>
						<td align="center" >'.$_POST['a75'].'</td>
					  </tr>
					  <tr>
						<td align="center" >'.$_POST['a53'].'</td>
						<td align="center" >'.$_POST['a57'].'</td>
						<td align="center" >'.$_POST['a62'].'</td>
						<td align="center" >'.$_POST['a66'].'</td>
						<td align="center" >'.$_POST['a71'].'</td>
						<td align="center" >'.$_POST['a76'].'</td>
					  </tr>
					  <tr>
						<td align="center" >'.$_POST['a54'].'</td>
						<td align="center" >'.$_POST['a58'].'</td>
						<td align="center" >'.$_POST['a63'].'</td>
						<td align="center" >'.$_POST['a67'].'</td>
						<td align="center" >'.$_POST['a70'].'</td>
						<td align="center" >'.$_POST['a41'].'</td>
					  </tr>
					  <tr>
						<td align="center" >'.$_POST['a55'].'</td>
						<td align="center" >'.$_POST['a59'].'</td>
						<td align="center" >'.$_POST['a64'].'</td>
						<td align="center" >'.$_POST['a68'].'</td>
						<td align="center" >'.$_POST['a69'].'</td>
						<td align="center" >'.$_POST['a46'].'</td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>Байгууллагын удирдах    албан тушаалтан</td>
				  </tr>
				  <tr>
					<td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
					  <tr>
						<td width="120">Нэр</td>
						<td width="300">Албан тушаалтан</td>
						<td width="100" align="center">Утас</td>
						<td valign="top">Ажлаас гарсан шалтгаан</td>
					  </tr>
					  <tr>
						<td align="center">'.$_POST['a420'].'</td>
						<td align="center">'.$_POST['a421'].'</td>
						<td align="center">'.$_POST['a422'].'</td>
						<td align="center" valign="top">'.$_POST['a423'].'</td>
					  </tr>
					  <tr>
						<td align="center">'.$_POST['a52'].'</td>
						<td align="center">'.$_POST['a78'].'</td>
						<td align="center">'.$_POST['a80'].'</td>
						<td align="center" valign="top">'.$_POST['a82'].'</td>
					  </tr>
					  <tr>
						<td align="center">'.$_POST['a77'].'</td>
						<td align="center">'.$_POST['a79'].'</td>
						<td align="center">'.$_POST['a81'].'</td>
						<td align="center" valign="top">'.$_POST['a42'].'</td>
					  </tr>
					  <tr>
						<td align="center">'.$_POST['a40'].'</td>
						<td align="center">'.$_POST['a45'].'</td>
						<td align="center">'.$_POST['a43'].'</td>
						<td align="center" valign="top">'.$_POST['a44'].'</td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>3.2. Тогтвор суурьшилтай ажиллах жил </td>
				  </tr>
				  <tr>
					<td>'.$_POST['select'].'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				</table>
				';
	
	if(mbmSendEmail('APU HR|'.$send_to,'APU|'.$send_to,'apu hr anket',$email_con) == 1){
		$b = 1;
		$result_txt = 'Your request has been sent.';
	}else{
		$result_txt = 'Failed to send. Please try again.';
	}
	
	echo mbmError($result_txt);
	
	//echo $email_con;
}

if($b!=1){
?>
<form action="" method="post" id="anketForm">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#707070;">
  <tr>
    <td><table width="100%" border="0" cellpadding="3" cellspacing="2" class="anket_table">
      <tr>
        <td width="25%" align="right" valign="top">Сонирхож буй албан тушаал:</td>
        <td width="25%" valign="top"><input type="text" name="a" id="a" class="anket_input" /></td>
        <td width="25%" align="right" valign="top">Гэрийн утас: </td>
        <td width="25%" valign="top"><input type="text" name="a4" id="a4" class="anket_input" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Таны хүсч буй цалин:</td>
        <td valign="top"><input type="text" name="a2" id="a2" class="anket_input" /></td>
        <td align="right" valign="top">Гар утас: </td>
        <td valign="top"><input type="text" name="a5" id="a5" class="anket_input" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Ажилд орох боломжтой огноо:</td>
        <td valign="top"><input type="text" name="a3" id="a3" class="anket_input" /></td>
        <td align="right" valign="top">Э-шуудан: </td>
        <td valign="top"><input type="text" name="a6" id="a6" class="anket_input" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Одоо эрхэлж буй ажил:</td>
        <td valign="top"><input type="text" name="a7" id="a7" class="anket_input" /></td>
        <td align="right" valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h2>НЭГ. Үндсэн мэдээлэл</h2></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="3" class="anket_table">
      <tr>
        <td width="25%" align="right" valign="top">1.1.	Ургийн овог: </td>
        <td width="25%" valign="top"><input type="text" name="a8" id="a8" class="anket_input"></td>
        <td width="25%" align="right" valign="top">1.3. Өөрийн нэр:</td>
        <td valign="top"><input type="text" name="a21" id="a21" class="anket_input" /></td>
        </tr>
      <tr>
        <td align="right" valign="top">1.2. Эцэг /эх/-ийн нэр: </td>
        <td valign="top"><input type="text" name="a9" id="a9" class="anket_input"></td>
        <td align="right" valign="top">1.4. Хүйс                   Эрэгтэй               Эмэгтэй:</td>
        <td valign="top"><input type="text" name="a14" id="a14" class="anket_input" /></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h2>ХОЁР. Боловсрол</h2></td>
  </tr>
  <tr>
    <td height="6"></td>
  </tr>
  <tr>
    <td>
    <select name="select4" id="select4" class="anket_select">
      <option>Боловсролоо сонго</option>
      <option>Дээд</option>
      <option>Тусгай дунд</option>
      <option>Бүрэн дунд</option>
      <option>Бүрэн бус дунд</option>
      <option>Бусад</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>2.1</td>
  </tr>
  <tr>
    <td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
  <tr>
    <td align="center" >Хаана <br>
      /гадаад улс, аймаг хот/</td>
    <td align="center" >Ямар сургууль төгссөн <br>
      /сургуулийн нэр/</td>
    <td align="center" >&nbsp;Элссэн огноо</td>
    <td align="center">&nbsp;Төгссөн огноо</td>
    <td align="center" >Эзэмшсэн мэргэжил</td>
    <td align="center" >Үнэмлэхний дугаар</td>
    <td align="center" >Голч оноо</td>
    <td align="center">Зэрэг цол</td>
  </tr>
  <tr>
    <td align="center" valign="top"><input name="a87" type="text" class="anket_input" id="a242" size="15"></td>
    <td align="center" valign="top"><input name="a871" type="text" class="anket_input" id="a243" size="25"></td>
    <td align="center" valign="top"><input name="a872" type="text" class="anket_input" id="a244" size="6"></td>
    <td align="center" valign="top"><input name="a873" type="text" class="anket_input" id="a245" size="8"></td>
    <td align="center" valign="top"><input name="a874" type="text" class="anket_input" id="a246" size="10"></td>
    <td align="center" valign="top"><input name="a875" type="text" class="anket_input" id="a247" size="8"></td>
    <td align="center" valign="top"><input name="a876" type="text" class="anket_input" id="a248" size="4"></td>
    <td align="center" valign="top"><input name="a877" type="text" class="anket_input" id="a249" size="6"></td>
  </tr>
  <tr>
    <td align="center" valign="top"><input name="a10" type="text" class="anket_input" id="a10" size="15" /></td>
    <td align="center" valign="top"><input name="a15" type="text" class="anket_input" id="a15" size="25" /></td>
    <td align="center" valign="top"><input name="a19" type="text" class="anket_input" id="a19" size="6" /></td>
    <td align="center" valign="top"><input name="a24" type="text" class="anket_input" id="a24" size="8" /></td>
    <td align="center" valign="top"><input name="a32" type="text" class="anket_input" id="a32" size="10" /></td>
    <td align="center" valign="top"><input name="a35" type="text" class="anket_input" id="a35" size="8" /></td>
    <td align="center" valign="top"><input name="a38" type="text" class="anket_input" id="a38" size="4" /></td>
    <td align="center" valign="top"><input name="a48" type="text" class="anket_input" id="a41" size="6" /></td>
  </tr>
  <tr>
    <td align="center" valign="top"><input name="a11" type="text" class="anket_input" id="a11" size="15" /></td>
    <td align="center" valign="top"><input name="a16" type="text" class="anket_input" id="a16" size="25" /></td>
    <td align="center" valign="top"><input name="a20" type="text" class="anket_input" id="a20" size="6" /></td>
    <td align="center" valign="top"><input name="a30" type="text" class="anket_input" id="a30" size="8" /></td>
    <td align="center" valign="top"><input name="a33" type="text" class="anket_input" id="a33" size="10" /></td>
    <td align="center" valign="top"><input name="a36" type="text" class="anket_input" id="a36" size="8" /></td>
    <td align="center" valign="top"><input name="a39" type="text" class="anket_input" id="a39" size="4" /></td>
    <td align="center" valign="top"><input name="a49" type="text" class="anket_input" id="a42" size="6" /></td>
  </tr>
  <tr>
    <td align="center" valign="top"><input name="a12" type="text" class="anket_input" id="a12" size="15" /></td>
    <td align="center" valign="top"><input name="a17" type="text" class="anket_input" id="a17" size="25" /></td>
    <td align="center" valign="top"><input name="a22" type="text" class="anket_input" id="a22" size="6" /></td>
    <td align="center" valign="top"><input name="a31" type="text" class="anket_input" id="a31" size="8" /></td>
    <td align="center" valign="top"><input name="a34" type="text" class="anket_input" id="a34" size="10" /></td>
    <td align="center" valign="top"><input name="a37" type="text" class="anket_input" id="a37" size="8" /></td>
    <td align="center" valign="top"><input name="a47" type="text" class="anket_input" id="a40" size="4" /></td>
    <td align="center" valign="top"><input name="a50" type="text" class="anket_input" id="a43" size="6" /></td>
  </tr>
  <tr>
    <td align="center" valign="top"><input name="a13" type="text" class="anket_input" id="a13" size="15" /></td>
    <td align="center" valign="top"><input name="a18" type="text" class="anket_input" id="a18" size="25" /></td>
    <td align="center" valign="top"><input name="a23" type="text" class="anket_input" id="a23" size="6" /></td>
    <td align="center" valign="top"><input name="a25" type="text" class="anket_input" id="a25" size="8" /></td>
    <td align="center" valign="top"><input name="a26" type="text" class="anket_input" id="a26" size="10" /></td>
    <td align="center" valign="top"><input name="a27" type="text" class="anket_input" id="a27" size="8" /></td>
    <td align="center" valign="top"><input name="a28" type="text" class="anket_input" id="a28" size="4" /></td>
    <td align="center" valign="top"><input name="a29" type="text" class="anket_input" id="a29" size="6" /></td>
  </tr>
  </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>2.2. Гадаад хэлний мэдлэг </td>
  </tr>
  <tr>
    <td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
      <tr>
        <td width="20%" align="right" valign="top">Англи</td>
        <td width="5%" align="center" valign="top"><input type="checkbox" name="checkbox2" id="checkbox2" class="anket_checkbox" /></td>
        <td width="20%" align="right" valign="top">Орос</td>
        <td width="5%" align="center" valign="top"><input type="checkbox" name="checkbox2" id="checkbox2" class="anket_checkbox" /></td>
        <td width="20%" align="right" valign="top">Хятад</td>
        <td width="5%" align="center" valign="top"><input type="checkbox" name="checkbox2" id="checkbox2" class="anket_checkbox" /></td>
        <td width="20%" align="right" valign="top">Солонгос</td>
        <td width="5%" align="center" valign="top"><input type="checkbox" name="checkbox2" id="checkbox2" class="anket_checkbox" /></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h2>ГУРАВ. Ажил хөдөлмөрийн туршлага</h2></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>3.1. (Одоо эрхэлж буй ажлаасаа эхлэн бичнэ үү)</td>
  </tr>
  <tr>
    <td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
      <tr>
        <td align="center">&nbsp;
          Байгууллагын нэр</td>
        <td align="center">&nbsp;
          Бизнесийн төрөл</td>
        <td align="center">Эрхэлж байсан албан    тушаал</td>
        <td align="center">Ажилд орсон огноо</td>
        <td align="center">Ажлаас гарсан огноо</td>
        <td align="center">Сарын цалин /төг /</td>
      </tr>
      <tr>
        <td align="center" ><input type="text" name="a410" id="a86" class="anket_input"></td>
        <td align="center" ><input type="text" name="a411" id="a87" class="anket_input"></td>
        <td align="center" ><input type="text" name="a60" id="a80" class="anket_input" /></td>
        <td align="center" ><input name="a412" type="text" class="anket_input" id="a89" size="8"></td>
        <td align="center" ><input name="a73" type="text" class="anket_input" id="a84" size="8" /></td>
        <td align="center" ><input type="text" name="a74" id="a88" class="anket_input" /></td>
      </tr>
      <tr>
        <td align="center" ><input type="text" name="a51" id="a67" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a56" id="a73" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a61" id="a81" class="anket_input" /></td>
        <td align="center" ><input name="a65" type="text" class="anket_input" id="a82" size="8" /></td>
        <td align="center" ><input name="a72" type="text" class="anket_input" id="a83" size="8" /></td>
        <td align="center" ><input type="text" name="a75" id="a85" class="anket_input" /></td>
      </tr>
      <tr>
        <td align="center" ><input type="text" name="a53" id="a68" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a57" id="a75" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a62" id="a76" class="anket_input" /></td>
        <td align="center" ><input name="a66" type="text" class="anket_input" id="a77" size="8" /></td>
        <td align="center" ><input name="a71" type="text" class="anket_input" id="a78" size="8" /></td>
        <td align="center" ><input type="text" name="a76" id="a79" class="anket_input" /></td>
      </tr>
      <tr>
        <td align="center" ><input type="text" name="a54" id="a51" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a58" id="a52" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a63" id="a53" class="anket_input" /></td>
        <td align="center" ><input name="a67" type="text" class="anket_input" id="a54" size="8" /></td>
        <td align="center" ><input name="a70" type="text" class="anket_input" id="a55" size="8" /></td>
        <td align="center" ><input type="text" name="a41" id="a56" class="anket_input" /></td>
      </tr>
      <tr>
        <td align="center" ><input type="text" name="a55" id="a69" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a59" id="a70" class="anket_input" /></td>
        <td align="center" ><input type="text" name="a64" id="a71" class="anket_input" /></td>
        <td align="center" ><input name="a68" type="text" class="anket_input" id="a72" size="8" /></td>
        <td align="center" ><input name="a69" type="text" class="anket_input" id="a45" size="8" /></td>
        <td align="center" ><input type="text" name="a46" id="a74" class="anket_input" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Байгууллагын удирдах    албан тушаалтан</td>
  </tr>
  <tr>
    <td><table border="1" cellspacing="0" cellpadding="3" width="100%" class="anket_table">
      <tr>
        <td width="120">Нэр</td>
        <td width="300">Албан тушаалтан</td>
        <td width="100" align="center">Утас</td>
        <td valign="top">Ажлаас гарсан шалтгаан</td>
      </tr>
      <tr>
        <td align="center"><input type="text" name="a420" id="a63" class="anket_input"></td>
        <td align="center"><input name="a421" type="text" class="anket_input" id="a64" size="40"></td>
        <td align="center"><input name="a422" type="text" class="anket_input" id="a65" size="12"></td>
        <td align="center" valign="top"><input name="a423" type="text" class="anket_input" id="a66" size="48"></td>
      </tr>
      <tr>
        <td align="center"><input type="text" name="a52" id="a59" class="anket_input" /></td>
        <td align="center"><input name="a78" type="text" class="anket_input" id="a60" size="40" /></td>
        <td align="center"><input name="a80" type="text" class="anket_input" id="a61" size="12" /></td>
        <td align="center" valign="top"><input name="a82" type="text" class="anket_input" id="a62" size="48" /></td>
      </tr>
      <tr>
        <td align="center"><input type="text" name="a77" id="a46" class="anket_input" /></td>
        <td align="center"><input name="a79" type="text" class="anket_input" id="a50" size="40" /></td>
        <td align="center"><input name="a81" type="text" class="anket_input" id="a57" size="12" /></td>
        <td align="center" valign="top"><input name="a42" type="text" class="anket_input" id="a58" size="48" /></td>
      </tr>
      <tr>
        <td align="center"><input type="text" name="a40" id="a44" class="anket_input" /></td>
        <td align="center"><input name="a45" type="text" class="anket_input" id="a49" size="40" /></td>
        <td align="center"><input name="a43" type="text" class="anket_input" id="a47" size="12" /></td>
        <td align="center" valign="top"><input name="a44" type="text" class="anket_input" id="a48" size="48" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>3.2. Тогтвор суурьшилтай ажиллах жил  </td>
  </tr>
  <tr>
    <td>
      <select name="select" id="select" class="anket_select">
        <option>1 жил хүртэл</option>
        <option>1–3 жил хүртэл</option>
        <option>3–аас дээш жил</option>
        </select>
      </td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" name="checkbox" id="checkbox" class="anket_checkbox">
      Уг нүдийг сонгож дээрхи мэдээллийг үнэн зөв бөглөсөнөө баталгаажуулна уу.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
    
    <input type="image" src="/images/apply_mn.gif" name="apply" id="apply" style="border:0px;" />
    <input type="submit" name="button" id="button" value="     <?=mbmShowByLang(array('mn'=>'Анкетыг илгээх','en'=>'Send anket'))?>     " style="display:none;" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?
}
?>