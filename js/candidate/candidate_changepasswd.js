$(function() {
    $("form").submit(function(t) {
        var a = $("#inputpassword").val(),
            s = $("#inputconfirmpassword").val();
        if (a == s) {
            var e = $("#inputcandidatechgpwdUrl").val(),
                o = {
                    candidateRefId: $("#inputcandidateRefId").val(),
                    password: $("#inputpassword").val()
                }, i = $("#button-submit-password").text();
            $("#button-submit-password").html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled", "disabled"), $.ajax({
                type: "POST",
                url: e,
                data: o,
                crossDomain: !0
            }).done(function(t) {
                var a = t.split(";");
                $("#getCode").html(a[1]), $("#getMsgModal").modal("show"), $("#button-submit-password").html(i).removeAttr("disabled"), setTimeout(function() {
                    window.location = $("#inputcandidatebackUrl").val()
                }, 2e3)
            }).fail(function() {
                $("#getCode").html("Something went wrong, Please try again!."), $("#getMsgModal").modal("show"), $("#button-submit-password").html(i).removeAttr("disabled")
            }), $(this).trigger("reset"), t.preventDefault()
        } else alert("Passwords do not match, please try again")
    })
});