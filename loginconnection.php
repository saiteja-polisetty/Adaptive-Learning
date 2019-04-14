<html>
    

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

                        $uid=$_POST['Emailid'];
                        $_SESSION['uname']=$uid;
                        $password=$_POST['Password'];
                        $sql = "select password from userdetails where userid='$uid'";
                        $result=$conn->query($sql);
                        $var=mysqli_fetch_assoc($result);
                        if($var['password']==$password)
                        {
                            $name="";
                            $sql = "select name from userdetails where userid='$uid'";
                            $result=$conn->query($sql);
                            $var=mysqli_fetch_assoc($result);
                            $name=$var['name'];
                            session_start();
                            $_SESSION['names']=$name;
                            header("location:testing.php");
                        }
                        else
                        {
                            echo "<script>
                                alert('Email ID or password is incorrect');
                                </script>";
                        echo "<script>window.location.href='login.php'</script>";
                        }
                    
                        
                        

                        $conn->close();
                   
?>
    </html>