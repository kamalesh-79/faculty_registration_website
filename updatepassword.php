<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Preview Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$db = mysqli_connect('localhost', 'root', '', 'project');
if(isset($_GET['email']) && isset($_GET['reset_token'])){
    date_default_timezone_set('Asia/Kolkata'); // Corrected timezone
    $date = date("Y-m-d");
    $email = $_GET['email'];
    $reset_token = $_GET['reset_token'];
    $query = "SELECT * FROM `user` WHERE `email`='$email' AND `resettoken`='$reset_token' AND `resettokenexpire`='$date'";
    $result = mysqli_query($db, $query);
    
    if($result){
        if(mysqli_num_rows($result) == 1){
            echo "
            <form method='post' class='container mt-5' id='resetPasswordForm'>
                <h3 class='mb-4'>Create New Password</h3>
                <div class='mb-3'>
                    <input type='password' class='form-control' placeholder='New Password' id='password' name='password' required>
                    <small id='passwordHelp' class='form-text text-muted'>Must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters.</small>
                </div>
                <button type='submit' class='btn btn-primary' name='updatepassword'>UPDATE</button>
                <input type='hidden' name='email' value='" . htmlspecialchars($email) . "'>
            </form>
            ";
        }
        else{
            echo "<script>alert('Invalid or Expired Link');</script>";
            echo "<script>window.location='login.php';</script>"; 
        }
    }
    else{
        echo "<script>alert('Server Down! Try again later');</script>";
        echo "<script>window.location='login.php';</script>";
    }
}
else{
    echo "<script>alert('Invalid URL');</script>";
    echo "<script>window.location='login.php';</script>";
}

if(isset($_POST['updatepassword'])){
    $pass = md5($_POST['password']); // Hashing password with md5
    $email = $_POST['email'];
    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($db, "UPDATE `user` SET `password`=?, `resettoken`=NULL, `resettokenexpire`=NULL WHERE `email`=?");
    mysqli_stmt_bind_param($stmt, "ss", $pass, $email);
    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Password Updated Successfully');</script>";
        echo "<script>window.location='login.php';</script>";
    }
    else{
        echo "<script>alert('Server Down! Try again later');</script>";
        echo "<script>window.location='login.php';</script>";
    }
}
?>
<script>
    document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        if (!passwordPattern.test(password)) {
            alert('Password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters.');
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
</body>
</html>
