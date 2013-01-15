<script language="javascript"><?
//print_r($_POST);
$nas = date("Y")-$_POST['y'];
if($_POST['y']>1900){
	$is_valid_year = 1;
}

if($nas>=18 && $is_valid_year == 1){
	//echo 'ok '.$nas;
	echo "$('#bodyDivLayout').hide(); $('#adultContent').hide();";
	if($_POST['r'] == 1){
	}
	$_SESSION['adultVerified'] = 1;
}else{
	//echo 'balchir bndaa '.$nas;
	//$jumpUrl = " window.location='".base64_decode($_POST['url'])."';";
	$jumpUrl = " window.location='index.php';";
	
	if($nas<18){
		echo "alert('".mbmShowByLang(array('en'=>'You have to be over 18 to enter this site.','mn'=>'Та уг мэдээллийг харахын тулд 18 нас хүрсэн байх шаардлагатай'))."'); ".$jumpUrl;
	}elseif($is_valid_year != 1){
		echo "alert('".mbmShowByLang(array('en'=>'Please enter valid year.','mn'=>'Төрсөн огноогоо зөв оруулна уу'))."'); ".$jumpUrl;
	}else{
		echo "alert('".mbmShowByLang(array('en'=>'You have to be over 18 to enter this site.','mn'=>'Та уг мэдээллийг харахын тулд 18 нас хүрсэн байх шаардлагатай'))."'); ".$jumpUrl;
	}
}
?>
//divLayoutShow('adultContent');
//$('#bodyDivLayout').hide();
</script>