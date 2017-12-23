


<section class="jumbotron text-center">
<div class="container">
  <h1 class="jumbotron-heading">Bán Laptop Giá Rẻ Uy Tín HCM</h1>
  <p class="lead text-muted">Bảo Hành 2 Năm. Giao Hàng Tận  Nơi Nhanh Chóng. Chính sách 1 đổi 1 trong 1 tháng</p>
  <p>
    <a href="#" class="btn btn-primary">Chính sách giao dịch</a>
    <a href="#" class="btn btn-secondary">Tìm hiểu  thêm</a>
  </p>
</div>
</section>

<div class="album text-muted">
<div class="container">
<?php 
	
	if(isset($_GET['trang'])){
		$get_trang=$_GET['trang'];
	}else{
		$get_trang='';
	}
	if($get_trang=='' || $get_trang==1)
	{
		$trang1=0;
	}else{
		$trang1=($get_trang*5)-5;
	}
	$sql="select * from sanpham_tbl limit $trang1,5"; // trang1 (v? trí s?n ph?m hi?n t?i) , l?y 5 s?n ph?m
	require('connection.php');
	
	//-------//d?m s? dòng có trong s?n ph?m -> tuong ?ng d?m s? s?n ph?m
  $sql_sql="select count(*) FROM sanpham_tbl ";
	$result = $pdh->query($sql_sql);
	$row = $result->fetch(PDO::FETCH_NUM);
	$a=ceil($row[0]/5);
	for($b=1;$b<=$a;$b++){
		echo '<a href="index.php?quanly=quanlysanpham&ac=them&trang='.$b.'" style="text-decoration:none;">'.' '. $b .' '.'</a>';
	}
	?>
  <?php
   $now=getdate();
   $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"]; ;
   $sql1=" select * from sanpham_tbl left join giasp_tbl on sanpham_tbl.ma_sp = giasp_tbl.ma_sp"; 
   //where giasp_tbl.ngay_bat_dau<'$currentDate'and giasp_tbl.ngay_ket_thuc>'$currentDate'";
    $objSTM= $pdh->query($sql1);
    $data=$objSTM->fetchAll(PDO::FETCH_ASSOC);?>
  <div class="products">
  <?php
   foreach($data as  $row) {?>
    <div class="card1">
    <?php $sp= $row['ma_sp'] ?>
    <form method="post" action="capnhatgiohang.php?sp=<?php echo $sp?>" >
      <a href="sanpham.php?sp=<?php echo $sp?>" >
        <img src="<?php echo $row['anh_sp'] ?>"alt="Card image cap" class="thumb"  class="img-responsive" alt="Responsive image">
        
        
        <div class="product-content"><h3 class="titlesp"><?php echo $row['ten_sp'] ?>  
        <span style="color: red;" ><strong><?php if(strtotime($row['ngay_bat_dau'])<strtotime($currentDate) && strtotime($row['ngay_ket_thuc'])>strtotime($currentDate )){
            echo " SALE  ".$row['chietkhau']."%";
            
            }?></strong></SPAN> </h3></div>
        <!-- <p class="card-text1"><?php echo $row['tieude']; 
          ECHO $row['ngay_bat_dau']; ?></p> -->
        <span>Giá:<?php echo number_format($row['gia_sp']).' VNĐ' ?></span>
        </a><span><input type="text" name="product_qty" value="1" size="1" /><a ><button class="add_to_cart">Thêm vào giỏ</button></a></span>
        </form>
    </div>
   <?php 
  }
   ?>
  </div>

</div>
</div> 

<!-- <script>
  $(document).on('click','.btn-buy-now',function(e){
        e.preventDefault();
        var parent=$(this).parents('.card1');
        var src=parent.find('img').attr('src');
        alert(src);
          });
  
</script> -->