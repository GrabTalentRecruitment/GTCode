$(function(){
    // process the form
    $('form').submit(function(event) {
        var curr_lang = $('#curr_lang').val();
        var post_url = window.location.href+'/siteadmin_login';        
        var formData = {
            'emailaddress'  : $('input[name=emailaddress]').val(),
            'password'      : $('input[name=password]').val()
        };
        $('#button-sign-in').html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled","disabled");
        
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : post_url, // the url where we want to POST
            data        : formData, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(',');
            if(response[1] == "Please enter valid Username or Password") {
                $("#getCode").html(response[1]);
                $("#getMsgModal").modal('show');
                $('#button-sign-in').html("Sign-in").removeAttr("disabled");
			} else if(response[1] == "Invalid Username or Password") {                
                $("#getCode").html(response[1]);
                $("#getMsgModal").modal('show');
                $('#button-sign-in').html("Sign-in").removeAttr("disabled");
            } else {
                window.location = response[1];
            }
        })
        .fail(function(data) {
            $("#getCode").html("Something went wrong, Please try again!.");
            $("#getMsgModal").modal('show');
        });
        
        event.preventDefault();
    });
});