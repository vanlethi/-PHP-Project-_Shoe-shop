<?php
	session_start();
	unset($_SESSION['uname']);
	header('Location: /myShop/view/pages/index.php');
?>
