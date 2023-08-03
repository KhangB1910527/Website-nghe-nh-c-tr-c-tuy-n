<?php
       
         $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);

?>
<?php 
    if(isset($_GET['dangxuat'])&& $_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>
<div  class="menu">
            <ul class="list_menu  ">
                <ul class="nav nav-tabs ">
                <li ><a  href="index.php">Trang chủ</a></li>
              <?php
               while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                   ?>
                <li><a  href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <?php echo $row_danhmuc['tendoanhmuc'] ?></a></li>
                <?php
               }
               ?>
                
                <?php
                    if(isset($_SESSION['dangky'])){
                        
                ?>
                <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                <li><a  href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
                <?php
                    }else{
                ?>
                <li><a  href="index.php?quanly=dangky">Đăng ký</a></li>
                <li><a href="index.php?quanly=dangnhap">Đăng nhập </a></li>
                <?php
                    }
                ?>
                   
                </ul>
            </ul>
            </div>
            <div class="timkiem" style="padding-bottom: 10px">
            <p>
                <form action="index.php?quanly=timkiem" method="POST" id="form_timkiem">
                    <select name="loai">
                        <option>Tên bài hát</option>
                        <option>Ca sĩ</option>
                        
                    </select>
                    <input size="50px" type="text" placeholder="Tìm kiếm bài hát" name="tukhoa">
                    <input type="submit" name="timkiem" value="Tìm kiếm "> 
                    
                </form>
            </p>
            </div>  



<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
        $(document).ready(function (){
            $("#form_timkiem").validate({
                rules:{
                    timkiem: {required:true}
                },
                messages:{
                    timkiem: {required: "Vui long nhap"}
                },
                
            });
        });
</script>
            
