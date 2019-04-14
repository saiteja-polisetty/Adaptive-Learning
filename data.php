<?php 
    session_start();
    $n=$_SESSION['uname'];
    //echo $n;
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
//                var data = google.visualization.arrayToDataTable([
//          ['Year', 'Sales', 'Expenses'],
//          ['2004',  1000,     0],
//          ['2005',  1170,      460],
//          ['2006',  660,       1120],
//          ['2007',  1030,      540]
//        ]);
            var data = new google.visualization.arrayToDataTable([['date','C-aptiude Score','Quant score','Verbal score'],
                            <?php
                                
                                $servername = "localhost";
                                $username = "root";
                                $password = "root";
                                $dbname = "quiz";
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                                            //echo "connected successfully";

                                
                                $sql="select dates,sum(c),sum(quant),sum(verbal) from scores where uid='$n' group by dates;";

                                $result=$conn->query($sql);
                                                                    
                                //echo "['2019-11-27',10,9,2]";
                                while($row=mysqli_fetch_assoc($result))  
                                {
                                    
                                echo "['".$row['dates']."',".$row['sum(c)'].",".$row['sum(quant)'].",".$row['sum(verbal)']."]";
                                echo ",";    
                                }
    
                            $result->close();
                            $conn->close();
    //$jsontable=json_encode($data);
                            ?>
                        ]);
                var options = {
                    title: 'Performance',
                    legend: { position: 'bottom' },
                    chartArea:{width:'95%',height:'65%'}
                };
                var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

                chart.draw(data, options);
            }
        </script>
        <style>
            .page-wrapper
            {
                width:1000px;
                margin: 0 auto;
            }
            .container
            {
                padding:1%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="rows" style="height: 10%">
                <div class="col-sm-3">
                    <img src="logo2.png" class="img-rounded" alt="LOGO" style="height: 100%;width: 100%;">
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    
                        <div class="search-container">
                            <form action="#">
                                <input type="text" placeholder="Search.." name="search" style="height: 55%;width: 80%;">
                                <button type="submit" style="height: 50%;width: 10%;">
                                    <i class="fa fa-search">
                                        <a href="#">
                                            <span class="glyphicon glyphicon-search" style="height: 55%"></span>
                                        </a>
                                    </i>
                                </button>
                            </form>
                        </div>
                    
                </div>
                <div class="col-sm-1">
                    <a href="testing.php" ><button type="button" class="btn btn-warning ">
                    
                        <span class="glyphicon glyphicon-home"></span>Home
                    
                </button></a>
                </div>
                <div class="col-sm-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['names'] . " "; ?><span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile.php">Profile</a></li>
                            
                            <li><a href="meet.html">Help</a></li>
                            <li><a href="home.html">Logout</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="page-wrapper">
            <pre><h2 align="center">Statistics based on Daily Total score</h2></pre>
            <div id="line_chart" style="width:100%;height:500px"></div>
        </div>
    </body>
</html>
