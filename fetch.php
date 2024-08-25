<html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Fetch Employee Data</title>
    <link rel="stylesheet" href="mmm.css">
    <style>
        body {
            background-color: whitesmoke;
        }
        .right{
            right=0;
            top=0;
            float:right;
        }
        </style>

</head>
<body>
<div class="head"> 
    <img src="gprec.png" width="480" height="125" text-align=center/>';
    </div>
    <?php 
    session_start();

if (isset($_SESSION['empid'])) {
    $empid = $_SESSION['empid'];
} 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" ||isset($empid)|| isset($_GET['empid'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['empid'])) {
            $empid = isset($_POST['empid']) ? $_POST['empid'] : $_GET['empid'];

        }
    else{
        $empid = $_SESSION['empid'];
    }

        $query="SELECT * FROM info WHERE empid='$empid' ";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
        $query_run=mysqli_query($db,$query);
        while ($row = $result->fetch_assoc()) {
            $checkedGender = $row['gender'];
            $checkedMaritalStatus = $row['ms'];
            $dateOfBirth = $row['dob'];
        }
        while($row=mysqli_fetch_array($query_run)){
            ?>
        <fieldset>
        <legend>Employee Personal Details</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                    <form method="post" action="fetch.php" enctype="multipart/form-data">
                        <h6>Employee id:</h6>
                        <input type="text" name="empid" class="form-control" placeholder="Employee id" value="<?php echo $row['empid']?>"required>
                </div>
                <div class="col">
                    <h6>Name:</h6>
                    <input type="text" name="fname" class="form-control" placeholder="Full Name"value="<?php echo $row['fname']?>"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>FATHER'S NAME*:</h6>
                    <input type="text" name="faname" class="form-control" placeholder="Enter Father's Name" value="<?php echo $row['faname']?>"required>
                   
                </div>
                <div class="col">
                    <h6>MOTHER'S NAME*:</h6>
                    <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name"value="<?php echo $row['mname']?>"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>Phon-No*:</h6>
                    <input type="text" name="phno" class="form-control" placeholder="Enter Mobile Number"value="<?php echo $row['phno']?>"required>
                </div>
                <div class="col">
                    <h6>Email*:</h6>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email"value="<?php echo $row['email']?>"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>DOB*:</h6>
                    <input type="date" name="dob" class="form-control" placeholder="Enter Date Of Birth" value="<?php echo   $dateOfBirth; ?>"required>
                </div>
                <div class="col">
                    <h6>Gender:</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="femaleGender" name="gender" value="f"<?php if ( $checkedGender == 'f')  { ?> checked <?php } ?>>
                        <label class="form-check-label" for="femaleGender">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="maleGender" name="gender" value="m"<?php if ( $checkedGender== 'm') { ?> checked <?php } ?> >
                        <label class="form-check-label" for="maleGender">Male</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Marriage Status*:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ms" value="y"<?php if ( $checkedMaritalStatus== 'y')  { ?> checked <?php } ?>>
                        <label class="form-check-label">Married</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ms" value="n"<?php if ( $checkedMaritalStatus== 'n')  { ?> checked <?php } ?>>
                        <label class="form-check-label">Unmarried</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Spouse Name:</label>
                    <input type="text" name="spname" class="form-control" style="width: 49.3%;"value="<?php echo $row['spname']?>">
                </div>
            </div>
        </div>
      </fieldset>
      <div id="inputs"></div>
      <fieldset class="fie">
          <legend>Present Address</legend>
          <div class="border border-dark p-3">
              <div class="row">
                  <div class="col">
                      <label>HOUSE NUMBER*:</label>
                      <input type="text" name="hno" placeholder="Enter House Number" class="form-control"value="<?php echo $row['hno']?>"required>
                  </div>
                  <div class="col">
                      <label>Street*:</label>
                      <input type="text" name="street" placeholder="Enter Street" class="form-control"value="<?php echo $row['street']?>"required>
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <label>City*:</label>
                      <input type="text" name="city" placeholder="Enter City" class="form-control"value="<?php echo $row['city']?>"required>
                  </div>
                  <div class="col">
                      <label>District*:</label>
                      <input type="text" name="dis" placeholder="Enter District" class="form-control"value="<?php echo $row['dis']?>"required>
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <label>State*:</label>
                      <input type="text" name="state" placeholder="Enter state" class="form-control"value="<?php echo $row['state']?>"required>
                  </div>
                  <div class="col">
                      <label>Pincode*:</label>
                      <input type="text" name="pin" placeholder="Enter Pincode" class="form-control"value="<?php echo $row['pin']?>"required>
                  </div>
              </div>
          </div>
      </fieldset>
      
      <fieldset class="fie">
        <legend>Permanent Address:</legend>
        <div class="mt-3">
            <input type="checkbox" id="copyCheckbox">
            <label for="copyCheckbox">Same as above</label>
        </div>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                    <label>HOUSE NUMBER*:</label>
                    <input type="text" name="pehno" class="form-control" placeholder="Enter House Number"value="<?php echo $row['pehno']?>"required>
                </div>
                <div class="col">
                    <label>Street*:</label>
                    <input type="text" name="pestreet" class="form-control" placeholder="Enter Street"value="<?php echo $row['pestreet']?>"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>City*:</label>
                    <input type="text" name="pecity" class="form-control" placeholder="Enter City"value="<?php echo $row['pecity']?>"required>
                </div>
                <div class="col">
                    <label>District*:</label>
                    <input type="text" name="pedis" class="form-control" placeholder="Enter District"value="<?php echo $row['pedis']?>"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>State*:</label>
                    <input type="text" name="pestate" class="form-control" placeholder="Enter state"value="<?php echo $row['pestate']?>"required>
                </div>
                <div class="col">
                    <label>Pincode*:</label>
                    <input type="text" name="pepin" class="form-control" placeholder="Enter Pincode"value="<?php echo $row['pepin']?>"required>
                </div>
            </div>
        </div>
    </fieldset>
    
    <script>
        function copyAddress() {
            var presentHno = document.getElementsByName("hno")[0].value;
            var presentStreet = document.getElementsByName("street")[0].value;
            var presentCity = document.getElementsByName("city")[0].value;
            var presentDis = document.getElementsByName("dis")[0].value;
            var presentState = document.getElementsByName("state")[0].value;
            var presentPin = document.getElementsByName("pin")[0].value;

            document.getElementsByName("pehno")[0].value = presentHno;
            document.getElementsByName("pestreet")[0].value = presentStreet;
            document.getElementsByName("pecity")[0].value = presentCity;
            document.getElementsByName("pedis")[0].value = presentDis;
            document.getElementsByName("pestate")[0].value = presentState;
            document.getElementsByName("pepin")[0].value = presentPin;
        }

        var copyCheckbox = document.getElementById("copyCheckbox");
        copyCheckbox.addEventListener("change", function () {
            if (copyCheckbox.checked) {
                copyAddress();
            } else {
                // Clear the fields
                document.getElementsByName("pehno")[0].value = "";
                document.getElementsByName("pestreet")[0].value = "";
                document.getElementsByName("pecity")[0].value = "";
                document.getElementsByName("pedis")[0].value = "";
                document.getElementsByName("pestate")[0].value = "";
                document.getElementsByName("pepin")[0].value = "";
            }
        });
    </script>
    <br>
    <fieldset>
    <legend>Qualification</legend>
        
        <fieldset class="fie">
            <legend>SSC*</legend>
            <div class="border border-dark p-3">
                <div class="row">
                    <div class="col">
                        <label for="hani">Hallticket No*:</label>
                        <input type="text" name="sscno" class="form-control" placeholder="Enter Hallticket Number"value="<?php echo $row['sscno']?>"required>
                    </div>
                    <div class="col">
                        <label>Year Of Passing*:</label>
                        <input type="text" name="syop" class="form-control" placeholder="Enter Year Of Passing"value="<?php echo $row['syop']?>"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="hani">Certificate No*:</label>
                        <input type="text" name="cno" class="form-control" placeholder="Enter Certificate Number"value="<?php echo $row['cno']?>"required>
                    </div>
                    <div class="col">
                        <label>Place Of Study*:</label>
                        <input type="text" name="pos" class="form-control" placeholder="Enter Place of Study"value="<?php echo $row['pos']?>"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Board*:</label>
                        <input type="text" name="sboard" class="form-control" placeholder="Enter Board"value="<?php echo $row['sboard']?>"required>
                    </div>
                    <div class="col">
                        <label>School Name*:</label>
                        <input type="text" name="scname" class="form-control" placeholder="Enter School Name"value="<?php echo $row['scname']?>"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Percentage/Marks/Cgpa*:</label>
                        <input type="text" name="scmark" class="form-control" placeholder="Enter Your Marks"value="<?php echo $row['scmark']?>"required>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                <h3>To change given picture upload again</h3>
                        <label>Certification Upload*:</label>
                        <input type="file" name="ccity" class="form-control" placeholder="Choose File"onchange="validateFile()">
                        <div id="fileTypeMessage" style="color: red;"></div>
                    </div>
                    <div class="col">
                    <?php
                        $sscImage = 'emp' . $empid . '/certificates/SSC';
                        $imageExtensions = ['jpg', 'jpeg'];

                        foreach ($imageExtensions as $extension) {
                        $imagePath = $sscImage . '.' . $extension;
                        if (file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" width="400" height="300" class="right">';
                        break; // Stop checking if one of the extensions is found
        }
    }
    ?>
                    </div>
                </div>
            </div>
        </fieldset>
        <script>
        function validateFile() {
            var fileInput = document.querySelector('input[name="ccity"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
                document.getElementById("fileTypeMessage").textContent = "Please select a JPEG or JPG image file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessage").textContent = "";
            }
        }
        document.querySelector('input[name="ccity"]').addEventListener("change", validateFile);
    </script>

        <fieldset class="fie">
            <legend>Intermediate</legend>
            <div class="border border-dark p-3">
                <div class="row">
                    <div class="col">
                        <label>Hallticket No*:</label>
                        <input type="text" name="Ihano" class="form-control" placeholder="Enter Hallticket Number"value="<?php echo $row['Ihano']?>"required>
                    </div>
                    <div class="col">
                        <label>Year Of Passing*:</label>
                        <input type="text" name="Iyop" class="form-control" placeholder="Enter Year Of Passing"value="<?php echo $row['Iyop']?>"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="hani">Certificate No*:</label>
                        <input type="text" name="cno2" class="form-control" placeholder="Enter Certificate Number"value="<?php echo $row['cno2']?>"required>
                    </div>
                    <div class="col">
                        <label>Place Of Study*:</label>
                        <input type="text" name="pos2" class="form-control" placeholder="Enter Place of Study"value="<?php echo $row['pos2']?>"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Board*:</label>
                        <input type="text" name="Iboard" class="form-control" placeholder="Enter Board"value="<?php echo $row['Iboard']?>"required>
                    </div>
                    <div class="col">
                        <label>College Name*:</label>
                        <input type="text" name="Isname" class="form-control" placeholder="Enter College Name"value="<?php echo $row['Isname']?>"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Percentage/Marks/Cgpa*:</label>
                        <input type="text" name="Ismark" class="form-control" placeholder="Enter Your Marks" value="<?php echo $row['Ismark']?>"required>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                <h3>To change given picture upload again</h3>
                        <label>Certification Upload*:</label>
                        <input type="file" name="Icity" class="form-control" placeholder="Choose File"onchange="validateFiles()">
                        <div id="fileTypeMessages" style="color: red;"></div>
                    </div>
                    <div class="col">
                    <?php
                        $sscImage = 'emp' . $empid . '/certificates/INTER';
                        $imageExtensions = ['jpg', 'jpeg'];

                        foreach ($imageExtensions as $extension) {
                        $imagePath = $sscImage . '.' . $extension;
                        if (file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" width="400" height="300" class="right">';
                        break; // Stop checking if one of the extensions is found
        }
    }
    ?>
                
                    </div>
                </div>
            </div>
        </fieldset>
        <script>
        function validateFiles() {
            var fileInput = document.querySelector('input[name="Icity"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
                document.getElementById("fileTypeMessages").textContent = "Please select a JPEG or JPG image file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessages").textContent = "";
            }
        }
        document.querySelector('input[name="Icity"]').addEventListener("change", validateFiles);
    </script>
    </fieldset>
    
    <fieldset class="fie">
        <legend>Degree</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                <label>Name of Degree</label>
    <select name="nod" required>
        <option value="">--Select--</option>
        <?php
        $degreeOptions = ['B.Tech', 'B.E', 'BCA', 'B.COM', 'B.A', 'B.Arch', 'BSC'];
        foreach ($degreeOptions as $option) {
            $selected = ($row['nod'] == $option) ? 'selected' : '';
            echo "<option value=\"$option\" $selected>$option</option>";
        }
        ?>
    </select>
                </div>
                <div class="col">
                    <label>Year Of Passing*:</label>
                    <input type="text" name="Gyop" class="form-control" placeholder="Enter Year Of Passing"value="<?php echo $row['Gyop']?>"required>
                </div>
            </div>
            <div class="row">
                    <div class="col">
                        <label for="hani">Certificate No*:</label>
                        <input type="text" name="cno3" class="form-control" placeholder="Enter Certificate Number"value="<?php echo $row['cno3']?>"required>
                    </div>
                    <div class="col">
                        <label>University*:</label>
                        <input type="text" name="uni" class="form-control" placeholder="Enter Place of Study"value="<?php echo $row['uni']?>"required>
                    </div>
                </div>
            <div class="row">
                <div class="col">
                    <label>Branch*:</label>
                    <input type="text" name="Gboard" class="form-control" placeholder="Enter Branch Name"value="<?php echo $row['Gboard']?>"required>
                </div>
                <div class="col">
                    <label>College Name*:</label>
                    <input type="text" name="csname" class="form-control" placeholder="Enter College Name"value="<?php echo $row['csname']?>"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Percentage/Marks/Cgpa*:</label>
                    <input type="text" name="csmark" class="form-control" placeholder="Enter Your Marks"value="<?php echo $row['csmark']?>"required>
                </div>
                <div class="col">
                <label>Department:</label>
    <select name="dep" required>
        <option value="">--Select--</option>
        <?php
        $departments = ['ECS', 'CSE', 'ECE', 'EEE', 'CE', 'MEC'];
        foreach ($departments as $option) {
            $selected = ($row['dep'] == $option) ? 'selected' : '';
            echo "<option value=\"$option\" $selected>$option</option>";
        }
        ?>
    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <h3>To change given picture upload again</h3>
                        <label>Certification Upload*:</label>
                        <input type="file" name="cscity" class="form-control" placeholder="Choose File" onchange="validateFiless()">
                        <div id="fileTypeMessagess" style="color: red;"></div>
                    </div>
                    <div class="col">
                    <?php
                        $sscImage = 'emp' . $empid . '/certificates/GRADUATION';
                        $imageExtensions = ['jpg', 'jpeg'];

                        foreach ($imageExtensions as $extension) {
                        $imagePath = $sscImage . '.' . $extension;
                        if (file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" width="400" height="300" class="right">';
                        break; // Stop checking if one of the extensions is found
        }
    }
    ?>
                    </div>
                </div>
        </div>
        <script>
        function validateFiless() {
            var fileInput = document.querySelector('input[name="cscity"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
                document.getElementById("fileTypeMessagess").textContent = "Please select a JPEG or JPG image file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessagess").textContent = "";
            }
        }
        document.querySelector('input[name="cscity"]').addEventListener("change", validateFiless);
    </script>
    </fieldset>
    <fieldset class="fie">
        <legend>PG</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                    <label>No.Of PG's Done:</label>
                    <input type="text" name="Pnop" class="form-control" placeholder="Enter No.Of PG's Done"value="<?php echo $row['Pnop']?>">
                </div>
                <div class="col">
                    <label>Specialization-1:</label>
                    <input type="text" name="Psp1" class="form-control" placeholder="Enter Specialization-1"value="<?php echo $row['Psp1']?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Specialization-2:</label>
                    <input type="text" name="Psp2" class="form-control" placeholder="Enter Specialization-2"value="<?php echo $row['Psp2']?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <h3>To change given picture upload again</h3>
                        <label>Certification Upload*:</label>
                        <input type="file" name="Pce1" class="form-control" placeholder="Choose File"onchange="validateFiless1()">
                        <div id="fileTypeMessagess1" style="color: red;"></div>
                    </div>
                    <div class="col">
                    <?php
                        $sscImage = 'emp' . $empid . '/certificates/PG1';
                        $imageExtensions = ['jpg', 'jpeg'];

                        foreach ($imageExtensions as $extension) {
                        $imagePath = $sscImage . '.' . $extension;
                        if (file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" width="400" height="300" class="right">';
                        break; // Stop checking if one of the extensions is found
        }
    }
    ?>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                <h3>To change given picture upload again</h3>
                        <label>Certification Upload*:</label>
                        <input type="file" name="Pce2" class="form-control" placeholder="Choose File"onchange="validateFiless2()">
                        <div id="fileTypeMessagess2" style="color: red;"></div>
                    </div>
                    <div class="col">
                    <?php
                        $sscImage = 'emp' . $empid . '/certificates/PG2';
                        $imageExtensions = ['jpg', 'jpeg'];

                        foreach ($imageExtensions as $extension) {
                        $imagePath = $sscImage . '.' . $extension;
                        if (file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" width="400" height="300" class="right">';
                        break; // Stop checking if one of the extensions is found
        }
    }
    ?>
                    </div>
                </div>
        </div>
        <script>
        function validateFiless1() {
            var fileInput = document.querySelector('input[name="Pce1"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
                document.getElementById("fileTypeMessagess1").textContent = "Please select a JPEG or JPG image file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessagess1").textContent = "";
            }
        }
        document.querySelector('input[name="Pce1"]').addEventListener("change", validateFiless1);
    </script>
    <script>
        function validateFiless2() {
            var fileInput = document.querySelector('input[name="Pce2"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
                document.getElementById("fileTypeMessagess2").textContent = "Please select a JPEG or JPG image file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessagess2").textContent = "";
            }
        }
        document.querySelector('input[name="Pce2"]').addEventListener("change", validateFiless2);
    </script>
    </fieldset>
    <fieldset class="fie">
        <legend>PHD</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                    <label>Name*:</label>
                    <input type="text" name="phdname" class="form-control" placeholder="Enter PHD Name"value="<?php echo $row['phdname']?>">
                </div>
                <div class="col">
                    <label>Specialization (if done):</label>
                    <input type="text" name="ppsp1" class="form-control" placeholder="Enter Specialization"value="<?php echo $row['ppsp1']?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Year Of Award:</label>
                    <input type="date" name="yoa" class="form-control" placeholder="Enter No.Of PG's Done"value="<?php echo $row['yoa']?>">
                </div>
                <div class="col">
                    <label>University:</label>
                    <input type="text" name="uni2" class="form-control" placeholder="Enter Specialization-1"value="<?php echo $row['uni2']?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <h3>To change given picture upload again</h3>
                        <label>Certification Upload*:</label>
                        <input type="file" name="pphdce" class="form-control" placeholder="Choose File"onchange="validateFiless22()">
                        <div id="fileTypeMessagess22" style="color: red;"></div>
                    </div>
                    <div class="col">
                    <?php
                        $sscImage = 'emp' . $empid . '/certificates/PHD';
                        $imageExtensions = ['jpg', 'jpeg'];

                        foreach ($imageExtensions as $extension) {
                        $imagePath = $sscImage . '.' . $extension;
                        if (file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" width="400" height="300" class="right">';
                        break; // Stop checking if one of the extensions is found
        }
    }
    ?>
                    </div>
                </div>
        </div>
    <script>
        function validateFiless22() {
            var fileInput = document.querySelector('input[name="pphdce"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
                document.getElementById("fileTypeMessagess22").textContent = "Please select a JPEG or JPG image file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessagess22").textContent = "";
            }
        }
        document.querySelector('input[name="pphdce"]').addEventListener("change", validateFiless22);
    </script>
    </fieldset>
    <br>
    <div class="last">
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-success" name="update" value="update" id="update">
                <input type="submit" class="btn btn-danger" formaction="preview.php" value="Preview Details">

            </div>
   
    </form>
    <?php
                }
           
        }
        else {
           
            echo "<script>alert('Data not found do fill the details'); window.location.href = 'mm1.php';</script>";
    exit; 
           
        }
    }
            ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = mysqli_connect('localhost', 'root', '', 'project');
