$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var t = ErrCnt = 0;    
    $("button#eduLvl-btn-add").click(function() {
        var e = $("input[name^='inputSchool']").val(),
            n = $("#educationlvl").find("option:selected").val(),
            a = $("input[name^='inputFieldofStudy']").val(),
            d = $("#edustart-date").find("option:selected").val(),
            r = $("#edustart-month").find("option:selected").val(),
            i = $("#edustart-year").find("option:selected").val(),
            l = $("#eduend-date").find("option:selected").val(),
            s = $("#eduend-month").find("option:selected").val(),
            o = $("#eduend-year").find("option:selected").val(),
            u = d + "-" + r + "-" + i,
            h = l + "-" + s + "-" + o;
        0 == e.length && $("input[name^='inputSchool']").addClass("error"), $("input[name^='inputSchool']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == n && $("#educationlvl").addClass("error"), $("#educationlvl").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == a.length && $("input[name^='inputFieldofStudy']").addClass("error"), $("input[name^='inputFieldofStudy']").bind("keyup keydown change", function() {
            0 == $(this).val().length ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == d && $("#edustart-date").addClass("error"), $("#edustart-date").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == r && $("#edustart-month").addClass("error"), $("#edustart-month").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == i && $("#edustart-year").addClass("error"), $("#edustart-year").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == l && $("#eduend-date").addClass("error"), $("#eduend-date").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == s && $("#eduend-month").addClass("error"), $("#eduend-month").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), 0 == o && $("#eduend-year").addClass("error"), $("#eduend-year").bind("change", function() {
            0 == $(this).val() ? $(this).addClass("error") : $(this).removeClass("error")
        }), $("#modal-error-msg").text(i > o && 0 != o ? "Education End Year cannot be less than Start Year" : "");
        var c = $(".modal-body").find("input.error, select.error").length,
            p = $("#modal-error-msg").text().length;
        return 0 == c && 0 == p ? ($("#addr" + t).html("<td class='text-center'>" + (t + 1) + "</td><td class='text-center'>" + e + "</td><td class='text-center'>" + n + "</td><td class='text-center'>" + a + "</td><td class='text-center'>" + u + "</td><td class='text-center'>" + h + "</td>"), $("#eduLvl_table").append('<tr id="addr' + (t + 1) + '"></tr>'), t++, $("#eduLvlModal").find("input:text").val(""), $("#eduLvlModal").find("span").text(""), $("#eduLvlModal").find("select").val("0"), $("#eduLvlModal").modal("hide"), !0) : !1
    }),$("#inputphoneNumber, #inputTotExperience").unbind("keyup change input paste").bind("keyup keypress change input paste", function(e) {
        var t = $(this),
            n = t.val(),
            a = n.length,
            d = t.attr("maxlength");
        return a > d && t.val(t.val().substring(0, d)), !(8 != e.which && 0 != e.which && (e.which < 48 || e.which > 57) && 46 != e.which)
    }), $("#inputcurrentAnnualSal, #inputexpAnnualSal, #inputTotExperience").unbind("keyup change input paste").bind("keyup keypress change input paste", function(e) {
        return !(8 != e.which && 0 != e.which && (e.which < 48 || e.which > 57) && 46 != e.which)
    }), $("#inputphoneNumberCode").on("change", function() {
        $("#id_phone_country_code").val($(this).val())
    }), $(".modal").on("hidden.bs.modal", function() {
        $(".modal-body").find("input, select").removeClass("error"), $("#eduLvlModal").find("input:text").val(""), $("#eduLvlModal").find("span").text(""), $("#eduLvlModal").find("select").val("0")
    }), $("#button-candidate-register-bottom").on("click", function(event) {
        
        // To check if email address, Country of Residence, Phone Number is not blank.
        if( $('#inputemailAddress').val().length == 0 ||
            $('#id_phone_country_code').val() == 0 ||
            $('#inputphoneNumber').val().length == 0 ||
            $('input[name="termsagreement"]:checked').length == 0            
            ) 
        { 
            $("#getErrMsgModal").modal("show");
            $("#getErrMsgCode").html("Please fill all mandatory fields");
            setTimeout(function() { $("#getErrMsgModal").modal("hide"); },3000);
            ErrCnt += 1; 
        } else { ErrCnt = 0; }
        
        for (var t = $("#eduLvl_table > tbody > tr").length, n = [], a = 0; t - 1 > a; a++) {
            var d = $("#addr" + a).find("td"),
                r = "";
            $.each(d, function(e, t) { r = r + t.innerHTML + "," });
            var i = r.replace(/,\s*$/g, ";");
            n.push(i);
        }
        if( n.length != 0 ) {
            $("#inputEducationLvl").val(n);    
        } else {
            $("#inputEducationLvl").val("0");
        }
                
        if( ErrCnt == 0) {
            return true;
        } else {
            return false;    
        }
    });
        
});
