<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title Fetch and Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    <style>
     .ui-datepicker-calendar th {
            display: none;
     }
     .ui-datepicker-calendar {
    display: none;
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
      $stmt = $db->prepare("SELECT title FROM publications WHERE empid = ?");
      $stmt->bind_param("i", $emp_id);
      $stmt->execute();
      $result = $stmt->get_result();
  
      echo "<div class='container'>";
echo "    <form id='fetchForm' action='fetchpaper.php' method='post' class='d-flex flex-column align-items-center p-4 border rounded '>";
echo "        <label for='selected_title' class='mb-2'>Select Title:</label>";
echo "        <select name='selected_title' class='form-select mb-3'>";
while ($row = $result->fetch_assoc()) {
    echo "            <option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
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
        $title = $_POST['selected_title'];
        $empid = $_POST['empid'];

        $query = "SELECT * FROM publications WHERE empid='$empid' AND title='$title'";
        $result = $db->query($query);
        if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title= $row['title'];
        $pa1= $row['pa1'];
        $pa2= $row['pa2'];
        $pa3= $row['pa3'];
        $pa4= $row['pa4'];
        $pa5= $row['pa5'];
        $jssn= $row['jssn'];
        $jname=$row['jname'];
        $publisher= $row['publisher'];
        $ym= $row['ym'];
        $vol= $row['vol'];
        $pgno= $row['pgno'];
        $loc= $row['loc'];
           ?> 
  <form method="post" action="fetchpaper.php"  enctype="multipart/form-data" id="fetchform">            
  <div class="container">
  <center>
  <img src="gprec.png" width="480" height="125" text-align=center/>';
</center>
    <!-- First Line Box -->
    <input type="hidden" name="empid" id="empid" value="<?php echo $empid; ?>">
    <div class="box">
      <div>
        <h3>Title*</h3>
        
        <input type="text" class="formcontrol" name="title"value="<?php echo $title; ?>" readonly>
      </div>
      <div>
        <h3>Published Papers</h3>
        <h3>Authors*:</h3>
        <input type="text" class="formcontrol" name="pa1" value="<?php echo $pa1; ?>"required>
        <input type="text" class="formcontrol" name="pa2"value="<?php echo $pa2; ?>">
        <input type="text" class="formcontrol"name="pa3"value="<?php echo $pa3; ?>">
        <input type="text" class="formcontrol"name="pa4"value="<?php echo $pa4; ?>">
        <input type="text" class="formcontrol"name="pa5"value="<?php echo $pa5; ?>">
      </div>

      <div>
        <h3>JSSN*</h3>
        
        <input type="text" class="formcontrol" name="jssn"value="<?php echo $jssn; ?>"required>
      </div>

      <div>
        <h3>Journal Name*</h3>
        <input type="text" class="formcontrol"name="jname"required value="<?php echo $jname; ?>">
      </div>
    </div>

    <!-- Second Line Box -->
    <div class="box">
      <div>
        <h3>Publisher*</h3>
        <input type="text" class="formcontrol"name="publisher"value="<?php echo $publisher; ?>"required>
      </div>

      <div>
      <label for="ym">Select Month and Year:</label>
    <input type="text" id="ym" name="ym" class='formcontrol' value="<?php echo $ym; ?>"required>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <div>
        <h3>JVolume*</h3>
        <input type="text" class="formcontrol"name="vol"value="<?php echo $vol; ?>"required>
      </div>
    </div>


    <!-- Third Line Box -->
    <div class="box">
      <div>
        <h3>Page Number*</h3>
        <input type="text" style="width:50%"class="formcontrol"name="pgno"value="<?php echo $pgno; ?>"required>
      </div>
     <!-- Third Line Box -->
<div class="box">
  <div>
    <h3>National/International</h3>
    <div class="radio-switch">
      <input type="radio" id="National" value="National"name="loc"<?php echo ($loc === 'National') ? 'checked' : ''; ?> required>
      <label for="National">National</label>
      <input type="radio" id="International"  value="International"name="loc" <?php echo ($loc === 'International') ? 'checked' : ''; ?> required>
      <label for="International">International</label>
      <div class="slider"></div>
    </div>
  </div>

  <div>
  <h3>Journal Type*</h3>
    <select id="names" name="names"value="<?php echo $names; ?>">
      <option value="SCI">SCI</option>
      <option value="SCIE">SCIE</option>
      <option value="ESCI">ESCI</option>
      <option value="SCOPOS">SCOPOS</option>
      <option value="UGC CARE">UGC CARE</option>
      <option value="NORMAL">NORMAL</option>
    </select>
  </div>
  <h3> Re-Upload Proof</h3>
  <input type="file" name="paper" class="formcontrol" placeholder="Choose File" onchange="validateFile()">
  <div id="fileTypeMessage" style="color: red;"></div>
</div>
  </div>
  <div>
   
  <div class="text-center">
    <input type="submit" class="btn btn-success btn-custom" name="update_submit" value="update" id="update">
     &emsp;
     <input type="button" class="btn btn-warning btn-custom" name="back" value="Back" onclick="goToSpecificPage()">
</div>

</div>
<div>
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
        $title= isset($_POST['title']) ? $_POST['title'] : '';
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
            
  if (isset($_FILES['paper']) && isset($_POST['empid'])) {
    $emp_id = $_POST['empid'];
    $folder_name = 'emp' . $emp_id;
    $folder_path = __DIR__ . '/' . $folder_name;
    $subfolder_name = 'publications';
    $publications = $folder_path . '/' . $subfolder_name;
    $file_name = $title;
    $y=0;
    if ($_FILES['paper']['size'] > 0) {
        $existing_file = glob($publications . '/' . $file_name . '.*');
        if (!empty($existing_file)) {
            unlink($existing_file[0]);
        }
        $img_ex = strtolower(pathinfo($_FILES['paper']['name'], PATHINFO_EXTENSION));
        $new = $file_name . '.' . $img_ex;
        $destination = $publications . '/' . $new;
        move_uploaded_file($_FILES['paper']['tmp_name'], $destination);
 $y=1;
    } 
}
    $query = "UPDATE publications SET pa1=?, pa2=?, pa3=?, pa4=?, pa5=?, jssn=?, jname=?, publisher=?, ym=?, vol=?, pgno=?, loc=? WHERE empid=? AND title=?";
     $stmt = mysqli_prepare($db, $query);
  
     if (!$stmt) {
         die("Prepare failed: " . mysqli_error($db));
     }
     $stmt->bind_param("sssssssssiisis", $pa1, $pa2, $pa3, $pa4, $pa5, $jssn, $jname, $publisher, $ym, $vol, $pgno, $loc, $empid, $title);

     if (mysqli_stmt_execute($stmt)) {
      $rows_affected = mysqli_stmt_affected_rows($stmt);
      if ($rows_affected > 0 || $y) {
        $y=0;
        echo "<script>alert('data updated');window.location.href = 'user.php';</script>";
       
      } 
    else{
      echo '<script>alert("data not updated");window.history.back();</script>';
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
<script>
    $(document).ready(function() {
        $("#ym").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            yearRange: '1900:2050',
            onClose: function (dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });
</script>

</div>

</body>
</html>