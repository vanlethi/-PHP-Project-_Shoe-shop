<?php 
error_reporting(1);
require('connect.php');

if(isset($_POST['insert'])) { 
      mysqli_set_charset($connect,'utf8');
     $sql = "INSERT INTO `db2`.`employees` ( `name`, `identify_card_num`, `title`,`email`,`salary`) 
     VALUES (?, ?, ?, ?,?)";
      if($stmt = $connect->prepare($sql)){

	    $name= $_POST['name']; 
	    $identify_card_num= $_POST['identify_card_num'];  
	   if(!empty($_POST["title"])){
	        echo $title= $_POST["title"];
	    } 
      $email= $_POST['email'];
	    $salary= $_POST['salary'];
	   $stmt->bind_param("sissi", $name, $identify_card_num, $title, $email,$salary);
	   $stmt->execute();
   	  $stmt->close();
    } else {echo "ERROR: Could not prepare query: $sql. " . $connect->error;} }
      header('Location: index.php');
    
 ?>


<style type="text/css">
	.row{
		margin-top: 5px;
	}
</style>


<form action="" enctype="multipart/form-data" method="POST" role="form" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			<div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                Name:
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="text" name="name"  class="form-control"   >
            </div>
    </div>
    <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              Ma Id_card:
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="number" name="identify_card_num"  class="form-control"   >
            </div>
    </div>
    <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                Email:
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <input type="email" name="email" class="form-control"  >
            </div>
    </div>
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          title:
      </div>
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
         <select class="form-control" name="title">
                  <option value="Quan ly"> Quan ly</option>   
                  <option value="Sale"> Sale</option>   
                  <option value="Bao ve"> Bao ve</option>   
                  <option value="Thu ngan">Thu ngan</option>   
                  <option value="Cong tac vien">Cong tac vien</option>   
        </select>
		  </div>
    </div>
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          Salary:
      </div>
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          <input type="number" name="salary" class="form-control">
      </div>
    </div>
		</div>
        <button type="submit" class="btn btn-primary" name="insert">Thêm</button>
    </div>
</form>
				
