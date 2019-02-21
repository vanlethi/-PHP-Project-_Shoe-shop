<?php 
error_reporting(1);
require('connect.php');

if(isset($_POST['insert'])) { 
      mysqli_set_charset($connect,'utf8');
     $sql = "INSERT INTO `db2`.`products` ( `pname`, `price`, `quantity`,`description`,`category_id`,`gender`, `img`, `status`) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
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

	    $nameSp= $_POST['nameSp']; 
	    $price= $_POST['price']; 
	    $quantity= $_POST['quantity']; 
	   if(!empty($_POST["category"])){
	        echo $category_id= $_POST["category"];
	    } 
	    $size= $_POST['size'];
	    $gender= $_POST['gender']; 
	    $status= $_POST['status']; 
	    $img = "uploads/".$_FILES['fileUpload']['name'];
	   $stmt->bind_param("siisisss", $nameSp, $price, $quantity, $size, $category_id,$gender,$img,$status);
	   $stmt->execute();
   	   $stmt->close();
    } else {echo "ERROR: Could not prepare query: $sql. " . $connect->error;} }
      header('Location: index.php');
    
 ?>


<style type="text/css">
	.row{
		margin-top: 5px;
	}
</style>


<form action="" enctype="multipart/form-data" method="POST" role="form" >
		
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<a href="#" class="thumbnail">
      <input type="file" name="fileUpload" id="fileUpload" size="35"> 
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			<div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Tên:
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="nameSp"  class="form-control"  >
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Giá:
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="number" name="price"  class="form-control"  >
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Số lượng:
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="number" name="quantity" class="form-control"   >
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Size: 
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="size"  class="form-control"   >
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Loại:
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      					<select class="form-control" name="category">
                         	
                    		<?php
                        	$fetch = "SELECT * FROM categories";
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
                        Kiểu:
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <select class="form-control" name="gender">
                                <option value="All"> All</option>   
                                <option value="Female"> Female</option>   
                                <option value="Male"> Male</option>   
                  		</select>
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        Status:
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <input type="text" name="status"  class="form-control" >
                    </div>
            </div>
		
		</div>
        <button type="submit" class="btn btn-primary" name="insert">Thêm</button>
</div>
</form>
				
