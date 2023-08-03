<?php 
        $sql_lietke_bh = "SELECT * FROM tbl_baihat,tbl_danhmuc WHERE tbl_baihat.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_baihat DESC";
        $query_lietke_bh = mysqli_query($mysqli,$sql_lietke_bh);
?>
<h3 class="thembaihat">Liệt kê bài hát</h3>
<table style="width:100%;" border="5" style="border border-primary;" >
<tr>
    <th>Id</th>
    <th>Tên bài hát </th>
    <th>Nhạc</th>
    <th>Tên ca sĩ</th>
    
    <th>Danh mục</th>
    
   
    <th>Trạng thái</th>
    <th>Quản lý</th>
</tr>
<?php 
$i = 0;
while($row = mysqli_fetch_array($query_lietke_bh)){
    $i++;
?>
<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenbaihat'] ?></td>
    <td><audio src="admincp/modules/quanlybaihat/uploads/<?php echo $row['mp3'] ?>" type="audio" controls></audio></td>
    <td><?php echo $row['casi'] ?></td>
   
    <td><?php echo $row['tendoanhmuc'] ?></td>
    
    
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
    }else{
        echo 'ẨN';
    } 
    ?>

    </td>
    <td>
        <a href="modules/quanlybaihat/xuly.php?idbaihat=<?php echo $row['id_baihat'] ?>">xóa</a> |<a href="?action=quanlybaihat&query=sua&idbaihat=<?php echo $row['id_baihat'] ?>">sửa</a>
    </td>
</tr>
<?php
}
?>
</table>