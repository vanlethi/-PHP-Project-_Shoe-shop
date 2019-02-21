   <?php 
            error_reporting(1); 
            $categorieslist = "SELECT * FROM categories"; 
            $resultCate = mysqli_query($connect,$categorieslist);
            if ($resultCate) {       
            echo "<table class='table table-bordered table-striped' >";
            echo "<thead>";
                echo "<tr bgcolor='#CC3300' style='color:#FFFFFF; font-weight:bold; '>";
                    echo "<th>Mã loại </th>";
                    echo "<th>Tên loại</th>";
                    echo "<th>Mã loại</th>";
                    echo "<th>Mô tả</th>";
                    echo "<th>Action</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($rowCate = mysqli_fetch_array($resultCate)){
                echo "<tr>";
                    echo "<td>" . $rowCate['id'] . "</td>";
                    echo "<td>" . $rowCate['name'] . "</td>";
                    echo "<td>" . $rowCate['code'] . "</td>";
                    echo "<td>" . $rowCate['description'] . "</td>";
                    echo "<td>";
        
                    echo "<a href='empl_edit.php?id=". $rowCate['id'] ."'  title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'>&nbsp;</span></a>";
                    echo "<a href='deleteEmpl.php?id=". $rowCate['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>&nbsp;</span></a>";
                    echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
                }
            
        ?>        
    </table>





