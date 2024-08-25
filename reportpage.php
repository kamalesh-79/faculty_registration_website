<?php
session_start();
if (isset($_SESSION['empid'])) {
    $emp = $_SESSION['empid'];
} 
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $from_year = $_POST['from_year'];
    $to_year = $_POST['to_year'];
    $report_type = $_POST['report_type'];
    $empid=$emp;
    $username = "";
    $email    = "";
    $erroremp="";
$db = mysqli_connect('localhost', 'root', '', 'project');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
else{
    switch ($report_type) {
        case 'all':
        case 'publications':
        case 'book':
        case 'guideship':
        case 'awards':
        case 'patents':
            // Execute the selected report type
            executeReport($report_type, $from_year, $to_year, $empid, $db);
            break;

        default:
            // Handle unknown report type
            echo '<p>Invalid report type selected.</p>';
            break;
    }
}
}
function executeReport($report_type, $from_year, $to_year, $empid, $db)
{ 

    //echo '<div class="result-container result-section patents-section fixed">';
      //  echo '<div class="patent-item">';
        //echo '<p class="title"><strong>EMPID</strong> ' . '</p>';
        //echo '<p class="title"><strong>Type</strong> ' .'</p>';
        //echo '<p class="title"><strong>Title</strong> ' . '</p>';
        //echo '<p class="date"><strong>publications year</strong> '  . '</p>';
        //echo '</div>';
        echo'<table class="tab">';
        echo'<tr>';
        echo '<th> EMPID </th>';
        echo '<th> TYPE </th>';
        echo '<th> Title </th>';
        echo '<th> Date </th>';
        echo'</tr>';

switch ($report_type) {
        case 'publications':
            $sql = "SELECT title, ym,empid FROM publications WHERE empid = '$empid'";
            if (!empty($from_year) && !empty($to_year)) {
                $from_year = intval($from_year);  
                $to_year = intval($to_year);     
                $sql .= " AND SUBSTRING_INDEX(ym, ' ', -1) BETWEEN '$from_year' AND '$to_year'";
            }
    
            $result = $db->query($sql);
            if ($result !== false) {
                if ($result->num_rows > 0) {
                    //echo '<div class="result-container result-section patents-section">';
                    while ($row = $result->fetch_assoc()) {
                       echo '<tr>';
                        echo '<td> ' . $row['empid'] . '</td>';
                        echo '<td> ' ."Publications".'</td>';
                        echo '<td> ' . $row['title'] . '</td>';
                        echo '<td> ' . $row['ym'] . '</td>';
                        echo '</tr>';
                    }
                  //  echo '</div>';
                } else {
                    echo "<script>alert('No publications found for the selected range. Please select a valid range');</script>";
                    echo "<script>window.location='report.php';</script>";
                }
            } else {
                // Handle query error
                echo '<p>Error executing the query: ' . $db->error . '</p>';
            }
            break;
    


        case 'book':
            $sql = "SELECT btitle, year,empid FROM book WHERE empid = '$empid'";
            if (!empty($from_year) && !empty($to_year)) {
                $from_year = intval($from_year);  
                $to_year = intval($to_year);     
                $sql .= " AND SUBSTRING_INDEX(year, ' ', -1) BETWEEN '$from_year' AND '$to_year'";
            }
        
            $result = $db->query($sql);
            
            if ($result !== false) {
                if ($result->num_rows > 0) {
                    //echo '<div class="result-container result-section patents-section">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td> ' . $row['empid'] . '</td>';
                        echo '<td> ' ."Book".'</td>';
                        echo '<td> ' . $row['btitle'] . '</td>';
                        echo '<td> ' . $row['year'] . '</td>';
                        echo '</tr>';
                    }
                   // echo '</div>';
                } else {
                    echo "<script>alert('No book found for the selected range. Please select a valid range');</script>";
                        echo "<script>window.location='report.php';</script>";
                }
            } else {
                // Handle query error
                echo '<p>Error executing the query: ' . $db->error . '</p>';
            }
            break;

        case 'guideship':
            $sql = "SELECT names, year,empid FROM guideship WHERE empid = '$empid'";
            if (!empty($from_year) && !empty($to_year)) {
                $from_year = intval($from_year);
                $to_year = intval($to_year);     
                $sql .= " AND YEAR(year) BETWEEN '$from_year' AND '$to_year'";
            }
            
            $result = $db->query($sql);
            
            if ($result !== false) {
                if ($result->num_rows > 0) {
                    //echo '<div class="result-container result-section patents-section">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td> ' . $row['empid'] . '</td>';
                        echo '<td> ' ."Guideship".'</td>';
                        echo '<td> ' . $row['names'] . '</td>';
                        echo '<td> ' . $row['year'] . '</td>';
                        echo '</tr>';
                    }
                 //   echo '</div>';
                } else {
                    echo "<script>alert('No guideship found for the selected range. Please select a valid range');</script>";
                        echo "<script>window.location='report.php';</script>";
                }
            } else {
                echo '<p>Error executing the query: ' . $db->error . '</p>';
            }
            break;
            case 'awards':
                $sql = "SELECT atitle, amy,empid FROM awards WHERE empid = '$empid'";
                if (!empty($from_year) && !empty($to_year)) {
                    $from_year = intval($from_year);
                    $to_year = intval($to_year);
                    $sql .= " AND SUBSTRING_INDEX(amy, ' ', -1) BETWEEN '$from_year' AND '$to_year'";
                }
                $result = $db->query($sql);
                if ($result !== false) {
                    if ($result->num_rows > 0) {
                        //echo '<div class="result-container result-section patents-section">';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td> ' . $row['empid'] . '</td>';
                            echo '<td> ' ."Awards".'</td>';
                                echo '<td> ' . $row['atitle'] . '</td>';
                                echo '<td> ' . $row['amy'] . '</td>';
                                echo '</tr>';
                            }
                           // echo '</div>';
                    } else {
                        echo "<script>alert('No award found for the selected range. Please select a valid range');</script>";
                        echo "<script>window.location='report.php';</script>";
                    }
                } else {
                    echo '<p class="error">Error executing the query: ' . $db->error . '</p>';
                }
                break;
            
                case 'patents':
                    $sql = "SELECT ptitle, pgdt,empid FROM patents WHERE empid = '$empid'";
                    if (!empty($from_year) && !empty($to_year)) {
                        $from_year = intval($from_year);  
                        $to_year = intval($to_year);     
                        $sql .= " AND YEAR(pgdt) BETWEEN '$from_year' AND '$to_year'";
                    }
                
                    $result = $db->query($sql);
                
                    if ($result !== false) {
                        if ($result->num_rows > 0) {
                          //  echo '<div class="result-container result-section patents-section">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td> ' . $row['empid'] . '</td>';
                                echo '<td > ' ."Patents".'</td>';
                                echo '<td> ' . $row['ptitle'] . '</td>';
                                echo '<td> ' . $row['pgdt'] . '</td>';
                                echo '</tr>';
                            }
                           // echo '</div>';
                        } else {
                            echo "<script>alert('No patents found for the selected range. Please select a valid range');</script>";
                            echo "<script>window.location='report.php';</script>";
                        }
                    } else {
                        // Handle query error
                        echo '<p class="error">Error executing the query: ' . $db->error . '</p>';
                    }
                    break;
                case 'all':
                    $sql = "SELECT title, ym,empid FROM publications WHERE empid = '$empid'";
            if (!empty($from_year) && !empty($to_year)) {
                $from_year = intval($from_year);  
                $to_year = intval($to_year);     
                $sql .= " AND SUBSTRING_INDEX(ym, ' ', -1) BETWEEN '$from_year' AND '$to_year'";
            }
    
            $result = $db->query($sql);
            if ($result !== false) {
                if ($result->num_rows > 0) {
                    //echo '<div class="result-container result-section patents-section">';
                    while ($row = $result->fetch_assoc()) {
                       echo '<tr>';
                        echo '<td> ' . $row['empid'] . '</td>';
                        echo '<td> ' ."Publications".'</td>';
                        echo '<td> ' . $row['title'] . '</td>';
                        echo '<td> ' . $row['ym'] . '</td>';
                        echo '</tr>';
                    }
                  //  echo '</div>';
                } 
            }
            $sql = "SELECT btitle, year,empid FROM book WHERE empid = '$empid'";
            if (!empty($from_year) && !empty($to_year)) {
                $from_year = intval($from_year);  
                $to_year = intval($to_year);     
                $sql .= " AND SUBSTRING_INDEX(year, ' ', -1) BETWEEN '$from_year' AND '$to_year'";
            }
        
            $result = $db->query($sql);
            
            if ($result !== false) {
                if ($result->num_rows > 0) {
                    //echo '<div class="result-container result-section patents-section">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td> ' . $row['empid'] . '</td>';
                        echo '<td> ' ."Book".'</td>';
                        echo '<td> ' . $row['btitle'] . '</td>';
                        echo '<td> ' . $row['year'] . '</td>';
                        echo '</tr>';
                    }
                   // echo '</div>';
                } 
            } 
            $sql = "SELECT names, year,empid FROM guideship WHERE empid = '$empid'";
            if (!empty($from_year) && !empty($to_year)) {
                $from_year = intval($from_year);
                $to_year = intval($to_year);     
                $sql .= " AND YEAR(year) BETWEEN '$from_year' AND '$to_year'";
            }
            
            $result = $db->query($sql);
            
            if ($result !== false) {
                if ($result->num_rows > 0) {
                    //echo '<div class="result-container result-section patents-section">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td> ' . $row['empid'] . '</td>';
                        echo '<td> ' ."Guideship".'</td>';
                        echo '<td> ' . $row['names'] . '</td>';
                        echo '<td> ' . $row['year'] . '</td>';
                        echo '</tr>';
                    }
                 //   echo '</div>';
                } 
            }
            $sql = "SELECT atitle, amy,empid FROM awards WHERE empid = '$empid'";
                if (!empty($from_year) && !empty($to_year)) {
                    $from_year = intval($from_year);
                    $to_year = intval($to_year);
                    $sql .= " AND SUBSTRING_INDEX(amy, ' ', -1) BETWEEN '$from_year' AND '$to_year'";
                }
                $result = $db->query($sql);
                if ($result !== false) {
                    if ($result->num_rows > 0) {
                        //echo '<div class="result-container result-section patents-section">';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td> ' . $row['empid'] . '</td>';
                            echo '<td> ' ."Awards".'</td>';
                                echo '<td> ' . $row['atitle'] . '</td>';
                                echo '<td> ' . $row['amy'] . '</td>';
                                echo '</tr>';
                            }
                           // echo '</div>';
                    } 
                }
                $sql = "SELECT ptitle, pgdt,empid FROM patents WHERE empid = '$empid'";
                    if (!empty($from_year) && !empty($to_year)) {
                        $from_year = intval($from_year);  
                        $to_year = intval($to_year);     
                        $sql .= " AND YEAR(pgdt) BETWEEN '$from_year' AND '$to_year'";
                    }
                
                    $result = $db->query($sql);
                
                    if ($result !== false) {
                        if ($result->num_rows > 0) {
                          //  echo '<div class="result-container result-section patents-section">';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td> ' . $row['empid'] . '</td>';
                                echo '<td > ' ."Patents".'</td>';
                                echo '<td> ' . $row['ptitle'] . '</td>';
                                echo '<td> ' . $row['pgdt'] . '</td>';
                                echo '</tr>';
                            }
                           // echo '</div>';
                        } 
                    }
                    break;
        default:
            break;
    }
    echo'</table>';

}

?>
<style>
.patents-section {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-top: 20px;
}

.patent-item {
    font-family: 'Arial', sans-serif;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 20px;
    background-color: #fff;
    display:flex;
    justify-content: space-between;
    align-items: center;

}
.fixed{
    position: relative;
    width:100%;
}

.patent-item .title,
.patent-item .date {
    margin: 0;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.patent-item .date:last-child {
    border-bottom: none;
}

.no-result {
    color: #d9534f;
    font-weight: bold;
    margin-top: 10px;
}

.error {
    color: #d9534f;
    font-weight: bold;
    margin-top: 10px;
}
.tab{
    border-collapse:collapse;
    border: 1px solid black;
    margin:5px 0;
    font-size: 1.5em;
    min-width: 100%;
    overflow: hidden;
    border-radius: 5px 5px 0 0;
}
.tab th{
    background-color: skyblue;
    text-align: left;
}
.tab td,th{
    padding: 12px 15px;
}
.tab tr{
    border-bottom: 1px solid #dddddd;
}
.tab tr:nth-of-type(even){
    background-color: #f3f3f3;
}
</style>