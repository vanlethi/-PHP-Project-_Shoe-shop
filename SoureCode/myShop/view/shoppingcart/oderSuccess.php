<?php
  require('../../model/autoload.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="end">
<head>
  <title>Fashion ON | Đặt hàng thành công</title>
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
  .title img{
    padding-top: 20px;
    padding-bottom: 20px;
  }
  .more-title ul{
    padding-top: 60px;
    padding-bottom: 15px;
  }
  .more-title a{
    color: white;
  }
  .details-page{
    margin-bottom: 20px;
  }
  .shop{
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
    border-radius: 5px;
    background: red;
    width: 10%;
    color: white;
  }
  .shop:hover,.manage:hover,.btn-success:hover{
    font-weight: bold;
  }
  .btn-success{
    margin-left: 20px;
    margin-bottom: 30px;
  }

</style>
<body>
  <?php
    require('../shared/header.php');
  ?>
  <form action="" method="POST" enctype="multipart/form-data" role="form">
    <section class="details-page">
      <div class="container"> 
        <div class="details-infobar">
          <h2 class="details-header">
            Đặt hàng thành công
          </h2>
        </div>
        <div class="prod-details">
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 title">
                <img style="width: 40%; height: 40%;" src="img/success.jpg">
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 more-title">
              <ul>
                <li>Cảm ơn bạn đã đặt hàng tại <a class="shop" href="../pages/index.php">Fashion ON</a></li>
                <li>Mã số đơn hàng của bạn là 36455</li>
                <li>Để theo dõi trạng thái của đơn hàng vui lòng vào <a href="" class="manage" style="color:#FE642E">Quản lý đơn hàng</a></li>
              </ul>
              <a type="submit" name="home" class="btn btn-success" href="../pages/index.php">Tiếp tục mua hàng</a>
            </div>
            <hr>
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