<?php 
        $sql_sua_bh = "SELECT * FROM tbl_baihat WHERE id_baihat='$_GET[idbaihat]' LIMIT  1";
        $query_sua_bh = mysqli_query($mysqli,$sql_sua_bh);
?>
<P>Sửa bài hát</p>
<table border="1" width="100%;" style="border-collapse: collapse;">
<?php  
while($row = mysqli_fetch_array( $query_sua_bh)){
 ?>
<form method="POST" action="modules/quanlybaihat/xuly.php?idbaihat=<?php echo $row['id_baihat'] ?>" enctype="multipart/form-data">
  <tr>
      <td>Tên bài hát</td>
      <td><input type="text" value="<?php echo $row['tenbaihat'] ?>" name="tenbaihat"></td>
  </tr>
  
  <tr>
      <td>Ca sĩ</td>
      <td><input type="text" value="<?php echo $row['casi'] ?>" name="casi"></td>
  </tr>
  
  <tr>
      <td>File mp3</td>
      <td>
          <input type="file" name="mp3">
         
        </td>
  </tr>
  

  <tr>
      <td>Lyric</td>
      <td><textarea name="lyric" id="" cols="30" rows="10"></textarea></td>
  </tr>




  <tr>
      <td>danh mục sản phẩm</td>
      <td>
      <select name="danhmuc">
          <?php
          $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
           if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
           ?>
          <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendoanhmuc'] ?></option>
          <?php
           } else {
           ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendoanhmuc'] ?></option>
           <?php    
           }
          }
          ?>
      </select>
      </td>
    </tr>
    <tr>
      <td>Tình trạng</td>
      <td>
      <select name="tinhtrang">
          <?php
          if($row['tinhtrang']==1){
           ?>
          <option value="1" selected>Kích hoạt</option>
          <option value="0">Ẩn</option>
          <?php 
          }else {
          ?>
          <option value="1">Kích hoạt</option>
          <option value="0" selected>Ẩn</option>
          <?php 
          }
          ?>
      </select>
      </td>
    </tr>
  <tr>
   
  <tr>
      <td colspan="2"><input type="submit" name="suabaihat" value="Sửa bài hát"></td>
  </tr>
</form>
<?php 
}
?>
</table>