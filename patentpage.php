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
    {   $ptitle= isset($_POST['ptitle']) ? $_POST['ptitle'] : '';
        $pfname= isset($_POST['pfname']) ? $_POST['pfname'] : '';
        $pfd= isset($_POST['pfd']) ? $_POST['pfd'] : '';
        $pano= isset($_POST['pano']) ? $_POST['pano'] : '';
        $pstat= isset($_POST['pstat']) ? $_POST['pstat'] : '';
        $pagno= isset($_POST['pagno']) ? $_POST['pagno'] : '';
        $pgdt= isset($_POST['pgdt']) ? $_POST['pgdt'] : '';
        $pdate= isset($_POST['pdate']) ? $_POST['pdate'] : '';
        $pcntry= isset($_POST['pcntry']) ? $_POST['pcntry'] : '';
        $pctno= isset($_POST['pctno']) ? $_POST['pctno'] : '';
        $empid= isset($_POST['empid']) ? $_POST['empid'] : '';
        if (isset($empid)) {
            $folder_name = 'emp' . $empid;
            $folder_path = __DIR__ . '/' . $folder_name;
        
            if (is_dir($folder_path)) {
                if (isset($_FILES['ppaper'])) {
                    $subfolder_name = 'patents';
                    $patents = $folder_path . '/' . $subfolder_name;
        
                    if (!is_dir($patents)) {
                        mkdir($patents);
                    }
        
                    $file_name = isset($_FILES['ppaper']['name']) ? $_FILES['ppaper']['name'] : '';
                    $file_tmp = isset($_FILES['ppaper']['tmp_name']) ? $_FILES['ppaper']['tmp_name'] : '';
                    $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    $new = $ptitle . '.' . $img_ex;
                    $destination = $patents . '/' . $new;
        
                    move_uploaded_file($file_tmp, $destination);
                }
            }
        }
        if((isset($_POST['submit']))){
            if($erroremp==""){

        
        $stmt=$db->prepare("insert into patents(empid,ptitle,pfname,pfd,pano,pstat,pagno,pgdt,pcntry,pctno,pdate) values(?,?,?,?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("issssssssss", $empid,$ptitle,$pfname,$pfd,$pano,$pstat,$pagno,$pgdt,$pcntry,$pctno,$pdate);
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