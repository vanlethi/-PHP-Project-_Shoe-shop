<?php 
  error_reporting(1);
  require('connect.php');
  if (isset($_GET['id']) )
  {
      $idslide = $_GET['id'];
      $sql = "DELETE FROM ".'slide'." WHERE id  = " . $idslide;
      mysqli_query($connect,$sql);
  }?>


    <style type="text/css">
        img{
            width: 200px;
            height: ́80px;
        }
    </style>
    <table border="0" style="width: 100%; margin: 0 auto; text-align: center;" class="table table-bordered table-striped">
        <thead>
        <tr bgcolor="#CC3300" style="color:#FFFFFF; font-weight:bold; ">           
            <td>Mã slide</td>
            <td>Tên slide</td>
            <td>Ảnh</td>
            <td>Action</td>

        </tr>
        </thead>
        <?php 

            error_reporting(1); 
            $productlist = "SELECT * FROM slide"; 
            $result = mysqli_query($connect,$productlist);
            if ($result) {       
                while($row = mysqli_fetch_assoc($result))
                {
                    $str = "<tr>";
                    $str .= "<td>".$row['id']."</td>";
                    $str .= "<td>".$row['name']."</td>";
                    $str .= "<td><img src=".$row['img']."></td>";
                    $str .= "<td><a href='updateSlide.php?id=". $row["id"] . "'><span class='glyphicon glyphicon-pencil'>&nbsp;</span></a>
                    <a href='deleteSlide.php?id=". $row["id"] . "'><span class='glyphicon glyphicon-trash'>&nbsp;</span</a></td>";
                    $str .= "</tr>";
                    echo $str;
                }
            }
        ?>        
</table>


