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
            secondForm.action = 'patentsfetch.php';

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
      $stmt = $db->prepare("SELECT ptitle FROM patents WHERE empid = ?");
      $stmt->bind_param("i", $emp_id);
      $stmt->execute();
      $result = $stmt->get_result();
  
      echo "<div class='container'>";
echo "    <form id='fetchForm' action='patentsfetch.php' method='post' class='d-flex flex-column align-items-center p-4 border rounded '>";
echo "        <label for='selected_title' class='mb-2'>Select Title:</label>";
echo "        <select name='selected_title' class='form-select mb-3'>";
while ($row = $result->fetch_assoc()) {
    echo "            <option value='" . $row['ptitle'] . "'>" . $row['ptitle'] . "</option>";
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
        $ptitle = $_POST['selected_title'];
        $empid = $_POST['empid'];

        $query = "SELECT * FROM patents WHERE empid='$empid' AND ptitle='$ptitle'";
        $result = $db->query($query);
        if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ptitle= $row['ptitle'];
        $pfname= $row['pfname'];
        $pfd= $row['pfd'];
        $pano= $row['pano'];
        $pstat= $row['pstat'];
        $pagno= $row['pagno'];
        $pgdt= $row['pgdt'];
        $pdate=$row['pdate'];
        $pcntry= $row['pcntry'];
        $pctno= $row['pctno'];
           ?> 
  <form method="post" action="patentsfetch.php"  enctype="multipart/form-data">
  <div class="container">
  <center>
  <img src="gprec.png" width="480" height="125" text-align=center/>';
</center>
    <!-- First Line Box -->
    <input type="hidden" name="empid" id="empid" value="<?php echo $empid; ?>">
    <div class="box">
      <div>
        <h3>Title*</h3>
        
        <input type="text" class="formcontrol" name="ptitle" value="<?php echo $ptitle;?>"required readonly>
      </div>
</div>
<div class="box">
      <div>
        <h3>Name of the faculty*</h3>

        <input type="text" class="formcontrol"name="pfname"  value="<?php echo $pfname;?>"required>
      </div>

      <div>
        <h3>Patent File Data*</h3>
        
        <input type="text" class="formcontrol" name="pfd"  value="<?php echo $pfd;?>"required>
      </div>

      <div>
        <h3>Application Number*</h3>
        <input type="text" class="formcontrol"name="pano"  value="<?php echo $pano;?>"required>
      </div>
    </div>

    <!-- Second Line Box -->
    <div class="box">
      <div>
        <h3>Status*</h3>
        <select id="status" name="pstat" value="<?php echo $pstat;?>">
      <option value="Applied">Applied</option>
      <option value="Published">Published</option>
      <option value="Granted">Granted</option>
    </select>
      </div>

      <div>
        <h3>Publication Date*</h3>
        <input type="date" class="formcontrol"name="pdate"  value="<?php echo $pdate;?>"required>
      </div>

      <div>
        <h3>Granted Number</h3>
        <input type="text" class="formcontrol"name="pagno" value="<?php echo $pagno;?>"required>
      </div>

      <div>
        <h3>Granted Date</h3>
        <input type="date" class="formcontrol"name="pgdt" value="<?php echo $pgdt;?>"required>
      </div>
    </div>

    <!-- Third Line Box -->
    <div class="box">
      <div>
        <h3>Country</h3>
        <input type="text" style="width:50%"class="formcontrol"name="pcntry"  value="<?php echo $pcntry;?>"required>
      </div>
     <!-- Third Line Box -->
<div class="box">
 <div>
  <h3>Citation</h3>
  <input type="text" class="formcontrol"name="pctno"  value="<?php echo $pctno;?>"required>
  <h3> Re-Upload Proof</h3>
  <input type="file" name="ppaper" class="formcontrol" placeholder="Choose File" onchange="validateFile()">
  <div id="fileTypeMessage" style="color: red;"></div>
 </div>
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
        $ptitle= isset($_POST['ptitle']) ? $_POST['ptitle'] : '';
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
  
            
        if (isset($_FILES['ppaper']) && isset($_POST['empid'])) {
          $emp_id = $_POST['empid'];
          $folder_name = 'emp' . $emp_id;
          $folder_path = __DIR__ . '/' . $folder_name;
          $subfolder_name = 'patents';
          $publications = $folder_path . '/' . $subfolder_name;
          $file_name = $ptitle;
          $y=0;
          if ($_FILES['ppaper']['size'] > 0) {
              $existing_file = glob($publications . '/' . $file_name . '.*');
              if (!empty($existing_file)) {
                  unlink($existing_file[0]);
              }
              $img_ex = strtolower(pathinfo($_FILES['ppaper']['name'], PATHINFO_EXTENSION));
              $new = $file_name . '.' . $img_ex;
              $destination = $publications . '/' . $new;
              move_uploaded_file($_FILES['ppaper']['tmp_name'], $destination);
       $y=1;
          } 
      
      }      
    $query = "UPDATE patents SET pfname=?, pfd=?, pano=?, pstat=?, pagno=?, pgdt=?, pcntry=?, pctno=?, pdate=? WHERE empid=? AND ptitle=?";
     $stmt = mysqli_prepare($db, $query);

  
     if (!$stmt) {
         die("Prepare failed: " . mysqli_error($db));
     }
     $stmt->bind_param("sssssssssis",$pfname,$pfd,$pano,$pstat,$pagno,$pgdt,$pcntry,$pctno,$pdate,$empid,$ptitle);
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


</div>

</body>
</html>