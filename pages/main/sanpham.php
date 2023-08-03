
<?php
          $sql_chitiet = "SELECT * FROM tbl_baihat,tbl_danhmuc WHERE tbl_baihat.id_danhmuc=tbl_danhmuc.id_danhmuc
           AND tbl_baihat.id_baihat='$_GET[id]'  LIMIT 1";
          $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
          if(isset( $_SESSION['dangky'])){
                while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
        <div class="wrapper_chitiet">
        
        
                <div class="chitiet_baihat">
                
                <p  class="title_product text-light"> Tên bài hát: <?php echo $row_chitiet['tenbaihat']?></p>
                <p class="title_product text-light">Ca sĩ: <?php echo $row_chitiet['casi']?></p>
                
                <p class="title_product text-light">Thể loại: <?php echo $row_chitiet['tendoanhmuc'] ?></p>
                
                
                </div>
                <div class="baihat">

                <audio controls autoplay >
        
                <source src="admincp/modules/quanlybaihat/uploads/<?php echo $row_chitiet['mp3'] ?>" type="audio/mpeg" controls>
        
                </audio>

                <br>
                <img  width="50%" src="admincp/modules/quanlybaihat/uploads/<?php echo $row_chitiet['hinhanh'] ?>" >

                <br><br>
                

                </div>
                <div class="lyric"><p>Lyric: <?php echo $row_chitiet['lyric'] ?></p></div>

        
        </div>
<?php
        }}else{
?>
<div id="canhbaodangnhap">
<h3>Vui lòng đăng nhập! <br> <a href="index.php?quanly=dangky">Đăng kí tại đây!</a></h3>
</div>
<?php
        }
?>