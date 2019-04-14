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


    $id=$_SESSION['uname'];
    $sql="select * from userdetails where userid='$id';";
    $result=$conn->query($sql);
    $var=mysqli_fetch_assoc($result);

    $p=$var['password'];

    
    $newname=$_POST['name'];
    $emailid=$_POST['email'];
    $mob=$_POST['mobile'];
    $p1=$_POST['password'];
    
    
    if($p==$p1)
    {
        //$name="";
        $sql1="update userdetails set userid='$emailid',name='$newname',mobileno='$mob' where userid='$id';";
        $result1=$conn->query($sql1);
        $var1=mysqli_fetch_assoc($result1);
        $name=$var['name'];
        $_SESSION['uname']=$emailid;                    
        $_SESSION['names']=$newname;
        header("location:profile.php");
    }
    else
    {
        echo "<script>
                alert('Password is incorrect');
            </script>";
        echo "<script>window.location.href='edit.php'</script>";
    }


?>