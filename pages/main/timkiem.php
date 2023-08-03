
<?php 
if(isset($_POST['timkiem'])){
    $tukhoa = addslashes ($_POST['tukhoa']);
    $loai = $_POST['loai'];
    //echo $loai;
    if (empty($tukhoa)) {
        
        // echo '<div style:"color = red"> alo <\div>';
        echo  '<div id="echo"><h3>Vui lòng nhập thông tin cần tìm<h3></div>';
    } 

    else{

    // $sql_pro = "SELECT * FROM tbl_baihat 
    // WHERE tenbaihat LIKE '%".$tukhoa."%' OR casi LIKE '%".$tukhoa."%' ";

    // $sql_pro = "SELECT * FROM tbl_baihat,tbl_danhmuc 
    // WHERE tbl_baihat.id_danhmuc=tbl_danhmuc.id_danhmuc 
    // AND tbl_baihat.tenbaihat LIKE '%".$tukhoa."%'
    // OR tbl_baihat.casi Like '%".$tukhoa."%'
    // ";

    
    if($_POST['loai'] == 'Ca sĩ'){
        $sql_pro = " SELECT * FROM tbl_baihat as a, tbl_danhmuc as b
        WHERE casi like '%".$tukhoa."%'
        AND a.id_danhmuc = b.id_danhmuc ";
        //echo $sql_pro;
        $query_pro = mysqli_query($mysqli,$sql_pro);
    }elseif($_POST['loai'] == 'Tên bài hát'){
        $sql_pro = " SELECT * FROM tbl_baihat as a, tbl_danhmuc as b
        WHERE tenbaihat like '%".$tukhoa."%'
        AND a.id_danhmuc = b.id_danhmuc ";
        //echo $sql_pro;
        $query_pro = mysqli_query($mysqli,$sql_pro);
    }
?>
<h3 style="padding-top: 10px" class="text-light">Từ khóa tìm kiếm cho: <?php echo $_POST['tukhoa']; ?></h3>
    <ul class="product-list">
        <?php
            while($row = mysqli_fetch_array($query_pro)){
        ?>
        <li>         
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_baihat'] ?>">                
            <p class="title_product">Tên bài hát: <?php echo $row['tenbaihat'] ?></p>
            <p class="price_product">Ca Sĩ: <?php echo $row['casi']?></p>
            <P style="text-align: center; color: #ddd"><?php echo $row['tendoanhmuc'] ?></p>
            </a>
        </li>
        <?php
            }
        ?>
        </ul>
<?php
}
}
?>
        
               