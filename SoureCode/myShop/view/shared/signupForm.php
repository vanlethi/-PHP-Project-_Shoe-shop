<?php 
 	error_reporting(1);
	$message='';
	if (isset($_POST['signup'])) {

	$connect = mysqli_connect("localhost", "root", "", "db2");
	mysqli_set_charset($connect, 'UTF8');

	if($connect === false){
	    die("ERROR: Could not connect. " . $connect->connect_error);
	}
	if (strlen($_POST["password"])<8) { 
		$message="Mật khẩu yếu";
		echo "<script type='text/javascript'>alert('Đăng ký không thành công => ".$message;
    	echo "');</script>";								
 	}else{
	if ($_POST["password"] === $_POST["confirm"]) {	
		$sql1 = "INSERT INTO `customers` ( `username`, `password`, `name`,`address`,`email`,`sdt`) 
		VALUES (?,?,?,?,?,?)";	
		if ($stmt = $connect->prepare($sql1)) {
			$name=$_POST["name"];
			$address= $_POST["address"];
			$sdt=$_POST["sdt"];
			$username=$_POST["username"];
			$password= password_hash($_POST["password"],PASSWORD_DEFAULT);
			$email=$_POST["email"]; 
			$stmt->bind_param("sssssi", $username, $password,$name,$address,$email,$sdt);
			$stmt->execute();
		echo "<script type='text/javascript'>alert('Đăng ký thành công!! Vui lòng đăng nhập');</script>";
		}	
		}
		else{
			$message='Mật khẩu không trùng khớp';
			echo "<script type='text/javascript'>alert('Đăng ký không thành công => ".$message;
    		echo "');</script>";
		}
	}
    $confirm=$password= '1234';
    $username=$_POST["username"];
	$email=$_POST["email"];
	$name=$_POST["name"];
	$address= $_POST["address"];
	$sdt=$_POST["sdt"];
}
	
?>

<form action="" method="POST" role="form" id="formLogin" enctype="multipart/form-data">
	<div class="form-group">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row" style="margin: 10px;">
				<b>Họ & Tên</b>
				<input type="text" class="form-control" name="name" placeholder="Tên đăng nhập" required="required" value="<?php echo $name ?>" style="width: 100%">	
				</div>

				<div class="row" style="margin: 10px;">
					<b>Số điện thoại</b>
					<input type="number" class="form-control" placeholder="Số điện thoại" required="required"
					name="sdt" id="sdt" value="<?php echo $sdt ?>" style="width: 100%">
				</div>


				<div class="row" style="margin: 10px;">
					<b>Địa chỉ</b>
					<input type="text" class="form-control" name="address" placeholder="Địa chỉ hiện tại" required="required" value="<?php echo $address ?>" style="width: 100%">
				</div>
				<div class="row" style="margin: 10px;">

					<p style="color:red">Không được để trống <?php echo $message; ?></p>
					<button type="submit" class="btn btn-danger" name="signup" id="signup" style="width: 100%">Đăng ký</button >
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row" style="margin: 10px;">
				<b>Tên đăng nhập</b>
				<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required="required" value="<?php echo $username ?>" style="width: 100%">	
				</div>

				<div class="row" style="margin: 10px;">
					<b>Email</b>
					<input type="email" class="form-control" placeholder="Địa chỉ email" required="required"
					name="email" id="email" value="<?php echo $email ?>" style="width: 100%">
				</div>
				<div class="row" style="margin: 10px;">
					<b>Mật khẩu</b>
					<input type="password" class="form-control" name="password" placeholder="Mật khẩu trên 8 ký tự" required="required" value="<?php echo $password ?>" style="width: 100%">
				</div>
				
				<div class="row" style="margin: 10px;">
					<b>Xác nhận MK</b>
					<input type="password" class="form-control" name="confirm" placeholder="Nhập lại mật khẩu" required="required" value="<?php echo $confirm ?>" style="width: 100%">
				</div>
			</div>
		</div>	
	</div>
</form>

<?php  
	// $user = "SELECT username , email FROM user";
	// $result = mysqli_query($connect,$user);
	// if ($result) {       
 //      while($row = mysqli_fetch_assoc($result))
 //      {
 //      	if ($_POST["username"] ===$row['username'])  {
 //      		$message=("Tên tài khoản đã tồn tại"); 
 //      	}                                                                                   
 //      	if ($_POST["email"] ===$row['email']) {
 //      		$message=("Email đã tồn tại"); 
 //      	}
 //    }}
?>