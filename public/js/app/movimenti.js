$(document).ready(function() {
	$('#listamovimenti').DataTable({
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

$(".draggable").draggable();

var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var strDate = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;


$(document).on('click', '.open_modal_spesa', function() {
	console.log(strDate);
	$("#categoria").empty();
	$("#tags").empty();
	$('#form').find('input[type="text"], textarea, input[type="number"],input[type="date"],option').val("");
	$('#form').find('input[type="date"]').val(strDate);
	$('#myModal').modal('show');
	$('.modal-title').text(' Nuovo movimento in uscita');
	$('#form').attr('action', '/admin/movimenti/spesa');
	$.getJSON("/admin/service/catlistSpesa", {}, function(cats) {
		$.each(cats, function(i, cat) {
			$("select[name='mov_fk_categoria']").append(
				new Option(cat.cat_name, cat.id)
			)
		}
		);
	});
	$.getJSON("/admin/service/taglist", {}, function(tags) {
		$.each(tags, function(i, tag) {
			$("select[name='mov_fk_tags']").append(
				new Option(tag.tag_name, tag.id)
			)
		});
});
});
$(document).on('click', '.open_modal_entrata', function() {
	console.log(strDate);
	$("#categoria").empty();
	$("#tags").empty();
	$('#form').find('input[type="text"], textarea, input[type="number"],option').val("");
	$('#form').find('input[type="date"]').val(strDate);
	$('#myModal').modal('show');
	$('.modal-title').text('Nuovo movimento in entrata');
	$('#form').attr('action', '/admin/movimenti/entrata');
	$.getJSON("/admin/service/catlistEntrata", {}, function(data) {
		$.each(data, function(i, item) {
			$("select[name='mov_fk_categoria']").append(
				new Option(item.cat_name, item.id)
			)
		}
		);
	});
	$.getJSON("/admin/service/taglist", {}, function(data) {
		$.each(data, function(i, item) {
			$("select[name='mov_fk_tags']").append(
				new Option(item.tag_name, item.id)
			)
		});
});
});

$(document).on('click', '.open_modal_modifica', function() {
	var url = "/admin/movimenti/modify";
	var riga_id = $(this).val();
	$("#categoria").empty();
	$("#tags").empty();
	$.getJSON(url + '/' + riga_id, function(data) {
		// success data
		console.log(data[0]);
		$.getJSON("/admin/service/taglist", {}, function(tags) {
			$.each(tags, function(i, tag) {
				$("select[name='mov_fk_tags']").append(
					new Option(tag.tag_name, tag.id)
				)
				$('#tags')
					.find('option:contains(' + data[0].tag_name + ')')
					.prop('selected', true)
					.trigger('change');
			});
		});
		$.getJSON("/admin/service/catlist", {}, function(cats) {
			$.each(cats, function(i, cat) {
				$("select[name='mov_fk_categoria']").append(
					new Option(cat.cat_name, cat.id)
				)
				$('#categoria')
					.find('option:contains(' + data[0].cat_name + ')')
					.prop('selected', true)
					.trigger('change');
			}
			);
		});
		$('.modal-title').text('Modifica movimento');
		$('#data').val(data[0].mov_data);
		$('#descrizione').val(data[0].mov_descrizione);
		$('#importo').val(data[0].mov_importo);
		
		$('#myModal').modal('show');
		// $('.panel-heading').text('Modifica movimento');
		$('#form').attr('action', '/admin/movimenti/modify');
		$('#form').append('<input type="hidden" name="id" value="' + riga_id + '">');
		
	});
		
});

/*

$.getJSON("/admin/service/taglist", {}, function(data) {
	$.each(data, function(i, item) {
		$("select[name='mov_fk_tags']").append(
			new Option(item.tag_name, item.id)
		)
	});
});

*/
