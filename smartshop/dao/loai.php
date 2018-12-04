<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */
function loai_insert($ten_Loai){
    $sql = "INSERT INTO loaisp(ten_Loai) VALUES(?)";
    pdo_execute($sql, $ten_Loai);
}
/**
 * Cập nhật tên loại
 * @param int $ma_loai là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function loai_update($ma_Loai, $ten_Loai){
    $sql = "UPDATE loaisp SET ten_Loai=? WHERE ma_Loai=?";
    pdo_execute($sql, $ten_Loai, $ma_Loai);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_loai là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function loai_delete($ma_Loai){
    $sql = "DELETE FROM loaisp WHERE ma_Loai=?";
    if(is_array($ma_Loai)){
        foreach ($ma_Loai as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_Loai);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function loai_select_all(){
    $sql = "SELECT * FROM loaisp ORDER BY ma_Loai DESC";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_loai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function loai_select_by_id($ma_Loai){
    $sql = "SELECT * FROM loaisp WHERE ma_Loai=?";
    return pdo_query_one($sql, $ma_Loai);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $ma_loai là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function loai_exist($ma_Loai){
    $sql = "SELECT count(*) FROM loaisp WHERE ma_Loai=?";
    return pdo_query_value($sql, $ma_Loai) > 0;
}
//menu đa cấp
//function Menu($parent = 0,$space = '---', $trees = NULL){ 
//        if(!$trees){ $trees = array(); }
//	$sql = mysql_query("SELECT * FROM loai WHERE parent = ".intval($parent)." ORDER BY ten_Loai"); 
//	while($rs = mysql_fetch_assoc($sql)){ 
//		$trees[] = array('ma_loai'=>$rs['ma_loai'],'ten_Loai'=>$space.$rs['ten_Loai']); 
//		$trees = Menu($rs['ma_loai'],$space.'---',$trees); 
//	} 
//	return $trees; 
//}