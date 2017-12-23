<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<style>
	h2 {
 	 font: 400 30px/1.3 'Oleo Script', Helvetica, sans-serif;
 	 color: #2b2b2b;
  	 text-shadow: 4px 4px 0px rgba(0,0,0,0.1);
	}
	h3 {
	  font: 400 20px/0.8 'Cookie', Helvetica, sans-serif;
	  color: #000;
	  text-shadow: 4px 4px 3px rgba(0,0,0,0.1); 
	}
	table tr td{
		text-align:center;
		}
	.danhmuc{
		color:#999;
		font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
		text-shadow:#0FC;
		height:40px
		}
	table tr td a{
		color:#FFF;
		}
	a:hover{
	color:#F00;}
	.buttonoption{
		background:#000;
		height:20px;
		border-radius:10px;
		width:30px;
		font-size:24px;
		margin:auto;
		}
	
</style>
<?php
	
?>
<form action="" method="post" onsubmit="return confirm('Bạn có chắc chắn thanh toán đơn hàng này hay không')">
<table width="900px" >
<h2>SHOPPING CART</h2>
<hr />
<TR class="danhmuc">
	<TD width="150px"><h3>Image<h3></TD>
    <TD><h3>Product Info</TD>
    <TD width="80px" ><h3>Quality</TD>
    <TD colspan="3"><h3>Option</TD>
    <TD><h3>Price</TD>
    <td width="50px"></td>    
    <TD><h3>Total</TD>
</TR>
<?php 
	session_start();
	//session_destroy();
	// thêm số lượng mỗi sản phẩm
	$id=$_GET['id'];
	if(isset($_GET['add'])&& !empty($_GET['add'])){
		$id=$_GET['id'];
		@$_SESSION['card_'.$id]+=1; 
	}
	// hàm cộng thêm sản phẩm
	if(isset($_GET['them'])){
		$_SESSION['card_'.$_GET['them']]+=1;
		//header('location:index.php?xem=giohang');
		}	
	if(isset($_GET['tru'])){
		$_SESSION['card_'.$_GET['tru']]-=1;
		//header('location:index.php?xem=giohang');
		}
	if(isset($_GET['xoa'])){
		$_SESSION['card_'.$_GET['xoa']]=0;
		}
	//hiển thị sản phẩm đã thêm:
	$thanhtien=0;
	$tongtien=0;
	$subtotal=0;
	$tax=0;
	foreach ($_SESSION as $name=>$value){
		//echo $name.' '.$value.'<br>';
		if($value > 0){
		$a=strlen($name);
			
			$sql="select * from sanpham where masp='".$id."'";
			require("connection.php");  
			$new_product = array(array('tensp'=>$data['tensp'], 'masp'=>$data['masp'], 'qty'=>$product_qty, 'giasp'=>$data['giasp']));
			
			foreach($data as $row){
				$b=$row['masp'];
				
				
			?>
                <!-- chèn thông tin vào bảng trong giỏ hàng-->         
	<TD><img src="image/<?php echo $row['hinhanh'];}?>" style="width:100px;height:100px"></TD>
    <TD ><h3>Product's name:&nbsp;&nbsp;&nbsp; <?php echo $row['tensp']?><h3>
        <h3>Manufacturer:&nbsp;&nbsp;&nbsp; <?php echo $row['nsx']?><h3>
        <h3>Guarantee:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['baohanh']?></h3>
    </TD>
    <TD ><h3><?php echo $value?></h3></TD>
    <TD width="40px"><div  class="buttonoption"><h3 style=""><a href="index.php?xem=giohang&them=<?php echo $row['masp']?>" >+</a></h3><div></TD>
    <TD width="40px"><div class="buttonoption"><h3 style=""><a href="index.php?xem=giohang&tru=<?php echo $row['masp']?>" >-</a></h3><div></TD>
    <TD width="70px"><div class="buttonoption" style="width:55px"><h3 style=""><a href="index.php?xem=giohang&xoa=<?php echo $row['masp']?>" onclick="return confirm('Bạn có xác nhận xóa sản phẩm ra khỏi giỏ hàng không?')">delete</a></h3><div></TD>
   
    <Td>=</Td>
	<?php  $tongtien=$row['giasp']*$value;//nếu không sale thì vẫn in tổng tiền bằng giá tiền * số lượng như thường ?>
    <TD><h3 class="fadein"><?php echo number_format($tongtien) ?></h3></TD>
    <?php }?>
</tr>
				
<?php
					}
				
			
			$subtotal+=$tongtien;
			$tax=(0.05*$tongtien);
			$thanhtien+=$tongtien+$tax;
	if($thanhtien==0){
		echo '<script>alert("GIỎ HÀNG TRỐNG !")</script>';
	}
	if(isset($_SESSION['dangnhap']))
	{
		$now=getdate();
		$currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"]; ;
		echo "<h3>".$currentDate."</h3>";
		$c=$_SESSION['dangnhap'];
		echo "<h3 style='font-size:24px'>Hello ".$c.", have a good day!</h3><br><br>";
		//if(isset($_POST['thanhtoan'])){
					// $sqlhd="insert into hoadon(Ngaydat,Thanhtien,Trangthaidonhang,Trangthaigiaohang,Trangthaithanhtoan,idkh,Username_ad) values('$currentDate','$thanhtien','0','0','0','$c','')";					
					// $objPdo->query($sqlhd);
		//	}
	}
?>
<tr><Td colspan="8"><h3 style="float:right;height:50px;line-height:50px" class="fadein">
Total: <?php echo number_format($subtotal)?> vnd <br />
Tax 5%: <?php echo number_format($tax)?> vnd <br />
Grand Total: <?php echo number_format($thanhtien)?> vnd<br/>

<input type="submit"  value="Thanh toán cho bạn" name="thanhtoan" style="background:#000;border-radius:15px">
</h3>

</Td></tr>

</table>
</form>