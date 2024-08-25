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
    {   $btitle= isset($_POST['btitle']) ? $_POST['btitle'] : '';
        $bpa1= isset($_POST['bpa1']) ? $_POST['bpa1'] : '';
        $bpa2= isset($_POST['bpa2']) ? $_POST['bpa2'] : '';
        $bpa3= isset($_POST['bpa3']) ? $_POST['bpa3'] : '';
        $bpa4= isset($_POST['bpa4']) ? $_POST['bpa4'] : '';
        $bpa5= isset($_POST['bpa5']) ? $_POST['bpa5'] : '';
        $pname= isset($_POST['pname']) ? $_POST['pname'] : '';
        $pvol= isset($_POST['pvol']) ? $_POST['pvol'] : '';
        $Isno= isset($_POST['Isno']) ? $_POST['Isno'] : '';
        $year=isset($_POST['year']) ? date('Y-m-d',strtotime($_POST['year'])):'';
        $Ibsn= isset($_POST['Ibsn']) ? $_POST['Ibsn'] : '';
        $DOI= isset($_POST['DOI']) ? $_POST['DOI'] : '';
        $citation= isset($_POST['citation']) ? $_POST['citation'] : '';
        $empid= isset($_POST['empid']) ? $_POST['empid'] : '';

        if (isset($empid)) {
            $folder_name = 'emp' . $empid;
            $folder_path = __DIR__ . '/' . $folder_name;
        
            if (is_dir($folder_path)) {
                if (isset($_FILES['book'])) {
                    $subfolder_name = 'bookchapters';
                    $book = $folder_path . '/' . $subfolder_name;
        
                    if (!is_dir($book)) {
                        mkdir($book);
                    }
        
                    $file_name = isset($_FILES['book']['name']) ? $_FILES['book']['name'] : '';
                    $file_tmp = isset($_FILES['book']['tmp_name']) ? $_FILES['book']['tmp_name'] : '';
                    $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    $new = $btitle . '.' . $img_ex;
                    $destination =$book . '/' . $new;
        
                    move_uploaded_file($file_tmp, $destination);
                }
            }
        }
        if((isset($_POST['submit']))){
            if($erroremp==""){

        
        $stmt=$db->prepare("insert into book(empid,btitle,bpa1,bpa2,bpa3,bpa4,bpa5,pname,pvol,Isno,year,Ibsn,DOI,citation) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("isssssssisssss", $empid,$btitle,$bpa1,$bpa2,$bpa3,$bpa4,$bpa5,$pname,$pvol,$Isno,$year,$Ibsn,$DOI,$citation);
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