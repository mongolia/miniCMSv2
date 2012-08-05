<?php

if(isset($_POST['id'])){
    $data_result['survey_id'] = $_POST['id']; 
    $data_result['survey_answer_id'] = $_POST['answer_id']; 
    $data_result['ip'] = getenv("REMOTE_ADDR"); 
    $data_result['date_added'] = mbmTime(); 
    $data_result['session_id'] = session_id(); 
    $data_result['session_time'] = time(); 
    
    $DB->mbm_insert_row($data_result, 'survey_results');
}
    $txt .= surveyResultDivBySurveyId($_GET['sid']);
