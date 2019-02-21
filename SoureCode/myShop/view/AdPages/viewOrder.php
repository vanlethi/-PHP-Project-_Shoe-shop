   <?php 
            error_reporting(1); 
            $orderlist= "SELECT `orders`.`id` AS id,`customers`.`name` AS cus_name,`orders`.`date`AS dateOrd,SUM(`ords_prods`.`total`) AS total,`orders`.`status`AS status FROM orders,customers,ords_prods WHERE `ords_prods`.`order_id`=`orders`.`id` AND `customers`.`id`=`orders`.`cus_id` Group by `ords_prods`.`order_id`;"; 
            $result = mysqli_query($connect,$orderlist);
            if ($result) {       
            echo "<table class='table table-bordered table-striped' >";
            echo "<thead>";
                echo "<tr bgcolor='#CC3300' style='color:#FFFFFF; font-weight:bold; '>";
                    echo("<th>Mã hóa đơn</th>");
                    echo("<th>Tên khách hàng</th>");
                    echo("<th>Ngày đặt Hàng</th>");
                    echo("<th>Tổng tiền</th>");
                    echo("<th>Chi tiết sản phẩm đã mua</th>");
                    echo("<th>Tình trạng</th>");
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_assoc($result))
                {  
                $str = "<tr>";
                    $str .= "<td>".$row['id']."</td>";
                    $str .= "<td>".$row['cus_name']."</td>";
                    $str .= "<td>".$row['dateOrd']."</td>";
                    $str .= "<td>".number_format($row['total'])."đ</td>";
                    $prods_ord_detail=" SELECT`products`.`pname` AS pname, `products`.`price` AS price, `ords_prods`.`quantity` AS quantity FROM products,ords_prods,orders WHERE `ords_prods`.`product_id`=`products`.`id` AND `ords_prods`.`order_id`=`orders`.`id` AND `ords_prods`.`order_id`= ".$row['id'];
                    $resultl = mysqli_query($connect,$prods_ord_detail);
                    $str .="<td style=' text-align: left;'>";
                    if ($resultl) {       
                        while($rowl = mysqli_fetch_assoc($resultl))
                        {  
                            $str .= ' - '.$rowl['pname']." - giá: ".number_format($rowl['price'])."đ - sl: ".$rowl['quantity']."<br>";}
                        }
                    $str .="</td>";
                    $str .= "<td>".$row['status']."</td>";
                    $str .= "</tr>";
                    echo $str;
            }
            echo "</tbody>";                            
        echo "</table>";
                }
            
        ?>        






