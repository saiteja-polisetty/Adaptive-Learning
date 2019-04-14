<?php session_start(); ?>
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
                <div class="col-sm-3">
                </div>
                <div class="col-sm-2">
                    <a href="scoreboard1.php"><button type="button" class="btn btn-warning " style="height: 100%;width: 100%;font-size: 20px">Submit
                    
                        <!--<span class="glyphicon glyphicon-home"></span>Home-->
                    
                </button></a>
                </div>
                <div class="col-sm-2">
                        
                        <button type="button" class="btn btn-success" style="height: 100%;width: 100%;">
                            <p id="timer" style="font-size: 20px">0</p>
                        </button>
                        <script>
                            var time_in_minutes = 10;
                            var current_time = Date.parse(new Date());
                            var deadline = new Date(current_time + time_in_minutes*60*1000);
                            function time_remaining(endtime)
                            {
	                           var t = Date.parse(endtime) - Date.parse(new Date());
	                           var seconds = Math.floor( (t/1000) % 60 );
	                           var minutes = Math.floor( (t/1000/60) % 60 );
	                           var hours = Math.floor( (t/(1000*60*60)) % 24 );
	                           var days = Math.floor( t/(1000*60*60*24) );
	                           return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
                            }
                            function run_clock(endtime)
                            {
	                           
	                           function update_clock()
                                {
		                          var t = time_remaining(endtime);
                                    document.getElementById('timer').innerHTML = t.minutes+'m '+t.seconds+'s';
		                          if(t.total<=0)
                                  { 
                                      clearInterval(timeinterval); 
                                  }
	                           }
	                           update_clock(); // run function once at first to avoid delay
	                           var timeinterval = setInterval(update_clock,1000);
                            }
                            run_clock(deadline);
                        </script>
                    
                </div>
                
            </div>
            
            <div class="rows" style="height: 90%;background-color: white;overflow:auto">
                
                <br><br><br><br>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "quiz";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                
                
                if($_SESSION['no_of_ques']!=3)
                {
                    //echo "hello";
                   $_SESSION['no_of_ques']=$_SESSION['no_of_ques']+1;
                    $count=1;
                    $l=$_SESSION['level'];
                    //echo $l;
                    $name=$_SESSION['uname'];
                    $sql = "SELECT * FROM qquestions where level='$l';";
                    $result = $conn->query($sql);
                    $flag=0;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) 
                        {
                            //echo "hi";
                            $q=$row['qid'];
                            //echo $name;
                            $sql1 = "SELECT * FROM qsolved1 where uid='$name';";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) 
                            {
                                //echo "hello";
                                while($row1 = $result1->fetch_assoc()) 
                                {
                                    //echo "hi";
                                    $s=0;
                                    if($row1["q".$q]==$s)
                                    {
                                        $flag=1;
                                        $f=1;
                                        $col="q".$q;
                                        $sql2 = "UPDATE qsolved1 SET $col='$f' WHERE uid='$name';";
                                        if ($conn->query($sql2) === TRUE) {
                                            //echo "Record updated successfully";
                                            } else {
                                                echo "Error updating record: " . $conn->error;
                                        }
                                        echo "<font size='5'>";
                            
                                        //echo $count . "." . " ";
                                        echo $row['ques'] .  "<br>";
                                        echo "</font>";
                                        echo "<font size='6'>";
                                        $l1=$row['op1'];
                                        $l2=$row['op2'];
                                        $l3=$row['op3'];
                                        $l4=$row['op4'];
                                        $_SESSION['ans']=$row['correct'];
                                        $_SESSION['clevel']=$row['level'];
                                        //echo $_SESSION['ans'];
                                        echo "<style>input[type='radio']{border: 0px;
                                            width: 5%;
                                            height: 1em;}</style>";
                                        echo "<form method='POST' action='qquizconn.php'>";
                                        
                                        echo "<input type='radio' value='$l1' name='butt' id='bt1' />   ";
                                        echo $row['op1'] . "<br>";
                                        
                                        echo "<input type='radio' value='$l2' name='butt' id='bt2' />   ";
                                        echo $row['op2'] . "<br>";
                                        
                                        echo "<input type='radio' value='$l3' name='butt' id='bt3' />   ";
                                        echo $row['op3'] . "<br>";
                                        
                                        echo "<input type='radio' value='$l4' name='butt' id='bt4' />   ";
                                        echo $row['op4'] . "<br>";
                                        
                                        echo "<center><input type='submit' name='submit1' value='Next' style='style=height: 100%;width: 30%;border: 2px solid;border-radius: 15px 15px;background-color:mediumseagreen;font-size:25px;color:white'></center>" ;
                                        echo "</form>";
                                        
                                        echo "</font>";
                                        
                               
                                        break;
                                    }
                                    else
                                    {
                                        break;
                                    }
                                    
                                }
                            }
                            if($flag==1)
                            {
                                break;
                            }
                        }
                    }
                }
                elseif($_SESSION['no_of_ques']==3)
                {
                    header("location:scoreboard1.php");
                }
                    
                            $conn->close();
                ?>
                    
            </div>
            <!--div class="rows" style="height:7%">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <form method="post" action="quiz.php">
                        <input type="submit" name="calculate" value="Next" style="height: 100%;width: 100%;border: 2px solid;border-radius: 15px 15px;background-color:mediumseagreen;font-size:25px;color:white">
                    <button type="button" name="calculate" class="btn btn-info" style="height: 100%;width: 100%;">
                            Next
                        </button>
                    </form>
                    <script>
                        function call()
                        {
                            <!--?php echo calculate(); ?>;
                        }
                    </script>
                </div>
                
            </div-->
        </div>
    </body>
</html>