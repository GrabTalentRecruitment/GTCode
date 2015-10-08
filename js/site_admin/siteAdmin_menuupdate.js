$(function() {
    
    $('#btn_update').on('click', function (event) {
        var modal = $(this);
        modal.find('.modal-body input').attr("disabled", "disabled");
                
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : $('#menuSettingsupdateURL').val(), // the url where we want to POST
            data        : { 'lang_id': $('#menuSettingslangid').val(), 'langenglish' : $('#menuSetting_English').val(), 'langchinese' : $('#menuSetting_Chinese').val(), 'langfrench' : $('#menuSetting_French').val()  }, // our data object
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
    
    $('#editmenuItemModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-body input').attr("placeholder", "Please wait..").attr("disabled","disabled");
        
        var button = $(event.relatedTarget);
        var menu_itemname = button.data('whatever');
        
        $('#menuSettingslangid').val(menu_itemname);
                        
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : $("#menuSettingspostURL").val(), // the url where we want to POST
            data        : { 'menuitemName' : menu_itemname }, // our data object
            crossDomain : true 
        })
        .done(function(data) {
            modal.find('.modal-body input').removeAttr("disabled");
            var response = data.split(',');
            $('#menuSetting_English').val(response[0]);
            $('#menuSetting_Chinese').val(response[1]);
            $('#menuSetting_French').val(response[2]);
        })
        .fail(function(data) {
            $("#getCode").html("Something went wrong, Please try again!.");
            $("#getMsgModal").modal('show');
        });
        
    });
    
	$('#mytable').floatThead({ useAbsolutePositioning: false });

	$('.filterable .btn-filter').click(function(){
		var $panel = $(this).parents('.filterable'), 
		$filters = $panel.find('.filters input'), 
		$tbody = $panel.find('.table tbody');

		if ($filters.prop('disabled') == true) {
			$filters.prop('disabled', false);
			$filters.first().focus();
		} else {
			$filters.val('').prop('disabled', true);
			$filters.first().focus();
			//$tbody.find('.no-result').remove();
			//$tbody.find('tr').show();
		}
	});

	$('.filterable .btn-reset').click(function(){
		var $panel = $(this).parents('.filterable'), 
		$filters = $panel.find('.filters input'), 
		$tbody = $panel.find('.table tbody');
		$filters.val('').prop('disabled', true);
		$tbody.find('.no-result').remove();
		$tbody.find('tr').show();				
	});

	$('.filterable .filters input').keyup(function(e){
		/* Ignore tab key */
		var code = e.keyCode || e.which;
		if (code == '9') return;
		/* Useful DOM data and selectors */
		var $input = $(this),
		inputContent = $input.val().toLowerCase(),
		$panel = $input.parents('.filterable'),
		column = $panel.find('.filters th').index($input.parents('th')),
		$table = $panel.find('.table'),
		$rows = $table.find('tbody tr');
		/* Dirtiest filter function ever ;) */
		var $filteredRows = $rows.filter(function(){
			var value = $(this).find('td').eq(column).text().toLowerCase();
			return value.indexOf(inputContent) === -1;
		});
		/* Clean previous no-result if exist */
		$table.find('tbody .no-result').remove();
		/* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
		$rows.show();
		$filteredRows.hide();
		/* Prepend no-result row if all rows are filtered */
		if ($filteredRows.length === $rows.length) {
			$table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
		}
	});
    
});