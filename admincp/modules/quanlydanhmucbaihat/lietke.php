<?php 
        $sql_lietke_danhmucbh = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
        $query_lietke_danhmucbh = mysqli_query($mysqli,$sql_lietke_danhmucbh);
?>
<P>Liệt kê bài hát</p>
<table style="width:100%;" border="1" style="border-collapse: collapse;" >
<tr>
    <th>Id</th>
    <th>tên danh mục</th>
    <th>Quản lý</th>
</tr>
<?php 
$i = 0;
while($row = mysqli_fetch_array($query_lietke_danhmucbh)){
    $i++;
?>
<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendoanhmuc'] ?></td>
    <td>
        <a href="modules/quanlydanhmucbaihat/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">xóa</a> | <a href="?action=quanlydanhmucbh&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">sửa</a>
    </td>
</tr>
<?php
}
?>
</table>