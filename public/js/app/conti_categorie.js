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
        console.log(data[0]);
        console.log(data[0].cat_name);
        $('#H_cat_cat_name').val(data[0].cat_name);
        $('#H_cat_id').val(data[0].id);
        $('#myModal').modal('show');
    });
});
$(document).on('click','.open_modal_new',function(){
        $('#myModal_new').modal('show');

});

