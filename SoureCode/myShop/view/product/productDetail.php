<?php
	require('../../model/autoload.php');
	session_start();
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
<html lang="end">
<head>
	<title>Fashion ON | Chi Tiết Sản Phẩm </title>
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
	.prod-img{
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.prod-img .mini img{
		margin-left: 15px;
	}
	.mini-img{
		width: 100%;
		height: 100%;
	}
	.info{
		margin-left: 20px;
	}
	.info h5{
		font-weight: bold; 
		color: ;
	}
	.info h3{
		color: #ee4d2d;
	}
	.ship img{
		width: 20px;
		height: 15px; 
	}
	.prod-details{
		background-color: white;
		margin-bottom: 20px;
	}
	.order{
		margin-top: 20px;
	}
	.order a{
		color: white;
	}
	.prod-price{
		color: #ee4d2d;
		font-size: 20px;
	}
	.details-infobar,.relate-infobar{
	    position: relative;
	    border-radius: 5px;
	    width: 100%;
	    height: 44px;
	    margin-top: 19px;
  	}
  	.details-header,.relate-header{
	    width: 270px;
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
  	.details-header{
  		background: #003366;
  	}
  	.relate-header{
  		background: #79CDCD;
  	}
  	.form-control{
  		width: 30%;
  	}
  	.comment{
		margin-left: 25px;
  	}
  	.title{
  		background: #ee4d2d;
  		width: 15%;
  		text-align: center;
  		border-radius:5px;
  		color: white;
  		text-transform: uppercase;
  		font-weight: bold;
  	}
</style>
<body>
	<?php
		require('../shared/header.php');
	?>
	<main>
		<section class="details-page">
			<div class="container">	
				<div class="details-infobar">
					<h2 class="details-header">
						Thông tin sản phẩm
					</h2>
				</div>
				<div class="prod-details">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-4 col-lg-6 prod-img">
							<?php
								if (isset($_GET['id'])) {
									$id = $_GET['id'];
									$getPr = "SELECT * FROM products WHERE id = ".$id;
									$resProd = $db->fetchSql($getPr);
									foreach ($resProd as $key => $row) {
							?>
							<div class="row">
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 mini">
									<img src="<?php echo $row['img'];?>">
									<br>
									<br>
									<img src="<?php echo $row['img'];?>">
									<br>
									<br>
									<img src="<?php echo $row['img'];?>">
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 main">
									<img src="<?php echo $row['img'];?>">
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-4 col-lg-6 product-info">
							<div class="info">
								<div class="prod-title">
									<h3><?php echo $row['pname'];?> </h3>
								</div>
								<div class="prod-price">
									<?php 
										if ($row['status']=='sale') {
									?>
									<p><?php echo formartSalePrice($row['price'],25); ?></p>
									<span><strike><p><?php echo fomartPrice($row['price']); ?></p></strike></span>
									<?php 
										}else {
									?>
									<p><?php echo fomartPrice($row['price']); ?></p>
									<?php 
										}
									?>
								</div>
								<div class="ship">
									<h5>Vận chuyển</h5>
									<p>
										<img src="img/freeship.png">   
									Miễn Phí Vận Chuyển khi đạt mức giá trị đơn hàng tối thiểu
									</p>
								</div>
								<div class="cate">
									<h5>Kích thước: </h5>
									<span>
										<?php echo $row['description'];?>
									</span>
								</div>
								<?php }} ?>
								<div class="order">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<a type="button" class="btn btn-primary" href="productDetail.php?action=add&id=<?php echo $row['id'];?>">
										<i class="fa fa-cart-plus"></i> Thêm vào giỏ</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="comment">
						<div class="title">
							Đánh giá Sản phẩm
						</div>
						<hr>
						
					</div>
				</div>
			</div>
		</section>
		<hr>
		<section class="details-page">
			<div class="container">	
				<div class="relate-infobar">
					<h2 class="relate-header">
						Sản phẩm liên quan
					</h2>
				</div>
				<div class="relate-prod">
					<div class="row">
						<?php
							$saleSql = "SELECT * FROM products WHERE category_id = ".$row['category_id']." LIMIT 4";
							$saleResult = $db-> fetchSql($saleSql);
							foreach ($saleResult as $key => $row) {
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
										<?php echo formartSalePrice($row['price'],40); ?>
										<strike> <?php echo fomartPrice($row['price']); ?> </strike>
									</p>
									<p class="sale-desc">
										
									</p>
									<div class="buy-detail">
										<button type="button" class="btn btn-primary">
											<a href="productDetail.php?action=add&id=<?php echo $row['id'];?>">
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
			</div>
		</section>	
	</main>	
	<?php
		require('../shared/footer.php');
	?>
</body>
</html>