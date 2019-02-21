<?php
	require('../../model/autoload.php');
	session_start();
	if(isset($_POST['reset'])){ 
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
    }
	if(isset($_GET['action']) && $_GET['action']=="delete"){ 
    	$id=intval($_GET['id']); 
        if(isset($_SESSION['cart'][$id])){ 
            unset($_SESSION['cart'][$id]); 
        }
    }
?>
<!DOCTYPE html>
<html lang="end">
<head>
	<title>Fashion ON | Chi tiết giỏ hàng </title>
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
	.prod-price{
		color: #ee4d2d;
		font-size: 20px;
	}
	.details-infobar{
	    position: relative;
	    border-radius: 5px;
	    width: 100%;
	    height: 44px;
	    margin-top: 19px;
  	}
  	.details-header{
	    width: 300px;
	    font-family: OpenSansBold;
	    font-size: 18px;
	    background: #FF0000;
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
  	.prod-img img{
  		width: 20%;
  		height: 20%;
  	}
  	.form-control{
  		width: 70%;
  	}
  	.prod-details{
  		background: white;
  	}
  	.title{
  		text-align: center;
  		font-weight: bold;
  	}
  	.title h5{
  		font-weight: bold;
  	}
  	.more-title h5{
  		font-weight: bold;
  	}
  	.info img{
  		margin-bottom: 20px;
  		margin-left: 15px;
  	}
  	.details-page{
  		margin-bottom: 20px;
  	}
  	.butn a{
  		float: left;
  		width: 100%;
  		color: white;
  	}
  	.buybtn{
  		background: white;
  		padding-top: 20px;
  		padding-bottom: 20px;
  		padding-right: 20px;
  	}
  	.total{
  		border-radius: 5px;
		background: #FE642E;
		color: white;
		float: left;
		padding-left: 5px;
		padding-right: 5px;
		font-size: 20px;
  	}
  	.butn .btn-danger{
  		margin-top: 20px;
  	}

</style>
<body>
	<?php
		require('../shared/header.php');
	?>
	<form action="viewCart.php" method="POST" enctype="multipart/form-data" role="form">
		<section class="details-page">
			<div class="container">	
				<div class="details-infobar">
					<h2 class="details-header">
						Giỏ hàng của bạn
					</h2>
				</div>
				<div class="prod-details">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 title">
							<h5>Sản Phẩm</h5>
							<hr>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 more-title">
							<div class="row">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<h5>Đơn giá</h5>
									<hr>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<h5>Số lượng</h5>
									<hr>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<h5>Số tiền</h5>
									<hr>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<h5>Thao tác</h5>
									<hr>
								</div>
							</div>
						</div>
							<?php
							if (empty($_SESSION['cart'])) {
								echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 title'>
								<h4></h4></div>";
							}else{
								$myCart ="SELECT * FROM products WHERE id IN ("; 
								    foreach($_SESSION['cart'] as $id => $value) { 
								        $myCart.= intval($id) .","; 
								    } 
							    $myCart=substr($myCart, 0, -1).")";
							    $query=$db->fetchSql($myCart); 
							    $totalprice = 0;

							    foreach ($query as $key => $row) {
					        		$subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['price'];
							?>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 info">
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img">
										<img src="<?php echo $row['img']; ?>">
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 product-name">
										<p><?php echo $row['pname']; ?></p>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 size-name">
										Phân loại hàng: <?php echo $row['description']; ?>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="color: #FE642E">
										<?php 
											if ($row['status']=='sale') {
												echo formartSalePrice($row['price'],$row['sale']);
											}else{
												echo fomartPrice($row['price']); 
											}
										?>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<input min="0" max="<?php echo $row['quantity']?>" type="number" name="quantity[<?php echo $row['id']; ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" class="form-control"/>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="color: #FE642E">
										<p>
											<?php 
												if ($row['status']=='sale') {
													$tt = getPriceAfterSale($subtotal,$row['sale']);
													$totalprice += $tt;
													echo fomartPrice($tt); 
												}else{
													echo fomartPrice($subtotal); 
													$totalprice += $subtotal;
												}
											?>
										</p>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<button 
											type="submit" class="btn btn-primary" name="reset"
											href="viewCart.php?action=reset&&id=<?php echo $row['id']; ?>">
											<i class="fa fa-repeat"></i>
										</button>
										<a 
											type="submit" class="btn btn-danger" name="delete" 
											href="viewCart.php?action=delete&&id=<?php echo $row['id']; ?>">
											<i class="fa fa-trash-o"></i>
										</a>
									</div>
								</div>
								<br><br><br><br><br>
							</div>
						<?php }}?>
						<hr>
					</div>
				</div>
			</div>
		</section>
		<section class="details-page">
			<div class="container">
				<div class="buybtn">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="row">
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<h4 style="color:red;font-weight: bold;">Tổng tiền hàng</h4>
									<p class="total">
										<?php 
											echo $al = fomartPrice($totalprice); 
											$_SESSION['uprice']=$al;
										?>
									</p>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 butn">
									<a type="submit" class="btn btn-danger" name="payorder" href="
									<?php 
										if (!empty($_SESSION['cart']) && !empty($_SESSION['uname'])) {
											echo "../shared/registerDetail.php";
										}
									?>" onclick="checkPay()">MUA HÀNG</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>		
	</form>
	<?php
		require('../shared/footer.php');
	?>
</body>
</html>