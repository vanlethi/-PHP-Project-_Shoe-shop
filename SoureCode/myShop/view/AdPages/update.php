<?php error_reporting(1);
require('connect.php');
if (isset($_GET['id']))
	{
	    $idProduct = $_GET['id'];
	    $sql = "SELECT * FROM products WHERE id  = " . $idProduct;
	    $result = mysqli_query($connect,$sql);
        if ($result) {       
           while($row = mysqli_fetch_assoc($result))
           {  
              $nameSp= $row['pname']; 
              $price= $row['price']; 
              $quantity= $row['quantity']; 
              $size= $row['description']; 
              $category_id= $row['category_id']; 
              $gender= $row['gender']; 
              $status= $row['status']; 
              $img= $row['img']; 
           }
	}
	   
if(isset($_POST['update'])) { 
    //Upload img
     if (isset($_FILES['fileUpload'])) {
       if ($_FILES['fileUpload']['error'] > 0)
           echo "Upload lỗi rồi!";
       else {
           move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' . $_FILES['fileUpload']['name']);

       }
   }
      $nameSp= $_POST['nameSp']; 
      $price= $_POST['price']; 
      $quantity= $_POST['quantity']; 
      $size= $_POST['size']; 
      $category_id= $_POST['category']; 
      $gender= $_POST['gender']; 
      $status= $_POST['status']; 
      $sale= $_POST['sale']; 
      $img = "uploads/".$_FILES['fileUpload']['name'];
      $s = "UPDATE products SET pname = '$nameSp', price = $price, quantity =$quantity, description = '$size', category_id = '$category_id', gender = '$gender', status = '$status', img = '$img', sale=$sale WHERE id = $idProduct ;";
      mysqli_query($connect,$s);
      
      echo "<script type='text/javascript'>alert('Chỉnh sửa thành công');</script>";
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
        <form action="<?php echo $id; ?>" enctype="multipart/form-data" method="POST" role="form" >
           <legend>Chỉnh sửa thông tin sản phẩm </legend>
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
                                    Tên sản phẩm:
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="nameSp"  class="form-control" value=" <?php echo $nameSp;?>"  >
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Giá sản phẩm:
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="number" name="price"  class="form-control" value="<?php echo $price;?>"  >
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Số lượng:
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="number" name="quantity" class="form-control" value="<?php echo $quantity;?>"  >
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Size sản phẩm 
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="size"  class="form-control" value="<?php echo $size;?>"  >
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Loại sản phẩm
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  					<select class="form-control" name="category">
                                        <?php
                                       
                                         $sql = "SELECT * FROM categories WHERE id  = " . $category_id;
                                         $rs=mysqli_query($connect,$sql);;
                                        if($rs)
                                        {
                                        while($row = mysqli_fetch_assoc($rs))
                                        {
                                        ?>
                                            <option value= "<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                        }}?>

                                		<?php
                                    	$fetch = "SELECT * FROM categories WHERE id  != " . $category_id;
                                    	$result = mysqli_query($connect,$fetch);
                                    	if($result)
                                    	{
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                			?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>   
                                		<?php
                                        }
                                    }

                               ?>
                              		</select>
                				</div>
                        </div>
                        <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    Kiểu dành cho
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <select class="form-control" name="gender">
                                            <option><?php echo $gender?></option>
                                            <option value="All"> All</option>   
                                            <option value="Female"> Female</option>   
                                            <option value="Male"> Male</option>   
                              		</select>
                                </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Status
                          </div>
                          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <input type="text" name="status"  class="form-control" value="<?php echo $status; ?>" >
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    %Sale
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <input type="number" name="sale"  class="form-control" value="<?php echo $sale; ?>" >
                                </div>
                          </div>
                        </div>
					
					</div>
          <button type="submit" class="btn btn-primary" name="update">Update</button>
					<button type="submit" class="btn btn-primary" name="back">Back</button>
			</div>
		</div>
        </form>
	</body>
</html>
