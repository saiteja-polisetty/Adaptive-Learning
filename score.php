<?php session_start(); ?>

<!DOCTYPE html>
 <html>
<head>
<style>
div {
  background-color: white;
  width: 250px;
  border: 10px solid green;
  padding: 20px;
  margin-top: 100px;
  margin-bottom:900px;
  margin-right:80px;
  margin-left:600px;
    font-size: 30px;
}
</style>
</head>
<body>
<h1><center><b>Thankyou</b></center></h1>
<h2><center>Quiz completed successfully</center></h2>
<div><h3><center>Scoreboard</center></h3>
    <p>Marks Aquired : <?php echo $_SESSION['score']; ?> </p>
    <p>Total Score Attempted : <?php echo $_SESSION['totalscore']; ?></p>
    <p>First Level Attempted : <?php echo $_SESSION['firstlevel'] ?></p>
    <p>Second Level Attempted : <?php echo $_SESSION['secondlevel'] ?></p>
    <p>Third Level Attempted : <?php echo $_SESSION['thirdlevel'] ?></p>
    <p>Fourth Level Attempted : <?php echo $_SESSION['fourthlevel'] ?></p>
    <p>Fifth Level Attempted : <?php echo $_SESSION['fifthlevel'] ?></p>
</div>
</body>
</html>
<?php 
    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "quiz";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    echo "connected successfully";

    $n=$_SESSION['uname'];
    $c=$_SESSION['score'];;
    $sql="insert into scores values('$n',CURRENT_DATE,CURRENT_TIME,'$c');";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        
?>
