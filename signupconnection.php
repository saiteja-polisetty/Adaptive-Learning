<html>
    

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
                        
                            echo "<script>
                                alert('Password doesnot match');
                                </script>";
                            //header("location:signup.php");
                            echo "<script>window.location='signup.php'</script>";
                        }
                    }
                    else
                    {
                        echo "<script>
                                alert('Email is not valid');
                                </script>";
                    }
                        
                        

                        $conn->close();
                   
?>
    </html>