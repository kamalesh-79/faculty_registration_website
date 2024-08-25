<?php
session_start();
if (isset($_SESSION['empid'])) {
    $empid = $_SESSION['empid'];
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mmm.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    /* Define your custom button size */
    width: 150px; /* Adjust to your preferred width */
    height: 40px; /* Adjust to your preferred height */
}
    /* Add some hover effect */

    /* Style radio buttons and labels */
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
    /* Add this to your existing styles */
/* Add this to your existing styles */

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
</head>

<body>
<form method="post" action="guidepage.php"  enctype="multipart/form-data">
  <div class="container">
  <center>
  <img src="gprec.png" width="480" height="125" text-align=center/>';
</center>
    <!-- First Line Box -->
    <input type="hidden" name="empid" id="empid" value="<?php echo $empid; ?>">
    <div class="box">
      <div>
        <h3>Name Of The Reasearch Supervisor*</h3>
        
        <input type="text" class="formcontrol" name="names"required>
      </div>
      <div>
        <h3>Designation*</h3>
        
        <input type="text" class="formcontrol" name="desig"required>
      </div>
      <div>
      <h3>Date of Superannuation</h3>
         <input type="date" name="year" class="formcontrol" placeholder="year"required>
      </div>
      <div>
        <h3>Area Of Specialisation*</h3>
        <textarea id="myTextarea"  rows="3" cols="130" name="spec"required></textarea>
      </div>
    </div>

    <!-- Second Line Box -->
    <div class="box">
    <div>
        <h3>No of students Guiding</h3>
        
        <input type="text" class="formcontrol" name="nos"required>
      </div>
    <div>
        <h3>Name of the Scholar</h3>
        <input type="text" class="formcontrol" name="sc1"required>
        <input type="text" class="formcontrol" name="sc2">
        <input type="text" class="formcontrol"name="sc3">
        <input type="text" class="formcontrol"name="sc4">
        <input type="text" class="formcontrol"name="sc5">
      </div>
      <div>
        <h3>Roll no's of Scholars Guiding</h3>
        <input type="text" class="formcontrol" name="ro1"required>
        <input type="text" class="formcontrol" name="ro2">
        <input type="text" class="formcontrol"name="ro3">
        <input type="text" class="formcontrol"name="ro4">
        <input type="text" class="formcontrol"name="ro5">
      </div>
    </div>

    <div class="box">
    <div>
        <h3>Date Of Joining</h3>
        <input type="text" class="formcontrol" name="do1"required>
        <input type="text" class="formcontrol" name="do2">
        <input type="text" class="formcontrol"name="do3">
        <input type="text" class="formcontrol"name="do4">
        <input type="text" class="formcontrol"name="do5">
      </div>
      <div>
        <h3>Guiding Supervisor/Co-Supervisors</h3>
        <input type="text" class="formcontrol" name="go1"required>
        <input type="text" class="formcontrol" name="go2">
        <input type="text" class="formcontrol"name="go3">
        <input type="text" class="formcontrol"name="go4">
        <input type="text" class="formcontrol"name="go5">
      </div>
      <div>
        <h3>Full Time/Part Time</h3>
        <input type="text" class="formcontrol" name="f1"required>
        <input type="text" class="formcontrol" name="f2">
        <input type="text" class="formcontrol"name="f3">
        <input type="text" class="formcontrol"name="f4">
        <input type="text" class="formcontrol"name="f5">
      </div>
    </div>
    <div class="text-center">
    <input type="submit" class="btn btn-success btn-custom" name="submit" value="Submit"> &emsp;
    <input type="button" class="btn btn-warning btn-custom"  name="fetch" value="fetch"id="fetch" onclick="redirectToFetchPage()">&emsp;
    <input type="button" class="btn btn-danger btn-custom"  name="back" value="Back" onclick="goToSpecificPage()">
</div>
</div>

</form>
<script>
    function goToSpecificPage() {
        window.location.href = 'user.php';
    }
    
</script> 
<script>
  function redirectToFetchPage() {
    document.getElementById("fetch").addEventListener("click", function() {
      var empid = document.getElementById("empid").value;
      
      var url = "guidefetch.php?empid=" + empid;
      window.location.href = url;
    });
  }

  window.addEventListener("DOMContentLoaded", redirectToFetchPage);
</script>

<script>
        function validateFile() {
            var fileInput = document.querySelector('input[name="paper"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "pdf") {
                document.getElementById("fileTypeMessage").textContent = "Please select Pdf file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessage").textContent = "";
            }
        }
        document.querySelector('input[name="paper"]').addEventListener("change", validateFile);
    </script>
</body>

</html>