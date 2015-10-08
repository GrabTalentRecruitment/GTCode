$(function(){
    // Global Variables
    var window_url = window.location.href;
    var btnText = $('#button-job-create').text();
            
    $('#editor').wysiwyg();
    /** Do not allow characters in Current Monthly Salary, Expected Monthly Salary & Total Work Experience fields **/
    $('#inputJobMinSalary, #inputJobMaxSalary').unbind('keyup change input paste').bind('keyup keypress change input paste',function(e){        
        return !(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46);
    });
    
    // If Video is uploaded by Recruiter then save it before loading.
    $('input[type=file]').on('change',function(){
        var formvidpost_url = window_url.replace('/job_edit','/uploadFile');
        var file_data = $('#userfile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        form_data.append('inputJobTitle', $('#inputJobTitle').val());
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : formvidpost_url, // the url where we want to POST
            data        : form_data,
            dataType    : 'text',  // what to expect back from the PHP script, if anything
            cache       : false,
            contentType : false,
            processData : false,
            crossDomain : true 
        }).done(function(data) {
            var response = data.split(';');
            document.getElementById("response").innerHTML = response[1];
        })
        .fail(function(data) {});
    });
    
    // process the form
    $('form').submit(function(event) {

        if( $('#response').html() != null ) {
            var filename = $('#response').html();    
        } else {
            var filename = '';
        }
        
        var formsubmit_url = window_url.replace('/job_edit','/job_update');
        $('#button-job-create').html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled","disabled");
        
        if($('#inputJobMinSalCurrCode').val() == 0) {
            $("#getCode").html("Please select all the mandatory fields");
            $("#getMsgModal").modal('show');
            $('#button-job-create').html(btnText).removeAttr("disabled");                        
            return false;
        } else {
            
            var escapeJobDesc = escape($('#editor').html());
            var formData = $( this ).serialize() + '&inputJobDescription=' + escapeJobDesc + '&inputFileUploadname=' + filename;
            
            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : formsubmit_url, // the url where we want to POST
                data        : formData,
                crossDomain : true 
            })
            .done(function(data) {
                var response = data.split(';');                
                if(response[0] == "failure") {
                    $("#getCode").html(response[1]);
                    $("#getMsgModal").modal('show');
                    $('#button-job-create').html(btnText).removeAttr("disabled");
    			} else {
                    var successrep = response[0].split(':');
                    $("#getCode").html(response[1]);
                    $("#getMsgModal").modal('show');
                    $('#button-job-create').html(btnText).removeAttr("disabled");
                    setTimeout(function() { 
                        window.location=window_url.replace('/job_edit','/job'); 
                    }, 2000 );
                }
            })
            .fail(function(data) {
                $("#getCode").html("Something went wrong, Please try again!.");
                $("#getMsgModal").modal('show');
                $('#button-job-create').html(btnText).removeAttr("disabled");                                
            });
        }
        
        event.preventDefault();
    });
});