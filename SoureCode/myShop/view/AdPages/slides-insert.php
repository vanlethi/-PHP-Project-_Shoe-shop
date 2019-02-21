<?php 
error_reporting(1);
require('connect.php');

if(isset($_POST['insert'])) { 
      mysqli_set_charset($connect,'utf8');
     $sql = "INSERT INTO `db2`.`slide` ( `name`, `img`) 
     VALUES (?, ?)";
      if($stmt = $connect->prepare($sql)){
   	  if (isset($_FILES['fileUpload'])) {
       if ($_FILES['fileUpload']['error'] > 0)
           echo "Upload lỗi rồi!";
       else {
       		if (!is_dir('uploads')) {
       			mkdir('uploads');
       		}
           move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' . $_FILES['fileUpload']['name']);}
       }

	    $nameSl= $_POST['nameSl']; 
	    $img = "uploads/".$_FILES['fileUpload']['name'];
	   $stmt->bind_param("ss", $nameSl,$img);
	   $stmt->execute();
   	   $stmt->close();

    } else {echo "ERROR: Could not prepare query: $sql. " . $connect->error;}
      echo "<script type='text/javascript'>alert('Thêm thành công');</script>";
      header('Location: index.php');
     }

 ?>

<form action="" enctype="multipart/form-data" method="POST" role="form" >
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    Anh: 
    <a href="#" class="thumbnail">
      <input type="file" name="fileUpload" id="fileUpload" size="35"> 
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    Tên slide:
   <input type="text" name="nameSl"  class="form-control" >
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<br>
	<button type="submit" class="btn btn-primary" name="insert">Thêm</button>      
</div>
</div>
</form>


