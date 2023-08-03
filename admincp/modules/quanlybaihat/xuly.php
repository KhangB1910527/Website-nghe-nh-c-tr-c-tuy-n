<?php 
include('../../config/config.php');
$tenbaihat = $_POST['tenbaihat'];
$casi = $_POST['casi'];
$lyric = $_POST['lyric'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
//mp3
$mp3 = $_FILES['mp3']['name'];
$mp3_tmp = $_FILES['mp3']['tmp_name'];
$mp3 = time().'_'.$mp3;
//hinhanh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;

if(isset($_POST['thembaihat'])){
    //them
    $sql_them = "INSERT INTO tbl_baihat(tenbaihat,casi,mp3,tinhtrang,id_danhmuc,hinhanh,lyric) VALUE('".$tenbaihat."','".$casi."','".$mp3."','".$tinhtrang."','".$danhmuc."','".$hinhanh."','".$lyric."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($mp3_tmp,'uploads/'.$mp3);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('location:../../index.php?action=quanlybaihat&query=them');
}elseif(isset($_POST['suabaihat'])){
//sua
if($mp3!=''){
$sql_update = "UPDATE  tbl_baihat SET tenbaihat='".$tenbaihat."',casi='".$casi."',mp3='".$mp3."',tinhtrang='".$tinhtrang."',lyric='".$lyric."',id_danhmuc='".$danhmuc."' WHERE id_baihat='$_GET[idbaihat]'";
move_uploaded_file($mp3_tmp,'uploads/'.$mp3); 
//xoa hinh cu
$sql = "SELECT * FROM tbl_baihat WHERE id_baihat = '$_GET[idbaihat]' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['mp3']);
    }
}else {
    $sql_update = "UPDATE  tbl_baihat SET tenbaihat='".$tenbaihat."',casi='".$casi."',mp3='".$mp3."',tinhtrang='".$tinhtrang."',lyric='".$lyric."',id_danhmuc='".$danhmuc."' WHERE id_baihat='$_GET[idbaihat]'";
}
    mysqli_query($mysqli,$sql_update);
    header('location:../../index.php?action=quanlybaihat&query=them');
}else{
    $id=$_GET['idbaihat'];
    $sql = "SELECT * FROM tbl_baihat WHERE id_baihat = '$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['mp3']);
    }
    $sql_xoa = "DELETE FROM tbl_baihat WHERE id_baihat='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../index.php?action=quanlybh&query=them');
}
?>