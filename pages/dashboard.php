<?php include '../components/header2.php'; ?>

<style>
  .shine {
    background: #f6f7f8;
    background-image: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
    background-repeat: no-repeat;
    background-size: 800px 220px; 
    display: inline-block;
    position: relative; 
    
    -webkit-animation-duration: 1s;
    -webkit-animation-fill-mode: forwards; 
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-name: placeholderShimmer;
    -webkit-animation-timing-function: linear;
    }

  box {
    height: 220px;
    width: 100%;
  }

  .shimmer {
    display: inline-flex;
    flex-direction: column; 
    margin-left: 25px;
    margin-top: 15px;
    vertical-align: top; 
  }

  lines {
    height: 40px;
    width: 100%;
    margin-top:20px;
    /* background:red;
    height: 10px;
    margin-top: 10px;
    width: 100%;  */
  }

  photo {
    display: block!important;
    width: 325px; 
    height: 100px; 
    margin-top: 15px;
  }

  @-webkit-keyframes placeholderShimmer {
    0% {
      background-position: -468px 0;
    }
    
    100% {
      background-position: 468px 0; 
    }
  }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
  $(document).ready(function () {

    function getContent(){
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);

        $.ajax({
          url: '<?= $link_api ?>master',
          type: "GET",
          dataType: "JSON",
          success: async function(response) {
            $('#jml_katadasar').html(response.count.toLocaleString().replace(',','.'))
          },
          error: function(e) {
            console.log(e);
          }
        });
        
      }

      getContent()

    });
  
</script>

<script>
  $(document).ready(function () {

    function getContent(){
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);

        $.ajax({
          url: '<?= $link_api ?>count/of/day/opearator',
          type: "GET",
          dataType: "JSON",
          success: async function(response) {
            $('#kata_perhari').html(response.count.toLocaleString().replace(',','.'))
          },
          error: function(e) {
            console.log(e);
          }
        });
        
      }

      getContent()

    });
  
