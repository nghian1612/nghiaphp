<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_album là tên loại
 * @throws PDOException lỗi thêm mới
 */
function kh_insert($ten_kh,$matkhau,$kichhoat,$hinh,$email){
    $sql = "INSERT INTO khachhang(ten_kh,matkhau,kichhoat,hinh,email) VALUES(?,?,?,?,?)";
    pdo_execute($sql, $ten_kh,$matkhau,$kichhoat,$hinh,$email);
}

/**
 * Cập nhật tên loại
 * @param int $maalbum là mã loại cần cập nhật
 * @param String $ten_album là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
/* function album_update($maalbum, $tenalbum,$stt,$img){
    $sql = "UPDATE albumsanpham SET tenalbum=?,stt=?,imgalbum=? WHERE maalbum=?";
    pdo_execute($sql, $tenalbum,$stt,$img, $maalbum);
} */

/**
 * Xóa một hoặc nhiều loại
 * @param mix $maalbum là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function kh_delete($ma_kh){
    $sql = "DELETE FROM khachhang WHERE ma_kh=?";
    if(is_array($ma_kh)){
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_kh);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function kh_select_all(){
    $sql = "SELECT * FROM khachhang ORDER BY ma_kh DESC";
    return pdo_query($sql);
}
function client_login($emailuser,$pass){
    $sql = "SELECT * FROM khachhang WHERE email=? AND matkhau=?";
    return pdo_query_one($sql, $emailuser,$pass);
}
/**
 * Truy vấn một loại theo mã
 * @param int $maalbum là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
/* function album_select_by_id($maalbum){
    $sql = "SELECT * FROM albumsanpham WHERE maalbum=?";
    return pdo_query_one($sql, $maalbum);
} */
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $maalbum là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
/* function album_exist($maalbum){
    $sql = "SELECT count(*) FROM albums WHERE maalbum=?";
    return pdo_query_value($sql, $maalbum) > 0;
} */
//menu đa cấp
//function Menu($parent = 0,$space = '---', $trees = NULL){ 
//        if(!$trees){ $trees = array(); }
//	$sql = mysql_query("SELECT * FROM album WHERE parent = ".intval($parent)." ORDER BY tenalbum"); 
//	while($rs = mysql_fetch_assoc($sql)){ 
//		$trees[] = array('maalbum'=>$rs['maalbum'],'tenalbum'=>$space.$rs['tenalbum']); 
//		$trees = Menu($rs['maalbum'],$space.'---',$trees); 
//	} 
//	return $trees; 
//} 