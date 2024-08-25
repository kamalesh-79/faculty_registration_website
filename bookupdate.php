<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title Fetch and Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      display: flex;
      flex-direction: column;
      gap: 20px;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 20px;
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .box {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .box div {
      flex: 1;
    }

    h2,
    label,
    input {
      margin: 0;
    }

    .formcontrol {
      width: 100%;
      box-sizing: border-box;
      margin-top: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: background-color 0.3s ease-in-out;
    }

    .formcontrol:hover {
      background-color: #e0e0e0;
    }
    .btn-custom {
    width: 150px; 
    height: 40px;
}
    input[type="radio"] {
      margin-right: 5px;
    }

    label {
      display: inline-block;
      margin-bottom: 8px;
    }
    
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: background-color 0.3s ease-in-out;
    }

    select:hover {
      background-color: #e0e0e0;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

.radio-switch {
  display: flex;
  align-items: center;
}

.radio-switch h2 {
  margin-right: 10px;
}

.radio-switch input {
  display: none;
}

.radio-switch label {
  display: inline-block;
  width: 100px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  background-color: #ddd;
  color: #333;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

.radio-switch input:checked + label {
  background-color: #4CAF50;
  color: #fff;
}

.radio-switch input:first-child:checked + label:last-child ~ label + .slider {
  transform: translateX(0);
}

.radio-switch input:last-child:checked + label + .slider {
  transform: translateX(100%);
}

.slider {
  position: relative;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out;
}

  </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showSecondForm() {
            var selectedTitle = document.querySelector('select[name="selected_title"]').value;
            var empidValue = document.querySelector('input[name="empid"]').value;

            var secondForm = document.createElement('form');
            secondForm.method = 'post';
            secondForm.action = 'fetchpaper.php';

            var empidInput = document.createElement('input');
            empidInput.type = 'hidden';
            empidInput.name = 'empid';
            empidInput.value = empidValue;

            var titleInput = document.createElement('input');
            titleInput.type = 'hidden';
            titleInput.name = 'selected_title';
            titleInput.value = selectedTitle; 

            secondForm.appendChild(empidInput);
            secondForm.appendChild(titleInput);
            document.body.appendChild(secondForm);
            secondForm.submit();

            return false;
        }
    </script>
    <style>
        .containers {
            width: 50%;
            height: 5%;
            position: fixed;
            top: 20px;
            left: 20px;
        }
    </style>
</head>
<body>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $db = mysqli_connect('localhost', 'root', '', 'project');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    if (isset($_GET['empid'])) {
      $emp_id = $_GET['empid'];
      $stmt = $db->prepare("SELECT btitle FROM book WHERE empid = ?");
      $stmt->bind_param("i", $emp_id);
      $stmt->execute();
      $result = $stmt->get_result();
  
      echo "<div class='container'>";
echo "    <form id='fetchForm' action='bookupdate.php' method='post' class='d-flex flex-column align-items-center p-4 border rounded '>";
echo "        <label for='selected_title' class='mb-2'>Select Title:</label>";
echo "        <select name='selected_title' class='form-select mb-3'>";
while ($row = $result->fetch_assoc()) {
    echo "            <option value='" . $row['btitle'] . "'>" . $row['btitle'] . "</option>";
}
echo "        </select>";
echo "        <input type='hidden' name='empid' value='$emp_id'>";
echo "        <div class='mb-3'>";
echo "            <input type='submit' value='Fetch' class='btn btn-primary btn-custom'>";
echo "        </div>";
echo "    </form>";
echo "</div>";
  }
  ?>

    <?php
    if (isset($_POST['selected_title']) && isset($_POST['empid'])) {
        $btitle = $_POST['selected_title'];
        $empid = $_POST['empid'];

        $query = "SELECT * FROM book WHERE empid='$empid' AND btitle='$btitle'";
        $result = $db->query($query);
        if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $btitle= $row['btitle'];
        $bpa1= $row['bpa1'];
        $bpa2= $row['bpa2'];
        $bpa3= $row['bpa3'];
        $bpa4= $row['bpa4'];
        $bpa5= $row['bpa5'];
        $pname= $row['pname'];
        $pvol=$row['pvol'];
        $Isno= $row['Isno'];
        $year= $row['year'];
        $Ibsn= $row['Ibsn'];
        $DOI= $row['DOI'];
        $citation=trim($row['citation']);
           ?> 
  <form method="post" action="bookupdate.php"  enctype="multipart/form-data" id="fetchform">            
  <div class="container">
  <center>
  <img src="gprec.png" width="480" height="125" text-align=center/>';
</center>
<input type="hidden" name="empid" id="empid" value="<?php echo $empid; ?>">
    <div class="box">
      <div>
        <h3>Book Title*</h3>
        <input type="text" class="formcontrol" name="btitle"value="<?php echo $btitle; ?>"required readonly>
      </div>
      <div>
        <h3>Authors*:</h3>
        <input type="text" class="formcontrol" name="bpa1"value="<?php echo $bpa1; ?>"required>
        <input type="text" class="formcontrol" name="bpa2"value="<?php echo $bpa2; ?>">
        <input type="text" class="formcontrol"name="bpa3"value="<?php echo $bpa3; ?>">
        <input type="text" class="formcontrol" name="bpa4"value="<?php echo $bpa4; ?>">
        <input type="text" class="formcontrol"name="bpa5"value="<?php echo $bpa5; ?>">
      </div>

      <div>
        <h3>Publisher Name*</h3>
        
        <input type="text" class="formcontrol" name="pname"value="<?php echo $pname; ?>"required>
      </div>

      <div>
        <h3>Volume*</h3>
        <input type="text" class="formcontrol"name="pvol"value="<?php echo $pvol; ?>"required>
      </div>
    </div>
    <div class="box">
      <div>
      <h3>Issue Number*</h3>
        <input type="text" class="formcontrol"name="Isno"value="<?php echo $Isno; ?>"required>
      </div>
      <div>
      <h3>YEAR*:</h3>
         <input type="date" name="year" class="formcontrol" placeholder="year"value="<?php echo $year; ?>"required>
      </div>

      <div>
      <h3>ISBN:Number*</h3>
        <input type="text" class="formcontrol"name="Ibsn"value="<?php echo $Ibsn; ?>"required>
      </div>

      <div>
      <h3>DOI*</h3>
        <input type="text" class="formcontrol"name="DOI"value="<?php echo $DOI; ?>"required>
      </div>
    </div>
    <?php
?>
<div class="box">
<div>
    <h3>Citation*</h3>
    <textarea id="myTextarea" rows="3" cols="130" name="citation"><?php echo $citation; ?></textarea>
</div>
 

  <h3>ReUpload Book</h3>
  <input type="file" name="book" class="formcontrol" placeholder="Choose File" onchange="validateFile()">
  <div id="fileTypeMessage" style="color: red;"></div>
</div>
<div>
<div class="text-center">
    <input type="submit" class="btn btn-success btn-custom" name="update_submit" value="update" id="update">
     &emsp;
     <input type="button" class="btn btn-warning btn-custom" name="back" value="Back" onclick="goToSpecificPage()">
</div>
</div>
</div>

</form>
            <?php
        } else {
            echo 'No data found.';
        }
    }
    ?>
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$db = mysqli_connect('localhost', 'root', '', 'project');
if(isset($_POST['update_submit'])){
    $btitle= isset($_POST['btitle']) ? $_POST['btitle'] : '';
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
            
  if (isset($_FILES['book']) && isset($_POST['empid'])) {
    $emp_id = $_POST['empid'];
    $folder_name = 'emp' . $emp_id;
    $folder_path = __DIR__ . '/' . $folder_name;
    $subfolder_name = 'bookchapters';
    $publications = $folder_path . '/' . $subfolder_name;
    $file_name = $btitle;
    $y=0;
    if ($_FILES['book']['size'] > 0) {
        $existing_file = glob($publications . '/' . $file_name . '.*');
        if (!empty($existing_file)) {
            unlink($existing_file[0]);
        }
        $img_ex = strtolower(pathinfo($_FILES['book']['name'], PATHINFO_EXTENSION));
        $new = $file_name . '.' . $img_ex;
        $destination = $publications . '/' . $new;
        move_uploaded_file($_FILES['book']['tmp_name'], $destination);
 $y=1;
    } 

}                                                        


    $query = "UPDATE book SET bpa1=?, bpa2=?, bpa3=?, bpa4=?, bpa5=?, pname=?, pvol=?,Isno=?,  year=?, Ibsn=?, DOI=?, citation=? WHERE empid=? AND btitle=?";
     $stmt = mysqli_prepare($db, $query);
  
     if (!$stmt) {
         die("Prepare failed: " . mysqli_error($db));
     }
     $stmt->bind_param("ssssssisssssis", $bpa1, $bpa2, $bpa3, $bpa4, $bpa5, $pname, $pvol, $Isno, $year, $Ibsn, $DOI, $citation, $empid, $btitle);

     if (mysqli_stmt_execute($stmt)) {
      $rows_affected = mysqli_stmt_affected_rows($stmt);
      if ($rows_affected > 0 || $y) {
        $y=0;
        echo "<script>alert('data updated');window.location.href = 'user.php';</script>";
       
      } 
    else{
       echo "<script>alert('data not updated');window.history.back();</script>";
    }
    }
  
  mysqli_stmt_close($stmt);
  }

mysqli_close($db);
?>
<script>
    function goToSpecificPage() {
        window.location.href = 'user.php';
    }
</script>


</div>

</body>
</html>