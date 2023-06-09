$(document).ready(function() {
	$('#tab_progetti').DataTable({
		"responsive": true,
        columnDefs: [
            {
                target: 0,
                render: DataTable.render.date(),
            }
        ],
		"order": [[0, "desc"]]
	});
});
	$('#form').click(function() {
		$('form').toggle();
	});

	$("#dettaglio").click(function() {
		$('[hidable]').toggle();
	});

	$(document).on('click', '.open_modal', function() {
		var url = '/admin/progetti/detail/edit';
		var riga_id = $(this).val();
		$.get(url + '/' + riga_id, function(data) {
			//success data
			console.log(url);
			//console.log(data[0].descrizione);
			$('#data_u').val(data[0].data);
			$('#desc_u').val(data[0].descrizione);
			$('#ore_u').val(data[0].ore);
			$('#prezzo_u').val(data[0].prezzo);
			$('#id_progetto_u').val(data[0].fk_id_progetto);
			$('#idriga').val(riga_id);
			$('#myModal').modal('show');
		})
	});

	$(document).on('click', '.open_modal_addRow', function() {
		// var riga_id = $(this).val();
		console.log('cliccato');
		$('#form').find('input[type="text"], textarea, input[type="number"],input[type="date"]').val("");
		$('#myModal_addRow').modal('show');
		// $('#form_new').attr('action', 'progetti/new');
	});

