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
    {   $names= isset($_POST['names']) ? $_POST['names'] : '';
        $desig= isset($_POST['desig']) ? $_POST['desig'] : '';
        $year=isset($_POST['year']) ? date('Y-m-d',strtotime($_POST['year'])):'';
        $spec= isset($_POST['spec']) ? $_POST['spec'] : '';
        $nos= isset($_POST['nos']) ? $_POST['nos'] : '';
        $sc1= isset($_POST['sc1']) ? $_POST['sc1'] : '';
        $sc2= isset($_POST['sc2']) ? $_POST['sc2'] : '';
        $sc3= isset($_POST['sc3']) ? $_POST['sc3'] : '';
        $sc4= isset($_POST['sc4']) ? $_POST['sc4'] : '';
        $sc5= isset($_POST['sc5']) ? $_POST['sc5'] : '';
        $ro1= isset($_POST['ro1']) ? $_POST['ro1'] : '';
        $ro2= isset($_POST['ro2']) ? $_POST['ro2'] : '';
        $ro3= isset($_POST['ro3']) ? $_POST['ro3'] : '';
        $ro4= isset($_POST['ro4']) ? $_POST['ro4'] : '';
        $ro5= isset($_POST['ro5']) ? $_POST['ro5'] : '';
        $do1= isset($_POST['do1']) ? $_POST['do1'] : '';
        $do2= isset($_POST['do2']) ? $_POST['do2'] : '';
        $do3= isset($_POST['do3']) ? $_POST['do3'] : '';
        $do4= isset($_POST['do4']) ? $_POST['do4'] : '';
        $do5= isset($_POST['do5']) ? $_POST['do5'] : '';
        $go1= isset($_POST['go1']) ? $_POST['go1'] : '';
        $go2= isset($_POST['go2']) ? $_POST['go2'] : '';
        $go3= isset($_POST['go3']) ? $_POST['go3'] : '';
        $go4= isset($_POST['go4']) ? $_POST['go4'] : '';
        $go5= isset($_POST['go5']) ? $_POST['go5'] : '';
        $f1= isset($_POST['f1']) ? $_POST['f1'] : '';
        $f2= isset($_POST['f2']) ? $_POST['f2'] : '';
        $f3= isset($_POST['f3']) ? $_POST['f3'] : '';
        $f4= isset($_POST['f4']) ? $_POST['f4'] : '';
        $f5= isset($_POST['f5']) ? $_POST['f5'] : '';
        $empid= isset($_POST['empid']) ? $_POST['empid'] : '';
        if((isset($_POST['submit']))){
            if($erroremp==""){

        
        $stmt=$db->prepare("insert into guideship(empid,names,desig,year,spec,nos,sc1,sc2,sc3,sc4,sc5,ro1,ro2,ro3,ro4,ro5,do1,do2,do3,do4,do5,go1,go2,go3,go4,go5,f1,f2,f3,f4,f5) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("sssssisssssssssssssssssssssssss", $empid,$names,$desig,$year,$spec,$nos,$sc1,$sc2,$sc3,$sc4,$sc5,$ro1,$ro2,$ro3,$ro4,$ro5,$do1,$do2,$do3,$do4,$do5,$go1,$go2,$go3,$go4,$go5,$f1,$f2,$f3,$f4,$f5);
        $stmt->execute();
        echo "<script>alert('saved sucessfully');window.location.href = 'user.php';</script>";
        $stmt->close();
        $db->close();
   
    
}
else{
    header("Location :mm1.php");
}
}    
    }
 }   