<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #fff;
            z-index: 2;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        .navbar {
            background-color: #ff9800;
            overflow: visible;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            position: relative;
            z-index: 2;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 14px;
            transition: background-color 0.3s;
            position: relative;
        }

        .banner-img {
            width: 100%;
            height: auto;
            display: block;
            position: relative;
            z-index: 1;
        }

        .navbar a:hover {
            background-color: #f57c00;
        }
        .homepage {
            text-align: right;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://www.gprec.ac.in/wp-content/uploads/2019/05/gprec_logo1.png" alt="Logo" class="logo">
    </div>
    <div class="navbar">
      <a style="color: blue" href="home.php">Home</a>
        <a href="login.php">Login/SignUp</a>
        <a href="login.html">About Us</a>
    </div>
    <div align="center">
        <img src="gprec-banner1.jpg" class="banner-img" alt="Banner">
    </div>
</body>
</html>
