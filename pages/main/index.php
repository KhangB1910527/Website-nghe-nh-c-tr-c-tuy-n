<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page =1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*6)-6;
    }
          $sql_pro = "SELECT * FROM tbl_baihat,tbl_danhmuc WHERE tbl_baihat.id_danhmuc=tbl_danhmuc.id_danhmuc
           ORDER BY tbl_baihat.id_baihat DESC LIMIT $begin,6";
          $query_pro = mysqli_query($mysqli,$sql_pro);
?>

<div class="">
    
<h3  ></h3>

</div>




</div>
</div>

               <ul class="product-list" >
                
                   <?php
                   while($row = mysqli_fetch_array($query_pro)){
                   ?>
                        <li>                       
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_baihat'] ?>">
                            <p class="title_product color: while">Tên Bài Hát: <?php echo $row['tenbaihat'] ?></p>
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
                <?php
                        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_baihat");
                        $row_count = mysqli_num_rows($sql_trang);
                        $trang = ceil($row_count/6);
                   ?>
                   <p>Trang hiện tại:<?php echo $page ?>/<?php echo $trang ?> </p>
                  
                    <ul class="list_trang">
                   <?php
                  
                   for($i=1;$i<=$trang;$i++){
                   ?>
                   <li <?php if($i==$page){echo 'style="background: brow"' ;}else{ echo '';} ?>><a  href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                   }
                    ?>
               </ul>


              