<?php 
        $sql_sua_danhmucbh = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT  1";
        $query_sua_danhmucbh = mysqli_query($mysqli,$sql_sua_danhmucbh);
?>
<P>Sửa danh mục bài hát</p>
<table border="1" width="50%;" style="border-collapse: collapse;">
<form method="POST" action="modules/quanlydanhmucbaihat/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
  <?php
  while($dong = mysqli_fetch_array($query_sua_danhmucbh)){
   ?>
<tr>
      <td>Tên danh mục</td>
      <td><input type="text" value="<?php echo $dong['tendoanhmuc'] ?>" name="tendanhmuc"></td>
  </tr>
  <tr>
      <td>Thứ tự</td>
      <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thuctu"></td>
  </tr>
  <tr>
      <td colspan="2"><input type="submit" name="suadanhmuc" value="sửa danh mục sản phẩm"></td>
  </tr>
  <?php 
  }
  ?>
</form>
</table>