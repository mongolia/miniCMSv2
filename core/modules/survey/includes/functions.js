function submitSurvey(id,answer_id){
    $.ajax({
        type: "POST", 
        url: 'xml.php?action=survey&sid='+id, 
        data: "id="+id+"&answer_id="+answer_id,
        complete: function(data){
            $('#survey_'+id).html(data.responseText);
        }
    });

}