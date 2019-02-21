<?php
    require('connect.php');

$adminAdd='101B Lê Hữu Trác - Phước Mỹ - Sơn Trà - Đà Nẵng';
$adminSql = "SELECT username,password,email FROM users Where id=1;";
$result = mysqli_query($connect,$adminSql);
$pass='';
if ($result){
    while($row = mysqli_fetch_assoc($result))
    { 
    $adminName = $row['username'];
    $adminPass=$row['password'];
    $adminEmail=$row['email'];
    }
}
if(isset($_POST['edit'])) {
    $adminName=$_POST['adminName'];
    $adminPass=$_POST['adminPass'];
    $adminEmail=$_POST['adminEmail'];
    $s = "UPDATE users SET username = '$adminName', password = '$adminPass', email ='$adminEmail' WHERE id = 1 ;";
    echo $s;
    mysqli_query($connect,$s);
    
   
      echo "<script type='text/javascript'>alert('Chỉnh sửa thành công');</script>";
}
?>
<!-- /Widgets -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title box-title">My Profile</h3>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <img src="uploads/admin.png">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <legend>Thông tin Admin</legend>
                            <form action="" method="POST" role="form" enctype="multipart/form-dat">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <label for="">Tên đăng nhập: </label><span ><?php echo $adminName; ?>
                                            <input type="text" class="form-control" name="adminName" placeholder="Input field" value="<?php echo $adminName; ?>">
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <label for="">Mật khẩu: </label><span >@@@@@@
                                            <input type="password" class="form-control" name="adminPass" placeholder="Input field" value="<?php echo $adminPass; ?>"> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <label for="">Email: </label><span ><?php echo $adminEmail; ?>
                                            <input type="email" class="form-control" name="adminEmail" placeholder="Input field" value="<?php echo $adminEmail; ?>">
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <label for="">Địa chỉ: </label><span ><?php echo $adminAdd; ?>
                                            <input type="text" class="form-control" name="adminAdd" placeholder="Input field" value="<?php echo $adminAdd; ?>"> 
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="edit" class="btn btn-primary">Chỉnh sửa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- /.card-body -->
        </div><!-- /.card -->
    </div>
</div>
