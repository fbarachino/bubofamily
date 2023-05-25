$(document).ready(function() {
	$('#automobili').DataTable({
		responsive: true
	});
});

$(document).on('click', '.open_modal_new', function() {
	$('#myModal_new').modal('show');
	// $('.modal-title').append(' entrata');
	$('#form').attr('action', 'auto/new');
	$('#targa').val('');
	$('#marca').val('');
	$('#modello').val('');
	$('#cilindrata').val('');
	$('#alimentazione').val('');
	$('#cvfiscali').val('');
	$('#ntelaio').val('');
	$('#nmotore').val('');
	$('#data_acquisto').val('');
	$('#note').val('');
});

$(document).on('click', '.open_modal_modify', function() {
	var url = "auto/getAuto";
	var riga_id = $(this).val();
	$.getJSON(url + '/' + riga_id, function(data) {

		$('.modal-title').text('Modifica Automobile');
		// $('#id').val(data.mov_data); 
		$('#targa').val(data.targa);
		$('#marca').val(data.marca);
		$('#modello').val(data.modello);
		$('#cilindrata').val(data.cilindrata);
		$('#alimentazione').val(data.alimentazione);
		$('#cvfiscali').val(data.cvfiscali);
		$('#ntelaio').val(data.ntelaio);
		$('#nmotore').val(data.nmotore);
		$('#data_acquisto').val(data.data_acquisto);
		$('#note').val(data.note);

		$('#myModal_new').modal('show');
		// $('.panel-heading').text('Modifica movimento');
		$('#form').attr('action', 'auto/modify');
		$('#form').append('<input type="hidden" name="id" value="' + riga_id + '">');
	});
});

$(document).on('click', '.open_modal_rifornimento', function() {
	var riga_id = $(this).val();
	$('#form_rifornimento').attr('action', 'auto/rifornimento');
	$('#form_rifornimento').append('<input type="hidden" name=""type" value="rifornimento">');
	$('#form_rifornimento').append('<input type="hidden" name="auto" value="' + riga_id + '">');
	$('#myModal_rifornimento').modal('show');
});

$(document).on('click', '.open_modal_revisione', function() {
	var riga_id = $(this).val();
	console.log('click su openmodal_revisione'+riga_id);
	$('#myModal_revisione').modal('show');
	$('#form_revisione').attr('action', 'auto/revisione');
	$('#form_revisione').append('<input type="hidden" name="type" value="revisione">');
	$('#form_revisione').append('<input type="hidden" name="auto" value="' + riga_id + '">');
});

$(document).on('click', '.open_modal_manutenzione', function() {
	var riga_id = $(this).val();
	console.log('click su open_modal_manutenzione '+ riga_id);
	$('#myModal_manutenzione').modal('show');
	$('#form_manutenzione').attr('action', 'auto/manutenzione');
	$('#form_manutenzione').append('<input type="hidden" name="type" value="manutenzione">');
	$('#form_manutenzione').append('<input type="hidden" name="auto" value="' + riga_id + '">');	
});

$(document).on('click', '.open_modal_accessori', function() {
	var riga_id = $(this).val();
	console.log('click su open_modal_accessori '+ riga_id);
	$('#myModal_accessori').modal('show');
	$('#form_accessori').attr('action', 'auto/accessori');
	$('#form_accessori').append('<input type="hidden" name="type" value="accessori">');
	$('#form_accessori').append('<input type="hidden" name="auto" value="' + riga_id + '">');	
});