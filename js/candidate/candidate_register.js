$(function() {
    $("form").submit(function(t) {
        var fileuploadName = $("#fileToUpload").val();
        var fileextn = fileuploadName.split('.').pop();
        if( fileuploadName.length != 0 && fileextn == "docx") {
            var formData = new FormData($(this)[0]);        
            var e = $("#inputCandsignupUrl").val(),
                a = $("#button-candidate-register").text();
            $("#button-candidate-register").html("<img src='/images/loading.gif' width='25px' height='25px'/>").attr("disabled", "disabled"), 
            $.ajax({
                type: "POST",
                url: e,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                crossDomain: !0
            }).done(function(t) {                        
                var e = t.split(";");
                if(e[0] == "success") {
                    setTimeout(function() { window.location = e[1]; },2500);
                    $("#getMsgModal").modal("show");
                    $("#getCode").html("File upload was " + e[0]+"ful");
                    setTimeout(function(){ $("#getMsgModal").modal("hide"); },1500)
                } else {
                    $("#getMsgModal").modal("show");
                    $("#getCode").html(e[1]);
                    setTimeout(function(){ $("#getMsgModal").modal("hide"); },1500)
                    $("#button-candidate-register").html(a).removeAttr("disabled");
                    $("form").trigger("reset");
                    return false;
                }
            }).fail(function() {
                $("#getMsgModal").modal("show");
                $("#getCode").html("Something went wrong, Please try again!");
            }), t.preventDefault()
        } else {
            $("#getMsgModal").modal("show");
            $("#getCode").html('File upload was unsuccessful due to incorrect file extension (or) no file was uploaded.'),
            $("form").trigger("reset")
            return false;
        }        
    })
});