</script>
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang <span class="username"></span></h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start Location and Earnings Charts Section -->
        <!-- *************************************************************** -->
        <div class="row">
          <div class="col-md-12 col-lg-6">
            <div class="card" style="width:100% !important;">
              <div class="card-body">
                <h4 class="card-title">Persentase Input Data Master (Semua)</h4>
                <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"><span id="jml_katadasar">Loading...</span> Data</h2>
                <div class="mt-4 activity">

                <div id="piechart" display="block" margin="0 auto"></div>

                <ul class="list-style-none mb-0 looping_input"></ul>

                  <script type="text/javascript">

                    async function asdqwe() {

                      var json = []

                      await $.ajax({
                        url: '<?= $link_api ?>count',
                        type: "GET",
                        dataType: "JSON",
                        success: function(response) {

                          for (let i = 0; i < response.length; i++) {
                            var con = 0

                            if (i == 0) {
                              json.push(['Input Master', 'Keseluruhan'])
                            }

                            if (parseInt(response[i].count_op) > 0) {
                              $('.looping_input').append('<li> <i class="fas fa-circle text-primary font-10 mr-2"></i> <span class="text-muted">'+response[i].username+'</span> <span class="text-dark float-right font-weight-medium">'+parseInt(response[i].count_op).toLocaleString().replace(',','.')+'</span> </li>')
                              con = parseInt(response[i].count_op)
                            }
                            var data = [response[i].username,con]
                            json.push(data)

                          }
                        },
                        error: function(e) {
                          console.log(e);
                        }
                      });               

                      console.log(json);


                      // Load google charts
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      // Draw the chart and set the chart values
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(json);

                        // Optional; add a title and set the width and height of the chart
                        var options = {width:'100%', 'height':500};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                      }

                    }

                    asdqwe()

                  </script>
                                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-6">
            <div class="card" style="width:100% !important;">
              <div class="card-body">
                <h4 class="card-title">Persentase Input Data Master (Hari Ini)</h4>
                <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"><span id="kata_perhari">Loading...</span> Data</h2>
                <div class="mt-4 activity">

                <div id="piechartt" display="block" margin="0 auto"></div>

                <ul class="list-style-none mb-0 looping_inputt"></ul>

                  <script type="text/javascript">

                    async function asdqwee() {

                      var json = []

                      await $.ajax({
                        url: '<?= $link_api ?>count/of/day/opearator',
                        type: "GET",
                        dataType: "JSON",
                        success: function(response) {

                          for (let i = 0; i < response.data.length; i++) {
                            var con = 0

                            if (i == 0) {
                              json.push(['Input Master', 'Keseluruhan'])
                            }

                            if (parseInt(response.data[i].count_op) > 0) {
                              $('.looping_inputt').append('<li> <i class="fas fa-circle text-primary font-10 mr-2"></i> <span class="text-muted">'+response.data[i].username+'</span> <span class="text-dark float-right font-weight-medium">'+parseInt(response.data[i].count_op).toLocaleString().replace(',','.')+'</span> </li>')
                              con = parseInt(response.data[i].count_op)
                            }
                            var data = [response.data[i].username,con]
                            json.push(data)

                          }
                        },
                        error: function(e) {
                          console.log(e);
                        }
                      });               

                      console.log(json);


                      // Load google charts
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      // Draw the chart and set the chart values
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable(json);

                        // Optional; add a title and set the width and height of the chart
                        var options = {width:'100%', 'height':500};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechartt'));
                        chart.draw(data, options);
                      }

                    }

                    asdqwee()

                  </script>
                                  
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-12 col-lg-12">
            <div class="card" style="width:100% !important;">
              <div class="card-body">
                <h4 class="card-title">Grafik Input Data Master Perhari (Semua User)</h4>
                <!-- <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"><span id="kata_perhari">Loading...</span> Data</h2> -->
                <div class="mt-4 activity">

                <div id="chart22" style="width:auto; height:300px;"></div>

                <script>
                    // Visualization API with the Line chart package.
                    google.charts.load('current', { packages: ['line'] });
                    google.charts.setOnLoadCallback(drawLineChart);

                    function drawLineChart() {

                        $('#chart22').html('<br> <br> <div class="row mb-3"> <div class="col-lg-3 mb-3 mb-lg-3"> <box class="shine"></box> </div> <div class="col-lg-9 mb-9 mb-lg-9"> <lines class="shine"></lines> <lines class="shine"></lines> <lines class="shine"></lines> </div> </div>')

                        $.ajax({
                            url: "http://192.168.0.155:4000/count/grafik/opearator",
                            dataType: "json",
                            type: "GET",
                            contentType: "application/json; charset=utf-8",
                            success: function (response) {

                                $('#chart22').html('');

                                var arrSales = [['Tanggal', 'Data']];    // Define an array and assign columns for the chart.

                                // Loop through each data and populate the array.
                                for (let i = 0; i < response.length; i++) {
                                    var data = [response[i].tanggal, parseInt(response[i].all_of_the_day)]
                                    arrSales.push(data)
                                }
                                var options = {
                                    axes: {
                                        x: {
                                            0: { side: 'top'}   // Use "top" or "bottom".
                                        }
                                    }
                                };

                                // Create DataTable and add the array to it.
                                var figures = google.visualization.arrayToDataTable(arrSales)

                                // Define the chart type (LineChart) and the container (a DIV in our case).
                                var chart = new google.charts.Line(document.getElementById('chart22'))

                                // Draw the chart with Options.
                                chart.draw(figures, google.charts.Line.convertOptions(options));
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert('Got an Error');
                            }
                        });
                    }
                </script>

                </div>
              </div>
            </div>
          </div>

        </div>
        
        
        
        <div class="row">

          <div class="col-md-12 col-lg-12">
            <div class="card" style="width:100% !important;">
              <div class="card-body">
                <h4 class="card-title">Grafik Input Data Master Perhari (Setiap User)</h4>
                <!-- <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"><span id="kata_perhari">Loading...</span> Data</h2> -->
                <div class="mt-4 activity">

                <div id="chart_div" style="width: 100%; height: 500px;"></div>

                <script type="text/javascript">

                (async () => {
                  let json_garis = []
                  var fieldPertama = []
                  var fieldLanjutan = []
 
                  
                  var asd = []

                  await $.ajax({
                    url: '<?= $link_api ?>count',
                    type: "GET",
                    dataType: "JSON",
                    success: function(responseGaris) {

                      for (let i = 0; i < responseGaris.length; i++) {
                        let con_garis = 0
  
                        if (i == 0) {
                          fieldPertama.push('Tanggal')
                        }

                        fieldPertama.push(responseGaris[i].username)
  
                      }

                    },
                    error: function(e) {
                      console.log(e);
                    }
                  });   
                  
                  $('#chart_div').html('<br> <br> <div class="row mb-3"> <div class="col-lg-3 mb-3 mb-lg-3"> <box class="shine"></box> </div> <div class="col-lg-9 mb-9 mb-lg-9"> <lines class="shine"></lines> <lines class="shine"></lines> <lines class="shine"></lines> </div> </div>')

                  await $.ajax({
                    url: "http://192.168.0.155:4000/count/grafik/opearator",
                    dataType: "json",
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    success: function (response) {

                        $('#chart_div').html('');

                        for (let i = 0; i < response.length; i++) {

                          if (i == 0) {
                            fieldLanjutan.push(fieldPertama)
                          }

                          asd = []
                          asd.push(response[i].tanggal)
                          console.log('TANGGAL : '+response[i].tanggal);
                          var qweqwe = Number(response[i].data.length - 1)
                          var jumlahOrang = Number(fieldPertama.length-1)

                          for (let i2 = 0; i2 < jumlahOrang; i2++) {

                            if (i2 > qweqwe) {
                              asd.push(0)
                            } else {
                              console.log(jumlahOrang);
                              asd.push(response[i].data[i2].count_op)
                              console.log(response[i].data[i2].username);
                              // console.log('===================');
                            }

                          }
                          fieldLanjutan.push(asd)
                          asd = []
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert('Got an Error');
                    }
                  });
  
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChartGaris);

                  
  
                  function drawChartGaris() {
  
                    var data = google.visualization.arrayToDataTable(fieldLanjutan);
  
                    var options = {
                      // title: 'Performa operator',
                      hAxis: {title: 'Tanggal',  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0}
                    };
  
                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }

                })();

                </script>

                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- *************************************************************** -->
        <!-- End Location and Earnings Charts Section -->
        <!-- *************************************************************** -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <?php include '../components/text_footer.php'; ?>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
<?php include '../components/footer.php'; ?>