<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Preview Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style>
        .container-border {
            border: 1px solid #000;
            padding: 20px;
        }
        .col{
  color:#FF0001;
}
.col1{
    color:lightblue;
}
    </style>
</head>
<body>
    <div class="container container-border">
        <div class="col1">
        <h2 class="text-center">Preview of Submitted Data</h2>
</div>
        <h5 class="col">Employee Details</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Employee ID:</strong> <?php echo $_POST['empid']; ?></p>
                <p><strong>Name:</strong> <?php echo $_POST['fname']; ?></p>
                <p><strong>Father's Name:</strong> <?php echo $_POST['faname']; ?></p>
                <p><strong>Mother's Name:</strong> <?php echo $_POST['mname']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $_POST['phno']; ?></p>
               
            </div>
            <div class="col-md-6">
                <p><strong>Date of Birth:</strong> <?php echo $_POST['dob']; ?></p>
                <p><strong>Email:</strong> <?php echo $_POST['email']; ?></p>
                <p><strong>Gender:</strong> <?php echo isset($_POST['gender']) ? $_POST['gender'] : 'Not specified'; ?></p>
                <p><strong>Marital Status:</strong> <?php echo isset($_POST['ms']) ? $_POST['ms'] : 'Not specified'; ?></p>
                <p><strong>Spouse Name:</strong> <?php echo isset($_POST['spname']) ? $_POST['spname'] : 'Not specified'; ?></p>
                
                <!-- Add similar rows for present and permanent addresses, SSC, Intermediate, and Degree details -->
            </div>
        </div>
        <h5 class="col">Present Address</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>House Number:</strong> <?php echo $_POST['hno']; ?></p>
                <p><strong>City:</strong> <?php echo $_POST['city']; ?></p>
                <p><strong>State:</strong> <?php echo $_POST['state']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Street:</strong> <?php echo $_POST['street']; ?></p>
                <p><strong>District:</strong> <?php echo isset($_POST['dis']) ? $_POST['dis'] : 'Not specified'; ?></p>
                <p><strong>Pin Code:</strong> <?php echo isset($_POST['pin']) ? $_POST['pin'] : 'Not specified'; ?></p>
            </div>
        </div>
        <h5 class="col">Permanent Address</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>House Number:</strong> <?php echo $_POST['pehno']; ?></p>
                <p><strong>City:</strong> <?php echo $_POST['pecity']; ?></p>
                <p><strong>State:</strong> <?php echo $_POST['pestate']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Street:</strong> <?php echo $_POST['pestreet']; ?></p>
                <p><strong>District:</strong> <?php echo isset($_POST['pedis']) ? $_POST['pedis'] : 'Not specified'; ?></p>
                <p><strong>Pin Code:</strong> <?php echo isset($_POST['pepin']) ? $_POST['pepin'] : 'Not specified'; ?></p>
            </div>
        </div>
        <h4>Qualification</h4>
        <h5 class="col">SSC</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Hallticket Number:</strong> <?php echo $_POST['sscno']; ?></p>
                <p><strong>Certificate Number:</strong> <?php echo $_POST['cno']; ?></p>
                <p><strong>Board:</strong> <?php echo $_POST['sboard']; ?></p>
                <p><strong>Percentage/Marks?Cgpa:</strong> <?php echo $_POST['scmark']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Year of Passing:</strong> <?php echo $_POST['syop']; ?></p>
                <p><strong>Place of study:</strong> <?php echo isset($_POST['pos']) ? $_POST['pos'] : 'Not specified'; ?></p>
                <p><strong>School Name:</strong> <?php echo isset($_POST['scname']) ? $_POST['scname'] : 'Not specified'; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5 class="col">Intermediate</h5>
                <p><strong>Hallticket Number:</strong> <?php echo $_POST['Ihano']; ?></p>
                <p><strong>Certificate Number:</strong> <?php echo $_POST['cno2']; ?></p>
                <p><strong>Board:</strong> <?php echo $_POST['Iboard']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Year of Passing:</strong> <?php echo $_POST['Iyop']; ?></p>
                <p><strong>Place of study:</strong> <?php echo isset($_POST['pos2']) ? $_POST['pos2'] : 'Not specified'; ?></p>
                <p><strong>College Name:</strong> <?php echo isset($_POST['Isname']) ? $_POST['Isname'] : 'Not specified'; ?></p>
                <p><strong>Percentage/Marks?Cgpa:</strong> <?php echo $_POST['Ismark']; ?></p>
            </div>
        </div>
        <h5 class="col">Degree</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name of Degree:</strong> <?php echo $_POST['nod']; ?></p>
                <p><strong>Department:</strong> <?php echo $_POST['dep']; ?></p>
                <p><strong>Certificate Number:</strong> <?php echo $_POST['cno3']; ?></p>
                <p><strong>Branch:</strong> <?php echo $_POST['Gboard']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Year of Passing:</strong> <?php echo $_POST['Gyop']; ?></p>
                <p><strong>University:</strong> <?php echo isset($_POST['uni']) ? $_POST['uni'] : 'Not specified'; ?></p>
                <p><strong>College Name:</strong> <?php echo isset($_POST['csname']) ? $_POST['csname'] : 'Not specified'; ?></p>
                <p><strong>Percentage/Marks?Cgpa:</strong> <?php echo $_POST['csmark']; ?></p>

            </div>
        </div>
        <h5 class="col">PG</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>No of PG's Done:</strong> <?php echo $_POST['Pnop']; 'Not specified'; ?></p>
                <p><strong>Specialization-2:</strong> <?php echo $_POST['Psp2']; ?></p>
               </div>
                <div class="col-md-6">
                <p><strong>Specialization-1:</strong> <?php echo $_POST['Psp1']; 'Not specified'; ?></p>
            </div>
        </div>
        <h5 class="col">PHD</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> <?php echo $_POST['phdname']; ?></p>
                <p><strong>Year of Award:</strong> <?php echo $_POST['yoa']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Specialization:</strong> <?php echo $_POST['ppsp1']; ?></p>
                <p><strong>University:</strong> <?php echo isset($_POST['uni2']) ? $_POST['uni2'] : 'Not specified'; ?></p>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-primary" onclick="printPage()">Print Preview</button>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>
</html>