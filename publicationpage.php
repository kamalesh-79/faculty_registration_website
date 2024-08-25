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
    {   $title= isset($_POST['title']) ? $_POST['title'] : '';
        $pa1= isset($_POST['pa1']) ? $_POST['pa1'] : '';
        $pa2= isset($_POST['pa2']) ? $_POST['pa2'] : '';
        $pa3= isset($_POST['pa3']) ? $_POST['pa3'] : '';
        $pa4= isset($_POST['pa4']) ? $_POST['pa4'] : '';
        $pa5= isset($_POST['pa5']) ? $_POST['pa5'] : '';
        $jssn= isset($_POST['Issn']) ? $_POST['Issn'] : '';
        $jname= isset($_POST['jname']) ? $_POST['jname'] : '';
        $publisher= isset($_POST['publisher']) ? $_POST['publisher'] : '';
        $ym= isset($_POST['ym']) ? $_POST['ym'] : '';
        $vol= isset($_POST['vol']) ? $_POST['vol'] : '';
        $pgno= isset($_POST['pgno']) ? $_POST['pgno'] : '';
        $loc= isset($_POST['loc']) ? $_POST['loc'] : '';
        $empid= isset($_POST['empid']) ? $_POST['empid'] : '';

        if (isset($empid)) {
            $folder_name = 'emp' . $empid;
            $folder_path = __DIR__ . '/' . $folder_name;
        
            if (is_dir($folder_path)) {
                if (isset($_FILES['paper'])) {
                    $subfolder_name = 'publications';
                    $publications = $folder_path . '/' . $subfolder_name;
        
                    if (!is_dir($publications)) {
                        mkdir($publications);
                    }
        
                    $file_name = isset($_FILES['paper']['name']) ? $_FILES['paper']['name'] : '';
                    $file_tmp = isset($_FILES['paper']['tmp_name']) ? $_FILES['paper']['tmp_name'] : '';
                    $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    $new = $title . '.' . $img_ex;
                    $destination = $publications . '/' . $new;
        
                    move_uploaded_file($file_tmp, $destination);
                }
            }
        }
        if((isset($_POST['submit']))){
            if($erroremp==""){

        
        $stmt=$db->prepare("insert into publications(empid,title,pa1,pa2,pa3,pa4,pa5,jssn,jname,publisher,ym,vol,pgno,loc) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("issssssssssiis", $empid,$title,$pa1,$pa2,$pa3,$pa4,$pa5,$jssn,$jname,$publisher,$ym,$vol,$pgno,$loc);
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