if(isset($_POST['update'])){
    $empid = $_POST['empid'] ;
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $faname=isset($_POST['faname']) ? $_POST['faname'] : '';
    $mname=isset($_POST['mname']) ? $_POST['mname'] : '';
    $phno=isset($_POST['phno']) ? $_POST['phno'] : '';
    $email=isset($_POST['email']) ? $_POST['email'] : '';

    $dob=isset($_POST['dob']) ? $_POST['dob'] : '';;
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
            
    if (isset($_FILES['ccity']) && isset($_POST['empid'])) {
        $emp_id = $_POST['empid'];
        $folder_name = 'emp' . $emp_id;
        $folder_path = __DIR__ . '/' . $folder_name;
        $subfolder_name = 'certificates';
        $certificates = $folder_path . '/' . $subfolder_name;
        $file_name = "SSC";
        if ($_FILES['ccity']['size'] > 0) {
            $existing_file = glob($certificates . '/' . $file_name . '.*');
            if (!empty($existing_file)) {
                unlink($existing_file[0]);
            }
            $img_ex = strtolower(pathinfo($_FILES['ccity']['name'], PATHINFO_EXTENSION));
            $new = $file_name . '.' . $img_ex;
            $destination = $certificates . '/' . $new;
            move_uploaded_file($_FILES['ccity']['tmp_name'], $destination);
         
        } 
    }
   
    if (isset($_FILES['Icity']) && isset($_POST['empid'])) {
        $emp_id = $_POST['empid'];
        $folder_name = 'emp' . $emp_id;
        $folder_path = __DIR__ . '/' . $folder_name;
        $subfolder_name = 'certificates';
        $certificates = $folder_path . '/' . $subfolder_name;
        $file_name = "INTER";
        if ($_FILES['Icity']['size'] > 0) {
            $existing_file = glob($certificates . '/' . $file_name . '.*');
            if (!empty($existing_file)) {
                unlink($existing_file[0]);
            }
            $img_ex = strtolower(pathinfo($_FILES['Icity']['name'], PATHINFO_EXTENSION));
            $new = $file_name . '.' . $img_ex;
            $destination = $certificates . '/' . $new;
            move_uploaded_file($_FILES['Icity']['tmp_name'], $destination);
            
        } 
    }

    if (isset($_FILES['cscity']) && isset($_POST['empid'])) {
        $emp_id = $_POST['empid'];
        $folder_name = 'emp' . $emp_id;
        $folder_path = __DIR__ . '/' . $folder_name;
        $subfolder_name = 'certificates';
        $certificates = $folder_path . '/' . $subfolder_name;
        $file_name = "GRADUATION";
        if ($_FILES['cscity']['size'] > 0) {
            $existing_file = glob($certificates . '/' . $file_name . '.*');
            if (!empty($existing_file)) {
                unlink($existing_file[0]);
            }
            $img_ex = strtolower(pathinfo($_FILES['cscity']['name'], PATHINFO_EXTENSION));
            $new = $file_name . '.' . $img_ex;
            $destination = $certificates . '/' . $new;
            move_uploaded_file($_FILES['cscity']['tmp_name'], $destination);
          
        } 
    }

    if (isset($_FILES['pphdce']) && isset($_POST['empid'])) {
        $emp_id = $_POST['empid'];
        $folder_name = 'emp' . $emp_id;
        $folder_path = __DIR__ . '/' . $folder_name;
        $subfolder_name = 'certificates';
        $certificates = $folder_path . '/' . $subfolder_name;
        $file_name = "PHD";
        if ($_FILES['pphdce']['size'] > 0) {
            $existing_file = glob($certificates . '/' . $file_name . '.*');
            if (!empty($existing_file)) {
                unlink($existing_file[0]);
            }
            $img_ex = strtolower(pathinfo($_FILES['pphdce']['name'], PATHINFO_EXTENSION));
            $new = $file_name . '.' . $img_ex;
            $destination = $certificates . '/' . $new;
            move_uploaded_file($_FILES['pphdce']['tmp_name'], $destination);
          
        } 
    }
   
    if (isset($_FILES['Pce1']) && isset($_POST['empid'])) {
        $emp_id = $_POST['empid'];
        $folder_name = 'emp' . $emp_id;
        $folder_path = __DIR__ . '/' . $folder_name;
        $subfolder_name = 'certificates';
        $certificates = $folder_path . '/' . $subfolder_name;
        $file_name = "PG1";
        if ($_FILES['Pce1']['size'] > 0) {
            $existing_file = glob($certificates . '/' . $file_name . '.*');
            if (!empty($existing_file)) {
                unlink($existing_file[0]);
            }
            $img_ex = strtolower(pathinfo($_FILES['Pce1']['name'], PATHINFO_EXTENSION));
            $new = $file_name . '.' . $img_ex;
            $destination = $certificates . '/' . $new;
            move_uploaded_file($_FILES['Pce1']['tmp_name'], $destination);
     
        } 
    }
    $mr=false;
    if (isset($_FILES['Pce2']) && isset($_POST['empid'])) {
        $emp_id = $_POST['empid'];
        $folder_name = 'emp' . $emp_id;
        $folder_path = __DIR__ . '/' . $folder_name;
        $subfolder_name = 'certificates';
        $certificates = $folder_path . '/' . $subfolder_name;
        $file_name = "PG2";
        if ($_FILES['Pce2']['size'] > 0) {
            $existing_file = glob($certificates . '/' . $file_name . '.*');
            if (!empty($existing_file)) {
                unlink($existing_file[0]);
            }
            $img_ex = strtolower(pathinfo($_FILES['Pce2']['name'], PATHINFO_EXTENSION));
            $new = $file_name . '.' . $img_ex;
            $destination = $certificates . '/' . $new;
            move_uploaded_file($_FILES['Pce2']['tmp_name'], $destination);
            $mr=true;
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
    $dep=isset($_POST['dep']) ? $_POST['dep'] : '';
    $cno=isset($_POST['cno']) ? $_POST['cno'] : '';
    $pos=isset($_POST['pos']) ? $_POST['pos'] : '';
    $cno2=isset($_POST['cno2']) ? $_POST['cno2'] : '';
    $pos2=isset($_POST['pos2']) ? $_POST['pos2'] : '';
    $cno3=isset($_POST['cno3']) ? $_POST['cno3'] : '';
    $uni=isset($_POST['uni']) ? $_POST['uni'] : '';
    $yoa=isset($_POST['yoa']) ? date('Y-m-d',strtotime($_POST['yoa'])):'';
    $uni2=isset($_POST['uni2']) ? $_POST['uni2'] : '';


    $query = "UPDATE info SET fname=?, faname=?, mname=?, phno=?, email=?, dob=?, gender=?, ms=?, spname=?, hno=?, street=?, city=?, dis=?, state=?, pin=?, pehno=?, pestreet=?, pecity=?, pedis=?, pestate=?, pepin=?, sscno=?, syop=?, sboard=?, scname=?, scmark=?, Ihano=?, Iyop=?, Iboard=?, Isname=?, Ismark=?, nod=?, Gyop=?, Gboard=?, csname=?, csmark=?, Pnop=?, Psp1=?, Psp2=?, phdname=?, ppsp1=?,dep=?,cno=?,pos=?,cno2=?,pos2=?,cno3=?,uni=?,yoa=?,uni2=? WHERE empid=?";
     $stmt = mysqli_prepare($db, $query);
     if (!$stmt) {
         die("Prepare failed: " . mysqli_error($db));
     }
     // Bind the parameters to the statement
     mysqli_stmt_bind_param($stmt, "sssisssssissssiissssiiissiiissisissiisssssisisisssi",$fname,$faname,$mname,$phno,$email,$dob,$gender,$ms,$spname,$hno,$street,$city,$dis,$state,$pin,$pehno,$pestreet,$pecity,$pedis,$pestate,$pepin,$sscno,$syop,$sboard,$scname,$scmark,$Ihano,$Iyop,$Iboard,$Isname,$Ismark,$nod,$Gyop,$Gboard,$csname,$csmark,$Pnop,$Psp1,$Psp2,$phdname,$ppsp1 ,$dep,$cno,$pos,$cno2,$pos2,$cno3,$uni,$yoa,$uni2,$empid);
                                    
     if (mysqli_stmt_execute($stmt)) {
    $rows_affected = mysqli_stmt_affected_rows($stmt);
    if ($rows_affected > 0) {
        echo '<script>alert("data updated");window.location.reload();</script>';
    } 
 
    }
 else {
    echo '<script>alert("data not updated");window.location.reload();</script>';
}

mysqli_stmt_close($stmt);
}

// Close the database connection

mysqli_close($db);
?>

</body>
</script>
</html>