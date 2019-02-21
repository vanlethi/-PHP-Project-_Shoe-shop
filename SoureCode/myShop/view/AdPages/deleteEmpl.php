<?php 
  error_reporting(1);
  //require('connect.php');
  if (isset($_GET['id']) )
  {
      $idEmp = $_GET['id'];
      $sql = "DELETE FROM ".'employees'." WHERE id  = " . $idEmp;
      mysqli_query($connect,$sql);
      header('Location: index.php');
  }
 ?>