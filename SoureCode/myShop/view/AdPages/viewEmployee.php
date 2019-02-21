   <?php 
            error_reporting(1); 
            $employeeslist = "SELECT * FROM employees"; 
            $resultE = mysqli_query($connect,$employeeslist);
            if ($resultE) {       
            echo "<table class='table table-bordered table-striped' >";
            echo "<thead>";
                echo "<tr bgcolor='#CC3300' style='color:#FFFFFF; font-weight:bold; '>";
                    echo "<th>Mã nhân viên</th>";
                    echo "<th>Tên nhân viên</th>";
                    echo "<th>Ma Id_card</th>";
                    echo "<th>Chức vụ</th>";
                    echo "<th>Email</th>";
                    echo "<th>Lương</th>";
                    echo "<th>Hành động</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($rowE = mysqli_fetch_array($resultE)){
                echo "<tr>";
                    echo "<td>" . $rowE['id'] . "</td>";
                    echo "<td>" . $rowE['name'] . "</td>";
                    echo "<td>" . $rowE['identify_card_num'] . "</td>";
                    echo "<td>" . $rowE['title'] . "</td>";
                    echo "<td>" . $rowE['email'] . "</td>";
                    echo "<td>" . $rowE['salary'] . "</td>";
                    echo "<td>";
        
                    echo "<a href='empl_edit.php?id=". $rowE['id'] ."'  title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'>&nbsp;</span></a>";
                    echo "<a href='deleteEmpl.php?id=". $rowE['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>&nbsp;</span></a>";
                    echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
                }
            
        ?>        






