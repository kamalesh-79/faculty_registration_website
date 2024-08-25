<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Employee Data</title>
</head>
<body>
<div class="head">
    <img src="gprec.png" width="480" height="125" text-align=center/>
</div>

<?php
// Check if empid is provided in the URL
if (isset($_GET['empid'])) {
    $empid = $_GET['empid'];

    // Include your database connection code
    include('connect.php');

    $query = "SELECT * FROM info WHERE empid='$empid'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        // Fetch and display the data here
        while ($row = $result->fetch_assoc()) {
            // Output the data
            echo "<fieldset>";
            echo "<legend>Employee Personal Details</legend>";
            echo "<div class='border border-dark p-3'>";
            echo "<div class='row'>";
            echo "<div class='col'>";
            echo "Employee ID: " . $row['empid'] . "<br>";
            echo "</div>";
            echo "<div class='col'>";
            echo "Name: " . $row['fname'] . "<br>";
            echo "</div>";
            echo "</div>";
            // Add more fields as needed
            // Repeat similar blocks for other fields

            echo "</div>";
            echo "</fieldset>";
        }
    } else {
        echo "Data not found";
    }
} else {
    echo "Employee ID not provided in the URL";
}
?>

</body>
</html>
