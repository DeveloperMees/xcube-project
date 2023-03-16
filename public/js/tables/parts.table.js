var snakeTable = $('#PartsTable').DataTable({
	searching: true,
	ordering: true,
	pageLength: 10,
	lengthMenu: [[5,10,25,100,-1],[5,10,25,100,'all']],
	columnDefs: [
		{ 
			"targets": '_all',
			"width": "20%"
		},
		{
			"targets": 0,
			"orderable": true
		}
	],
	columns: [
		{data: 'file_path', name: 'preview'},
		{data: 'DT_RowIndex', name: 'DT_RowIndex'},
		{data: 'name', name: 'name'},
        {data: 'measurement', name: 'measurement'},
        {data: 'weight', name: 'weight'},
        {data: 'category_id', name: 'category'},
		{data: 'edit', name: 'edit'},
		{data: 'delete', name: 'delete'}
	],
	dom: '<f>rt<"row"<"text-left col-4"l><"col-4"i><"col-4"p>>'
});