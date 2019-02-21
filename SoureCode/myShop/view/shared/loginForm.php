<?php 
	error_reporting(1);
	session_start();
    if (isset($_POST["login"])) {
    	$uname= $_POST["uname"]; 
	    $pass= $_POST["pass"]; 

	    if ($uname === "Administrator") {
		    $adminSql = "SELECT username,password FROM users Where id=1;";
			$admin = $db-> fetchSql($adminSql);

			foreach ($admin as $key => $row) {
				$hash = $row['password'];
				if (password_verify($pass,$hash)) {
		         	if ($row['username']===$uname) {
		         		header('Location: /myShop/view/AdPages/index.php');
		         	}
		        }
		 	}
		 	
		}else{ 	
		 	$userSql = "SELECT * FROM customers Where username = '".$uname."'";
			$user = $db-> fetchSql($userSql);
			foreach ($user as $key => $row) {
				$hash = $row['password'];
				if (password_verify($pass,$hash)) {
		         	if ($row['username']===$uname) {
		         		$_SESSION['uname'] = $uname;
		         		header('Location: /myShop/view/pages/index.php');
		         	}
		        }
		 	}
		}
	}    
 ?>
	<form action="" method="POST" role="form" id="formLogin" enctype="multipart/form-data">
		<div class="form-group">
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<input type="text" class="form-control" placeholder="Username" required="required"
				name="uname" id="uname" value="<?php echo $_POST["uname"]; ?>">
			</div>

		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<input type="password" class="form-control" placeholder="Password" required="required"
				name="pass" id="pass" value="<?php echo $_POST["pass"]; ?>">
			</div>
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="#" style="font-size: 10px;">Forgot password?</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<button type="submit" class="btn btn-danger" name="login" id="login" style="width: 100%">Đăng nhập</button>
			</div>
		</div>
		</div>
		
	</form>
			