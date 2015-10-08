$(function(){
    var jobRefId = $("#JobId").val();
       
    $('#candStepModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var candidaterefCode = button.attr('id');
        var candidName = button.data('whatever');
        var candprevStg = button.attr('title');
        var modal = $(this);
        modal.find('.modal-body input[name="candStepUpd-refCode"]').val(candidaterefCode +','+ candidName +','+ candprevStg);
        if(candprevStg == 'Shortlist') {
            $("button#shortlistBtn").addClass("btn-danger").attr("disabled","disabled");
        } else if(candprevStg == 'Interview') {
            $("button#shortlistBtn, button#InterviewBtn").addClass("btn-danger").attr("disabled","disabled");
        } else if(candprevStg == 'Offer') {
            $("button#shortlistBtn, button#InterviewBtn, button#OfferEmailBtn").addClass("btn-danger").attr("disabled","disabled");
        } else if(candprevStg == 'Placed' || candprevStg == 'Rejected') {
            $( ":button" ).addClass("btn-danger").attr("disabled","disabled");
        }
        $( "button.close" ).removeClass("btn-danger").removeAttr("disabled");
    });
    
    $('#candStepModal').on('hide.bs.modal', function (event) {
        window.location.reload(true);
    });
    
    //Move candidate to Shortlist stage.
	$("button#shortlistBtn").click(function(event) {
        var btnVal = $(this).html();
        var candidate_refCode = $("input[name='candStepUpd-refCode']").val().split(',');
        var chgCandStage_url = $("#applnStepChg_url").val();
        $(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : chgCandStage_url, // the url where we want to POST
            data        : { 'candidateprevStepname' : candidate_refCode[2], 'candidateJobId' : jobRefId, 'candidateRefCode' : candidate_refCode[0], 'candStepname' : 'Shortlist'}, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(':');
            if(response[0] == "success") { 
                 $("#modal-error-msg").html(response[1]);
                 $('#modal-error-msg').delay(1500).fadeOut('slow',function(){ $("button#shortlistBtn").html( btnVal ); $('#candStepModal').modal('toggle'); });
            }
        })
        .fail(function(data) {
            $("#modal-error-msg").text("Something went wrong, Please try again!.");
        });
        event.preventDefault();
	});
    
    //Schedule Interview Stage.
	$("button#InterviewBtn").click(function(event) {
        var btnVal = $(this).html();
        var candidate_refCode = $("input[name='candStepUpd-refCode']").val().split(',');
        $("#modal-error-msg").html('You will now be redirected to Interview scheduling page');
        $('#candStepModal').modal('toggle');
        window.location = $("#applnInterview").val() + "/" + candidate_refCode[0] + "/" + jobRefId; 
        event.preventDefault();
	});
    
    //Move candidate to Offer stage.
	$("button#OfferBtn").click(function(event) {
        var btnVal = $(this).html();
        var candidate_refCode = $("input[name='candStepUpd-refCode']").val().split(',');
        var chgCandStage_url = $("#applnStepChg_url").val();
        $(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : chgCandStage_url, // the url where we want to POST
            data        : { 'candidateprevStepname' : candidate_refCode[2], 'candidateJobId' : jobRefId, 'candidateRefCode' : candidate_refCode[0], 'candStepname' : 'Offer'}, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(':');
            if(response[0] == "success") { 
                 $("#modal-error-msg").html(response[1]);
                 $('#modal-error-msg').delay(1500).fadeOut('slow',function(){ $("button#OfferBtn").html( btnVal ); $('#candStepModal').modal('toggle'); });
            }
        })
        .fail(function(data) {
            $("#modal-error-msg").text("Something went wrong, Please try again!.");
        });
        event.preventDefault();
	});
    
    //Send candidate Offer by email.
	$("button#OfferEmailBtn").click(function(event) {
        var btnVal = $(this).html();
        var candidate_refCode = $("input[name='candStepUpd-refCode']").val().split(',');
        $("#modal-error-msg").html('You will now be redirected to Offer email page');
        $('#candStepModal').modal('toggle');
        window.location = $("#applnOfferURL").val() + "/" + candidate_refCode[0] + "/" + jobRefId; 
        event.preventDefault();
	});
    
    //Move candidate to Placement stage.
	$("button#placementBtn").click(function(event) {
        var btnVal = $(this).html();
        var candidate_refCode = $("input[name='candStepUpd-refCode']").val().split(',');
        var chgCandStage_url = $("#applnStepChg_url").val();
        $(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : chgCandStage_url, // the url where we want to POST
            data        : { 'candidateprevStepname' : candidate_refCode[2], 'candidateJobId' : jobRefId, 'candidateRefCode' : candidate_refCode[0], 'candStepname' : 'Placed'}, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(':');
            if(response[0] == "success") { 
                 $("#modal-error-msg").html(response[1]);
                 $('#modal-error-msg').delay(1500).fadeOut('slow',function(){ $("button#placementBtn").html( btnVal ); $('#candStepModal').modal('toggle'); });
            }
        })
        .fail(function(data) {
            $("#modal-error-msg").text("Something went wrong, Please try again!.");
        });
        event.preventDefault();
	});
    
    // Candidate Reject Modal
    $("button#Reject_btn").click(function (event) {
        
        var candidaterefCode = $(this).attr('name');
        var candprevStg = $(this).attr('title');
        var chgCandReject_url = $("#applnStepChg_url").val();
        if( confirmCandRejFunc() != 0) {
            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : chgCandReject_url, // the url where we want to POST
                data        : { 'candidateprevStepname' : candprevStg, 'candidateJobId' : jobRefId, 'candidateRefCode' : candidaterefCode, 'candStepname' : 'Rejected'}, // our data object
                crossDomain : true
            })
            .done(function(data) {
                var response = data.split(':');
                if(response[0] == "success") { alert( response[1] ); setTimeout(function(){ window.location.reload(true); }, 1000); }
            })
            .fail(function(data) { alert("Something went wrong, Please try again!."); });    
        } else {
            return false;
        }
        
        event.preventDefault();
    });
    
    function confirmCandRejFunc() {
        var x;
        if (confirm('Are you sure to Reject this candidate!\n"Ok" - Yes, "Cancel" - No') == true) { x = 1; } else { x = 0; }
        return x;
    }
    
    //Resume Download / View button.
	$("#resumeDownlod").click(function(e) {
        var filename = $("#resumedownloadURL").val() + $(this).attr('title');
        $("#ResumedownloadModal").find('.modal-header iframe[id="resumedownloadframe"]').attr('src',filename);
        setTimeout(function(){ $('#ResumedownloadModal').modal('hide'); });       
	});
    
});