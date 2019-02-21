<?php error_reporting(1); 
require('connect.php');
if (isset($_GET['id']))
	{
	    $idSlide = $_GET['id'];
	    $sql = "SELECT * FROM slide WHERE id  = " . $idSlide;
	    $result = mysqli_query($connect,$sql);
        if ($result) {       
           while($row = mysqli_fetch_assoc($result))
           {  
              $nameSl= $row['name']; 
              $img= $row['img']; 
           }
	}
	   
if(isset($_POST['update'])) { 
    //Upload img
     if (isset($_FILES['fileUpload'])) {
       if ($_FILES['fileUpload']['error'] > 0)
          echo "<script type='text/javascript'>alert('Cập nhật lỗi, vui lòng chọn lại ảnh');</script>";
       else {
           move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' . $_FILES['fileUpload']['name']);

       }
   }else{

   }
      $nameSl= $_POST['name'];
      if (!isset($_FILES['fileUpload'])) {
        $imgul= $img;
      }
      else $imgul = "uploads/".$_FILES['fileUpload']['name'];
      $s = "UPDATE slide SET name = '$nameSl', img = '$imgul' WHERE id = $idSlide ;";
      mysqli_query($connect,$s);
      echo "<script type='text/javascript'>alert('Cập nhật thành công');</script>";
      

    } else {echo $mysqli-> error;} }

if (isset($_POST['back']))
    {
      header('Location: index.php');
    }

 ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<style type="text/css">
			.row{
				margin-top: 20px;
			}
		</style>
	</head>
	<body>
    <div class="container-fluid">
      
    
    <form action="<?php echo $id; ?>" enctype="multipart/form-data" method="POST" role="form" >
    <legend>Chỉnh sửa thông tin slide </legend>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<a href="#" class="thumbnail">
                  <img src="<?php echo $img ?>">
                    <div class="form-group">
                    <input type="file" name="fileUpload" id="fileUpload" size="35">
                    </div>
                </a>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="form-group">
						
						<div class="row">
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  Tên slide:
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  <input type="text" name="name"  class="form-control" value=" <?php echo $nameSl;?>"  >
              </div>
            </div>
                        
					</div>
          <button type="submit" class="btn btn-primary" name="update">Update</button>
					<button type="submit" class="btn btn-primary" name="back">Back</button>
			</div>
		</div>
  </form>
  </div>
	</body>
</html>
