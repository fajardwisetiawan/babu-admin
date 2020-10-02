 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Show JSON Data in Jquery Datatables</title>
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
           <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
           
           <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   -->
           <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
           
           <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
           <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>  
           <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>   -->






           
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
           <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
           <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h1 align="center">Show JSON Data in Jquery Datatables</h3><br />  
                <h3 align="center">Employee Database</h3><br />  
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                  <thead>
                      <tr>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>Position</th>
                          <th>Office</th>
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
                          <th>Salary</th>
                      </tr>
                  </tfoot>
                </table>
 </html>  

 <script type="text/javascript">
    $(document).ready(function() {

      $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "http://192.168.0.117/frontend_media_erendi/server-side"
      });
 
    });
</script>