jQuery.validator.setDefaults({
    debug:false,
    errorElement: "label"
});

function showValidationErrors(oResponse){
    $.each(oResponse.data_failed, function(input_id,error){
        var form_group = $('#'+input_id).closest( ".form-group");
        form_group.removeClass( 'success' ).addClass( 'error' );
        form_group.find('label').addClass('text-danger');
        var errorSpan= form_group.find('.help-block');
        errorSpan.html('<label>'+error+'</label>');
        errorSpan.show();
    });

    showNotification(oResponse);
}
