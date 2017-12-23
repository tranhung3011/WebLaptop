<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="image/favicon.ico" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="laptop Hưng Quan , laptop uy tín , laptop mới,  laptop sài  gòn , laptop cũ, laptop abcdxyzdfe" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>Bán LAPTOP uy tín chất lượng </title>
	<link rel="stylesheet" media="screen"  href="css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/album.css" rel="stylesheet">
    <link href="carousel.css" rel="stylesheet">
    
    
    
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="css/album.css"></script>
    <script src="js/jquery-3.1.0.js"></script>
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="css/bootstrap.min.css"></script>
	
</head>
    <?php include("header.php");?>
<body>
<script src="js/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.1.0.js"></script>
  <main>
    
<br><br><br>
    <div class="container">
    <?php 
$sp1=$_GET['sp'];
//echo $sp1;

$sql=" select * from sanpham_tbl left join giasp_tbl on sanpham_tbl.ma_sp=giasp_tbl.ma_sp where sanpham_tbl.ma_sp='$sp1' ";
require('connection.php');
foreach($data as $row)
?>
<img src="<?php echo $row['anh_sp']; ?>"/>
<form method="post" action="capnhatgiohang.php?sp=<?php echo $sp1?>" >
<table width="900px" border="1px">
<tr>

    <td>Mã sản phẩm:</td>
    <td class="chan"><?php echo $row['ma_sp']?></td>
    <td>Tên sản phẩm:</td>
    <td class="chan"><?php echo $row['ten_sp']?> </td>
</tr>
<tr>
    <td >Gía tiền:</td>

                <td class=""><?php echo number_format ($row['gia_sp']).' VND'?><p>
      <?php
        if($row['chietkhau']!=0){
            echo "<font color='red'>( SALE".$row['chietkhau']." %)</font>";
            }?></p></td>
    
                <td>Hãng sản xuất:</td>
    <td class=""><?php echo $row['nsx']?></td>
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
    <td class=""><span>&nbsp&nbsp&nbsp<input type="text" name="product_qty" value="1" size="1" /><a  ><button class="add_to_cart" >Thêm vào giỏ</button></a></span> </td>      
</table></form>
<br><br><br>
<div><font  size="5">Bình luận sản phẩm :</font></div>
    <table width="900px" border="1px">
        <?php 
        $sqlb="select * from binhluan_tbl where ma_sp='$sp1'";
        $objSTM= $pdh->query($sqlb);
        $databl=$objSTM->fetchAll(PDO::FETCH_ASSOC);
        foreach($databl as $vbl){

        
        ?>
            <tr>
                <td>Khách Hàng:<br> <span style="color: blue;" ><?php echo $vbl['email_kh'] ?></span></td>
                <td>Nội dung:<br> <span style="color: blue;" ><?php echo $vbl['noidung'] ?></span></td>
                <td>Ngày viết:<br><span style="color: blue;" ><?php echo $vbl['thoigian'] ?></span></td>
        </tr><?php } ?>
        </table>
        <br>
        <div>Để  lại bình luận  tại đây: </div>
        <form action="sanpham.php?sp=<?php echo $sp1?>" method="post" >
        <div><textarea name="binhluan" id="binhluan" cols="30" rows="10" value=" "></textarea></div>
        <button type="submit">Nhấp  để gửi bình luận</button></div></form>
        <?php if(isset($_SESSION["dangnhap"])){
            if(isset($_POST['binhluan'])){
            $bl=$_POST['binhluan'];
            $kh=$_SESSION['dangnhap'];
            $now=getdate();
            $currentDate = $now["year"] . "." . $now["mon"] . "." . $now["mday"]; ;
            
            $sqlc ="select *  from  binhluan_tbl where email_kh='$kh' and noidung='$bl'";
            $objSTM= $pdh->query($sqlc);
            $countc=$objSTM->rowCount();
            if($countc ==0){

            
            
            $sqlbl="insert into binhluan_tbl(noidung,email_kh,ma_sp,thoigian) values ('$bl','$kh','$sp1','$currentDate')";
            $objSTM= $pdh->query($sqlbl);
            $data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
            
            }
        }
        } ?>
    
    
    
    <div class="footer"><?php include("footer.php");?></div>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
      </main>
      <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '24c128d2-df26-4109-930c-c2d7608029da', f: true }); done = true; } }; })();</script>
      	</body>
</html>
