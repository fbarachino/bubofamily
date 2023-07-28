$('#contratti').DataTable({
    responsive: true,
    fields: [
        {
            label:"Data",
            type: "datetime"
        }
    ]
});
$(".draggable").draggable();