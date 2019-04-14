<?php
    $emailerror="";
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
                    //echo "connected successfully";
                        
                        $uid=$_POST['Emailid'];
                             
                        
                        $username=$_POST['Name'];
                        
                        $mobile=$_POST['mbno'];
                        $password=$_POST['Password'];
                        $cpassword=$_POST['Cpassword'];
                    if(filter_var($uid, FILTER_VALIDATE_EMAIL))
                    {
                        if($password==$cpassword)
                        {
                            $sql = "INSERT INTO userdetails VALUES ('$uid','$username','$password','$mobile');";    
                            if ($conn->query($sql) === TRUE) 
                            {
                                echo "New record created successfully";
                                $sql1 = "INSERT INTO csolved1 (uid) VALUES ('$uid');";    
                                    if ($conn->query($sql1) === TRUE) 
                                    {
                                        echo "New record created successfully";
                                    }
                                $sql2 = "INSERT INTO celearnt (uid) VALUES ('$uid');";    
                                    if ($conn->query($sql2) === TRUE) 
                                    {
                                        echo "New record created successfully";
                                    }
                                $sql3 = "INSERT INTO qelearnt (uid) VALUES ('$uid');";    
                                    if ($conn->query($sql3) === TRUE) 
                                    {
                                        echo "New record created successfully";
                                    }
                                $sql4 = "INSERT INTO qsolved1 (uid) VALUES ('$uid');";    
                                    if ($conn->query($sql4) === TRUE) 
                                    {
                                        echo "New record created successfully";
                                    }
                                $sql5 = "INSERT INTO velearnt (uid) VALUES ('$uid');";    
                                    if ($conn->query($sql5) === TRUE) 
                                    {
                                        echo "New record created successfully";
                                    }
                                $sql6 = "INSERT INTO vsolved1 (uid) VALUES ('$uid');";    
                                    if ($conn->query($sql6) === TRUE) 
                                    {
                                        echo "New record created successfully";
                                    }
                                header("location:login.php");
                            
                            
                            } 
                            else 
                            {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                        else
                        {
                            $passworderror="Password did not match";
//                            echo "<script>
//                                alert('Password doesnot match');
//                                </script>";
                            //header("location:signup.php");
                            //echo "<script>window.location='signup.php'</script>";
                        }
                    }
                    else
                    {
                        $emailerror="Email is not valid";
//                        echo "<script>
//                                alert('Email is not valid');
//                                </script>";
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
            input[type=text],input[type=email],input[type=password]{
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
                                <button type="button" class="btn btn-success" style="height: 100%;width: 100%;font-size:20px" onclick="myfunc()">
                            Login
                        </button>
                                <script>
                        function myfunc()
                        {
                            location.replace("login.php")
                        }
                    </script>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success" disabled style="height: 100%;width: 100%;font-size:20px">
                            SignUp
                        </button>
                            </div>
                    </div>
                   
                <div class="col-sm-4"></div>
            </div>
            <div class="rows" style="height:50%;margin : 1%">
                <form method="post" action="">
                    <center><input type="text" name="Name" placeholder="Name" required value="<?php if(isset($_POST['Name'])){ echo $_POST['Name'];}?>" style="height: 10%;width:30%;padding: 2%;margin: 1%"></center>
                    
                    <center><input type="email" name="Emailid" required placeholder="Email Id" value="<?php if(isset($_POST['Emailid'])){ echo $_POST['Emailid'];}?>" style="height: 10%;width:30%;padding: 2%;margin: 1%"></center><center><font style="color:red" ><?php echo $emailerror; ?></font></center>
                    
                    <center><input type="text" pattern="[6789][0-9]{9}" title="Must contain 10 digits and can start only with 6,7,8,9" name="mbno" required placeholder="Mobile No" value="<?php if(isset($_POST['mbno'])){ echo $_POST['mbno'];}?>" style="height: 10%;width:30%;padding: 2%;margin: 1%"></center>
                    
                    <center><input type="password" required id="myInput" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  value="<?php if(isset($_POST['Password'])){ echo $_POST['Password'];}?>" placeholder="Password" style="height: 10%;width:30%;padding: 2%;margin: 1%"></center>
                    
                    <center><input type="checkbox" onclick="myFunction()">Show Password</center>
                    
                    <center><input type="password" required name="Cpassword" value="<?php if(isset($_POST['Cpassword'])){ echo $_POST['Cpassword'];}?>" placeholder="Confirm Password" style="height: 10%;width:30%;padding: 2%;margin: 1%"></center><center><font style="color:red" ><?php echo $passworderror; ?></font></center>
                    
                    <center><input type="submit" name="submit" style="height: 20%;width: 30%;background-color:mediumseagreen;font-size:20px;color:white" value="Signup"></center>
                    
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