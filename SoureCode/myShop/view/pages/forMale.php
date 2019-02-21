<?php
	session_start();
	require('../../model/autoload.php');

	if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM products 
                WHERE id={$id}"; 
            $res = $db-> fetchSql($sql_s);
            foreach ($res as $key => $row) {
                $_SESSION['cart'][$row['id']]=array( 
                    "quantity" => 1, 
                    "price" => $row['price'] 
                ); 
            }
        } 
          
    }	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fashion ON | Male </title>
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
<body>
	<?php
		require('../shared/header.php');
	?>
	<main>
		<section class="product-list">
			<div class="container">	
				<div class="sale-infobar">
					<h2 class="sale-header">
						Hàng sale
					</h2>
				</div>		
				<div class="row">
					<?php
						error_reporting(1);
						$getPro = "SELECT * from products where gender = 'male' and status = 'sale ' LIMIT 8";
						$resPro = $db-> fetchSql($getPro);
						foreach ($resPro as $key => $row) {
					?>
					<div class="col-md-3 col-sm-6 col-xs-12 product-item">
						<div class="product-box">
							<div class="product-image image-effect">
								<a href="../product/productDetail.php?id=<?php echo $row['id']?>">
									<img style="width: 400px;height: 200px" src="
									<?php echo $row['img']; ?>"/>
								</a>
							</div>
							<div class="product-info">
								<h5 class="product-title">
									<a href="../product/productDetail.php?id=<?php echo $row['id']?>"><?php echo $row['pname']; ?></a>
								</h5>
								<p class="price-desc">
									<?php echo formartSalePrice($row['price'],$row['sale']); ?>
									<strike> <?php echo fomartPrice($row['price']); ?> </strike>
								</p>
								</p>
								<p class="sale-desc">
									
								</p>
								<div class="buy-detail">
									<button type="button" class="btn btn-primary">
										<a href="forMale.php?action=add&id=<?php echo $row['id'];?>">
										<i class="fa fa-cart-plus"></i> Thêm vào giỏ</a>
									</button>
									<a type="button" class="btn btn-primary" href="../product/productDetail.php?id=<?php echo $row['id']?>">Xem chi tiết</a>
								</div>
							</div><!-- /.product-info -->
						</div>
					</div><!-- /.product-item -->
					<?php } ?>
				</div>
			</div>
		</section><!-- /.product-list -->
		<section class="product-list">
			<div class="container">	
				<div class="quicksell-infobar">
					<h2 class="quicksell-header">
						Hàng bán chạy
					</h2>
				</div>		
				<div class="row">
					<?php
						error_reporting(1);
						$getPro = "SELECT * from products where gender = 'male' and status = 'sell well' LIMIT 8";
						$resPro = $db-> fetchSql($getPro);
						foreach ($resPro as $key => $row) {
					?>
					<div class="col-md-3 col-sm-6 col-xs-12 product-item">
						<div class="product-box">
							<div class="product-image image-effect">
								<a href="../product/productDetail.php?id=<?php echo $row['id']?>">
									<img style="width: 400px;height: 200px" src="
									<?php echo $row['img']; ?>"/>
								</a>
							</div>
							<div class="product-info">
								<h5 class="product-title">
									<a href="../product/productDetail.php?id=<?php echo $row['id']?>"><?php echo $row['pname']; ?></a>
								</h5>
								<p class="price-desc">
									<?php echo fomartPrice($row['price']);  ?>
								</p>
								<p class="sale-desc">
									
								</p>
								<div class="buy-detail">
									<button type="button" class="btn btn-primary">
										<a href="forMale.php?action=add&id=<?php echo $row['id'];?>">
										<i class="fa fa-cart-plus"></i> Thêm vào giỏ</a>
									</button>
									<a type="button" class="btn btn-primary" href="../product/productDetail.php?id=<?php echo $row['id']?>">Xem chi tiết</a>
								</div>
							</div><!-- /.product-info -->
						</div>
					</div><!-- /.product-item -->
					<?php } ?>
				</div>
			</div>
		</section><!-- /.product-list -->
		<section class="product-list">
			<div class="container">	
				<div class="hot-infobar">
					<h2 class="hot-header">
						Hàng hot mới về
					</h2>
				</div>		
				<div class="row">
					<?php
						error_reporting(1);
						$getPro = "SELECT * from products where gender = 'male' and status = 'hot ' LIMIT 8";
						$resPro = $db-> fetchSql($getPro);
						foreach ($resPro as $key => $row) {
					?>
					<div class="col-md-3 col-sm-6 col-xs-12 product-item">
						<div class="product-box">
							<div class="product-image image-effect">
								<a href="../product/productDetail.php?id=<?php echo $row['id']?>">
									<img style="width: 400px;height: 200px" src="
									<?php echo $row['img']; ?>"/>
								</a>
							</div>
							<div class="product-info">
								<h5 class="product-title">
									<a href="../product/productDetail.php?id=<?php echo $row['id']?>"><?php echo $row['pname']; ?></a>
								</h5>
								<p class="price-desc">
									<?php echo fomartPrice($row['price']);  ?>
								</p>
								<p class="sale-desc">
									
								</p>
								<div class="buy-detail">
									<button type="button" class="btn btn-primary">
										<a href="forMale.php?action=add&id=<?php echo $row['id'];?>">
										<i class="fa fa-cart-plus"></i> Thêm vào giỏ</a>
									</button>
									<a type="button" class="btn btn-primary" href="../product/productDetail.php?id=<?php echo $row['id']?>">Xem chi tiết</a>
								</div>
							</div><!-- /.product-info -->
						</div>
					</div><!-- /.product-item -->
					<?php } ?>
				</div>
			</div>
		</section><!-- /.product-list -->
	</main>
	<?php
		require('../shared/footer.php');
	?>
</body>
</html>
