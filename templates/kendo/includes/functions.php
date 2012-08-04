<?
function printUserFormDiv() {
		$buf = '<div id="bodyDivLayout" name="bodyDivLayout" class="divLayout" ';
			$buf .= 'onclick="alert(\''.mbmShowByLang(array('en'=>'Please verify your age','mn'=>'Төрсөн огноогоо оруулна уу')).'!!!\')" ';
			//onclick="divLayoutHide(\'adultContent\')"
		$buf .= '></div>
					<div id="adultContent" name="adultContent">						
						<img src="http://www.apu.mn/images/news/18apu.jpg" hspace="20" /><br><br>
						<h2>'.mbmShowByLang(array(
												  'mn'=>'ЭНЭХҮҮ ХЭСЭГТ НЭВТРЭХИЙН ТУЛД <br>ТА 18 НАС ХҮРСЭН БАЙХ ЁСТОЙ',
												  'en'=>'YOU HAVE TO BE OVER<br />18 TO ENTER THIS SECTION'
												  )).'</h2>
						<h3>'.mbmShowByLang(array(
												  'mn'=>'ТӨРСӨН ОН САР ӨДРӨӨ ОРУУЛНА УУ',
												  'en'=>'ENTER BIRTH YEAR AND DATE'
												  )).'</h3>
						'.mbmShowByLang(array(
												  'mn'=>'Жишээ нь',
												  'en'=>'For example '
												  )).'  (19820519)<br>
						<input type="text" onfocus="this.value=\'\'" onblur="if(this.value==\'\') this.value=\'YYYY\';" value="YYYY" id="a_year" name="a_year" class="adultContentInput" size="4" maxlength="4" style="width:82px;" />
						<input type="text" onfocus="this.value=\'\'" onblur="if(this.value==\'\') this.value=\'MM\';" value="MM" id="a_month" name="a_month" class="adultContentInput" size="2" maxlength="2" />
						<input type="text" onfocus="this.value=\'\'" onblur="if(this.value==\'\') this.value=\'DD\';" value="DD"  id="a_day" name="a_day" class="adultContentInput" size="2" maxlength="2" /><br><br>
						'.mbmShowByLang(array(
												  'mn'=>'НАМАЙГ САНАХ',
												  'en'=>'REMEMBER ME'
												  )).'  <input type="checkbox" checked="checked" value="1" id="remember_me" name="remember_me" class="adultContentCheckbox" />
						
						<div style="padding-top:20px; padding-bottom:20px; display:block;">
							<img src="http://www.apu.mn/images/news/18enter_'.$_SESSION['ln'].'.jpg" style="cursor:pointer;" id="confirm18" />
						</div>
						<div style="border-top:1px solid #c0c0c0; padding-top:15px;">
							'.mbmShowByLang(array(
												  'mn'=>'АПУ ХК нь хариуцлагатай зохистой хэрэглээг эрхэмлэдэг',
												  'en'=>'APU JSC endorses responsible and moderate drinking.'
												  )).'
						</div>
					</div>
				</div>';
		return $buf;
	}
?>