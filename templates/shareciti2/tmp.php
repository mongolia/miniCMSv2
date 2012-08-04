<div style="width:670px; margin:0px auto; padding-left:155px; padding-right:40px; background-image:url(templates/shareciti2/images/top.jpg); background-repeat:no-repeat; background-position:top;">
  <table width="665" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="20">&nbsp;</td>
    </tr>
    <tr>
      <td height="77"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><a href="index.php"><img src="templates/shareciti2/images/logo.png" alt="share.citi.mn" width="154" height="46" hspace="15" border="0" /></a></td>
          <td width="285">
          	<div><img src="templates/shareciti2/images/login_top.png" width="285" height="11" alt="a" /></div>
            <div style="background-color:#FFF; padding-left:10px; padding-right:10px;">
            <?
            if($_SESSION['lev'] == 0){
			?><form name="form1" method="post" action="index.php?action=userLogin&amp;url=aHR0cDovL3NoYXJlLmNpdGkubW4v" style="margin:0px;">
            <input size="18" name="username" id="username" type="text" style="padding:3px;">
            <input size="18" name="password" id="password" autocomplete="off" type="password" style="padding:3px;"><br />
            <a href="index.php?module=users&amp;cmd=recover_pw" style="color:#737373;">Нууц үг сэргээх</a> | 
		  <a href="index.php?module=users&amp;cmd=registration" style="color:#737373;">Бүртгүүлэх</a>
            <input name="loginButton" class="login_button" id="loginButton" value="Нэвтрэх" type="submit" style="font-weight:bold; color:#000;">
            </form><?
			}else{
			?><div style="color:#333333; text-align:center;">Сайн байна уу <strong><?=$_SESSION['user']['username']?></strong>.
				<br />
				<br />
				<a href="index.php" style="color:#333333;">Нүүр</a> | 
				<a href="index.php?module=fileshare&amp;cmd=myfiles" style="color:#333333;">Миний файл</a> | 
                <a href="index.php?module=users&amp;cmd=profile" style="color:#333333;">Хувийн мэдээлэл</a> | 
                <a href="index.php?action=logout" style="color:#333333;">Гарах</a>
				</div><?
			}
			?>
            </div>
          	<div><img src="templates/shareciti2/images/login_bottom.png" width="285" height="11" alt="a" /></div>
          </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><img src="templates/shareciti2/images/content_top.png" width="665" height="13" alt="share.citi.mn" /></td>
    </tr>
    <tr>
      <td style="background-color:#FFF;
      			 border-bottom:1px solid #c9e1ff;
                 border-left:1px solid #c9e1ff;
                 border-right:1px solid #c9e1ff;
                 padding-left:10px;
                 padding-right:10px;
                 padding-bottom:10px;">  <?

					$buf_actions = '<div id="error">';

					switch($_GET['action']){
						case 'delete':
							$buf_actions .=  'Файлыг устгав.';
						break;
						case 'error':
							$buf_actions .=  'Файл олдсонгүй.';
						break;
					}
					$buf_actions .= '</div>';

					if(strlen($_SERVER['QUERY_STRING'])<4 || $_GET['action'] == 'logout'){
						mbm_include_file("templates/".TEMPLATE."/home.php");
					}elseif(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
						mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
					}else{
						if(isset($_GET['k'])){
							if($DB->mbm_check_field('key',$_GET['k'],'fileshare')==1){
								mbm_include_file("modules/fileshare/dl.php");
							}else{
								echo mbmError('Файл олдсонгүй...');
							}
						}else{
							
							if(isset($_GET['action'])){
								mbmError( $buf_actions);
							}
					
					  }
					}
	if(strlen($_SERVER['QUERY_STRING'])<4 || $_GET['action'] == 'logout'){
					  ?>
       <div style="margin-top:20px; width:642px; height:76px; background-image:url(templates/shareciti2/images/footer_steps.jpg); background-repeat:no-repeat; color:#4a4a4a;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="22" height="76">&nbsp;</td>
              <td width="131" align="center"><br />
              <span style="color:#2cbb00;">Citi Share</span>-т нэвтрэх (бүртгүүлэх) </td>
              <td width="35">&nbsp;</td>
              <td width="131" align="center"><br />
              <span style="color:#ff0000;">Citi Share</span>-т байрлуулах файлаа сонгож, <br />
              upload хийх </td>
              <td width="33">&nbsp;</td>
              <td width="131" align="center"><br />
              Файл татаж авах холбоосыг хүлээн авах </td>
              <td width="35">&nbsp;</td>
              <td align="center"><br />
              Холбоосыг файл татаж авах хүндээ дамжуулах </td>
            </tr>
          </table>
      </div>
      <?
	}
	  ?>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="color:#333333;">
      <div style="width:250px; float:right; text-align:right;"><?=COPYRIGHT?></div>
      	<a href="index.php" style="color:#333333;">Нүүр</a> | 
        <a href="index.php" style="color:#333333;">Файл оруулах</a> | 
        <a href="index.php?module=fileshare&amp;cmd=myfiles" style="color:#333333;">Миний файлууд</a></td>
    </tr>
  </table>
</div>