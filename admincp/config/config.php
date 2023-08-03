<?php 
$mysqli = new mysqli("localhost","root","","bao_cao");

// Check connection
if ($mysqli->connect_errno) {
  echo "kết nối MYSQLI lỗi " . $mysqli->connect_error;
  exit();
}

?>