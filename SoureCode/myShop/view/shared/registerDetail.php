<?php
	require('../../model/autoload.php');
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	    $error = array();
	    if (empty($_POST['pay'])) {
	        $error['pay'] = "Bạn cần chọn hình thức thanh toán";
	    } else {
	        $pay = $_POST['pay'];
	    }
	    if (empty($error)) {
	        echo $pay;
	    }

	    if ($_POST['pay'] == "banking") {
	    	header('Location: https://www.paypal.com/vn/signin?country.x=VN&locale.x=en_VN');
	    }elseif ($_POST['pay'] =="cod") {
	    	header('Location: /myShop/view/shoppingcart/oderSuccess.php');
	    }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fashion ON | Customer Details </title>
	<link rel="icon" href="../../images/fashion.jpg">
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<meta name="description" content="site-description" />
	<meta name="keywords" content="site-keywords" />
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<meta name="format-detection" content="telephone=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<!-- BEGIN PLUGIN STYLES -->
	<link rel="stylesheet" href="../../css/owl.theme.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../css/owl.transitions.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../css/owl.carousel.css" type="text/css" media="screen" />
	<!-- END PLUGIN STYLES -->
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../css/style.css?v=1.0.0" type="text/css" media="screen" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- END GLOBAL MANDATORY STYLES -->
</head>
<style type="text/css">
	.cus-infobar{
    position: relative;
    border-radius: 5px;
    width: 100%;
    height: 44px;
    margin-bottom: 30px;
    margin-top: 30px;
  }
  .cus-header{
    width: 400px;
    background: #d00202;
    font-family: OpenSansBold;
    font-size: 18px;
    vertical-align: middle;
    color: #fff;
    padding: 12.5px 23px;
    margin: 0;
    float:left;
    text-align: center;
    position: relative;
    border-top-right-radius: 30px;
    text-transform: uppercase;
    box-shadow: black;
  }
  .details-page{
  	margin-bottom: 50px;
  }
  .row b{
  	color: black;
  }
  .details{
  	background: white;
  	padding-bottom: 20px;
  	padding-left: 20px;
  	padding-right: 20px;
  	padding-top: 20px;
  }
  .total{
	border-radius: 5px;
	background: #FE642E;
	color: white;
	float: left;
	font-weight: bold;
	font-size: 15px;
	padding-left: 10px;
	padding-right: 10px;
	padding-bottom: 5px;
	padding-top: 5px;
  }
</style>
<body>
	<?php
		require('header.php');
	?>
<form action="" method="POST" role="form" id="formLogin" enctype="multipart/form-data">
<div class="form-group">
	<main class="details-page">
		<section class="product-list">
			<div class="container">	
				<div class="cus-infobar">
					<h2 class="cus-header">
						Cập nhật thông tin người nhận
					</h2>
				</div>
				<div class="details">
					<div class="row">
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<?php
								if ($_SESSION['uname']) {
								 	$cusuname = ($_SESSION['uname']);
								}
								$cusSql = "SELECT * FROM customers WHERE username ='".$cusuname."'";
								$cusFetch = $db->fetchSql($cusSql);

								foreach ($cusFetch as $key => $row) {
							?>
							<div class="form-group">
								<div class="row" style="margin-bottom: 10px;">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<b>Họ và tên</b>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
										<input type="text" class="form-control" name="name" required="required" value="<?php echo $row['name']?>">
									</div>
								</div>
								<div class="row" style="margin-bottom: 10px;">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<b>Địa chỉ:</b>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
										<input type="text" class="form-control" required="required"
										name="address" id="address" value="<?php echo $row['address']?>">
									</div>
								</div>
								<div class="row" style="margin-bottom: 10px;">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<b>Email:</b>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
										<input type="email" class="form-control" required="required"
										name="email" id="email" value="<?php echo $row['email']?>">
									</div>
								</div>
								<div class="row" style="margin-bottom: 10px;">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<b>Số điện thoại:</b>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
										<input type="number" class="form-control" required="required"
										name="phone" id="phone" value="<?php echo $row['sdt']?>">
									</div>
								</div>
								<div class="row" style="margin-bottom: 10px;">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<b>Hình thức thanh toán:</b>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							            <select name="pay" class="form-control">
							                <option value="">-- Chọn hình thức thanh toán --</option>
							                <option <?php if (isset($pay) && $pay == 'cod') echo "selected=\"selected\"";  ?> value="cod" >Thanh toán tại nhà</option>
							                <option <?php if (isset($pay) && $pay == 'banking') echo "selected=\"selected\"";  ?> value="banking">Thanh toán qua Thẻ tín dụng</option>
							            </select><br/><br/>
							            <span style="color: red;"><?php if (isset($error['pay'])) echo $error['pay']; ?></span> <br/>
									</div>
								</div>
							</div>
					<?php }?>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<div class="row">
								<div class="title">
									<h4 style="color:red;font-weight: bold;">Tổng tiền hóa đơn</h4>
									<hr>
									<p class="total">
										<?php 
										if ($_SESSION['uprice']) {
											echo $_SESSION['uprice'];
										}
										;?>
									</p>
									<span>
										<p style="color: black; padding-top: 5px; font-weight: bold;">  
											(Đã bao gồm VAT)
										</p>
								</span>
								</div>
								<div class="payorder">
									<form action="" method="POST" >
										<input 
											type="submit" 
											class="btn btn-danger"
											name="sm_order" 
											id="sm_order" 
											style="color:white;float: left; width: 90%;margin-top: 10px;"
											value="Thanh toán"
										>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>	
	</main>
</div>
</form>	
	<?php
		require('footer.php');
	?>
</body>
</html>

