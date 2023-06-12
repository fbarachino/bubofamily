$(document).ready(function() {
	$('#listaLettureEnel').DataTable({
		responsive: true,
        fields: [
			{
				label:"Data lettura",
				type: "datetime"
			}
		]
	});
});
