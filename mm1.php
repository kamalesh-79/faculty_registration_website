<?php
session_start();
if (isset($_SESSION['empid'])) {
    $empid = $_SESSION['empid'];
} 

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mmm.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
       
            function redirectToFetchPage() {
    document.getElementById("fetch").addEventListener("click", function() {
      var empid = document.getElementById("empid").value;
      var url = "fetch.php?empid=" + empid;
      window.location.href = url;
    });
  }
  window.addEventListener("load", redirectToFetchPage);
        
    </script>
    <style>
      #fetch{
        position:relative;
        border:no border;
        padding:3px;
        margin-top:30px;
        margin-left:-70px;
        border-radius:5px;
      }  
       #fname {
        margin-left:-200px;
        width:635px;
      }
      #empid{
        width:635px;
      }
      .row .col select option{
        padding:20px;
      }
    </style>
</head>
<body>
<br>
     <div class="head"> 
          <img src="gprec.png" width="480" height="125" text-align=center/>';
     </div>
     <fieldset>
        <legend>Employee Personal Details</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                    <form method="post" action="connect.php" id="form" enctype="multipart/form-data">
                    <h6>Employee id:</h6>
                    <input type="text" name="empid" id="empid" class="form-control" placeholder="Employee id" value="<?php echo $empid; ?>" readonly required>
                </div>
                <div class="col">
                <input type="button" value="fetch" class="btn btn-primary" name="fetch" id="fetch" onclick="redirectToFetchPage()">
    </div>
                <div class="col">
                    <h6 style="margin-left:-203px">Name:</h6>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Full Name" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>FATHER'S NAME*:</h6>
                    <input type="text" name="faname" class="form-control" placeholder="Enter Father's Name"required>
                </div>
                <div class="col">
                    <h6>MOTHER'S NAME*:</h6>
                    <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>Phon-No*:</h6>
                    <input type="text" name="phno" class="form-control" placeholder="Enter Mobile Number"required>
                </div>
                <div class="col">
                    <h6>Email*:</h6>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h6>DOB*:</h6>
                    <input type="date" name="dob" class="form-control" placeholder="Enter Date Of Birth"required>
                </div>
                <div class="col">
                    <h6>Gender:</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="femaleGender" name="gender" value="f"required>
                        <label class="form-check-label" for="femaleGender">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="maleGender" name="gender" value="m"required>
                        <label class="form-check-label" for="maleGender">Male</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Marriage Status*:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"id="married" name="ms" value="y"required>
                        <label class="form-check-label" for="married">Married</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="unmarried"name="ms" value="n"required>
                        <label class="form-check-label"for="unmarried">Unmarried</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Spouse Name:</label>
                    <input type="text" name="spname" class="form-control" style="width: 49.3%;">
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
                      <input type="text" name="hno" placeholder="Enter House Number" class="form-control"required>
                  </div>
                  <div class="col">
                      <label>Street*:</label>
                      <input type="text" name="street" placeholder="Enter Street" class="form-control"required>
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <label>City*:</label>
                      <input type="text" name="city" placeholder="Enter City" class="form-control"required>
                  </div>
                  <div class="col">
                      <label>District*:</label>
                      <input type="text" name="dis" placeholder="Enter District" class="form-control"required>
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <label>State*:</label>
                      <input type="text" name="state" placeholder="Enter state" class="form-control"required>
                  </div>
                  <div class="col">
                      <label>Pincode*:</label>
                      <input type="text" name="pin" placeholder="Enter Pincode" class="form-control"required>
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
                    <label>H-NUMBER*:</label>
                    <input type="text" name="pehno" class="form-control" placeholder="Enter House Number"required>
                </div>
                <div class="col">
                    <label>Street*:</label>
                    <input type="text" name="pestreet" class="form-control" placeholder="Enter Street"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>City*:</label>
                    <input type="text" name="pecity" class="form-control" placeholder="Enter City"required>
                </div>
                <div class="col">
                    <label>District*:</label>
                    <input type="text" name="pedis" class="form-control" placeholder="Enter District"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>State*:</label>
                    <input type="text" name="pestate" class="form-control" placeholder="Enter state"required>
                </div>
                <div class="col">
                    <label>Pincode*:</label>
                    <input type="text" name="pepin" class="form-control" placeholder="Enter Pincode"required>
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

        <legend>Qualification</legend>
        
        <fieldset class="fie">
            <legend>SSC*</legend>
            <div class="border border-dark p-3">
                <div class="row">
                    <div class="col">
                        <label for="hani">Hallticket No*:</label>
                        <input type="text" name="sscno" class="form-control" placeholder="Enter Hallticket Number"required>
                    </div>
                    <div class="col">
                        <label>Year Of Passing*:</label>
                        <input type="text" name="syop" class="form-control" placeholder="Enter Year Of Passing"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="hani">Certificate No*:</label>
                        <input type="text" name="cno" class="form-control" placeholder="Enter Certificate Number"required>
                    </div>
                    <div class="col">
                        <label>Place Of Study*:</label>
                        <input type="text" name="pos" class="form-control" placeholder="Enter Place of Study"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Board*:</label>
                        <input type="text" name="sboard" class="form-control" placeholder="Enter Board"required>
                    </div>
                    <div class="col">
                        <label>School Name*:</label>
                        <input type="text" name="scname" class="form-control" placeholder="Enter School Name"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Percentage/Marks/Cgpa*:</label>
                        <input type="text" name="scmark" class="form-control" placeholder="Enter Your Marks"required>
                    </div>
                    <div class="col">
                        <label>Certification Upload*:</label>
                        <input type="file" name="ccity" class="form-control" placeholder="Choose File" onchange="validateFile()"required>
                        <div id="fileTypeMessage" style="color: red;"></div>
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
                        <input type="text" name="Ihano" class="form-control" placeholder="Enter Hallticket Number"required>
                    </div>
                    <div class="col">
                        <label>Year Of Passing*:</label>
                        <input type="text" name="Iyop" class="form-control" placeholder="Enter Year Of Passing"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="hani">Certificate No*:</label>
                        <input type="text" name="cno2" class="form-control" placeholder="Enter Certificate Number"required>
                    </div>
                    <div class="col">
                        <label>Place Of Study*:</label>
                        <input type="text" name="pos2" class="form-control" placeholder="Enter Place of Study"required>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col">
                        <label>Board*:</label>
                        <input type="text" name="Iboard" class="form-control" placeholder="Enter Board"required>
                    </div>
                    <div class="col">
                        <label>College Name*:</label>
                        <input type="text" name="Isname" class="form-control" placeholder="Enter College Name"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Percentage/Marks/Cgpa*:</label>
                        <input type="text" name="Ismark" class="form-control" placeholder="Enter Your Marks"required>
                    </div>
                    <div class="col">
                        <label>Certification Upload*:</label>
                        <input type="file" name="Icity" class="form-control" placeholder="Choose File" onchange="validateFiles()"required>
                        <div id="fileTypeMessages" style="color: red;"></div>
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
    <fieldset class="fie">
        <legend>Degree</legend>
        <div class="border border-dark p-3">
            <div class="row">
            <div class="col">
                <label>Name of Degree</label>
                    <select name="nod" id="nod" required>
                        <option>--Select--</option>
                        <option value="B.Tech">B.Tech</option>
                        <option value="B.E">B.E</option>
                        <option value="BCA">BCA</option>
                        <option value="B.COM">B.COM</option>
                        <option value="B.A">B>A</option>
                        <option value="B.Arch">B.Arch</option>
                        <option value="BSC">BSC</option>
                    </select>
                </div>
                <div class="col">
                    <label>Year Of Passing*:</label>
                    <input type="text" name="Gyop" class="form-control" placeholder="Enter Year Of Passing"required>
                </div>
            </div>
            <div class="row">
                    <div class="col">
                        <label for="hani">Certificate No*:</label>
                        <input type="text" name="cno3" class="form-control" placeholder="Enter Certificate Number"required>
                    </div>
                    <div class="col">
                        <label>University*:</label>
                        <input type="text" name="uni" class="form-control" placeholder="Enter Place of Study"required>
                    </div>
                </div>
            <div class="row">
                <div class="col">
                    <label>Branch Of Study*:</label>
                    <input type="text" name="Gboard" class="form-control" placeholder="Enter Branch Name"required>
                </div>
                <div class="col">
                    <label>College Name*:</label>
                    <input type="text" name="csname" class="form-control" placeholder="Enter College Name"required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Percentage/Marks/Cgpa*:</label>
                    <input type="text" name="csmark" class="form-control" placeholder="Enter Your Marks"required>
                </div>
                <div class="col">
                    <label>Certification Upload*:</label>
                    <input type="file" name="cscity" class="form-control" placeholder="Choose File"onchange="validateFiless()"required>
                    <div id="fileTypeMessagess" style="color: red;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Department:</label>
                    <select name="dep" id="dep"required>
                        <option>--Select--</option>
                        <option value="ECS">ECS</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="CE">CE</option>
                        <option value="MEC">MEC</option>
                    </select>
                </div>
        </div>
    </fieldset>
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
    
    <fieldset class="fie">
        <legend>PG</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                    <label>No.Of PG's Done:</label>
                    <input type="text" name="Pnop" class="form-control" placeholder="Enter No.Of PG's Done">
                </div>
                <div class="col">
                    <label>Specialization-1:</label>
                    <input type="text" name="Psp1" class="form-control" placeholder="Enter Specialization-1">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Specialization-2:</label>
                    <input type="text" name="Psp2" class="form-control" placeholder="Enter Specialization-2">
                </div>
                <div class="col">
                    <label>Certification Upload Of Specialization-1:</label>
                    <input type="file" name="Pce1" class="form-control" placeholder="Choose File"onchange="validateFiless1()">
                    <div id="fileTypeMessagess1" style="color: red;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Certification Upload Of Specialization-2:</label>
                    <input type="file" name="Pce2" class="form-control" placeholder="Choose File"onchange="validateFiless2()">
                    <div id="fileTypeMessagess2" style="color: red;"></div>
                </div>
            </div>
        </div>
    </fieldset>
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
           
    <fieldset class="fie">
        <legend>PHD</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
                    <label>Title Of thesis:</label>
                    <input type="text" name="phdname" class="form-control" placeholder="Enter PHD Name">
                </div>
                <div class="col">
                    <label>Specialization (if done):</label>
                    <input type="text" name="ppsp1" class="form-control" placeholder="Enter Specialization">
                </div>
                <div class="row">
                <div class="col">
                    <label>Year Of Award:</label>
                    <input type="date" name="yoa" class="form-control" placeholder="Enter No.Of PG's Done">
                </div>
                <div class="col">
                    <label>University:</label>
                    <input type="text" name="uni2" class="form-control" placeholder="Enter Specialization-1">
                </div>
            </div>
                <div class="row">
                <div class="col">
                <label>Provisional Certifitate:</label>
                    <input type="file" name="pphdce2" class="form-control" placeholder="Choose File" onchange="validateFiless11()">
                    <div id="fileTypeMessagess11" style="color: red;"></div>
                    </div>
                <div class="col">
                    <label>Certification Upload:</label>
                    <input type="file" name="pphdce" class="form-control" placeholder="Choose File"onchange="validateFiless22()">
                    <div id="fileTypeMessagess22" style="color: red;">
                </div>
                </div>
            </div>
        </div>
    </fieldset>
    <script>
        function validateFiless11() {
            var fileInput = document.querySelector('input[name="pphdce2"]');
            var file = fileInput.files[0];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
                document.getElementById("fileTypeMessagess11").textContent = "Please select a JPEG or JPG image file.";
                fileInput.value = "";
            } else {
                document.getElementById("fileTypeMessagess11").textContent = "";
            }
        }
        document.querySelector('input[name="pphdce2"]').addEventListener("change", validateFiless11);
    </script>
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
    <fieldset>
        <legend>Photograph and Signature</legend>
        <div class="border border-dark p-3">
            <div class="row">
                <div class="col">
            <h3>Upload a photograph without spectacles/cap*</h3>
            <p>(Allowed size: 20kb to 50kb)</p>
            <p>Format: JPEG/JPG</p>
            <input type="file" class="form-control" name="img" onchange="validateFile3()"required>
            <div id="fileTypeMessage3" style="color: red;"></div>
                </div>
                <div class="col">
                    <h3>Upload Signature*</h3>
                    <p>(Allowed size: 10kb to 20kb)</p>
                    <p>Format: JPEG/JPG</p>
                    <input type="file" class="form-control" name="sig" onchange="validateFile4()"required>
                    <div id="fileTypeMessage4" style="color: red;"></div>
                </div>
            </div>
        </div>
    </fieldset>
    <br>
    <div class="last">
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-success" name="submit" value="Submit">
            </div>
            <div class="col">
                <input type="reset" class="btn btn-danger" name="reset" value="Reset">
            </div>
            <div class="col">
    <input type="button" class="btn btn-warning" name="back" value="Back" onclick="goToSpecificPage()">
