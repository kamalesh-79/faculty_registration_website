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
            secondForm.action = 'awardsfetch.php';

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
      $stmt = $db->prepare("SELECT atitle FROM awards WHERE empid = ?");
      $stmt->bind_param("i", $emp_id);
      $stmt->execute();
      $result = $stmt->get_result();
  
      echo "<div class='container'>";
echo "    <form id='fetchForm' action='awardsfetch.php' method='post' class='d-flex flex-column align-items-center p-4 border rounded '>";
echo "        <label for='selected_title' class='mb-2'>Select Title:</label>";
echo "        <select name='selected_title' class='form-select mb-3'>";
while ($row = $result->fetch_assoc()) {
    echo "            <option value='" . $row['atitle'] . "'>" . $row['atitle'] . "</option>";
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
        $atitle = $_POST['selected_title'];
        $empid = $_POST['empid'];

        $query = "SELECT * FROM awards WHERE empid='$empid' AND atitle='$atitle'";
        $result = $db->query($query);
        if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $atitle= $row['atitle'];
        $ainame= $row['ainame'];
        $anab= $row['anab'];
        $amy= $row['amy'];
        $empid= $row['empid'];
           ?> 
  <form method="post" action="awardsfetch.php"  enctype="multipart/form-data" id="fetchform">            
  <div class="container">
  <center>
  <img src="gprec.png" width="480" height="125" text-align=center/>';
</center>
<input type="hidden" name="empid" id="empid" value="<?php echo $empid; ?>">
    <div class="box">
      <div>
        <h3>Name of the Award/Recognition*</h3>
        
        <input type="text" class="formcontrol" name="atitle" value="<?php echo $atitle; ?>"required readonly>
      </div>
</div>
<div class="box">
      <div>
        <h3>Name of the Faculty/Institution*</h3>

        <input type="text" class="formcontrol"name="ainame" value="<?php echo $ainame; ?>"required*>
      </div>

      <div>
        <h3>Name of the Awarding Body/Agency*</h3>
        
        <input type="text" class="formcontrol" name="anab"value="<?php echo $anab; ?>"required>
      </div>

      <div>
      <h3>Select Month and Year:</h3>
    <input type="text" id="amy" name="amy" class='formcontrol'value="<?php echo $amy; ?>"required>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    $atitle= isset($_POST['atitle']) ? $_POST['atitle'] : '';
    $ainame= isset($_POST['ainame']) ? $_POST['ainame'] : '';
    $anab= isset($_POST['anab']) ? $_POST['anab'] : '';
    $amy= isset($_POST['amy']) ? $_POST['amy'] : '';
    $empid= isset($_POST['empid']) ? $_POST['empid'] : '';
    $query = "UPDATE awards SET  ainame=?, anab=?, amy=? WHERE empid=? AND atitle=?";
     $stmt = mysqli_prepare($db, $query);
  
     if (!$stmt) {
         die("Prepare failed: " . mysqli_error($db));
     }
     $stmt->bind_param("sssis",$ainame,$anab,$amy,$empid,$atitle);

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
<script>
    $(document).ready(function() {
        $("#amy").datepicker({
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