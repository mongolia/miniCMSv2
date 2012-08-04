function getPollResult(pollId,target_div){
    $.ajax({
        type: "POST", 
        url: "xml.php?action=poll", 
        data: 'pollId='+pollId,
        complete: function(data){
            $('#myPoll').html(data.responseText);
        }
    });
}
function submitAjaxPoll(pollId, answerId){
//    alert(answerId);
    $.ajax({
        type: "POST", 
        url: "xml.php?action=poll", 
        data: 'pollId='+pollId+'&answer='+answerId+'&answer_it='+$('#answer_it').val(),
        complete: function(data){
            $('#myPoll').html(data.responseText);
        }
    });

}
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
    //    alert('About to submit: \n\n' + queryString); 
    //    $.ajax({
    //        type: "POST", 
    //        url: "xml.php?action=poll", 
    //        data: queryString,
    //        complete: function(data){
    //            $('#myPoll').html('<tr><td>'+data.responseText+'</td></tr>');
    //        }
    //    });
    // alert(2);
    return true; 
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
    //$('#myPoll').html('<tr><td>'+responseText+'</td></tr>');
    alert(4);
    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.'); 
} 

function getAnswer(){
    for (i=0;i<document.pollForm.radios.length;i++) {
        if (document.pollForm.radios[i].checked) {
            return document.pollForm.radios[i].value;
        }
    }
}