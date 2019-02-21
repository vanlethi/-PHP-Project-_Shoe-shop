<?php error_reporting(1);
require('connect.php');
if (isset($_GET['id']))
	{
	    $idEmp = $_GET['id'];
	    $sql = "SELECT * FROM employees WHERE id  = " . $idEmp;
	    $result = mysqli_query($connect,$sql);
        if ($result) {       
           while($row = mysqli_fetch_assoc($result))
           {  
              $nameEmpl= $row['name']; 
              $identify_card_num= $row['identify_card_num']; 
              $title= $row['title']; 
              $email= $row['email']; 
              $salary= $row['salary']; 
           }
	}
	   
if(isset($_POST['update'])) { 
      $nameEmpl= $_POST['name']; 
      $identify_card_num= $_POST['identify_card_num']; 
      $title= $_POST['title']; 
      $email= $_POST['email']; 
      $salary= $_POST['salary']; 
      $s = "UPDATE employees SET name = '$nameEmpl', identify_card_num = '$identify_card_num',
      title = '$title', email = '$email',salary = '$salary'WHERE id = $idEmp ;";
      mysqli_query($connect,$s);
      

    } else {echo $mysqli-> error;} }

if (isset($_POST['back']))
        {
            header('Location: index.php');
        }

 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<style type="text/css">
			.row{
				margin-top: 20px;
			}
		</style>
	</head>
	<body>
    <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-body">
        
        <form action="<?php echo $id; ?>" enctype="multipart/form-data" method="POST" role="form" >
        <legend>Chỉnh sửa thông tin nhân viên </legend>
    		<div class="row">
    			
    			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    					<div class="form-group">
    						
    						<div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                      Tên nhân viên:
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                      <input type="text" name="name"  class="form-control" value=" <?php echo $nameEmpl;?>"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                      Ma Id_card::
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                      <input type="text" name="identify_card_num"  class="form-control" value=" <?php echo $identify_card_num;?>"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                      Chức vụ nhân viên:
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                      <input type="text" name="title"  class="form-control" value=" <?php echo $title;?>"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                      Email:
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                      <input type="text" name="email"  class="form-control" value=" <?php echo $email;?>"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                      Lương:
                  </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                      <input type="number" name="salary"  class="form-control" value=" <?php echo $salary;?>"  >
                  </div>
                </div>
                            
    					</div>
              <button type="submit" class="btn btn-primary" name="update">Update</button>
    					<button type="submit" class="btn btn-primary" name="back">Back</button>
    			</div>
    		</div>
      </form>
      </div>
    </div>
  </div>
	</body>
</html>
