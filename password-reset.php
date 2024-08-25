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
    <h2>Password Reset</h2>
</div>
<form method="post" action="forgotpassword.php" class="container mt-5">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" placeholder="Enter your email" style="margin-bottom: 30px; padding: 8px;">
    </div>
    <div class="button-group">
        <button type="submit" class="btn" name="send-reset-link" style="margin-right: 10px;">SEND LINK</button>
    </div>
</body>
</html>
