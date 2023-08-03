<?php
    if(isset($_SESSION['dk'])){
      echo "<script type='text/javascript'>alert('dang ky thanh cong');</script>";
      unset($_SESSION['dk']);
    }
    if(isset($_POST['dangnhap'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $sql = "SELECT * FROM tbl_dangky WHERE tentaikhoan='".$tentaikhoan."' AND matkhau='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
       
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tentaikhoan'];
            $_SESSION['id_dangky'] = $row_data['id_dangky'];
            header('Location:index.php?quanly=dangnhapkhachhang');
        }else{ 
            echo '<p style="color: red; text-align: center;">Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.</p>';

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
   
    </style>
    
   
    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
<div class="container1">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Đăng nhập</h3>
        
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
            <input type="password" name="matkhau" class="form-control" placeholder="Nhập mật khẩu">
          </div>
          
          <div class="form-group">
            <input type="submit" name="dangnhap" value="Đăng nhập" >
           
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>


