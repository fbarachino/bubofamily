$(document).ready(function() {
	$('#automobili').DataTable({
		responsive: true,
        fields: [
			{
				label:"Data",
				type: "datetime"
			}
		]
	});

	$('#contatti').DataTable({
		responsive: true,
        fields: [
			{
				label:"Data",
				type: "datetime"
			}
		]
	});
});
