$(document).ready(function() {
	$('#tab_progetti').DataTable({
		responsive: true
	});
});

$(document).on('click', '.open_modal_new', function() {
	// var riga_id = $(this).val();
	console.log('cliccato');
	$('#myModal_new').modal('show');
	$('#form_new').attr('action', 'progetti/new');
});

$.getJSON("progetti/coordinatori", {}, function(data) {
	$.each(data, function(i, item) {
		$("select[name='coordinatore']").append(
			new Option(item.name, item.id)
		)
	}
	);
});