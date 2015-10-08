$(function(){
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
    
    var tmp_url = window.location.href;
    var post_url = tmp_url.replace('http://','https://');
    
    // Profile Update
    $('form').submit(function(event) {
        var fname = $('#inputCandFirstname').val();
        var lname = $('#inputCandLastname').val();
        var cand_phone = $('#inputPhonenumber').val();
        var updProfbtn = $('button#profile-updateBtn').text();

        if( $.trim(fname).length == 0 || $.trim(lname).length == 0 || $.trim(cand_phone).length == 0 ) {
            $("#getCode").html("Please fill all mandatory fields");
            $("#getMsgModal").modal('show');
            $('button#profile-updateBtn').html( updProfbtn ).removeAttr("disabled");
        } else {
            $('button#profile-updateBtn').html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
            // process the form
            
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : post_url.replace('/profile','/profile_update'), // the url where we want to POST
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
                $('button#profile-updateBtn').html( updProfbtn ).removeAttr("disabled");
            })
            .fail(function(data) {
                $("#getCode").html("Something went wrong, Please try again!.");
                $("#getMsgModal").modal('show');
                $('button#profile-updateBtn').html( updProfbtn ).removeAttr("disabled");
            });
        }
        event.preventDefault();        
    });
        
    $("#getMsgModal").on('hidden.bs.modal',function(){
        window.location.reload();
    });
        
    //Resume Download / View button.
	$("button#resumeDownlod").click(function(e) {
        e.preventDefault();  //stop the browser from following
        //window.open(post_url+"/candidate_resumedownload/"+<?php //echo "'".$resume."'"; ?>);
	});
    
    //Skill add window.
	$("button#password-btn-save").click(function() {
        var candidate_email = $("input[name='candidate-profile-email']").val();
        var newpassword = $("input[name='newPassword']").val();
        var confirmnewpassword = $("input[name='confirmnewPassword']").val();
        if(newpassword == confirmnewpassword) {
            $(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : post_url.replace('/profile','/change_candidate_password'), // the url where we want to POST
                data        : {'candidate-email' : candidate_email, 'newpassword' : newpassword}, // our data object
                crossDomain : true 
            })
            .done(function(data) {
                if(data == "success") { 
                    $("#modal-error-msg").text("Password changed successfully, you will be redirected after 2secs..");
                    setTimeout(function() { window.location = post_url.replace('/profile',''); }, 2000 );
                }
                $(this).html( $(this).text() ).removeAttr("disabled");
            })
            .fail(function(data) {
                $("#getCode").html("Something went wrong, Please try again!.");
                $("#getMsgModal").modal('show');
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
    
    $('#chgpasswdModal').on('hidden.bs.modal',function(){ window.location = post_url.replace('/profile',''); });
    
    //Change Email address window.
	$("button#chgemail-btn-save").click(function() {
        var candidate_email = $("input[name='candidate-profile-email']").val();
        var newEmail = $("input[name='newEmailAddress']").val();
        $(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : post_url.replace('/profile','/change_candidate_email'), // the url where we want to POST
            data        : {'oldEmailAddress': candidate_email ,'newEmailAddress' : newEmail}, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            if(data == "success") {
                $("#chgEmailmodal-error-msg").html("Your email was changed successfully. This window will close automatically in 3secs for security reasons!!").addClass("alert alert-success");
                setTimeout(function() { window.location = post_url.replace('/profile',''); }, 3000 );
            } else {
                $("#chgEmailmodal-error-msg").html("Something went wrong, Please try again!.").addClass("alert alert-danger");
            }
        })
        .fail(function(data) {
            $("#chgEmailmodal-error-msg").html("Something went wrong, Please try again!.").addClass("alert alert-danger");
        });
        event.preventDefault();
	});
    $('#resumeuploadModal').on('hidden.bs.modal', function(){
        window.location.reload(true);        
    });
});