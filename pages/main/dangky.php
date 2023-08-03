<?php
if(isset($_POST['dangky'])){
    $errors = array(); // Tạo một mảng để lưu trữ các lỗi
    
    // Kiểm tra tên tài khoản
    if(empty($_POST['tentaikhoan'])) {
        $errors['tentaikhoan'] = "Tên tài khoản không được để trống!";
    } elseif(strlen($_POST['tentaikhoan']) < 6) {
        $errors['tentaikhoan'] = "Tên tài khoản phải có ít nhất 6 ký tự!";
    }
    
    // Kiểm tra mật khẩu
    if(empty($_POST['matkhau'])) {
        $errors['matkhau'] = "Mật khẩu không được để trống!";
    } elseif(strlen($_POST['matkhau']) < 8) {
        $errors['matkhau'] = "Mật khẩu phải có ít nhất 8 ký tự!";
    }
    
    // Nếu không có lỗi, thực hiện đăng ký tài khoản
    if(empty($errors)) {
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhau = password_hash($_POST['matkhau'], PASSWORD_DEFAULT); // Sử dụng phương thức password_hash để mã hóa mật khẩu
        
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tentaikhoan,matkhau) 
        VALUE('".$tentaikhoan."','".$matkhau."') ");
        if($sql_dangky){
            $_SESSION['id_dangky'] = mysqli_insert_id($mysqli);
            $_SESSION['dk'] = 1;
            header('Location:index.php?quanly=dangnhap');
        }
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
        <h3>Đăng Kí</h3>
        
      </div>
      <div class="card-body">
        <form method="post">
       

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" placeholder="Nhập tên tài khoản" name="tentaikhoan" id="tentaikhoan" class="form-control <?php echo isset($errors['tentaikhoan']) ? 'is-invalid' : '' ?>" value="<?php echo isset($_POST['tentaikhoan']) ? $_POST['tentaikhoan'] : '' ?>">
              <?php if(isset($errors['tentaikhoan'])): ?>
                  <div class="invalid-feedback"><?php echo $errors['tentaikhoan'] ?></div>
              <?php endif; ?>
            
          </div>
          <div class="input-group form-group">
              
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" placeholder="Nhập mật khẩu" name="matkhau" id="matkhau" class="form-control <?php echo isset($errors['matkhau']) ? 'is-invalid' : '' ?>">
              <?php if(isset($errors['matkhau'])): ?>
                  <div class="invalid-feedback"><?php echo $errors['matkhau'] ?></div>
              <?php endif; ?>
          </div>
          
          <div class="form-group">
            <input type="submit" name="dangky" value="Đăng kí" >
            
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>


