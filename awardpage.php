<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

$username = "";
$email    = "";
$erroremp="";

$db = mysqli_connect('localhost', 'root', '', 'project');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
else  
{
   if(($_SERVER["REQUEST_METHOD"]=="POST"))
    {   $atitle= isset($_POST['atitle']) ? $_POST['atitle'] : '';
        $ainame= isset($_POST['ainame']) ? $_POST['ainame'] : '';
        $anab= isset($_POST['anab']) ? $_POST['anab'] : '';
        $amy= isset($_POST['amy']) ? $_POST['amy'] : '';
        $empid= isset($_POST['empid']) ? $_POST['empid'] : '';
                }
            }
        if((isset($_POST['submit']))){
            if($erroremp==""){

        
        $stmt=$db->prepare("insert into awards(empid,atitle,ainame,anab,amy) values(?,?,?,?,?) ");
        $stmt->bind_param("issss",$empid,$atitle,$ainame,$anab,$amy);
        $stmt->execute();
        echo "<script>alert('saved sucessfully');window.location.href = 'user.php';</script>";
        $stmt->close();
        $db->close();
   
    
}
else{
    header("Location :mm1.php");
}
}    