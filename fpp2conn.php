<?php
    session_start();
    if($_SESSION['otps']==$_POST['code'])
    {
        header("location:fpp3.php");
    }
    else
    {
        echo "<script type='text/javascript'>alert('Enter the correct code');</script>";
		header("location:fpp2.php");
    }
?>