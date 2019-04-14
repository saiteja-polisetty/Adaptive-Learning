<?php
    session_start();
    $p=$_POST['pass'];
    $cp=$_POST['cpass'];
    $x=$_SESSION['pemail'];
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "quiz";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "connected successfully";


    if($p==$cp)
    {
        
        $sql = "update userdetails set password='$p' where userid='$x';";
        if ($conn->query($sql) === TRUE) {
            header("location:login.php");
        }
        else
        {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        
    }
    else
    {
        echo "<script>
          alert('Password did not match');
      </script>";
       echo "<script>window.location.href='fpp3.php'</script>";
    }
$conn->close();
?>