<?php session_start(); ?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 copyright">
				<p>&copy; 2018 Fashion ON. All rights reserved.</p>
			</div>
			<div class="col-sm-6 developer">
				<p>Design by <a class="brand-name" href="#" target="_blank">ABC Company</a></p>
			</div>
		</div>
	</div>
</footer>
<!-- GLOBAL SCRIPTS -->
<script type="text/javascript" src="../../js/libs/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="../../js/libs/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/function.js"></script>
<script type="text/javascript">
	function checkPay(){
		<?php
			if (empty($_SESSION['uname'])) {
				echo "alert('Vui lòng đăng nhập để thực hiện thanh toán!')";
			}elseif (empty($_SESSION['cart'])) {
				echo "alert('Chưa có sản phẩm nào trong giỏ hàng của bạn!')";
			}
		?>
	}
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}

</script>
<!-- PLUGINS -->
<script src="../../js/plugins/owl.carousel.min.js" type="text/javascript"></script>
<!-- CUSTOM -->
<script type="text/javascript" src="../../js/index.js"></script>