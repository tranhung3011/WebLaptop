
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" media="screen"  href="css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="style/giohang.css" rel="stylesheet" type="text/css">
    
	<script src="css/bootstrap.min.css"></script>
</head>

<body>
<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Xác nhận  thanh toán !")
		if(confirm("Xác nhận  thanh toán !"))
		{
			
		}
      }
 
</SCRIPT>


<?php
include("header.php");

?>
<br>
<br>
<font>

<div id="products-wrapper">
 <h1>Giỏ hàng</h1>
 <div class="view-cart">
 	<?php
if(isset($_SESSION["dangnhap"]))
{
	
		$sql="select max(ma_dh) from donhang_tbl";
		require("connection.php");
		foreach($data as $r){
		
		  //echo $r['max(ma_kh)'];
		  $ma = $r['max(ma_dh)'];
		  }
		  $sqlct="select max(ma_ctdh) from chitietdonhang_tbl";
		  $objSTM= $pdh->query($sqlct);
		  $datact=$objSTM->fetchAll(PDO::FETCH_ASSOC);
		 
			foreach($datact as $r1){
  
			//echo $r['max(ma_kh)'];
			$mact = $r1['max(ma_ctdh)'];
			}
		  //  echo $stk
		$now=getdate();
		$currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"]; ;
		echo "<h3>".$currentDate."</h3>";
		$c=$_SESSION['dangnhap'];
		$ma++;
		$madh=$ma;
		$email =$_SESSION['dangnhap'];
		$sqlkh="select * from khachhang_tbl where email_kh='$email'";
		$objSTM= $pdh->query($sqlkh);
		$datakh=$objSTM->fetchAll(PDO::FETCH_ASSOC);
		foreach($datakh as $vkh){
			$ma_kh = $vkh['ma_kh'];
			$ten_kh = $vkh['ten_kh'];
		}
		echo "<h3 style='font-size:24px'>Xin chào  ".$ten_kh."!</h3><br><br>";
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="giohang.php" onSubmit="return confirmAction()"> ';
		echo '<ul>';
		$cart_items = 0;
		$sosp=0;
		foreach ($_SESSION["products"] as$row)
        {	
           $masp =$row["masp"];
		   $sqlsp="select * from sanpham_tbl left join giasp_tbl on sanpham_tbl.ma_sp = giasp_tbl.ma_sp WHERE sanpham_tbl.ma_sp='$masp' LIMIT 1";
		   $objSTM=$pdh->query($sqlsp);
		   $data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
		   
		   foreach ($data as $v)
		   $chietkhau = $v['chietkhau'];
		   //echo $chietkhau;
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="capnhatgiohang.php?removep='.$row['masp'].'&return_url='.$current_url.'">&times;</a></span>';
			if ($v['chietkhau']>0 && strtotime($v['ngay_bat_dau'])<strtotime($currentDate) && strtotime($v['ngay_ket_thuc'])>strtotime($currentDate )){
				
				$giagiam=($row['giasp']*$row['qty'])*(100-$chietkhau)/100;
				echo '<div class="p-price">';echo number_format($giagiam).'  </div>';}else{
			echo '<div class="p-price">';echo number_format($row['giasp']*$row['qty']).'</div>';}
            echo '<div class="product-info">';
			echo '<h3><strong><font size="3">'.$row['tensp'].' (Mã SP :'.$masp.')</font></strong></h3> ';
			echo '<div class="p-qty"><font size="3">Số Lượng : '.$row["qty"].' &nbsp&nbsp&nbsp&nbsp&nbsp
			<span class="remove-itm"><a href="capnhatgiohang.php?them='.$row['masp'].'&return_url='.$current_url.'">&nbsp&nbsp&nbsp&nbsp&nbsp+&nbsp&nbsp&nbsp&nbsp&nbsp</a></span>&nbsp&nbsp&nbsp&nbsp&nbsp
			<span class="remove-itm"><a href ="capnhatgiohang.php?tru='.$row['masp'].'&return_url='.$current_url.'">&nbsp&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp&nbsp</a></span></font></div>';
			echo '<h3><font size="3"> Giá gốc  sản phẩm :	';echo number_format($v['gia_sp']).'  VND </font></h3> ';
			if ($v['chietkhau']>0 &&  strtotime($v['ngay_bat_dau'])<strtotime($currentDate) && strtotime($v['ngay_ket_thuc'])>strtotime($currentDate )){
				
				$giagiam=$row['giasp']*(100-$chietkhau)/100;
			echo '<h3><font size="3"> Giá đã  giảm &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:';echo number_format($giagiam).'  VND <span style="color: green;" >(Chiết khấu : '.$v['chietkhau'].'%) </span></style></h3> ';}
			
				echo '<br><br>';
			//echo '<div class="nho"><font size="2">'.$v['motasp'].'</font></div>';
			echo '</div>';
            echo '</li>';
			
			$subtotal = ($row["giasp"]*$row["qty"])*(100-$chietkhau)/100;
			$total = ($total + $subtotal);

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$row['tensp'].'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$row['masp'].'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$row['motasp'].'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$row["qty"].'" />';
			$cart_items ++;
			
			
        }
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong><font size ="4">TỔNG : ';echo number_format($total).'</font></strong>  ';
		echo '</span>';
		echo '<a href=""><button class="btn btn-lg btn-primary btn-block" type="submit" name="thanhtoan" >Thanh toán !</button></a>';
		
		echo '</form>';
		//echo $madh.$ma_kh.$email.$currentDate.$total;
		
		if(isset($_POST['thanhtoan'])){
			if($total>0){

			
			$sqldh="insert into donhang_tbl(ma_dh,ma_kh,email_kh,ngaylap,trangthai,tt_giaohang,tt_thanhtoan,thanhtien,sanpham,ma_nv) values
			('$madh','$ma_kh','$email','$currentDate','0','0','0','$total','0','NV3')";					
			$objSTM=$pdh->query($sqldh) or die("Không thể  thanh toán , vui lòng coi  lại thông tin");
			$data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
			echo "Thanh toán thành công .";
			foreach ($_SESSION["products"] as$row)
			{	
			   $masp =$row["masp"];
				$sl =$row['qty'];
			   $objSTM=$pdh->query($sqlsp);
			   $data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
			   foreach ($data as $v){
			
				$mact++;
				$mactdh=$mact;
				$gia =$v['gia_sp'];
				$ck=$v['chietkhau'];
				$tt=$giagiam=$row['giasp']*(100-$chietkhau)/100;

				$sqlcthd="insert into  chitietdonhang_tbl(ma_ctdh,ma_sp,ma_dh,soluong,dongia, chietkhau,thanhtiensp) values ('$mactdh','$masp','$madh','$sl','$gia','$ck','$tt')";
				$objSTM=$pdh->query($sqlcthd);
				//$data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
			}
		}
	}
}
		
    }else{
		echo 'Không có sản phẩm nào trong giỏ hàng';
	}
}else {
	echo ' <a href="dangnhap.php"><button class="btn btn-lg btn-primary btn-block" type="submit"> 	Đăng nhập tại đây !</button></a>';
	echo'<img src="image/nhacdangnhap.png">';	
}
    ?>
<!--  -->

    </div>
</div>
</body>

<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>

</html>
