<?php

function showSurvey($code=''){
    global $DB, $DB2, $lang;
    
    $q = "SELECT * FROM ".$DB->prefix."survey WHERE code='".$code."'";
    $r = getSurveyByCode($code);
    
    $buf = '';
    
    if($DB->mbm_num_rows($r) == 1){
        $answers = getSurveyAnswers($DB->mbm_result($r,0,'id'));
        
        $buf .= '<form name="survey_'.$DB->mbm_result($r,0,'id').'" id="survey_'.$DB->mbm_result($r,0,'id').'" class="survey" action="" onsubmit="return false;">';
            $buf .= '<h3>'.$DB->mbm_result($r,0,'question').'</h3>';
            for($i=0; $i<$DB->mbm_num_rows($answers);$i++){
                $buf .= '<div class="surveyAnswer">';
                    $buf .= '<input type="radio" name="survey['.$DB->mbm_result($r,0,'id').']" ';
                    $buf .= 'value="'.$DB->mbm_result($answers,$i,'id').'" ';
                    //if($i == 0) { $buf .= ' checked="checked" '; }
                    $buf .= 'onclick="submitSurvey('.$DB->mbm_result($r,0,'id').','.$DB->mbm_result($answers,$i,'id').')" />';
                    $buf .= $DB->mbm_result($answers,$i,'answer');
                $buf .= '</div>';
            }
//            $buf .= '<input type="submit" name="submitSurvey" value="Send" />';
        $buf .= '</form>';
        
        return $buf;
    }else{
        
        return null;
    }
}

function getSurveyAnswers($survey_id = 0){
    global $DB, $DB2, $lang;
    
    $q = "SELECT * FROM ".$DB->prefix."survey_answers WHERE survey_id='".$survey_id."' ORDER BY id";
    $r = $DB->mbm_query($q);
    
    return $r;
}

function getSurveyById($survey_id=0){
    global $DB, $DB2, $lang;
    
    $q = "SELECT * FROM ".$DB->prefix."survey WHERE id='".$survey_id."' ORDER BY id";
    $r = $DB->mbm_query($q);
    
    return $r;
}

function getSurveyByCode($survey_code=0){
    global $DB, $DB2, $lang;
    
    $q = "SELECT * FROM ".$DB->prefix."survey WHERE code='".$survey_code."' ORDER BY id LIMIT 1";
    $r = $DB->mbm_query($q);
    
//    echo $q;
    return $r;
}

function surveyResultDivBySurveyId($survey_id=0){
    
    global $DB, $DB2, $lang;
    
    $survey = getSurveyById($survey_id);
    $answers = getSurveyAnswers($survey_id);
    
    $total_results = 0;
    $results = array();
    
    for($i=0; $i<$DB->mbm_num_rows($answers);$i++){
        $answers_total = $DB->mbm_num_rows(getSurveyAnswerResults($DB->mbm_result($answers,$i,'id')));
        $results[$DB->mbm_result($answers,$i,'id')] = array(
            'answer'=>$DB->mbm_result($answers,$i,'answer'),
            'total'=>$answers_total
        );
        
        $total_results = $total_results + $answers_total;
        
        unset($answers_total);
    }
    
    $buf = '';
    
    $buf .= '<h3>'.$DB->mbm_result($survey,0,'question').'</h3>';
    foreach($results as  $k=>$v){
        
        $buf .= '<div class="surveyResult">';
            $buf .= $results[$k]['total'].'/'.$total_results;
            $buf .= ' - '.$results[$k]['answer'];
        $buf .= '</div>';
    }
    
    return $buf;
}

function getSurveyAnswerResults($answer_id=0){
    
    global $DB, $DB2, $lang;
    
    $q = "SELECT * FROM ".$DB->prefix."survey_results WHERE survey_answer_id='".$answer_id."' ";
    $r = $DB->mbm_query($q);
    
    return $r;
    
}