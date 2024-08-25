<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="head">
    <img src="gprec.png" width="480" height="125" alt="Logo">
</div>
<div class="header">
    <h2>Login</h2>
</div>
<form method="post" action="login.php" class="container mt-5">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Employee Id:</label>
        <input type="text" name="empid" value="<?php echo isset($_POST['empid']) ? $_POST['empid'] : ''; ?>">
    </div>
    <div class="input-group">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
        <button type="reset" class="btn" name="res_user">Clear</button>
    </div>
    <p class="signup-forgot">
        Not a user? <a href="register.php">Sign up</a>
        <a href="password-reset.php">Forgot Password?</a>
    </p>
</body>
</html>
