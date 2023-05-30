$(document).ready(function() {
	$('#tags').DataTable({
		responsive: true
	});
	$(document).on('click', '.open_modal', function() {
		var url = "tags/modify";
		var riga_id = $(this).val();
		$.getJSON(url + '/' + riga_id, function(data) {
			//success data
			console.log(data[0]);
			console.log(data[0].tag_name);
			$('#tag_name').val(data[0].tag_name);
			$('#tag_id').val(data[0].id);
			$('#myModal').modal('show');
		});
	});
	$(document).on('click', '.open_modal_new', function() {
		$('#myModal_new').modal('show');

	});
});
