$(function() {
    var e = $("#button-job-update").text();
    $("#editor").wysiwyg(), $("#inputJobMinSalary, #inputJobMaxSalary").unbind("keyup change input paste").bind("keyup keypress change input paste", function(t) {
        return !(8 != t.which && 0 != t.which && (t.which < 48 || t.which > 57) && 46 != t.which)
    }), $("#inputJobCategory").on("change", function(e) {        
        var o = $("#inputjobFunctionUrl").val();
        $.ajax({
            type: "POST",
            url: o,
            data: {
                jobcatId: $(this).children(":selected").attr("id")
            },
            crossDomain: !0
        }).done(function(t) {
            $("#inputJobFunction").empty().append(t)
        }).fail(function() {
            $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!."), $("#button-job-update").html(t).removeAttr("disabled")
        }), e.preventDefault()
    }), $("#inputJobIndustry").on("change", function(e) {
        var o = $("#inputjobSubIndustryUrl").val();
        $.ajax({
            type: "POST",
            url: o,
            data: {
                jobindusId: $(this).children(":selected").attr("id")
            },
            crossDomain: !0
        }).done(function(t) {
            $("#inputJobSubIndustry").empty().append(t)
        }).fail(function() {
            $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!."), $("#button-job-update").html(t).removeAttr("disabled")
        }), e.preventDefault()
    }), $("form").submit(function(t) {
        if (null != $("#response").html()) var o = $("#response").html();
        else var o = "";
        if ($("#button-job-update").html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled", "disabled"), 0 == $("#inputJobMinSalCurrCode").val()) return $("#modal-window").css("display","block").find("#displayMsg").html("Please select all the mandatory fields"), $("#button-job-update").html(e).removeAttr("disabled"), !1;
        var mandSkills = 0;
        mandSkills = $("#inputJobMandatorySkl").val().length;
        if (mandSkills == 0) {
            $("#modal-window").css("display","block").find("#displayMsg").html("Please select all the mandatory fields");
            $("#button-job-update").html(e).removeAttr("disabled");
            return false;
        } else {
            var htmlString = $('#editor').html();
            var a = escape(htmlString),
                n = $(this).serialize() + "&inputJobDescription=" + a;
            $.ajax({
                type: "POST",
                url: $("#inputjobEditUrl").val(),
                data: n,
                crossDomain: !0
            }).done(function(t) {
                var o = t.split(";");
                if ("failure" == o[0]) $("#modal-window").css("display","block").find("#displayMsg").html(o[1]), $("#button-job-update").html(e).removeAttr("disabled");
                else {
                    var a = o[0].split(":");
                    $("#modal-window").css("display","block").find("#displayMsg").html(o[1]), $("#button-job-update").html(e).removeAttr("disabled"), setTimeout(function() {
                        window.location = a[1]
                    }, 2e3)
                }
            }).fail(function() {
                $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!."), $("#button-job-update").html(e).removeAttr("disabled")
            }), t.preventDefault()
        }
    })
});