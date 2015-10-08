$(function(){
    var btnText = $('button#profile-updateBtn').text();
    
    $('#inputPhonenumber').unbind('keyup change input paste').bind('keyup keypress change input paste',function(e){
        var $this = $(this);
        var val = $this.val();
        var valLength = val.length;
        var maxCount = $this.attr('maxlength');
        if(valLength>maxCount){
            $this.val($this.val().substring(0,maxCount));
        }
        return !(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46);
    });
    
    $('form').submit(function(event) {        
        var formsubmit_url = $("#inputprofupdurl").val();
        $('button#profile-updateBtn').html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        $.ajax({
            type        : 'POST',
            url         : formsubmit_url,
            data        : $(this).serialize(),
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(';');
            if(response[0] == "success") { 
                $("#getCode").html(response[1]);
            } else {
                $("#getCode").html(response[1]);
            }
            $("#getMsgModal").modal('show');
        })
        .fail(function(data) {
            $("#getCode").html("Something went wrong, Please try again!.");
            $("#getMsgModal").modal('show');
        });
        event.preventDefault();
    });
    
    $("#getMsgModal").on('hidden.bs.modal',function(){
        window.location.reload();
    });
	$("button#password-btn-save").click(function() {
        var chgPasswd_url = $("#inputchgpasswordurl").val();
        var candidate_email = $("input[name='candidate-profile-email']").val();
        var newpassword = $("input[name='newPassword']").val();
        var confirmnewpassword = $("input[name='confirmnewPassword']").val();
        if(newpassword == confirmnewpassword) {
            $(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
            $.ajax({
                type        : 'POST',
                url         : chgPasswd_url,
                data        : {'employer-email' : candidate_email, 'newpassword' : newpassword},
                crossDomain : true 
            })
            .done(function(data) {
                if(data == "success") { 
                     $("#modal-error-msg").html("Password has been changed successfully, you will be logged out shortly!!");
                     setTimeout(function() { window.location = $("#inputhomeurl").val(); }, 1000 );
                }
                $(this).html($("button#password-btn-save").text()).removeAttr("disabled");
            })
            .fail(function(data) {
                $("#modal-error-msg").text("Something went wrong, Please try again!.");
            });
            event.preventDefault();
        } else {
            $("#modal-error-msg").text("Passwords do not match, please try again!");
            $("input[name^='new-password']").val('');
            $("input[name^='new-confirm-password']").val('');
            $('#modal-error-msg').delay(1000).fadeOut('slow');
            return false;
        }
	});
});