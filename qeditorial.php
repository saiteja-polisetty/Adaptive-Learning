<?php session_start();
    
    
    //$id=$_GET['id'];
    
    //echo $id;
    $id=$_SESSION['qeid'];
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
        <style>
            
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
        
        <div class="container">
            
            <div class="row" style="height: 5%">
                <div class="col-sm-2">
                    <button type="button" class="btn btn-success" onclick="myfunc()">
                        Prev
                    
                    </button>
                </div>
                <div class="col-sm-8"></div>
                
                <div class="col-sm-2">
                    <button type="button" class="btn btn-success" onclick="myFunction()" name="next">
                        Next
                    
                    </button>
                </div>
            </div>
           
        </div>
        <script>
            function myfunc()
            {
                location.href="qeditorialcalc1.php";
            }
          function myFunction() 
            {
                            //
                
                location.href="qeditorialcalc.php";
            }
      </script>
        <div class="container">
            <!--div class="col-sm-1"></div-->
            <div class="col-sm-12" style="overflow:auto;height:70%" >
                <?php
                    echo "<br>";
                    
                    if(isset($_POST['userID']))
                    {
                        
                        $uid = $_POST['userID'];
                        echo $uid;
    
                    }
                    //$id=$_GET['id'];
                    //$_SESSION['ceid']=$id;
                    //$cid=$_SESSION['ceid'];
                    //echo $id;
                    //echo $id;
                    //echo "<br>";
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "quiz";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $f=1;
                    $col=$_SESSION['uname'];
//                    echo $col;
//                    echo $id;
                    $sql2 = "UPDATE qelearnt SET $id='$f' WHERE uid='$col';";
                    if ($conn->query($sql2) === TRUE) {
                                            //echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $sql = "SELECT qid,topicdata FROM qeditorial where qid='$id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        echo "<font size='5'>";
                        echo "<code style='color:#444'>";
                        echo $row['topicdata'] .  "<br>";
                        echo "</code>";
                        echo "</font>";
                    }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
                <!--br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br-->
            </div>
            <!--div class="col-sm-1"></div-->
        </div>
    </body>
</html>