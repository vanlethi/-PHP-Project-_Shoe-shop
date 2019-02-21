<?php
	error_reporting(1);
	session_start();
	if (isset($_POST['gotoCart'])) {
		if (empty($_SESSION['uname'])) {
			echo "<script>Vui lòng đăng nhập để thực hiện chức năng này!</script>";
		}
	}
?>
<style type="text/css">
	.user{
		font-size: 14px;
		border-radius: 5px;
		background: #FE642E;
		padding-bottom: 5px;
		padding-top: 5px;
		padding-right: 5px;
		padding-left: 5px;
	}
</style>
<header>
	<section class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-12 logo">
					<a href="../pages/index.php">
						<img src="../../images/fashion.jpg" alt="FASHION" />
					</a>
				</div><!-- /.logo -->
				<div class="col-md-9 col-sm-12">
					<div class="row">
						<div class="col-md-6 col-sm-12 search">
							<form action="" method="POST" enctype="multipart/form-dat">
								<span class="search-text">Tìm kiếm</span>
								<input type="text" name="search" placeholder="Tìm kiếm trên Fashion ON" />
								<button type="submit" name="searching" class="search-btn">
									<i class="fa fa-search"></i>
								</button>
							</form>
						</div>
						<div class="col-md-6 col-sm-12 register-info">
							<div class="row">
								<?php
									if($_SESSION['uname']) {
								?>
									<div class="col-sm-3 col-xs-6 login-btn">
										<!-- <i class="fa fa-user-o"></i> -->
										<a href="#" class="user" style="color: white;text-transform:capitalize;"><?php echo $_SESSION['uname'];?></a>
									</div>
									<div class="col-sm-3 col-xs-6 login-btn">
										<a href="../shared/logout.php">Đăng xuất</a>
									</div>
								<?php  
									}else{
								?>
									<div class="col-sm-3 col-xs-6 login-btn">
										<a href="#"data-toggle="modal" data-target="#loginModal">Đăng nhập</a>
									</div>
									<div class="modal fade" id="loginModal" role="dialog" >
									    <div class="modal-dialog" style="width: 300px; height: 300px ">
									      <div class="modal-content" >
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">Đăng nhập tài khoản</h4>
									        </div>
									        <div class="modal-body" >
									          <?php require("loginForm.php") ?>
									        </div>
									      </div>
									    </div>
								  	</div>
									<div class="col-sm-3 col-xs-6 resgister-btn">
										<a href="#" data-toggle="modal" data-target="#signinModal">Đăng ký</a>			
									</div>
									<div class="modal fade" id="signinModal" role="dialog" >
									    <div class="modal-dialog" >
									      <div class="modal-content" >
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">Đăng ký tài khoản</h4>
									        </div>
									        <div class="modal-body" >
									          <?php require("signupForm.php") ?>
									        </div>
									      </div>
									    </div>
									</div>
								 <?php
								 	}
								 ?>
								<div class="col-sm-6 col-xs-6 cart">
									<a data-role="gotoCart" href="../shoppingcart/viewCart.php">
										<i class="fa fa-shopping-cart"></i>
										Giỏ hàng
									</a>
								</div>
							</div><!-- /.row -->
						</div><!-- /.logo -->
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.banner -->
	<nav class="menu">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-10 menu-links">
					<div class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-device" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div><!-- /.navbar-header -->
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="navbar-device">
							<ul class="nav navbar-nav">
								<li class="home-link">
									<a href="../pages/index.php">
										<span>Trang chủ</span>
									</a>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#">
										<span>Nhãn hiệu</span>
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<?php
											$getCate = "SELECT id,name from categories";
											$resCate = $db-> fetchSql($getCate);
											foreach ($resCate as $key => $row) {
							                    echo "<li><a href='../pages/forBrand.php?cate_id=".$row['id']."'>".$row['name']."</a></li>";  
											}
							                 
										?>
									</ul>
								</li>
								<li class="home-link">
									<a href="../pages/forMale.php">
										Giày nam
									</a>
								</li>
								<li class="home-link">
									<a href="../pages/forFemale.php">
										Giày nữ
									</a>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.navbar -->
				</div><!-- /.menu-links -->
				<div class="col-md-4 col-sm-2 social-links">
					<h4 class="hidden-sm">Liên hệ</h4>
					<div class="social-icons">
						<a class="icons icon-google-plus" href="#" target="_blank"></a>
						<a class="icons icon-twitter" href="#" target="_blank"></a>
						<a class="icons icon-facebook" href="#" target="_blank"></a>
					</div>
				</div><!-- /.social-links -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</nav><!-- /.menu -->
</header>
<?php
	require('../product/search.php');
?>