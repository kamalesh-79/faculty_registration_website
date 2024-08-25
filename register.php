<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="heading">
<?php
  echo'
  <img src="gprec.png" width="480" height="125" text-align=center/>';
?>
</div>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
	  <div class="input-group">
  	  <label>Employee Id</label>
  	  <input type="text" name="empid">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>"><br />
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
		<input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
	
  	  <input type="password" name="password_1"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
       
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user" >Register</button>
		<button type="reset" class="btn" name="res_user">Clear</button>
  	</div>

  	<p>
  		Already a User <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>