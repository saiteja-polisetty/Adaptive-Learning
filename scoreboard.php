<?php session_start(); 

    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "quiz";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    //echo "connected successfully";

    $n=$_SESSION['uname'];
    $c=$_SESSION['score'];
    //$sql="insert into scores values('$n',CURRENT_DATE,CURRENT_TIME,'$c','c');";
    $sql="insert into scores (uid,dates,c) values ('$n',CURRENT_DATE,'$c');";
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        

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
            body
            {
                background-color:white;
                /*background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.5)),url(../website-design-background.png);*/
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
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="home.html">Logout</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container" style="background-color:azure">
            <div class="rows" style="height: 10%"></div>
            <div class="rows" style="height: 10%">
                <center><b><p style="font-size:40px">SCORE BOARD</p></b></center>
            </div>
            
            <div class="rows" style="height: 10%">
                <div class="col-sm-2">
                    
                </div>
                <div class="col-sm-8">
                    
                    <center><h2><p>First Level Attempted : <?php echo $_SESSION['firstlevel'] ?> </p></h2></center>
                    <center><h2><p>Second Level Attempted  : <?php echo $_SESSION['secondlevel'] ?> </p></h2></center>
                    <center><h2><p>Third Level Attempted  : <?php echo $_SESSION['thirdlevel'] ?> </p></h2></center>
                    <center><h2><p>Fourth Level Attempted : <?php echo $_SESSION['fourthlevel'] ?></p></h2></center>
                    <center><h2><p>Fifth Level Attempted : <?php echo $_SESSION['fifthlevel'] ?> </p></h2></center><br>
                    <pre><center><h2><p>Marks Acquired : <?php echo $_SESSION['score'].' out of '.$_SESSION['totalscore']; ?> </p></h2></center></pre>
                </div>
                <div class="col-sm-2">
                    <!--center><h2><p>Total Score Attempted  : 0 </p></h2></center-->
                </div>
            </div>
        
        
        
        
        </div>
    </body>
</html>
