<?php
          $sql_pro = "SELECT * FROM tbl_baihat WHERE tbl_baihat.id_danhmuc='$_GET[id]'
           ORDER BY id_baihat DESC";
          $query_pro = mysqli_query($mysqli,$sql_pro);
//get danh muc
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]'
LIMIT 1";
$query_cate = mysqli_query($mysqli,$sql_cate);
 $row_stile = mysqli_fetch_array($query_cate);
?>
<h3 style="padding-top: 10px" class="text-light">Thể Loại: <?php echo $row_stile['tendoanhmuc'] ?> </h3>
               <ul class="product-list1">
               <?php
                   while($row = mysqli_fetch_array($query_pro)){
                   ?>
                        <li>                       
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_baihat'] ?>">
                            <p class="title_product">Tên Bài Hát: <?php echo $row['tenbaihat'] ?></p>
                            <p class="price_product">Ca sĩ: <?php echo $row['casi']  ?></p>
                            
                        </a>
                   </li>
                   
                   
                   <?php
                   }
                   ?>
                   
               </ul>
               <div style="clear: both;"></div> 
               <style type="text/css">
                   ul.list_trang {
                       padding: 0;
                       margin: 0;
                       list-style: none;
                   }
                   ul.list_trang li {
                       float: left;
                       padding: 5px 13px;
                       margin: 5px;
                       background: blue;
                       display: block;
                   }
                   ul.list_trang li a {
                        color: #000;
                        text-align: center;
                        text-decoration: none;
                    }
               </style>
               