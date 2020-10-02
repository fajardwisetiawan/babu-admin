 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Show JSON Data in Jquery Datatables</title>
           <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
           <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>   
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h1 align="center">Show JSON Data in Jquery Datatables</h3><br />  
                <h3 align="center">Employee Database</h3><br />
                <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Start date</th>
                        <th>Salary</th><th>First name</th>
                        <th>Last name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Start date</th>
                        <th>Salary</th><th>First name</th>
                        <th>Last name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>
 </html>  

 <style>
  tfoot {
        display: table-header-group;
    }
 </style>
 <!-- <script>
    $(document).ready(function () {
        var t = $('#example').DataTable({
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
     });
</script> -->
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "http://192.168.0.155:8080/populateZipCodes",
                "type": "POST"
            },
            "columns": [
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
                ]
        } );
    } );
</script>