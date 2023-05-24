$(document).ready(function() {
	$('#listamovimenti').DataTable({
		"responsive": true,
		"order": [[0, "desc"]]
	});
	$(document).on('click', '.open_modal_spesa', function() {
		$('#myModal').modal('show');
		$('.modal-title').append(' spesa');
		$('#form').attr('action', 'movimentis');
	});
	$(document).on('click', '.open_modal_entrata', function() {
		$('#myModal').modal('show');
		$('.modal-title').append(' entrata');
		$('#form').attr('action', 'movimentie');
	});
	$(document).on('click', '.open_modal_modifica', function() {
		var url = "movmodify";
		var riga_id = $(this).val();
		$.getJSON(url + '/' + riga_id, function(data) {
			// success data
			console.log(data[0]);
			$('.modal-title').text('Modifica movimento');
			$('#data').val(data[0].mov_data);
			$('#descrizione').val(data[0].mov_descrizione);
			$('#importo').val(data[0].mov_importo);
			$('#tags')
				.find('option:contains(' + data[0].tag_name + ')')
				.prop('selected', true)
				.trigger('change');
			$('#categoria')
				.find('option:contains(' + data[0].cat_name + ')')
				.prop('selected', true)
				.trigger('change');
			$('#myModal').modal('show');
			// $('.panel-heading').text('Modifica movimento');
			$('#form').attr('action', '/admin/movmodify');
			$('#form').append('<input type="hidden" name="id" value="' + riga_id + '">');
		});
	});
	$.getJSON("service/catlist", {}, function(data) {
		$.each(data, function(i, item) {
			$("select[name='mov_fk_categoria']").append(
				new Option(item.cat_name, item.id)
			)
		}
		);
	});

	$.getJSON("service/taglist", {}, function(data) {
		$.each(data, function(i, item) {
			$("select[name='mov_fk_tags']").append(
				new Option(item.tag_name, item.id)
			)
		}
		);
	});
});