<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Datatables in action .Server side processing</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>

<body class="bg-info">

    <div class="container">
        <div class="jumbotron">
            <h2>Datatables in action!</h2>
        </div>
    </div>
    <div class="container">
        <div class="ZipDatatable">
            <table id="ZipcodesTable" class="table table-bordered table-sm">
                <thead>
                    <tr>
                        
                        <th>ZipCode</th>
                        <th>kata_asli</th>
                        <th>katadasar</th>
                        <th>kategori</th>
                        <th>negara</th>
                        <th>provinsi</th>
                        <th>kabupaten</th>
                        <th>kecamatan</th>
                        <th>desa</th>
                        <th>prefik</th>
                        <th>subfik</th>
                        <th>kataganti</th>
                        <th>bahasa</th>
                        <th>user</th>
                        <th>datetime</th>

                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        
                        <th>ZipCode</th>
                        <th>kata_asli</th>
                        <th>katadasar</th>
                        <th>kategori</th>
                        <th>negara</th>
                        <th>provinsi</th>
                        <th>kabupaten</th>
                        <th>kecamatan</th>
                        <th>desa</th>
                        <th>prefik</th>
                        <th>subfik</th>
                        <th>kataganti</th>
                        <th>bahasa</th>
                        <th>user</th>
                        <th>datetime</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


</body>
<script>

    //$.fn.poshytip = { defaults: null };
    //$.fn.editable.defaults.mode = 'inline';
    $(document).ready(function () {
        var t = $('#ZipcodesTable').DataTable({
            "paging": true,
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            'ajax': {
                'type': 'POST',
                'url': 'http://192.168.0.155:8080/populateZipCodes'
            },
            'columns':
                [
                { 'data': '_id', "defaultContent": "", 'name': 'ZipCode' },
                { 'data': 'kata_asli', "defaultContent": "", 'name': 'kata_asli' },
                { 'data': 'katadasar', "defaultContent": "", 'name': 'katadasar' },
                { 'data': 'kategori', "defaultContent": "", 'name': 'kategori' },
                { 'data': 'negara', "defaultContent": "", 'name': 'negara' },
                { 'data': 'provinsi', "defaultContent": "", 'name': 'provinsi' },
                { 'data': 'kabupaten', "defaultContent": "", 'name': 'kabupaten' },
                { 'data': 'kecamatan', "defaultContent": "", 'name': 'kecamatan' },
                { 'data': 'desa', "defaultContent": "", 'name': 'desa' },
                { 'data': 'prefik', "defaultContent": "", 'name': 'prefik' },
                { 'data': 'subfik', "defaultContent": "", 'name': 'subfik' },
                { 'data': 'kataganti', "defaultContent": "", 'name': 'kataganti' },
                { 'data': 'bahasa', "defaultContent": "", 'name': 'bahasa' },
                { 'data': 'user', "defaultContent": "", 'name': 'user' },
                { 'data': 'datetime', "defaultContent": "N", 'name': 'datetime' }
                ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }
            ]

        });

       /* t.on('draw', function () {
            //setting the next and prev buttons with active or disabled state
            //setting the index column with values.
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(
                function (cell, i) {
                    cell.innerHTML = i + 1;
                }
            );
        });
        */
        //paging
       /* $('#next').on('click', function () {
            t.page('next').draw('page');
        });
        $('#previous').on('click', function () {
            t.page('previous').draw('page');
        });
    */
    //$('#ZipcodesTable').DataTable();
     });
</script>

</html>