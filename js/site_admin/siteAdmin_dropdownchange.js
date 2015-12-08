$(function() {
    
    $('#deldropdownItemModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-body input').attr("placeholder", "Please wait..").attr("disabled","disabled");
        
        var button = $(event.relatedTarget);
        var menu_itemname = button.data('whatever');
        
        $('#menudropDowntblItemid').val(menu_itemname);
           
    });
    
    $('#btn_confirm').on('click', function (event) {
        var tmp = $('#menudropDowntblItemid').val().split(',');
        var columnName = tmp[0];
        var columnVal = tmp[1];
        var tableName = tmp[2];
        
        var modal = $(this);
        modal.find('.modal-body input').attr("disabled", "disabled");
                
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : $('#menuDropdowndelURL').val(), // the url where we want to POST
            data        : { 'columnName' : columnName, 'columnVal' : columnVal, 'tableName': tableName }, // our data object
            crossDomain : true 
        })
        .done(function(data) {                  
            var response = data.split(';');
            $("#modal-error-msg").html(response[1]).delay(1000).fadeOut('slow');
            setTimeout(function() { window.location.reload(true); }, 2000 );
        })
        .fail(function(data) {
            $("#getCode").html("Something went wrong, Please try again!.");
            $("#getMsgModal").modal('show');
        });
        
    });
       
});