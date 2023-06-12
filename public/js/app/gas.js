$(document).ready(function() {
	$('#listaLettureGas').DataTable({
		responsive: true,
        fields: [
			{
				label:"Data lettura",
				type: "datetime"
			}
		]
	});
});
