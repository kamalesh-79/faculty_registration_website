<!DOCTYPE html>
<html>
<body>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// initializing variables
$username = "";
$email    = "";
$erroremp="";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
else  
{
    if(($_SERVER["REQUEST_METHOD"]=="POST"))
    {
        $empid=isset($_POST['empid']) ? $_POST['empid'] : '';
        if(isset($empid)){
            if (!preg_match ("/^[0-9]*$/", $empid) ){  
                $erroremp="Employee Id should contain only numbers";
             }
             }
        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $faname=isset($_POST['faname']) ? $_POST['faname'] : '';
        $mname=isset($_POST['mname']) ? $_POST['mname'] : '';
        $phno=isset($_POST['phno']) ? $_POST['phno'] : '';
        $email=isset($_POST['email']) ? $_POST['email'] : '';

        $dob=isset($_POST['dob']) ? date('Y-m-d',strtotime($_POST['dob'])):'';

        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

        
        $ms = isset($_POST['ms']) ? $_POST['ms'] : '';
        $spname=isset($_POST['spname']) ? $_POST['spname'] : '';
        $hno=isset($_POST['hno']) ? $_POST['hno'] : '';
        $street=isset($_POST['street']) ? $_POST['street'] : '';
        $city=isset($_POST['city']) ? $_POST['city'] : '';
        $dis=isset($_POST['dis']) ? $_POST['dis'] : '';
        $state=isset($_POST['state']) ? $_POST['state'] : '';
        $pin=isset($_POST['pin']) ? $_POST['pin'] : '';
        $pehno=isset($_POST['pehno']) ? $_POST['pehno'] : '';
        $pestreet=isset($_POST['pestreet']) ? $_POST['pestreet'] : '';
        $pecity=isset($_POST['pecity']) ? $_POST['pecity'] : '';
        $pedis=isset($_POST['pedis']) ? $_POST['pedis'] : '';
        $pestate=isset($_POST['pestate']) ? $_POST['pestate'] : '';
        $pepin=isset($_POST['pepin']) ? $_POST['pepin'] : '';
        $sscno=isset($_POST['sscno']) ? $_POST['sscno'] : '';
        $syop=isset($_POST['syop']) ? $_POST['syop'] : '';
        $sboard=isset($_POST['sboard']) ? $_POST['sboard'] : '';
        $scname=isset($_POST['scname']) ? $_POST['scname'] : '';
        $scmark=isset($_POST['scmark']) ? $_POST['scmark'] : '';
        $empid = $_POST['empid']?? ''; 
        $folder_name = "emp" . $empid;
        $folder_path = __DIR__ . '/' . $folder_name;
    
        if (!is_dir($folder_path)) {
            mkdir($folder_path);
    
    
            if (isset($_FILES['ccity'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
    
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['ccity']['name']) ? $_FILES['ccity']['name'] : '';
                $file_tmp = isset($_FILES['ccity']['tmp_name']) ? $_FILES['ccity']['tmp_name'] : '';
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "SSC" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
    
            if (isset($_FILES['Icity'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['Icity']['name']) ? $_FILES['Icity']['name'] : '';
                $file_tmp = isset($_FILES['Icity']['tmp_name']) ? $_FILES['Icity']['tmp_name'] : '';

                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "INTER" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
            
            if (isset($_FILES['cscity'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['cscity']['name']) ? $_FILES['cscity']['name'] : '';
                $file_tmp = isset($_FILES['cscity']['tmp_name']) ? $_FILES['cscity']['tmp_name'] : '';
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "GRADUATION" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
            if (isset($_FILES['Pce2'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['Pce2']['name']) ? $_FILES['Pce2']['name'] : '';
                $file_tmp = isset($_FILES['Pce2']['tmp_name']) ? $_FILES['Pce2']['tmp_name'] : '';
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "PG2" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
            if (isset($_FILES['Pce1'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                $file_name = isset($_FILES['Pce1']['name']) ? $_FILES['Pce1']['name'] : '';
                $file_tmp = isset($_FILES['Pce1']['tmp_name']) ? $_FILES['Pce1']['tmp_name'] : '';
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "PG1" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
            if (isset($_FILES['pphdce'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['pphdce']['name']) ? $_FILES['pphdce']['name'] : '';
                $file_tmp = isset($_FILES['pphdce']['tmp_name']) ? $_FILES['pphdce']['tmp_name'] : '';
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "PHD" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
            if (isset($_FILES['pphdce2'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['pphdce2']['name']) ? $_FILES['pphdce2']['name'] : '';
                $file_tmp = isset($_FILES['pphdce2']['tmp_name']) ? $_FILES['pphdce2']['tmp_name'] : '';
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "PROVISIONAL PHD" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
            if (isset($_FILES['img'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : '';
                $file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : '';
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "IMAGE" . '.' . $img_ex;
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
           
        
            if (isset($_FILES['sig'])) {
                $subfolder_name = 'certificates';
                $certificates = $folder_path . '/' . $subfolder_name;
                
                if (!is_dir($certificates)) {
                    mkdir($certificates);
                }
                $file_name = isset($_FILES['sig']['name']) ? $_FILES['sig']['name'] : '';
                $file_tmp = isset($_FILES['sig']['tmp_name']) ? $_FILES['sig']['tmp_name'] : '';
                $img_ex = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new = "SIGNATURE" . '.' . $img_ex; 
                $destination = $certificates . '/' . $new;
                move_uploaded_file($file_tmp, $destination);
            }
        }
           
            
        $Ihano=isset($_POST['Ihano']) ? $_POST['Ihano'] : '';
        $Iyop=isset($_POST['Iyop']) ? $_POST['Iyop'] : '';
        $Iboard=isset($_POST['Iboard']) ? $_POST['Iboard'] : '';
        $Isname=isset($_POST['Isname']) ? $_POST['Isname'] : '';
        $Ismark=isset($_POST['Ismark']) ? $_POST['Ismark'] : '';
        $nod=isset($_POST['nod']) ? $_POST['nod'] : '';
        $Gyop=isset($_POST['Gyop']) ? $_POST['Gyop'] : '';
        $Gboard=isset($_POST['Gboard']) ? $_POST['Gboard'] : '';
        $csname=isset($_POST['csname']) ? $_POST['csname'] : '';
        $csmark=isset($_POST['csmark']) ? $_POST['csmark'] : '';
        
        
        $Pnop=isset($_POST['Pnop']) ? $_POST['Pnop'] : '';
        $Psp1=isset($_POST['Psp1']) ? $_POST['Psp1'] : '';
        $Psp2=isset($_POST['Psp2']) ? $_POST['Psp2'] : '';
       
        
        
        $phdname=isset($_POST['phdname']) ? $_POST['phdname'] : '';
        $ppsp1=isset($_POST['ppsp1']) ? $_POST['ppsp1'] : '';
        $yoa=isset($_POST['yoa']) ? date('Y-m-d',strtotime($_POST['yoa'])):'';
        $uni2=isset($_POST['uni2']) ? $_POST['uni2'] : '';
        $dep=isset($_POST['dep']) ? $_POST['dep'] : '';
        $cno=isset($_POST['cno']) ? $_POST['cno'] : '';
        $pos=isset($_POST['pos']) ? $_POST['pos'] : '';
        $cno2=isset($_POST['cno2']) ? $_POST['cno2'] : '';
        $pos2=isset($_POST['pos2']) ? $_POST['pos2'] : '';
        $cno3=isset($_POST['cno3']) ? $_POST['cno3'] : '';
        $uni=isset($_POST['uni']) ? $_POST['uni'] : '';
        $_SESSION['empid'] = $empid;
}

if (isset($_POST['fetch'])) {
  
    header("Location: fetch.php");
    exit;
  }
       if((isset($_POST['submit']))){
            if($erroremp==""){

        
        $stmt=$db->prepare("insert into info(empid,fname,faname,mname,phno,email,dob,gender,ms,spname,hno,street,city,dis,state,pin,pehno,pestreet,pecity,pedis,pestate,
        pepin,sscno,syop,sboard,scname,scmark,Ihano,Iyop,Iboard,Isname,Ismark,nod,Gyop,Gboard,csname,csmark,Pnop,Psp1,Psp2,phdname,ppsp1,folder_name,dep,cno,pos,cno2,pos2,cno3,uni,yoa,uni2) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("isssisssssissssiissssiiissiiissisissiissssssisisisss",$empid,$fname,$faname,$mname,$phno,$email,$dob,$gender,$ms,$spname,$hno,$street,$city,$dis,$state,$pin,$pehno,$pestreet,$pecity,$pedis,$pestate,$pepin,$sscno,$syop,$sboard,$scname,$scmark,$Ihano,$Iyop,$Iboard,$Isname,$Ismark,$nod,$Gyop,$Gboard,$csname,$csmark,$Pnop,$Psp1,$Psp2,$phdname,$ppsp1,$folder_name,$dep,$cno,$pos,$cno2,$pos2,$cno3,$uni,$yoa,$uni2);
        $stmt->execute();
        echo "<script>alert('Successfully Registered');</script>";
        echo "<script>window.location='user.php';</script>";

        $stmt->close();
        $db->close();
   
    
}
else{
    header("Location :mm1.php");
}
}
    }
?>