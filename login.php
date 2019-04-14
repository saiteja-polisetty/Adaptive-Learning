<?php 
    session_start(); 
    $passworderror="";
    if(isset($_POST['submit']))
    {
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
                            $passworderror="Email ID or password is incorrect";
//                            echo "<script>
//                                alert('Email ID or password is incorrect');
//                                </script>";
//                        echo "<script>window.location.href='login.php'</script>";
                        }
                    
                        
                        

                        $conn->close();
    }

?>


<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
        <style>
            input[type=email],input[type=password]{
                width:100%;
                box-sizing: border-box;
                border: none;
                border-bottom: 1px solid dodgerblue;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="rows" style="height: 10%"></div>
               <div class="rows" style="height: 10%">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success" disabled style="height: 100%;width: 100%;font-size:20px">
                            Login
                        </button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success" style="height: 100%;width: 100%;font-size:20px" onclick="myfunc1()">
                            SignUp
                        </button>
                    <script>
                        function myfunc1()
                        {
                            location.replace("signup.php")
                        }
                    </script>
                            </div>
                    </div> 
                   
                   
                <div class="col-sm-4"></div>
            </div>
            <div class="rows" style="height:50%;padding: 4%">
                <form action="" method="post">
                    <center><input type="email" required name="Emailid" value="<?php if(isset($_POST['Emailid'])){ echo $_POST['Emailid'];}?>" placeholder="Email Id" style="height: 20%;width:30%;padding: 2%;"></center>
                    
                    <center><input type="password" required id="myInput" name="Password" value="<?php if(isset($_POST['Password'])){ echo $_POST['Password'];}?>"  placeholder="Password" style="height: 20%;width:30%;padding: 2%;margin: 2%"></center><center><font style="color:red" ><?php echo $passworderror; ?></font></center>
                    
                    <center><input type="checkbox" onclick="myFunction()">Show Password</center>
                    
                    <center><input type="submit" name="submit" style="height: 20%;width: 30%;background-color:mediumseagreen;font-size:20px;color:white" value="Login"></center><br>
                    
                    <center><p style="font-size: 14px"><a href="fpp1.php">Forgot Password?</a></p></center>
                </form>
                <script>
                    function myFunction() {
                        var x = document.getElementById("myInput");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    } 
                </script>
            </div>
        </div>
    </body>
</html>