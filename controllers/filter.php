<?php

require 'Category.php';
require 'Income.php';
require 'Expence.php';

session_start();

$conn = new Database('localhost','money_wallet','root','');
$pdo = $conn->connect();

$category = $_POST['category'];
$date     = $_POST['date'];
$table    = $_GET['target'];
$userID = $_SESSION['userId'];

$_SESSION['category'] = $category;
$_SESSION['date'] = $date;

$category_object = new Category($table,$userID);

if ($category != "All") 
{
    if ($date != "All")
    {
        switch ($date)
        {
            case "CURMONTH":    $month = date('m');
                                $year = date('Y');
                                $condition = "AND t.category = '$category' AND MONTH(date) = $month AND YEAR(date) = $year";
                                break;

            case "LASMONTH":    $month = (date('m') == 01?12:date('m')-1);
                                $year = ($month == 12?date('Y')-1:date('Y'));
                                $condition = "AND t.category = '$category' AND MONTH(date) = $month AND YEAR(date) = $year";
                                break;

            case "CURYEAR":     $year = date('Y');
                                $condition = "AND t.category = '$category' AND YEAR(date) = $year";
                                break;

            case "LASTYEAR":    $year = date('Y') - 1;
                                $condition = "AND t.category = '$category' AND YEAR(date) = $year";
                                break;

        }

        

        $_SESSION['filteredArray'] = $category_object->getByCategoryDate($pdo,$condition);

    } 
    else
    {
        
        $condition = "AND t.category = '$category'";
        $_SESSION['filteredArray'] = $category_object->getByCategoryDate($pdo,$condition);
    }

} 
else 
{
    if ($date != "All") 
    {
        switch ($date)
        {
            case "CURMONTH":    $month = date('m');
                                $year = date('Y');
                                $condition = " AND MONTH(date) = $month AND YEAR(date) = $year";
                                break;
                
            case "LASMONTH":    $month = (date('m') == 01?12:date('m')-1);
                                $year = ($month == 12?date('Y')-1:date('Y'));
                                $condition = " AND MONTH(date) = $month AND YEAR(date) = $year";
                                break;

            case "CURYEAR":     $year = date('Y');
                                $condition = "AND YEAR(date) = $year";
                                break;

            case "LASYEAR":     $year = date('Y') - 1;
                                $condition = " AND YEAR(date) = $year";
                                break;
        }

        $_SESSION['filteredArray'] = $category_object->getByCategoryDate($pdo,$condition);
    } 
    else
    {
       switch($target)
       {
           case 'incomes' : $object = new Income($userID,$amount,$type,$description);
                   break;
           case 'expences' : $object = new Expence($userID,$amount,$type,$description);
                   break;
       }
       $_SESSION['filteredArray'] = $object->getAll($pdo);
    }
}
header("Location: ../views/$table.php");
exit;
?>