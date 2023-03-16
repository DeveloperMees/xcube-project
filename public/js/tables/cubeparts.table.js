var snakeTable = $('#CubePartsTable').DataTable({
    searching: true,
    ordering: true,
    pageLength: 10,
    lengthMenu: [
        [5, 10, 25, 100, -1],
        [5, 10, 25, 100, 'all']
    ],
    dom: '<f<"btn btn-sm btn-secondary mb-2"B>>rt<"row"<"col-4"l><"col-4"i><"col-4"p>>',
    buttons: [{
        extend: 'pdfHtml5',
        messageTop: 'Parts of the X-Cube',
        exportOptions: {
            columns: ':not(:last-child)',
        }
    }],
    columnDefs: [{
            "targets": '_all',
            "width": "20%"
        },
        {
            "targets": 0,
            "orderable": true
        }
    ],
});
