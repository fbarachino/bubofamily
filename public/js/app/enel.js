$(document).ready(function() {
	$('#listaLettureEnel').DataTable({
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
