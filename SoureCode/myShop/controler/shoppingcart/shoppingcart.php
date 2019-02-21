<?php
require_once '../../model/CartItem.php';
   if(session_status() == PHP_SESSION_NONE)
        session_start();
function CheckContain($sanphamid)
{
 
     foreach($_SESSION['shoppingcart'] as $item)
     {
         if($item->MaSanPham == $sanphamid)
         {
             return true;
         }
     }
     return false;
}
function GetCartItem($sanphamid)
{

     foreach($_SESSION['shoppingcart'] as $item)
     {
         if($item->MaSanPham == $sanphamid)
         {
             return $item;
         }
     }
     return null;
}
function GetIndexCartItem($sanphamid)
{

     for($i = 0; $i < count($_SESSION['shoppingcart']); $i++)
     {
         if($_SESSION['shoppingcart'][$i]->MaSanPham == $sanphamid)
         {
             return $i;
         }
     }
     return -1;
}
function GetTriGia()
{
    $tongthanhtien = 0;
        if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart']) > 0)
    {
        foreach($_SESSION['shoppingcart'] as $item)
        {
            $tongthanhtien += $item->ThanhTien;
        }
    }
    return $tongthanhtien;
}
function GetTongSoLuong()
{
    $tongsoluong = 0;
        if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart']) > 0)
    {
        foreach($_SESSION['shoppingcart'] as $item)
        {
            $tongsoluong += $item->SoLuong;
        }
    }
    return $tongsoluong;
}