</div>
<script>
    function goToSpecificPage() {
        window.location.href = 'user.php';
    }
</script>
            <script>
    function validateFile3() {
        var fileInput = document.querySelector('input[name="img"]');
        var file = fileInput.files[0];
        var fileExtension = file.name.split('.').pop().toLowerCase();
        if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
            document.getElementById("fileTypeMessage3").textContent = "Please select a JPEG or JPG image file.";
            fileInput.value = "";
            return; 
        }
        document.getElementById("fileTypeMessage3").textContent = "";
    }

    document.querySelector('input[name="img"]').addEventListener("change", validateFile3);
</script>

<script>
    function validateFile4() {
        var fileInput = document.querySelector('input[name="sig"]');
        var file = fileInput.files[0];
        var fileExtension = file.name.split('.').pop().toLowerCase();
        if (fileExtension !== "jpeg" && fileExtension !== "jpg") {
            document.getElementById("fileTypeMessage4").textContent = "Please select a JPEG or JPG image file.";
            fileInput.value = "";
            return; 
        }
        
        document.getElementById("fileTypeMessage4").textContent = "";
    }

    document.querySelector('input[name="sig"]').addEventListener("change", validateFile4);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('form');
        form.addEventListener('submit', function (event) {
            var selectedOptionNod = document.getElementById('nod').value;
            var selectedOptionDep = document.getElementById('dep').value;

            if (selectedOptionNod === '--Select--' && selectedOptionDep === '--Select--') {
                alert('Please select a valid option for Name of Degree and Department.');
                event.preventDefault(); 
            } else if (selectedOptionNod === '--Select--') {
                alert('Please select a valid option for Name of Degree.');
                event.preventDefault(); 
            } else if (selectedOptionDep === '--Select--') {
                alert('Please select a valid option for Department.');
                event.preventDefault(); 
            }
        });
    });
</script>
</form>
</body>
</html>

