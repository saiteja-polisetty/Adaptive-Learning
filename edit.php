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
    //echo "connected successfully";

    $id=$_SESSION['uname'];
    $sql="select * from userdetails where userid='$id';";
    $result=$conn->query($sql);
    $var=mysqli_fetch_assoc($result);
    $n=$var['name'];
    $e=$var['userid'];
    $m=$var['mobileno'];
?>


<html>
    <head>
        <link rel="stylesheet" href="edit.css">
    </head>
    <body>
        
            <div id="sc-edprofile">
                <h1>Edit Profile</h1>
                    <div class="sc-container">
                        <form action="editconn.php" method="post">
                            <input type="text" value="<?php echo $n; ?>" placeholder="Name" name="name"/>
                            <input type="email" placeholder="Email Id" value="<?php echo $e; ?>" name="email"/>
                            <input type="text" placeholder="Mobile Number" value="<?php echo $m; ?>" name="mobile"/>
                            <input type="password" placeholder="Confirm Password to update details" name="password"/>
                            <input type="submit" value="Update details" onclick="myFunction()" />
                        </form>
                    <!--script>
                        function myFunction() {
                            location.href="profile.php"
                        }
                    </script-->
                </div>
            </div>
    </body>
</html>