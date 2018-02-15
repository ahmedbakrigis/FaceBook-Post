<?php
session_start();
$username=$_POST['user'];
$filtername=filter_var($username,FILTER_SANITIZE_STRING);
if ($filtername!==""){
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $_SESSION['name']=$username;
        header("Refresh:5,url=index.php");
        echo "<h2> Well Come " .$_SESSION['name']." You Are Redirect To Page To Write Your Post"."</h2>";
    }else
    {
        header("Refresh:5,url=log.html");
        echo "<h2 >Sorry !!! You Are Redirect To LogIn Page To Enter Your name</h2>";

    }
}
else
{
    header("Refresh:5,url=log.html");
    echo "<h2 >Sorry You Aren't Enter Your Name You Are Redirect To LogIn Page To Enter Your name</h2>";

}