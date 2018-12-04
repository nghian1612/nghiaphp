<?php
require_once 'pdo.php';


function sanpham_insert($tensp, $dongia, $giamgia, $hinh, $ngaynhap, $luotxem,$mota){
    $sql = "INSERT INTO sanpham(tensp,dongia,giamgia,hinh,ngaynhap,luotxem,mota) VALUES(?,?,?,?,?,?,?)";
    pdo_execute($sql, $tensp, $dongia, $giamgia, $hinh, $ngaynhap, $luotxem, $mota);
}



function sanpham_update($maSP, $tensp, $dongia, $giamgia, $hinh, $ngaynhap, $luotxem, $mota){
    $sql = "UPDATE sanpham SET tensp=?, dongia=?, giamgia=?, hinh=?, ngaynhap=?, luotxem=?, mota=? WHERE maSP=?";
    pdo_execute($sql, $tensp, $dongia, $giamgia, $hinh, $ngaynhap, $luotxem, $mota, $maSP);
}


function sanpham_delete($maSP){
    $sql = "DELETE FROM sanpham WHERE maSP=?";
    if(is_array($maSP)){
        foreach ($maSP as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $maSP);
    }
}



function sanpham_select_all(){
    $sql = "SELECT * FROM sanpham ORDER BY maSP DESC";
    return pdo_query($sql);
}



function sanpham_select_by_id($maSP){
    $sql = "SELECT * FROM sanpham WHERE maSP=?";
    return pdo_query_one($sql, $maSP);
}


function sanpham_exist($maSP){
    $sql = "SELECT count(*) FROM sanpham WHERE maSP=?";
    return pdo_query_value($sql, $maSP) > 0;
}

