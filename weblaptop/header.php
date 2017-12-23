<header>
<?php  session_start();  ?>
   <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top" role="navigation">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="index.php">Trang chủ</a>
     </div>
   
     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse navbar-ex1-collapse">
       <ul class="nav navbar-nav">
       <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Các hãng máy tính <b class="caret"></b></a>
           <ul class="dropdown-menu">
             <li><a href="hang.php?masp=de">Dell</a></li>
             <li><a href="hang.php?masp=hp">HP</a></li>
             <li><a href="hang.php?masp=so">Sony</a></li>
             <li><a href="hang.php?masp=as">Asus</a></li>
             <li><a href="hang.php?masp=ac">Acer</a></li>  
             <li><a href="hang.php?masp=ap">Apple</a></li>
             <li><a href="hang.php?masp=le">Lenovo</a></li>
             <li><a href="hang.php?masp=''">Các hãng khác </a></li>
           </ul>
         </li>
         
         <li><a href="khuyenmai.php">KHUYẾN MÃI </a></li>
         <li><a href="khuyenmai.php">ADMIN </a></li>
       </ul>
       
       <form class="navbar-form navbar-left" role="search" action="timkiem.php" method="post"> 
         <div class="form-group">
           <input type="text" class="form-control" name="timkiem" placeholder="Bạn cần tìm gì ở HQ?">
         </div>
         <button type="submit" class="btn btn-default" >Tìm kiếm </button>
       </form>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="giohang.php"><span class="glyphicon glyphicon-shopping-cart"></span>
           <span><?php 
           $sosp=0;
           if(isset($_SESSION["products"]))
           {
		    foreach ($_SESSION["products"] as$row)
      	$sosp++;}
          ?> <?php echo $sosp?>sản phẩm </span></a> </li>
        <?php 
        if(isset($_SESSION['dangnhap']))  
              {  ?>
                    <li class="active"><a href="chitietkhachhang.php"> Xin chào  <?php echo  $_SESSION['dangnhap'] ?></a></li>
                    <li><a href="thoat.php">Logout</a></li>
            <?php  }else{  ?>
                       <li class="active"><a href="dangnhap.php">Đăng nhập </a></li>
         <li><a href="dangky.php">Đăng ký</a></li>
            <?php } ?>
       </ul>
       
     </div><!-- /.navbar-collapse -->
   </nav>
   
   
    </header>