$('#contratti').DataTable({
    responsive: true,
    fields: [
        {
            label:"Data",
            type: "datetime"
        }
    ]
});

$(document).on('click','.open_modal_new',function(){
    console.log('richiesto apertura form');
    $('#myModal_new').modal('show');

});

$(".draggable").draggable();