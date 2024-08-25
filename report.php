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
    <title>Professional Details Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
            font-weight: bold;
        }

        input, select, button {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        select {
            appearance: none;
            background: url('https://cdn.iconscout.com/icon/free/png-256/arrow-drop-down-1767486-1505286.png') no-repeat right center / 20px 20px;
            padding-right: 40px;
            cursor: pointer;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .checkbox-label input {
            margin-right: 8px;
        }

        .note {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="reportpage.php" method="post">
    <input type="hidden" name="empid" id="empid" value="<?php echo $empid; ?>">
    <h2>Report</h2>

    <p class="note">Note: Without specifying a date range, all data will be fetched.</p>

    <label for="from_year">From Year:</label>
    <input type="number" id="from_year" name="from_year" min="1900" max="2050" >

    <label for="to_year">To Year:</label>
    <input type="number" id="to_year" name="to_year" min="1900" max="2050">

    <label for="report_type">Report Type:</label>
    <select id="report_type" name="report_type">
        <option value="publications">Publications</option>
        <option value="book_chapters">Book Chapters</option>
        <option value="guideship">Guideship</option>
        <option value="awards">Awards</option>
        <option value="patents">Patents</option>
        <option value="all">All</option>
    </select>

    <button type="submit">Generate Report</button>
</form>

</body>
</html>
