var jobRefId, jobName, candRefId, candName, Recruiter, RecruiterEmail, Emailsubject, OfferEmailBody, chgCandStage_url;

$(function(){
    var j = jQuery.noConflict();
    j('#editor').wysiwyg();    
    j('.input-group.date').datepicker({ multidate: false, autoclose: true, todayHighlight: true, startDate: "-Infinity", format: "dd-mm-yyyy" });
    
    jobRefId = j("#intvwJobRefId").val();
    jobName = j("#intvwJobName").val();
    candRefId = j("#intvwCandidateId").val();
    candName = j("#intvwCandidateName").val();
    candPriInterviewer = j("#intvwPriminterviewer").val();
    Recruiter = j("#intvwRecruiterName").val();
    RecruiterEmail = j("#intvwRecruiterEmail").val();
    Emailsubject = j("#candidEMailSubject").val();
    chgCandStage_url = j("#applnOfferAction").val();
    
    j("#editor").html( j('#inputoffertmpl').html().replace('{candidate_name}', candName).replace('{job_title}', jobName).replace('{employer_name}', Recruiter).replace('{employer_email}', RecruiterEmail).replace('{employer_name}', Recruiter) );
    OfferEmailBody = j("#editor").html();
        
    j("button#OffrstgeEmail_updBtn").click(function(event) {
        var btnVal = j(this).html();
        j(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled","disabled");
        
        // process the form
        j.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : chgCandStage_url, // the url where we want to POST
            data        : { 'candidateRefId' : candRefId, 'candidateJobRefId' : jobRefId, 'cand_email_subject' : Emailsubject, 'cand_offeremail_Body' : OfferEmailBody, 'rec_emailaddress' : RecruiterEmail }, 
            crossDomain : true 
        })
        .done(function(data) {
            var response = data.split(':');
            if(response[0] == "success") { 
                j("#OfferstageUpdModal").modal('show');
                j(".modal-title").html(response[1]);
                j("button#Offerstage-updateBtn").removeAttr("disabled");
            }
        })
        .fail(function(data) {
            j(".modal-title").text("Something went wrong, Please try again!.");
        });
    });
    
    j('#OfferstageUpdModal').on('hidden.bs.modal', function (e) { history.back(); });
    
});