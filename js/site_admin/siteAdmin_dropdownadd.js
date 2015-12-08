$(function() {
    var JSonString = "";
    $('#btn_savedropdownitem').on('click', function (event) {
        $('#btn_savedropdownitem').css('display','none');
        var tmp = $('#menudropDowntblItemid').val().split(',');
        for(var i=0; i < tmp.length; i++) {
            JSonString += "'" + tmp[i] + "':'" + $("#input"+tmp[i]).val() +"',";
        }
        JSonString += "'tableName':'" + $('#menudropDowntblName').val();
        $.ajax({
            type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url     : $('#menuDropdownaddURL').val(), // the url where we want to POST
            data    : {JSonString},
            cache   : false
        })
        .done(function(data) {
            var response = data.split(';');
            if(response[0] == "success") {
                var success_resp = response[1].split(':');
                $("#modal-error-msg").css("display","inline-block").html(success_resp[0]).delay(1000).fadeOut('slow');                
                setTimeout(function() { window.location = success_resp[1]; }, 2000 );
            } else {
                $("#modal-error-msg").css("display","inline-block").html(response[1]).delay(1000).fadeOut('slow');
                $('#btn_savedropdownitem').css('display','inline-block');
                return false;
            }
        })
        .fail(function(data) {
            $("#modal-error-msg").css("display","inline-block").html("Something went wrong, Please try again!.");
        });
        
    });
       
});