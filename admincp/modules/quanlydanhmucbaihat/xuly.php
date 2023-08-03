<?php 
include('../../config/config.php');

$tenloaibh = $_POST['tendanhmuc'];
$thutu = $_POST['thuctu'];
if(isset($_POST['themdanhmuc'])){
    //them
    $sql_them = "INSERT INTO tbl_danhmuc(tendoanhmuc,thutu) VALUE('".$tenloaibh."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../index.php?action=quanlydanhmucbh&query=them');
}elseif(isset($_POST['suadanhmuc'])){
//sua
$sql_update = "UPDATE  tbl_danhmuc SET tendoanhmuc='".$tenloaibh."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
    mysqli_query($mysqli,$sql_update);
    header('location:../../index.php?action=quanlydanhmucbh&query=them');
}else{
    $id=$_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../index.php?action=quanlydanhmucbh&query=them');
}
?>