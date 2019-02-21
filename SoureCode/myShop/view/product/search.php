	
	<?php
		$connect = mysqli_connect("localhost", "root", "", "db2");
		mysqli_set_charset($connect, 'UTF8');

		if($connect === false){
	    die("ERROR: Could not connect. " . $connect->connect_error);
		}
		if (isset($_POST["searching"])&&$_POST["search"] != ''){
	  	$searchKeyword= $_POST['search'];
	    
	    $query = "SELECT * FROM products  WHERE (`pname` LIKE '%".$searchKeyword."%') ";
        $result = mysqli_query($connect,$query);
        if (mysqli_num_rows($result)<=0 ) {
        	echo("<div class='hot-infobar' style='margin-left: 100px'>Không có kết quả phù hợp cho từ khoá '<span style='color: red'>$searchKeyword'</span></div>");
        }
        else{
         
          
            if($result){
	?>
	<section class="product-list" >
			<div class="container">	
				<div class="hot-infobar">
					 Kết quả tìm kiếm cho từ khoá '<span style="color: red"><?php echo $searchKeyword ; ?>'</span>
				</div>	
	<div class="row">
	<?php 
		while($row = mysqli_fetch_assoc($result)){
	 ?>
	<div class="col-md-3 col-sm-6 col-xs-12 product-item">
		<div class="product-box">
			<div class="product-image image-effect">
				<a href="productDetail.php?id=<?php echo $row['id']?>">
					<img style="width: 400px;height: 200px" src="
					<?php echo $row['img']; ?>"/>
				</a>
			</div>
			<div class="product-info">
				<h5 class="product-title">
					<a href="productDetail.php?id=<?php echo $row['id']?>"><?php echo $row['pname']; ?></a>
				</h5>
				<p class="price-desc">
					<?php echo fomartPrice($row['price']);  ?>
				</p>
				<div class="buy-detail">
					<button type="button" class="btn btn-primary">
						<a href="/myShop/view/pages/index.php?action=add&id=<?php echo $row['id'];?>;">
						<i class="fa fa-cart-plus"></i> Thêm vào giỏ</a>
					</button>
					<a type="button" class="btn btn-primary" href="/myShop/view/product/productDetail.php?id=<?php echo $row['id']?>">Xem chi tiết</a>
				</div>
			</div><!-- /.product-info -->
		</div>
	</div><!-- /.product-item -->
<?php }}}
} ?>
</div>
</div>
</section>


