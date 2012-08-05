<script language="javascript">
mbmSetContentTitle("Add survey");
mbmSetPageTitle('Add survey');
show_sub('menu34');
</script>
<?		
if($mBm!=1 && $modules_permissions['menu']>$_SESSION['lev']){
	die('<div align="center"><font color="red">HACKING ATTEMPT....</font><br /> <a href="http://www.mng.cc">www.mng.cc</a></div>');
}

if(isset($_POST['button'])){
    
//    print_r($_POST);
    
    $data['lang'] = $_SESSION['ln'];
    $data['code'] = $_POST['code'];
    $data['st'] = $_POST['st'];
    $data['question'] = $_POST['question'];
    $data['session_id'] = session_id();
    $data['session_time'] = time();
    
    $DB->mbm_insert_row($data, 'survey');
    
    $survey_id = $DB->mbm_get_field(session_id(),'session_id','id','survey');
    
    foreach($_POST['answers'] as $k=>$v){
        $data_answers['survey_id'] = $survey_id;
        $data_answers['answer'] = $v;
        
        $DB->mbm_insert_row($data_answers,'survey_answers');
        
        unset($data_answers);
    }
    
    echo mbmError('Survey added');
    
    $DB->mbm_query("UPDATE ".$DB->prefix."survey SET session_id='' WHERE id='".$survey_id."'");
    $b = 1;
}

if($b !=1){
?>

<form name="form1" method="post" action="">
<table width="100%" border="0" cellspacing="2" cellpadding="3" class="tblContents">
  <tr class="list_header">
    <td width="50%" >&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f5f5f5">Code:<br>
      <input name="code" type="text" size="45" value="" /></td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f5f5f5">&nbsp;</td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  
  <tr>
    <td bgcolor="#f5f5f5"><?=$lang['main']['status']?>:<br>
      <select name="menu_status">
        <option value="0">
          <?= $lang['status'][0]?>
          </option>
        <option value="1">
          <?= $lang['status'][1]?>
          </option>
      </select></td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f5f5f5">&nbsp;</td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  
  <tr>
    <td bgcolor="#f5f5f5">Question:<br>
      <textarea name="question" cols="45" rows="3" id="question"></textarea></td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f5f5f5">&nbsp;</td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td bgcolor="#f5f5f5">How many answers:<br>
        <select id="answers_total" name="answers_total" onchange="drawAnswers(this.value)">
            <?= mbmIntegerOptions(0, 5); ?>
        </select>
    
    </td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f5f5f5">&nbsp;</td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  <tr class="answer_section" style="display: none;">
    <td bgcolor="#f5f5f5">Answers</td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#f5f5f5" class="answers">
        
    </td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  <tr class="answer_section" style="display: none;">
    <td bgcolor="#f5f5f5">&nbsp;</td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td bgcolor="#f5f5f5"><input type="submit" class="button" name="button" id="button" value="Add"></td>
    <td bgcolor="#f5f5f5">&nbsp;</td>
  </tr>
</table>
</form>
<?php
}
?>
<script type="text/javascript">
    function drawAnswers(total){
        
        $('.answer_section').show();
        if(total == 0){
            alert('select more than 0');
        }
        txt = '';
        
        for(i=0;i<total;i++){
            txt = txt + '<input type="text" name="answers[]" id="answer_'+i+'" value="';
            txt = txt + '" size="45" />';
        }
        
        $('.answers').html(txt);
       
    }
    <?php
    if(isset($_POST['answers_total'])){
        echo 'drawAnswers('.count($_POST['answers']).');';
        foreach($_POST['answers'] as $k=>$v){
            echo "$('#answer_".$k."').val('".addslashes($v)."');\n";
        }
    }
    ?>
</script>