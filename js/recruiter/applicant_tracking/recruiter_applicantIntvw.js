var jobRefId, jobName, candRefId, candName, Intvwdate, IntvwStartTime, IntvwEndTime, candPriIntvwDateTime, candPriIntvwTimezone, candPriIntvwLocation, candPriInterviewer, Recruiter, RecruiterEmail, Emailsubject, EmailBody;

$(function(){
    var j = jQuery.noConflict();
    j('#editor').wysiwyg();    
    j('.input-group.date').datepicker({ multidate: false, autoclose: true, todayHighlight: true, startDate: "-Infinity", format: "dd-mm-yyyy" });
    
    //Move candidate to Placement stage.
	j("button#Intvwstage-updateBtn").click(function(event) {
        
        jobRefId = j("#intvwJobRefId").val();
        jobName = j("#intvwJobName").val();
        candRefId = j("#intvwCandidateId").val();
        candName = j("#intvwCandidateName").val();
        Intvwdate = j("#intvwPrimaryDate").val();
        IntvwStartTime = j("#intvwPrimaryStartTime").val();
        IntvwEndTime = j("#intvwPrimaryEndTime").val();
        candPriIntvwDateTime = Intvwdate.split("-").reverse().join("-") + " " + IntvwStartTime + " to " + IntvwEndTime;
        candPriIntvwTimezone = j("#intvwPrimarytimeZone :selected").text();
        candPriIntvwLocation = j("#intvwPrimaryLocation").val();
        candPriInterviewer = j("#intvwPriminterviewer").val();
        Recruiter = j("#intvwRecruiterName").val();
        RecruiterEmail = j("#intvwRecruiterEmail").val();
                
        var btnVal = j(this).html();
        j(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        if( Intvwdate.length != 0 && IntvwStartTime != "00:00" && IntvwEndTime != "00:00" && candPriIntvwTimezone.length != 0
        && candPriIntvwLocation.length !=0 && candPriInterviewer !=0 ) {
            
            j('#collapseCandidateEmail').collapse('show');
            j('#collapseCandidateEmail').on('shown.bs.collapse', function () {
                j("button#Intvwstage-updateBtn").html( btnVal );                
                j("#editor").html( j('#inputintvwtmpl').html().replace('{candidate_name}', candName).replace('{job_title}', jobName).replace('{employer_name}', Recruiter).replace('{interview_datetime}', Intvwdate.split("-").join("-") + " " + IntvwStartTime + "hrs to " + IntvwEndTime + "hrs " + candPriIntvwTimezone).replace('{employer_email}', RecruiterEmail).replace('{interview_location}', candPriIntvwLocation).replace('{employer_name}', Recruiter) );                
            });
        } else {
            alert("Please fill all the important fields");
            j("button#Intvwstage-updateBtn").html(btnVal).removeAttr("disabled");
            return false;
        }
	});
    j('#IntvwstageUpdateModal').on('hidden.bs.modal', function (e) { history.back(); });
    
    j("button#btnSendEmail").click(function(event) {        

        j(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        jobRefId = j("#intvwJobRefId").val();
        jobName = j("#intvwJobName").val();
        candRefId = j("#intvwCandidateId").val();
        candName = j("#intvwCandidateName").val();
        Intvwdate = j("#intvwPrimaryDate").val();
        IntvwStartTime = j("#intvwPrimaryStartTime").val();
        IntvwEndTime = j("#intvwPrimaryEndTime").val();
        candPriIntvwDateTime = Intvwdate.split("-").reverse().join("-") + " " + IntvwStartTime + " to " + IntvwEndTime;
        candPriIntvwTimezone = j("#intvwPrimarytimeZone :selected").text();
        candPriIntvwLocation = j("#intvwPrimaryLocation").val();
        candPriInterviewer = j("#intvwPriminterviewer").val();
        Recruiter = j("#intvwRecruiterName").val();
        RecruiterEmail = j("#intvwRecruiterEmail").val();
        Emailsubject = j("#candidEMailSubject").val();
        EmailBody = j('#editor').html();
        var chgCandStage_url = j("#applnInterviewAction").val();
        
        // process the form
        j.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : chgCandStage_url, // the url where we want to POST
            data        : { 'candidateRefId' : candRefId, 'candidateJobRefId' : jobRefId, 'cand_prim_intvwDateTime' : candPriIntvwDateTime, 'cand_prim_intvwtimezone' : candPriIntvwTimezone, 'cand_prim_location' : candPriIntvwLocation, 'cand_prim_interviewer' : candPriInterviewer, 'cand_email_subject' : Emailsubject, 'cand_email_Body' : EmailBody, 'rec_emailaddress' : RecruiterEmail }, 
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(':');
            if(response[0] == "success") { 
                j("#IntvwstageUpdateModal").modal('show');
                j(".modal-title").html(response[1]);
                j("button#Intvwstage-updateBtn").removeAttr("disabled");
            }
        })
        .fail(function(data) {
            j(".modal-title").text("Something went wrong, Please try again!.");
        });
    });
    
    // When Recruiter wants to modify the appointment
    j("button#btnResetEmail").click(function(event) {
        Emailsubject = j("#candidEMailSubject").val();
        EmailBody = escape(j('#editor').html());
        Emailsubject = EmailBody = '';
        j('#collapseCandidateEmail').collapse('toggle');
        j('#collapseCandidateEmail').on('hidden.bs.collapse', function () {
            j("button#Intvwstage-updateBtn").removeAttr("disabled");
        });
    });
});