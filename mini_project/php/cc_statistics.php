<?php
    $host = "localhost";
    $user_name = "root";
    $pwd = "";   
    $db_name = "student_portal";
    $con = mysqli_connect($host, $user_name, $pwd, $db_name);
    if(!$con) {
        die("Connection Error");
    } else {
        echo "connected <br>";
    }
    $sql_query = "SELECT `name` FROM `coding_competition`;";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_all($result);
    $val1 = sizeof($row);

    $sql_query = "SELECT `name` FROM `registered_students`;";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_all($result);
    $val2 = sizeof($row);

    $registered = ($val1 * 100) / $val2;
    // echo "<h2>$registered%</h2>";
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <style>            
            div {
                display: inline-block;
            } 
            #image {
                position: relative;
                left: 70px;
            }
        </style>
    </head>
    <body>
        <div id="piechart"></div>
        <div id = "image">
            <img src="../images/college-site.jpg" height = "550px" width = "800px" alt="">
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            // Draw the chart and set the chart values
            function drawChart() {
                var val1 = "<?php echo $val1; ?>";
                var val2 = "<?php echo $val2 - $val1; ?>";
                val1 = parseInt(val1);
                val2 = parseInt(val2);
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Status');
                data.addColumn('number', 'Registered Count');
                data.addRows([
                ['Registered', val1],
                ['NotRegistered', val2],
            ]);
            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Coding Competition', 'width':550, 'height':400};
            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
            }
        </script>
    </body>
</html>
