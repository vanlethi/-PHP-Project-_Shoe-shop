<?php
	function fomartPrice($price){
		$price = intval($price);
		return number_format($price,0,',','.'). " đ";
	}

	function formartSalePrice($price,$sale){
		$price = intval($price);
		$sale = intval($sale);
		$price = $price * (100 - $sale)/100;
		return number_format($price,0,',','.'). " đ";
	}

	function getPrice($price,$quantity){
		$price = intval($price);
		$quantity = intval($quantity);
		$price = $price * $quantity;
		return $price;
	}

	function getPriceAfterSale($price,$totalsale){
		$price = intval($price);
		$totalsale = intval($totalsale);
		$price = $price * (100 - $totalsale)/100;
		return $price;
	}
?>