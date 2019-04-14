<?php session_start() ?>

<?php   $_SESSION['level']=1; 
       // echo $_SESSION['level'];
        $_SESSION['score']=0;
        $_SESSION['totalscore']=0;
        $_SESSION['no_of_ques']=0;
        $p=$_SESSION['uname'];
        $_SESSION['firstlevel']=0;
        $_SESSION['secondlevel']=0;
        $_SESSION['thirdlevel']=0;
        $_SESSION['fourthlevel']=0;
        $_SESSION['fifthlevel']=0;
        
    //echo $p;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "quiz";
$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "connected successfully";

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

$sql1="select * from qelearnt where uid='$p';";
    $result1=$conn->query($sql1);
    $var1=mysqli_fetch_assoc($result1);
    $count1=0;
    if($var1['qone']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qtwo']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qthree']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qfour']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qfive']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qsix']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qseven']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qeight']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qnine']=='1')
    {
        $count1=$count1+1;
    }
if($var1['qten']=='1')
    {
        $count1=$count1+1;
    }
    $per1=($count1*100)/10;
    //echo $per;

$sql2="select * from velearnt where uid='$p';";
    $result2=$conn->query($sql2);
    $var2=mysqli_fetch_assoc($result2);
    $count2=0;
    if($var2['vone']=='1')
    {
        $count2=$count2+1;
    }
if($var2['vtwo']=='1')
    {
        $count2=$count2+1;
    }
if($var2['vthree']=='1')
    {
        $count2=$count2+1;
    }
if($var2['vfour']=='1')
    {
        $count2=$count2+1;
    }
if($var2['vfive']=='1')
    {
        $count2=$count2+1;
    }
if($var2['vsix']=='1')
    {
        $count2=$count2+1;
    }
if($var2['vseven']=='1')
    {
        $count2=$count2+1;
    }

    $per2=($count2*100)/7;

        $conn->close();
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
                    <a href="#" ><button type="button" class="btn btn-warning ">
                    
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
        <div class="container" style="height: 15%">
            <!--<div class="row" >
                    <center><h1>hello</h1></center>
            </div>-->
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3" style="background-color: white;border-style: solid;border-width: 3px;border-color: dodgerblue;border-radius: 10px">
                    <center><h2><a href="cindex.php">C Programming Aptitude</a></h2></center>
                    <br>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $per."%" ?>"><p style="color:white"><?php echo $per."%" ?></p>
                        </div>
                    </div>
                    <hr style="border-width: 3px">
                    <br>
                    <p>....
                    ...
                    
                    ...</p>
                    <center><button type="button" class="btn btn-primary" onclick="myfunc();">Take Test</button></center><br><br>
                    <script>
                        function myfunc()
                        {
                            location.replace("instruction.php")
                        }
                    </script>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3" style="background-color: white;border-style: solid;border-width: 3px;border-color: dodgerblue;border-radius: 10px">
                    <center><h2><a href="quantindex.php">Quantitative Aptitude</a></h2></center>
                    <br>
                    
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $per1."%" ?>"><p style="color:white"><?php echo $per1."%" ?>
                        </div>
                    </div>
                    <hr style="border-width: 3px">
                    <br>
                    <p>....
                    ...
                    
                    ...</p>
                    <center><button type="button" class="btn btn-primary" onclick="myfunc1();">Take Test</button></center><br><br>
                    <script>
                        function myfunc1()
                        {
                            location.replace("qquiz.php")
                        }
                    </script>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3" style="background-color: white;border-style: solid;border-width: 3px;border-color: dodgerblue;border-radius: 10px">
                    <center><h2><a href="verbalindex.php">Verbal<br>Aptitude</a></h2></center>
                    <br>
                    
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $per2."%" ?>"><p style="color:white"><?php echo $per2."%" ?>
                        </div>
                    </div>
                    <hr style="border-width: 3px">
                    <br>
                    <p>....
                    ...
                    
                    ...</p>
                    <center><button type="button" class="btn btn-primary" onclick="myfunc2();">Take Test</button></center><br><br>
                    <script>
                        function myfunc2()
                        {
                            location.replace("vquiz.php")
                        }
                    </script>
                </div>
                
            </div>
        </div>
        
    </body>
</html>