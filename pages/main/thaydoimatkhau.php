<?php
    if(isset($_POST['doimatkhau'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhau_cu = md5($_POST['matkhau_cu']);
        $matkhau_moi = md5($_POST['matkhau_moi']);
        $sql = "SELECT * FROM tbl_dangky WHERE tentaikhoan='".$tentaikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET  matkhau='".$matkhau_moi."' ");
           echo '<div id="echo"><h3>Đã thay đổi mật khẩu<h3></div>';
        }else{
            echo '<div id="echo"><h3>Tài khoản hoặc mật khẩu cũ không đúng, vui lòng nhập lại!<h3></div>';
        }
    }
?>

<body>
<div class="container1">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Đổi mật khẩu</h3>
        
      </div>
      <div class="card-body">
        <form method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="tentaikhoan" class="form-control" placeholder="Nhập tên tài khoản">
            
          </div>
          <div class="input-group form-group">
              
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="text" name="matkhau_cu" class="form-control" placeholder="Nhập mật khẩu">
          </div>
          
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="text" name="matkhau_moi" class="form-control" placeholder="Nhập mật khẩu mới">
          </div>
          
          <div class="form-group">
            <input type="submit" name="doimatkhau" value="Đổi mật khẩu" >
           
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
