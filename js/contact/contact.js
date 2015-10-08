$(function(){
    // process the form
    $('form').submit(function(event) {
        $('#button-contact-send').html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled","disabled");
        var post_url = window.location.href;        
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : post_url+'/contact_form', // the url where we want to POST
            data        : $( this ).serialize(),
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(';');
            if(response[0] == "success") {
                $('.alert-success').css("display","block").html(response[1]);
                $('#button-contact-send').html("Send").removeAttr("disabled");
                $("form").trigger('reset');
			} else if(response == "error") {
                $('.alert-danger').css("display","block").html(response[1]);
                $('#button-contact-send').html("Send").removeAttr("disabled");
            }
            $('.alert').delay(3000).fadeOut('slow').on('hide', function(){});
        })
        .fail(function(data) {
            alert("Something went wrong, Please try again!.");
        });
        
        event.preventDefault();
    });
});