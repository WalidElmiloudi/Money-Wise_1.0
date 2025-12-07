<?php

require 'config.php';
session_start();
$category = $_POST['category'];
$date     = $_POST['date'];
$table    = $_GET['target'];

$_SESSION['category'] = $category;
$_SESSION['date'] = $date;

$_SESSION['filteredArray'] = [];

if ($category != "All") {
    if ($date != "All") {
        switch ($date) {
            case "CURMONTH":$date = date('m');
            $currentYear = date('Y');
                $result               = $conn->query("SELECT * FROM $table WHERE category = '$category' AND (MONTH(date) = $date AND YEAR(date) = $currentYear)");
                if ($result->num_rows > 0) {
                    while ($filtered = $result->fetch_assoc()) {
                        $_SESSION['filteredArray'][] = $filtered;
                    }
                }
                break;
            case "LASMONTH":$date = (date('m') == 01?12:date('m')-1);
            $currentYear = date('Y');
                $result               = $conn->query("SELECT * FROM $table WHERE category = '$category' AND (MONTH(date) = $date AND YEAR(date) = $currentYear)");
                if ($result->num_rows > 0) {
                    while ($filtered = $result->fetch_assoc()) {
                        $_SESSION['filteredArray'][] = $filtered;
                    }
                }
                break;
            case "CURYEAR":$date = date('Y');
                $result               = $conn->query("SELECT * FROM $table WHERE category = '$category' AND YEAR(date) = $date");
                if ($result->num_rows > 0) {
                    while ($filtered = $result->fetch_assoc()) {
                        $_SESSION['filteredArray'][] = $filtered;
                    }
                }
                break;
            case "LASTYEAR":$date = date('Y') - 1;
            $result               = $conn->query("SELECT * FROM $table WHERE category = '$category' AND YEAR(date) = $date");
                if ($result->num_rows > 0) {
                    while ($filtered = $result->fetch_assoc()) {
                        $_SESSION['filteredArray'][] = $filtered;
                    }
                }
                break;
        }
    } else{
       $result = $conn->query("SELECT * FROM $table WHERE category = '$category'");
    if($result->num_rows>0){
      while($filtered = $result->fetch_assoc()){
        $_SESSION['filteredArray'][]=$filtered;
      }
    }
    }

} else {
    $result = $conn->query("SELECT * FROM $table");
    if ($result->num_rows > 0) {
        while ($filtered = $result->fetch_assoc()) {
            $_SESSION['filteredArray'][] = $filtered;
        }
    }
}
header("Location: $table.php");
exit;
?>