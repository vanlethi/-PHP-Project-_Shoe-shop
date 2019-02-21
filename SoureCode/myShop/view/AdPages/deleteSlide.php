<?php 
  error_reporting(1);
  require('connect.php');
  if (isset($_GET['id']) )
  {
      $idslide = $_GET['id'];
      $sql = "DELETE FROM ".'slide'." WHERE id  = " . $idslide;
      mysqli_query($connect,$sql);
      echo "<script type='text/javascript'>alert('Xoa thanh cong');</script>";
  }
      header('Location: index.php');
      

  ?>