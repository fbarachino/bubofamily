$(document).ready(function() {
	$('#listaLettureGas').DataTable({
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
