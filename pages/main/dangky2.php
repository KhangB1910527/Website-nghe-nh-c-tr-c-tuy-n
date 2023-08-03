<?php
ob_start(); // bắt đầu bộ đệm đầu ra

if(isset($_POST['dangky'])){
    $hovaten = $_POST['hovaten'];
    $tentaikhoan = $_POST['tentaikhoan'];
    $matkhau = md5($_POST['matkhau']);
    $nhaplaimatkhau = md5($_POST['nhaplaimatkhau']);
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];

    // Kiểm tra mật khẩu đã nhập lại đúng chưa
    if($matkhau != $nhaplaimatkhau){
        echo "Mật khẩu nhập lại không khớp";
        exit();
    }

    $sql_check_tentaikhoan = mysqli_query($mysqli,"SELECT * FROM tbl_dangky WHERE tentaikhoan='".$tentaikhoan."' ");
    $count_tentaikhoan = mysqli_num_rows($sql_check_tentaikhoan);
    if($count_tentaikhoan > 0){
        echo "Tài khoản đã tồn tại";
        exit();
    }

    $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(hovaten,tentaikhoan,matkhau,nhaplaimatkhau,email,sodienthoai) 
    VALUE('".$hovaten."','".$tentaikhoan."','".$matkhau."','".$nhaplaimatkhau."','".$email."','".$sodienthoai."') ");
    if($sql_dangky){
        $_SESSION['id_dangky'] = mysqli_insert_id($mysqli);
        $_SESSION['dk'] = 1;
        header('Location:index.php?quanly=dangnhap');
    }
}
?>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<form method="POST" action="">
<div class="form-group">
		<label for="hovaten">Họ và tên:</label>
		<input type="text" class="form-control" id="hovaten" name="hovaten" required>
        <span class="error-message"></span>
	</div>

	<div class="form-group">
		<label for="tentaikhoan">Tên tài khoản:</label>
		<input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan" required minlength="5">
        <span class="error-message"></span>
	</div>

	<div class="form-group">
		<label for="matkhau">Mật khẩu:</label>
		<input type="password" class="form-control" id="matkhau" name="matkhau" required minlength="8">
        <span class="error-message"></span>
	</div>

	<div class="form-group">
		<label for="nhaplaimatkhau">Nhập lại mật khẩu:</label>
		<input type="password" class="form-control" id="nhaplaimatkhau" name="nhaplaimatkhau" required minlength="8" equalTo="#matkhau">
        <span class="error-message"></span>
	</div>

	<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" name="email" required email>
        <span class="error-message"></span>
	</div>

	<div class="form-group">
		<label for="sodienthoai">Số điện thoại:</label>
		<input type="tel" class="form-control" id="sodienthoai" name="sodienthoai" required pattern="[0-9]{10,11}">
        <span class="error-message"></span>
	</div>

	<button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
    $('form').submit(function(e) {
        var error = false;
        $(this).find('input').each(function() {
            if($(this).prop('required') && !$(this).val()) {
                $(this).next('.error-message').text('Vui lòng điền thông tin');
                error = true;
            } else if($(this).attr('minlength') && $(this).val().length < parseInt($(this).attr('minlength'))) {
                $(this).next('.error-message').text('Vui lòng nhập ít nhất ' + $(this).attr('minlength') + ' ký tự');
                error = true;
            } else if($(this).attr('equalTo')) {
                var target = $($(this).attr('equalTo'));
                if($(this).val() != target.val()) {
                    $(this).next('.error-message').text('Mật khẩu nhập lại không khớp');
                    error = true;
                }
            } else if($(this).attr('type') == 'email' && !/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/i.test($(this).val())) {
                $(this).next('.error-message').text('Email không hợp lệ');
                error = true;
            } else if($(this).attr('pattern') && !new RegExp($(this).attr('pattern')).test($(this).val())) {
                $(this).next('.error-message').text('Số điện thoại không hợp lệ');
                error = true;
            } else {
                $(this).next('.error-message').text('');
            }
        });
        if(error) {
            e.preventDefault();
        }
    });
});
</script>
 



