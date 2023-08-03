<h3 class="thembaihat">Thêm Bài hát</h3>
<table border="5" width="100%;" style="border-collapse: collapse;">
<form method="POST" action="modules/quanlybaihat/xuly.php" enctype="multipart/form-data">
  <tr class="success">
      <td>Tên bài hát</td>
      
      <td><textarea type="text" name="tenbaihat"></textarea></td>
  </tr>
 
  <tr>
      <td>Tên ca sĩ</td>
      <td><input type="text" name="casi"></td>
  </tr>
  
  <tr>
      <td>File mp3</td>
      <td><input type="file" name="mp3"></td>
  </tr>
  <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh"></td>
  </tr>
  

  <tr class="danger">
      <td>Lyric</td>
      <td><textarea name="lyric" id="" cols="30" rows="10"></textarea></td>
  </tr>




  <tr>
      <td>Thể loại</td>
      <td>
      <select name="danhmuc">
          <?php
          $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
           ?>
          <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendoanhmuc'] ?></option>
          <?php
          }
          ?>
      </select>
      </td>
    </tr>
    <tr>
      <td>Tình trạng</td>
      <td>
      <select name="tinhtrang">
          <option value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
      </select>
      </td>
    </tr>  
  <tr>
      <td colspan="2"><input type="submit" name="thembaihat" value="Thêm bài hát"></td>
  </tr>
</form>
</table>


