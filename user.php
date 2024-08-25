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
            justify-content: space-between;
            align-items: center;
            padding: 10px 10px; 
            position: relative;
            z-index: 2;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 12px; 
            transition: background-color 0.3s;
            position: relative;
        }

        .dropdown {
            position: relative;
            margin-left: 10px; 
            margin-right: 10px; 
        }

        .dropdown .dropbtn {
            background-color: #ff9800;
            color: white;
            font-size: 16px;
            border: none;
            outline: none;
            padding: 12px 16px; 
            cursor: pointer;
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 3;
            top: 100%;
            left: 0;
            border-radius: 0 0 5px 5px;
            overflow: hidden;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px; 
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .banner-img {
            width: 100%;
            height: auto;
            display: block;
            position: relative;
            z-index: 1;
        }
        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: #f57c00;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="https://www.gprec.ac.in/wp-content/uploads/2019/05/gprec_logo1.png" alt="Logo" class="logo">
    </div>
    <div class="navbar" style="z-index: 2;">
        <a href="home.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Personal Details</button>
            <div class="dropdown-content">
                <a href="mm1.php">Fill Details</a>
                <a href="fetch.php">Update Profile</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Professional Details</button>
            
            <div class="dropdown-content">
                <a href="page.php">publications</a>
                <a href="book.php">Book Chapters</a>
                <a href="guide.php">guideship</a>
                <a href="patents.php">Patents</a>
                <a href="awards.php">Awards</a>
                <a href="report.php">Report</a>
            </div>
        </div>
    </div>
    <div align="center">
        <img src="Girls-Hostel.jpg" class="banner-img" alt="Banner">
    </div>
</body>
</html>