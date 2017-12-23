<?php 
$sp1=$_GET['sp'];
//echo $sp1;

$sql="select * from sanpham_tbl where ma_sp='$sp1'";
require('connection.php');
foreach($data as $row)
?>

<table width="900px" border="1px">
<tr>

    <td>Mã sản phẩm:</td>
    <td class="chan"><?php echo $row['ma_sp']?></td>
    <td>Tên sản phẩm:</td>
    <td class="chan"><?php echo $row['ten_sp']?> </td>
</tr>
<tr>
    <td >Gía tiền:</td>

                <td class=""><?php echo $row['gia_sp']?><p>
      <?php
        if($row['chietkhau']!=0){
            echo "( SALE".$row['chietkhau'].")";
            }?></p></td>
    
                <td>Hãng sản xuất:</td>
    <td class="">USA</td>
</tr>
<tr>
    <td>Thông số sản phẩm:</td>
    <td colspan="3" class=""><p><?php echo $row['thongso']?></p></td>
</tr>
<tr>
    <td>Mô tả sản phẩm:</td>
    <td colspan="3" class=""><p><?php echo $row['motasp']?></p></td>
</tr>

<tr>
    <td>Thời gian bảo hành:</td>
    <td class=""><?php echo ''.$row['baohanh'].' năm '?></td>
                
    
    <td>Số lượng đặt mua</td>
    <td class=""><select style="width:100px;border-radius:10px;margin-left:10px;border:2px solid #000"></select> </td>      
</table>

