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
    

    <?php include("carousel.php");?>
    <div class="container">       
            <?php
        
        $now=getdate();
        $currentDate = $now["year"] . "." . $now["mon"] . "." . $now["mday"]; ;
        $sql=" select * from sanpham_tbl left join giasp_tbl on sanpham_tbl.ma_sp = giasp_tbl.ma_sp 
        where giasp_tbl.ngay_bat_dau<'$currentDate'and giasp_tbl.ngay_ket_thuc>'$currentDate'";
        require("connection.php");  
        $count=$objSTM->rowCount();
        if($count==0){?>
            <img src="image/kotimthay.jpg" alt="">
        <?php }else {
            foreach($data as $v)
            {
                $sql1="select * from  sanpham_tbl left join giasp_tbl on sanpham_tbl.ma_sp = giasp_tbl.ma_sp where sanpham_tbl.ma_sp='$v[ma_sp]'";
                $objSTM1=$pdh->query($sql1);
                $data1=$objSTM1->fetchAll(PDO::FETCH_ASSOC);
                foreach($data1 as $row)
                {?>
                    <div class="card1">
                    <?php $sp= $row['ma_sp'] ?>
                        <a href="sanpham.php?sp=<?php echo $sp?>">
                            <img src="<?php echo $row['anh_sp'] ?>"alt="Card image cap" class="thumb" class="img-responsive" alt="Responsive image">
                            <h3 class="titlesp"><?php echo $row['ten_sp'] ?>         
                            <span style="color: red;" ><strong>SALE <?php echo $row['chietkhau'] ?>%</strong></SPAN> </h3>
                            <p class="card-text1"><?php echo $row['tieude'] ?></p>
                            <span>Giá :<?php echo number_format($row['gia_sp']).' VNĐ' ?></span></a>
                        </div>
                <?php }
            }

        }?>
    </div>
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
