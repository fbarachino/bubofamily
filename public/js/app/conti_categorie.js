$(document).ready(function() {
	$('#listrapportoS').DataTable({
		"responsive": true,
		"order": [[0, "asc"]]
	});

	$('#listrapportoE').DataTable({
		"responsive": true,
		"order": [[0, "asc"]]
	});

    $('#categorie').DataTable({
            responsive: true
    });
 });

$(document).on('click','.open_modal',function(){
    var url = "/admin/categorie/modify";
    var riga_id= $(this).val();
    $.getJSON(url + '/' + riga_id, function (data) {
        //success data
        $('#cat_entrata').prop('checked', false);
        $('#cat_uscita').prop('checked', false);
       
       
        console.log(data[0]);
        console.log(data[0].cat_name);

       

        if (data[0].cat_uscita === 1)
        {
            // $('.myCheckbox').prop('checked', true);
            $('#cat_uscita').prop('checked', true);
        } 
        if (data[0].cat_entrata ===1)
        {
            $('#cat_entrata').prop('checked', true);
        }
        $('#H_cat_id').val(data[0].id);
        $('#H_cat_cat_name').val(data[0].cat_name);
        $('#myModal').modal('show');
    });
});

$(document).on('click','.open_modal_new',function(){
        console.log('richiesto apertura form');
        $('#myModal_new').modal('show');

});

