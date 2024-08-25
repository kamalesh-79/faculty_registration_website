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
        $stmt = $db->prepare("SELECT names FROM guideship WHERE empid = ?");
        $stmt->bind_param("i", $emp_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        echo "<div class='container'>";
        echo "    <form id='fetchForm' action='guidefetch.php' method='post' class='d-flex flex-column align-items-center p-4 border rounded '>";
        echo "        <label for='selected_title' class='mb-2'>Select Title:</label>";
        echo "        <select name='selected_title' class='form-select mb-3'>";
        while ($row = $result->fetch_assoc()) {
            echo "            <option value='" . $row['names'] . "'>" . $row['names'] . "</option>";
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
        $names = $_POST['selected_title'];
        $empid = $_POST['empid'];
        $query = "SELECT * FROM guideship WHERE empid='$empid' AND names='$names'";
        $result = $db->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $names = $row['names'];
            $desig = $row['desig'];
            $year = $row['year'];
            $spec = $row['spec'];
            $nos = $row['nos'];
            $sc1 = $row['sc1'];
            $sc2 = $row['sc2'];
            $sc3 = $row['sc3'];
            $sc4 = $row['sc4'];
            $sc5 = $row['sc5'];
            $ro1 = $row['ro1'];
            $ro2 = $row['ro2'];
            $ro3 = $row['ro3'];
            $ro4 = $row['ro4'];
            $ro5 = $row['ro5'];
            $do1 = $row['do1'];
            $do2 = $row['do2'];
            $do3 = $row['do3'];
            $do4 = $row['do4'];
            $do5 = $row['do5'];
            $go1 = $row['go1'];
            $go2 = $row['go2'];
            $go3 = $row['go3'];
            $go4 = $row['go4'];
            $go5 = $row['go5'];
            $f1 = $row['f1'];
            $f2 = $row['f2'];
            $f3 = $row['f3'];
            $f4 = $row['f4'];
            $f5 = $row['f5'];
            $empid = $row['empid'];
    ?>
    <form method="post" action="guidefetch.php" enctype="multipart/form-data" id="fetchform">            
        <div class="container">
            <center>
                <img src="gprec.png" width="480" height="125" text-align=center/>';
            </center>
            <input type="hidden" name="empid" id="empid" value="<?php echo $empid; ?>">
            <div class="box">
                <div>
                    <h3>Name Of The Reasearch Supervisor*</h3>
                    <input type="text" class="formcontrol" name="names" value="<?php echo $names; ?>" required readonly>
                </div>
                <div>
                    <h3>Designation*</h3>
                    <input type="text" class="formcontrol" name="desig" value="<?php echo $desig; ?>" required>
                </div>
                <div>
                    <h3>Date of Superannuation</h3>
                    <input type="date" name="year" class="form-control" value="<?php echo $year; ?>" required>
                </div>
                <div>
                    <h3>Area Of Specialisation*</h3>
                    <textarea id="myTextarea" rows="3" cols="130" name="spec" required><?php echo $spec; ?></textarea>
                </div>
            </div>
    
            <!-- Second Line Box -->
            <div class="box">
                <div>
                    <h3>No of students Guiding</h3>
                    <input type="text" class="formcontrol" name="nos" value="<?php echo $nos; ?>" required>
                </div>
                <div>
                    <h3>Name of the Scholar</h3>
                    <input type="text" class="formcontrol" name="sc1" value="<?php echo $sc1; ?>" required>
                    <input type="text" class="formcontrol" name="sc2" value="<?php echo $sc2; ?>">
                    <input type="text" class="formcontrol" name="sc3" value="<?php echo $sc3; ?>">
                    <input type="text" class="formcontrol" name="sc4" value="<?php echo $sc4; ?>">
                    <input type="text" class="formcontrol" name="sc5" value="<?php echo $sc5; ?>">
                </div>
                <div>
                    <h3>Roll no's of Scholars Guiding</h3>
                    <input type="text" class="formcontrol" name="ro1" value="<?php echo $ro1; ?>" required>
                    <input type="text" class="formcontrol" name="ro2" value="<?php echo $ro2; ?>">
                    <input type="text" class="formcontrol" name="ro3" value="<?php echo $ro3; ?>">
                    <input type="text" class="formcontrol" name="ro4" value="<?php echo $ro4; ?>">
                    <input type="text" class="formcontrol" name="ro5" value="<?php echo $ro5; ?>">
                </div>
            </div>
    
            <!-- Third Line Box -->
            <div class="box">
                <div>
                    <h3>Date Of Joining</h3>
                    <input type="text" class="formcontrol" name="do1" value="<?php echo $do1; ?>" required>
                    <input type="text" class="formcontrol" name="do2" value="<?php echo $do2; ?>">
                    <input type="text" class="formcontrol" name="do3" value="<?php echo $do3; ?>">
                    <input type="text" class="formcontrol" name="do4" value="<?php echo $do4; ?>">
                    <input type="text" class="formcontrol" name="do5" value="<?php echo $do5; ?>">
                </div>
                <div>
                    <h3>Guiding Supervisor/Co-Supervisors</h3>
                    <input type="text" class="formcontrol" name="go1" value="<?php echo $go1; ?>" required>
                    <input type="text" class="formcontrol" name="go2" value="<?php echo $go2; ?>">
                    <input type="text" class="formcontrol" name="go3" value="<?php echo $go3; ?>">
                    <input type="text" class="formcontrol" name="go4" value="<?php echo $go4; ?>">
                    <input type="text" class="formcontrol" name="go5" value="<?php echo $go5; ?>">
                </div>
                <div>
                    <h3>Full Time/Part Time</h3>
                    <input type="text" class="formcontrol" name="f1" value="<?php echo $f1; ?>" required>
                    <input type="text" class="formcontrol" name="f2" value="<?php echo $f2; ?>">
                    <input type="text" class="formcontrol" name="f3" value="<?php echo $f3; ?>">
                    <input type="text" class="formcontrol" name="f4" value="<?php echo $f4; ?>">
                    <input type="text" class="formcontrol" name="f5" value="<?php echo $f5; ?>">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-custom" name="update_submit" value="update" id="update">
                &emsp;
                <input type="button" class="btn btn-warning btn-custom" name="back" value="Back" onclick="goToSpecificPage()">
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
    $names= isset($_POST['names']) ? $_POST['names'] : '';
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


     $query = "UPDATE guideship SET desig=?, year=?, spec=?, nos=?, sc1=?, sc2=?, sc3=?,sc4=?,  sc5=?, ro1=?, ro2=?, ro3=?,ro4=?,ro5=?,do1=?,do2=?,do3=?,do4=?,do5=?,go1=?,go2=?,go3=?,go4=?,go5=?,f1=?,f2=?,f3=?,f4=?,f5=? WHERE empid=? AND names=?";

     $stmt = mysqli_prepare($db, $query);
  
     if (!$stmt) {
         die("Prepare failed: " . mysqli_error($db));
     }
     $stmt->bind_param("sssisssssssssssssssssssssssssss", $desig,$year,$spec,$nos,$sc1,$sc2,$sc3,$sc4,$sc5,$ro1,$ro2,$ro3,$ro4,$ro5,$do1,$do2,$do3,$do4,$do5,$go1,$go2,$go3,$go4,$go5,$f1,$f2,$f3,$f4,$f5,$empid,$names);
     if (mysqli_stmt_execute($stmt)) {
      $rows_affected = mysqli_stmt_affected_rows($stmt);
      if ($rows_affected > 0 ) {
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