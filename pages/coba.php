<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <div id="chart" style="width:auto; height:300px;"></div> 
</body>

<script>
    // Visualization API with the Line chart package.
    google.charts.load('current', { packages: ['line'] });
    google.charts.setOnLoadCallback(drawLineChart);

    function drawLineChart() {
        $.ajax({
            url: "http://192.168.0.155:4000/count/grafik/opearator",
            dataType: "json",
            type: "GET",
            contentType: "application/json; charset=utf-8",
            success: function (response) {

                response.map((datas,index)=>{

                    var userr
                    var hitungg

                    var tanggall = datas.tanggal
                    var aod = datas.all_of_the_day

                    // var nama = datas.data
                    //         nama.map((datass,index)=>{
                    //         userr = datass.username})

                    var hitung = datas.data
                            hitung.map((datase,index)=>{
                            hitungg = datase.count_op})

                        // console.log(tanggall, aod);

                        var arrSales = [['Tanggal', 'Operator 1']];

                    // var arrSales = [['Tanggal', ccc]];    // Define an array and assign columns for the chart.

                    // Loop through each data and populate the array.
                        for (let i = 0; i < response.length; i++) {
                            for (let ii = 0; ii < response[i].data.length; ii++) {
                                for (let iii = 0; iii < response[i].data[ii].count_op.length; iii++) {
                                    // console.log(response[i].data[ii].count_op[iii]);
                                }
                                // console.log(response[i].data[ii].username);
                                // console.log(response[i].data[ii].username,response[i].data[ii].count_op);

                                if (response[i].data[ii].username = 'operator1') {
                                    console.log(response[i].data[ii].username,response[i].data[ii].count_op);
                                }



                            
                                var data = [response[i].tanggal, response[i].data[ii].count_op]
                                arrSales.push(data)
                            }
                        }
                        // $.each(data, function (index, value) {
                        //     arrSales.push([value.Month, value.Sales_Figure, value.Perc]);
                        // });

                        // Set chart Options.
                        var options = {
                            chart: {
                                title: 'Inputan Perhari',
                                subtitle: '-- Semua user'
                            },
                            axes: {
                                x: {
                                    0: { side: 'top'}   // Use "top" or "bottom".
                                }
                            }
                        };

                        // Create DataTable and add the array to it.
                        var figures = google.visualization.arrayToDataTable(arrSales)

                        // Define the chart type (LineChart) and the container (a DIV in our case).
                        var chart = new google.charts.Line(document.getElementById('chart'))

                        // Draw the chart with Options.
                        chart.draw(figures, google.charts.Line.convertOptions(options));
                    });
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert('Got an Error');
                }
            
        });
    }
</script>

</html>