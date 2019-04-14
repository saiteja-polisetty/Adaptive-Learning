<?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "quiz";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    echo "connected successfully";

    
    $sql="select count(*) as c from questions;";
    $result=$conn->query($sql);
    $var=mysqli_fetch_assoc($result);

    $_SESSION['qid']=$var['c']+1;
        //echo $var['c'];
        //echo $_SESSION['qid'];




    $question=$_POST['question'];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    $correct=$_POST['correct'];
    $diff=$_POST['diff'];
    //$_SESSION['qid']=$_SESSION['qid']+1;
    $x=$_SESSION['qid'];
    //echo $x;
    $sql = "INSERT INTO questions VALUES ('$x','$question','$option1','$option2','$option3','$option4','$correct','$diff');";    
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        $y='q'.$x;
        $sql1="ALTER TABLE csolved1 ADD COLUMN $y varchar(100) NOT NULL DEFAULT '0'; ";
        if ($conn->query($sql1) === TRUE) {
            //echo "New column created successfully";
            header("location:questionupload.php");
        }
        else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
        //header("location:questionupload.php");
                            
                            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
    }

                    
?>