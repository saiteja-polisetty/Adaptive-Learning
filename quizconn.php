<?php
    session_start();
    $x=$_SESSION['ans'];
    $y=$_POST['butt'];
    $_SESSION['totalscore']=$_SESSION['totalscore']+$_SESSION['clevel'];
    
    if($_SESSION['clevel']==1)
    {
        $_SESSION['firstlevel']=$_SESSION['firstlevel']+1;
    }
    if($_SESSION['clevel']==2)
    {
        $_SESSION['secondlevel']=$_SESSION['secondlevel']+1;
    }
    if($_SESSION['clevel']==3)
    {
        $_SESSION['thirdlevel']=$_SESSION['thirdlevel']+1;
    }
    if($_SESSION['clevel']==4)
    {
        $_SESSION['fourthlevel']=$_SESSION['fourthlevel']+1;
    }
    if($_SESSION['clevel']==5)
    {
        $_SESSION['fifthlevel']=$_SESSION['fifthlevel']+1;
    }
    

    if($x==$y)
    {
        
        $_SESSION['score']=$_SESSION['score']+$_SESSION['clevel'];
        $_SESSION['level']=$_SESSION['level']+1;   
        header("location:quiz.php");
    }
    elseif($x!=$y && ($_SESSION['level']>1))
    {
        $_SESSION['level']=$_SESSION['level']-1;
        header("location:quiz.php");
    }
    else
    {
        $_SESSION['level']=$_SESSION['level'];
        header("location:quiz.php");
    }
    echo $_SESSION['level'];
    echo $_SESSION['score'];
    
?>

























