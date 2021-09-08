$(function () {

    $('.datatable').DataTable({
        "language":{
         "url": "public/vendors/custom/js/fr_fr.json"
        },
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "paging":true,
    });
});
