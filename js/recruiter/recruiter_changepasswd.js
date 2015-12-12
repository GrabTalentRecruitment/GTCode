$(function() {
    $("form").submit(function(t) {
        var a = $("#inputpassword").val(),
            s = $("#inputconfirmpassword").val();
        if (a == s) {
            var e = $("#inputrecruiterchgpwdUrl").val(),
                o = {
                    email: $("#inputemailaddress").val(),
                    password: $("#inputpassword").val()
                }, i = $("#button-submit-password").text();
            $("#button-submit-password").html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled", "disabled"), $.ajax({
                type: "POST",
                url: e,
                data: o,
                crossDomain: !0
            }).done(function(t) {
                var a = t.split(";");
                $("#modal-window").css("display","block").find("#displayMsg").html(a[1]), $("#button-submit-password").html(i).removeAttr("disabled"), setTimeout(function() { window.location = $("#inputrecruiterbackUrl").val() }, 2e3)
            }).fail(function() {
                $("#modal-window").css("display","block").find("#displayMsg").html("Something went wrong, Please try again!."), $("#button-submit-password").html(i).removeAttr("disabled")
            }), $(this).trigger("reset"), t.preventDefault()
        } else { alert("Passwords do not match, please try again"); return false; }
    })
});