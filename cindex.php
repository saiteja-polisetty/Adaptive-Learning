<?php session_start(); 
    $_SESSION['ceid']='cone';
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "quiz";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "connected successfully";
    
    $p=$_SESSION['uname'];
    //echo $p;
    $sql="select * from celearnt where uid='$p';";
    $result=$conn->query($sql);
    $var=mysqli_fetch_assoc($result);
    $count=0;
    if($var['cone']=='1')
    {
        $count=$count+1;
    }
if($var['ctwo']=='1')
    {
        $count=$count+1;
    }
if($var['cthree']=='1')
    {
        $count=$count+1;
    }
if($var['cfour']=='1')
    {
        $count=$count+1;
    }
if($var['cfive']=='1')
    {
        $count=$count+1;
    }
if($var['csix']=='1')
    {
        $count=$count+1;
    }
if($var['cseven']=='1')
    {
        $count=$count+1;
    }
if($var['ceight']=='1')
    {
        $count=$count+1;
    }
if($var['cnine']=='1')
    {
        $count=$count+1;
    }
if($var['cten']=='1')
    {
        $count=$count+1;
    }
    $per=($count*100)/10;
    //echo $per;
//echo $count;
        $conn->close();
    //$_SESSION['pro1']=$per;
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
        <div class="container title">
            <div class="rows task" style="height: 15%">
                <div class="col-sm-12">
                    <center><h1><mark>C Programming Aptitude Tutorial</mark></h1><br></center>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $per."%" ?>">  </div><?php echo $per."%" ?>
                        </div>
                    </div>
                
                <?php
                    $topic1='cone';
                    $topic2='ctwo';
                    $topic3='cthree';
                    $topic4='cfour';
                    $topic5='cfive';
                    $topic6='csix';
                    $topic7='cseven';
                    $topic8='ceight';
                    $topic9='cnine';
                    $topic10='cten';
                    
                    ?>
                    <div class="index" style="font-size: 20px">
                        
                        
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic1 ?>"> Variables and Expressions</a>                                         Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic2 ?>">Basic Input-Output</a>                                                Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic3 ?>">Control Structures</a>                                                Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic4 ?>">Functions</a>                                                         Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic5 ?>">Scope and extent</a>                                                  Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic6 ?>">Arrays and Strings</a>                                                Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic7 ?>">Pointers</a>                                                          Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic8 ?>">Structures and Unions</a>                                             Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic9 ?>">Files</a>                                                             Duration:45 min</h4></pre>
                        <pre><h4>    <a href="editorial.php?id=<?php echo $topic10 ?>">Dynamic Memory Allocation</a>                                         Duration:45 min</h4></pre>
                        
                        <!--script>
                            function anchor()
                            {
                                $(document).on('click', 'a', function () {
                                var p=this.id;
                                
                                alert(p);
                                    $.ajax({
                                        type: "POST",
                                        url: 'editorial.php',
                                        data: { userID : "testing" },
                                        success: function(data)
                                        {
                                            
                                            alert("success!");
                                        }
                                    });
                                
                                   });
                                
                            }
                            
                        </script-->
                        
                            
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>