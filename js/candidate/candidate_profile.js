$(function() {
    $("#inputPhonenumber").unbind("keyup change input paste").bind("keyup keypress change input paste", function(e) {
        var t = $(this),
            a = t.val(),
            n = a.length,
            l = t.attr("maxlength");
        return n > l && t.val(t.val().substring(0, l)), !(8 != e.which && 0 != e.which && (e.which < 48 || e.which > 57) && 46 != e.which)
    }), $("form").submit(function(e) {
        var t = $("#inputCandFirstname").val(),
            a = $("#inputCandLastname").val(),
            n = $("#inputPhonenumber").val(),
            l = $("button#profile-updateBtn").text();
        0 == $.trim(t).length || 0 == $.trim(a).length || 0 == $.trim(n).length ? ($("#getCode").html("Please fill all mandatory fields"), $("#getMsgModal").modal("show"), $("button#profile-updateBtn").html(l).removeAttr("disabled")) : ($("button#profile-updateBtn").html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled", "disabled"), 
        $.ajax({
            type: "POST",
            url: $("#inputprofupdUrl").val(),
            data: $(this).serialize(),
            crossDomain: !0
        }).done(function(e) {
            var t = e.split(";");
            $("#getCode").html("success" == t[0] ? t[1] : t[1]), $("#getMsgModal").modal("show"), $("button#profile-updateBtn").html(l).removeAttr("disabled")
        }).fail(function() {
            $("#getCode").html("Something went wrong, Please try again!."), $("#getMsgModal").modal("show"), $("button#profile-updateBtn").html(l).removeAttr("disabled")
        })), e.preventDefault()
    }), $("#getMsgModal").on("hidden.bs.modal", function() {
        window.location.reload()
    }), $("#resumeDownlod").click(function() {
        var e = $("#inputcandresumedownldUrl").val() + $(this).attr("title");
        $("#ResumedownloadModal").find('.modal-header iframe[id="resumedownloadframe"]').attr("src", e), setTimeout(function() {
            $("#ResumedownloadModal").modal("hide")
        })
    }), $("button#password-btn-save").click(function() {
        var e = $("input[name='candidate-profile-email']").val(),
            t = $("input[name='newPassword']").val(),
            a = $("input[name='confirmnewPassword']").val();
        return t != a ? ($("#modal-error-msg").text("Passwords do not match, please try again!"), $("input[name^='new-password']").val(""), $("input[name^='new-confirm-password']").val(""), $("#modal-error-msg").delay(1e3).fadeOut("slow"), !1) : ($(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled", "disabled"), $.ajax({
            type: "POST",
            url: $("#inputchgpwdUrl").val(),
            data: {
                "candidate-email": e,
                newpassword: t
            },
            crossDomain: !0
        }).done(function(e) {
            "success" == e && ($("#modal-error-msg").text("Password changed successfully, you will be redirected after 2secs.."), setTimeout(function() {
                window.location = $("#inputprofUrl").val()
            }, 2e3)), $(this).html($(this).text()).removeAttr("disabled")
        }).fail(function() {
            $("#getCode").html("Something went wrong, Please try again!."), $("#getMsgModal").modal("show")
        }), event.preventDefault(), void 0)
    }), $("#chgpasswdModal").on("hidden.bs.modal", function() {
        window.location = $("#inputprofUrl").val()
    }), $("button#chgemail-btn-save").click(function(e) {
        if (27 == e.keyCode) return !1;
        var t = $("input[name='candidate-profile-email']").val(),
            a = $("input[name='newEmailAddress']").val();
        $(this).html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled", "disabled"), $.ajax({
            type: "POST",
            url: $("#inputchgemailUrl").val(),
            data: {
                oldEmailAddress: t,
                newEmailAddress: a
            },
            crossDomain: !0
        }).done(function(e) {
            var sp = e.split(';');
            "success" == sp[0] ? ($("#chgEmailmodal-error-msg").html(sp[1]).addClass("alert alert-success"), $("button#chgemail-btn-save").html("Save").removeAttr("disabled")) : ($("#chgEmailmodal-error-msg").html(sp[1]).addClass("alert alert-danger"), $("button#chgemail-btn-save").html("Save").removeAttr("disabled"))
        }).fail(function() {
            $("#chgEmailmodal-error-msg").html(sp[1]).addClass("alert alert-danger"), $("button#chgemail-btn-save").html("Save").removeAttr("disabled")
        }), event.preventDefault()
    }), $("#changeEmailModal").on("hidden.bs.modal", function(e) {
        return 27 == e.keyCode ? !1 : ($("#getCode").html("This window will close automatically in 3secs for security reasons!!"), $("#getMsgModal").modal("show"), void setTimeout(function() {
            window.location = $("#inputprofUrl").val()
        }, 3e3))
    }), $("#resumeuploadModal").on("hidden.bs.modal", function() {
        window.location.reload(!0)
    }), $("#profileUpdbtn").on("click", function() {
        $("#profilepicupldModal").css("display","block");
    }), $("#resumeupload").on("click", function() {
        $("#resumeuploadModal").css("display","block");
    }), $("#resumeDownlod").on("click", function() {
        $("#ResumedownloadModal").css("display","block");
    }), $("#changeEmail").on("click", function() {
        $("#changeEmailModal").css("display","block");
    }), $("#div1_close, #div2_close, #div3_close, #div4_close").on("click", function() {
        $("#profilepicupldModal").hide(); window.location.reload(true);
    }), $("#profilepicupldModal").on("hidden.bs.modal", function() {
        window.location.reload(!0)
    })
});
