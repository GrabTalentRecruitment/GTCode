$(function() {
    $("button#profile-updateBtn").text();
    $("#inputPhonenumber").unbind("keyup change input paste").bind("keyup keypress change input paste", function(t) {
        var e = $(this),
            a = e.val(),
            n = a.length,
            o = e.attr("maxlength");
        return n > o && e.val(e.val().substring(0, o)), !(8 != t.which && 0 != t.which && (t.which < 48 || t.which > 57) && 46 != t.which)
    }), $("form").submit(function(t) {
        var e = $("#inputprofupdurl").val();
        $("button#profile-updateBtn").html("<img src='/images/loading.gif' width='20px' height='20px'/>").attr("disabled", "disabled"), $.ajax({
            type: "POST",
            url: e,
            data: $(this).serialize(),
            crossDomain: !0
        }).done(function(t) {
            var e = t.split(";");
            $("#success-alert").html("success" == e[0] ? e[1] : e[1])
        }).fail(function() {
            $("#failure-alert").html("Something went wrong, Please try again!.")
        }), t.preventDefault()
    }), $("#getMsgModal").on("hidden.bs.modal", function() {
        window.location.reload(true);
    }), $("#profileUpdbtn").on("click", function() {
        $("#profilepicupldModal").css("display","block");
    }), $("#div_close").on("click", function() {
        $("#profilepicupldModal").hide(); window.location.reload(true);
    }), $("#profilepicupldModal").on("hidden.bs.modal", function() { 
        window.location.reload(true);
    });
});