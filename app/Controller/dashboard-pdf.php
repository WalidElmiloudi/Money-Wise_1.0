<?php
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: ../views/index.php");
  exit;
}
require "../vendor/autoload.php";
use Dompdf\Dompdf;



ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    *{
      margin:0;
    }
   body{
    width:100vw;
    height:100vh;
    display : flex;
      justify-content:center;
      align-items:center;
   }
    h1{
      font-size:50px;
      padding : 16px;
    }
    h2{
      font-size:30px;
      padding : 16px;
    }
    .card{
      display : flex;
      flex-direction:column;
      border:2px solid black;
      padding:32px
    }
  </style>
</head>
<body>
  <div class="card">
  <h1>Total Incomes :</h1>
  <?php
  echo"<h2>".$_SESSION['totalIncomes']." $ </h2>";
  ?>
  <h1>Total Expences :</h1>
  <?php
  echo"<h2>".$_SESSION['totalExpences']." $ </h2>";
  ?>
  <h1>Balance :</h1>
  <?php
  echo"<h2>".$_SESSION['balance']." $ </h2>";
  ?>
  <h1>This Month Incomes :</h1>
  <?php
  echo"<h2>".$_SESSION['monthTotalIncomes']." $ </h2>";
  ?>
  <h1>This Month Expences :</h1>
  <?php
  echo"<h2>".$_SESSION['monthTotalExpences']." $ </h2>";
  ?>
  </div>
</body>
</html>
<?php
$html = ob_get_clean();

$dompdf = new Dompdf([
    "isRemoteEnabled" => true
]);

$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream("dashboard.pdf", ["Attachment" => true]);

header("Location: ../views/dashboard.pdf");
exit;