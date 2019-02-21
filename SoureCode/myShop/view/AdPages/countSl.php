<?php 
    //require('connect.php'); 
    error_reporting(1);
    session_start();
    /*function countSl($tbname){
    $sql = "SELECT count(*) FROM $tbname";
    $result = mysqli_query($connect,$sql);
    
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
        $count = $row['count(*)'];
    }}
    return $count;
    }*/
    

    $sql = "SELECT count(*) FROM employees";
    $result = mysqli_query($connect,$sql);
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
        $slEmpl = $row['count(*)'];
    }}

    $sql = "SELECT count(*) FROM categories";
    $result = mysqli_query($connect,$sql);
    
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
         $slCate = $row['count(*)'];
    }}

    $sql = "SELECT count(*) FROM orders";
    $result = mysqli_query($connect,$sql);
    
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
         $slOrd = $row['count(*)'];
    }}

    $sql = "SELECT count(*) FROM slide";
    $result = mysqli_query($connect,$sql);
    
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
         $slSl = $row['count(*)'];
    }}

//Đếm tổng các sản phẩm
    $sql = "SELECT count(*) FROM products";
    $result = mysqli_query($connect,$sql);
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
        $slPro = $row['count(*)'];
    }}

//Đếm thu nhập
    $sql = "SELECT SUM(total) FROM ords_prods;";
    $result = mysqli_query($connect,$sql);
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
        $revenue = $row['SUM(total)'];
    }}

//Đếm sl khách hàng
    $sql = "SELECT count(*) FROM customers;";
    $result = mysqli_query($connect,$sql);
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
        $slCus = $row['count(*)'];
    }}

//Đếm sl sản phẩm trong kho
    $sql = "SELECT SUM(quantity) FROM products";
    $result = mysqli_query($connect,$sql);
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
        $slProInStore = $row['SUM(quantity)'];
    }}

//Đếm sl sản phẩm đã bán
    $sql = "SELECT SUM(quantity) FROM ords_prods";
    $result = mysqli_query($connect,$sql);
    if ($result) {       
       while($row = mysqli_fetch_assoc($result))
        {
        $prodSold = $row['SUM(quantity)'];
    }}
 ?>