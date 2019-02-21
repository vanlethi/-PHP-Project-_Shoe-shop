<?php 
  error_reporting(1);
  require('connect.php');
  if (isset($_GET['id']) )
  {
      $idProduct = $_GET['id'];
      $sql = "DELETE FROM ".'products'." WHERE id  = " . $idProduct;
      mysqli_query($connect,$sql);
      header('Location: index.php');
  }
 ?>

 