<?php 
error_reporting(1);
require('connect.php');

if(isset($_POST['insert'])) { 
      mysqli_set_charset($connect,'utf8');
     $sql = "INSERT INTO `db2`.`users` ( `username`, `password`, `u_role`,`email`) 
     VALUES (?, ?, ?, ?)";
      if($stmt = $connect->prepare($sql)){

	    $user= $_POST['user']; 
	    $password= $_POST['password'];  
	   if(!empty($_POST["u_role"])){
	        echo $u_role= $_POST["u_role"];
	    } 
	    $email= $_POST['email'];
	   $stmt->bind_param("ssss", $user, $password, $u_role, $email);
	   $stmt->execute();
   	  $stmt->close();
      header('Location: index.php');
      
    } else {echo "ERROR: Could not prepare query: $sql. " . $connect->error;} }
     ?>


<style type="text/css">
	.row{
		margin-top: 5px;
	}
</style>


<form action="" enctype="multipart/form-data" method="POST" role="form" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			<div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                User name:
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="user"  class="form-control" value=" <?php echo $user;?>"  >
            </div>
    </div>
    <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                Password:
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="password" name="password"  class="form-control" value="<?php echo $password;?>"  >
            </div>
    </div>
    <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                Email:
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="email" name="email" class="form-control" value="<?php echo $email;?>"  >
            </div>
    </div>
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          U_role:
      </div>
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
         <select class="form-control" name="u_role">
                  <option value="Admin"> Admin</option>   
                  <option value="Sale"> Sale</option>   
                  <option value="Customer"> Customer</option>   
                  <option value="Cashier">Cashier</option>   
        </select>
		  </div>
    </div>
		</div>
        <button type="submit" class="btn btn-primary" name="insert">Thêm</button>
    </div>
</form>
				
