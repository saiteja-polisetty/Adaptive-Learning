<?php session_start(); 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "quiz";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "connected successfully";
    $u=$_SESSION['uname'];
    //echo $u;
    $sql="select sum(c),sum(quant),sum(verbal) from scores where uid='$u';";
    $result=$conn->query($sql);
    $var=mysqli_fetch_assoc($result);
    $y=$var['sum(c)']+$var['sum(quant)']+$var['sum(verbal)'];
//    
    $sql1="select dates,c,quant,verbal from scores where uid='$u' order by dates desc;";
    $result1=$conn->query($sql1);
    


		
			
			//$connect = mysqli_connect($servername, $username, $password,$dbname);
			if(isset($_POST["insert"]))  
			 {  
				  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
				 // $query = "INSERT INTO userdetails(name,partyid) VALUES ('$file',$partyid)";
				  $sql1 = "update userdetails set photo='$file' where userid='$u';";
				 if($conn->query($sql1)===TRUE){
                     echo '<script>alert("Image updated into Database")</script>';
                 }
                  //$var1=mysqli_fetch_assoc($result1);
				  
				  /*$query2 = "select * from images where partyid=$partyid";
				  $result9 = mysqli_query($conn, $query2);
				  $row9 = mysqli_fetch_assoc($result9);*/
				  
				  /*if($row9['partyid']==''){
					  if(mysqli_query($connect, $query))  
					  {
						   echo '<script>alert("Image Inserted into Database")</script>';  
					  } 
				  }
				  else{
					  if(mysqli_query($connect, $query1))  
					  {  
						   echo '<script>alert("Image updated into Database")</script>';  
					  } 
				  }*/
			 } 
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>User Profile</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!--link rel="stylesheet" href="style.css"-->
    <style>
    .container
            {
                padding:1%;
            }
            body
            {
                background-color:white;
                /*background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.5)),url(../website-design-background.png);*/
            }
        </style>
</head>
<body>

        <div class="container">
            <div class="rows" style="height: 20%">
                <div class="col-sm-3">
                    <img src="logo2.png" class="img-rounded" alt="LOGO" style="height: 100%;width: 100%;">
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    
                        <div class="search-container">
                            <form action="#">
                                <input type="text" placeholder="Search.." name="search" style="height: 55%;width: 80%;">
                                <button type="submit" style="height: 50%;width: 10%;">
                                    <i class="fa fa-search">
                                        <a href="#">
                                            <span class="glyphicon glyphicon-search" style="height: 55%"></span>
                                        </a>
                                    </i>
                                </button>
                            </form>
                        </div>
                    
                </div>
                <div class="col-sm-1">
                    <a href="testing.php" ><button type="button" class="btn btn-warning ">
                    
                        <span class="glyphicon glyphicon-home"></span>Home
                    
                </button></a>
                </div>
                <div class="col-sm-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['names'] . " "; ?><span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile.php">Profile</a></li>
                           
                            <li><a href="meet.html">Help</a></li>
                            <li><a href="home.html">Logout</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="row" style="height:30%;">
            <div class="profile">
                <div class="profile-image">
                    <center><img src="usericon.png" alt="User"  width="200" height="200"></center><br>
                    <!--form method="post">
                        <input type="file" name="propic">
                        <input type="submit" name="insert" value="Upload">
                    </form>
                    <script> 
                        $(document).ready(function(){  
                        $('#insert').click(function(){  
                        var image_name = $('#image').val();  
                        if(image_name == '')  
                        {  
                            alert("Please Select Image");  
                            return false;  
                        }  
                        else  
                        {  
                            var extension = $('#image').val().split('.').pop().toLowerCase();  
                            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                            {  
                                alert('Invalid Image File');  
                                $('#image').val('');  
                                return false;  
                            }  
                        }  
                        });  
                        });  
                    </script--> 
                    <!--button class="btn profile-settings-btn" aria-label="Profile Settings"><i class="fas fa-camera" aria-hidden></i>Upload Profile pic
                        <input class="file-upload" type="file" accept="image/*"/>
                    </button-->
                </div> 
                 
                <div class="profile-user-settings">
                    <center><pre><b><p style="font-size:30px">  <?php echo strtoupper($_SESSION['names']); ?></p></b></pre></center>
                    <!--a href=edit.php style="height:50%">Edit Profile</a-->
                    <center><button class="btn btn-success" onclick="myFunction()"><p style="font-size:25px">Profile Update </p></button><button class="btn btn-danger" onclick="myFunction1()"><p style="font-size:25px">View Statistics </p></button></center>
                    <script>
                        function myFunction() {
                            location.href="edit.php"
                        }
                        function myFunction1() {
                            location.href="data.php"
                        }
                    </script>
                    <br>
                    <!--button class="btn profile-settings-btn" aria-label="Profile Settings"><i class="fas fa-camera" aria-hidden></i>
                        <input class="file-upload" type="file" accept="image/*"/>
                    </button-->                    
                </div>
                <div class="profile-stats">
                    <br>
                    <ul>
                        <center><p style="font-size:25px;"><?php echo $y;?> Points Secured</p></center>
                    </ul>
                </div>
                <div class="profile-bio">
                    
                </div>
            </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="height:60%">
                <table class="table table-striped" style="height:100%;width:100%;font-size:20px">
                    <thead>
                        <tr>
                            <th>Date (YYYY-MM-DD)</th>
                            <th>C-Score</th>
                            <th>Quant-Score</th>
                            <th>Verbal-Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_assoc($result1))
                            {
                                //echo "<pre>";
                                echo "<tr>";
                                echo "<td>" . $row['dates'] . "</td>";
                                echo "<td>" . $row['c'] . "</td>";
                                echo "<td>" . $row['quant'] . "</td>";
                                echo "<td>" . $row['verbal'] . "</td>";
                                echo "</tr>";
                                //echo "</pre>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        
    
    
</body>
</html>