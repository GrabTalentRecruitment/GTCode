$(function(){
    var btnText = $('#button-client-create').text();
    // process the form
    $('form').submit(function(event) {
        $('#button-client-create').html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled","disabled");
        var formData = $( this ).serialize();
        
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : $('#inputClientUsrCreateURL').val(), // the url where we want to POST
            data        : formData,
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(';');
            if(response[0] == "failure") {                    
                $("#getCode").html(response[1]);
                $("#getMsgModal").modal('show');
                $('#button-client-create').html(btnText).removeAttr("disabled");
			} else {
                var successrep = response[0].split(':');
                $("#getCode").html(response[1]);
                $("#getMsgModal").modal('show');
                $('#button-client-create').html(btnText).removeAttr("disabled");
                setTimeout(function() { window.location = $('#inputClientredirectURL').val() + "/" + successrep[1]; }, 2000 );                
            }
        })
        .fail(function(data) {
            $("#getCode").html("Something went wrong, Please try again!.");
            $("#getMsgModal").modal('show');
            $('#button-client-create').html(btnText).removeAttr("disabled");
        });
        
        event.preventDefault();
    });
});