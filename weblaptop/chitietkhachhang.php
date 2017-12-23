
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
    <style>
        p.alignCenter {
            text-align: center;
        }
    </style>
</head>

<body>
<div align="center">
<?php
include("header.php");
echo "<br><br><br>";
echo "<br><br><br>";
//echo $_SESSION['dangnhap'] ;
if( isset($_SESSION['dangnhap'])){
    $kh=$_SESSION['dangnhap'];
    $sql ="select *  from  khachhang_tbl where email_kh ='$kh'";
    require('connection.php');
    echo"<font size=5>Thông tin khách hàng:</font>";
    echo '<form id="form1" name="form1" method="post" action="chitietkhachhang.php"><table width="900px" border="1px">';
    foreach ($data as $v)

    {   
        
        echo "<tr><td>Tên Khách  Hàng:</td><td> <input  type=Name name=inputName id=inputName  class=form-control placeholder='$v[ten_kh]' ></td>
        <tr><Td>Số điện thoại:</Td><td><input type='Phone' name='inputPhone'  id=inputPhone class='form-control' placeholder='$v[sdt]' required></td></tr></td>
       
        <tr><td>Email:</td><td>  <input type=email name=inputEmail id=inputEmail class=form-control placeholder='$v[email_kh]' value=$v[email_kh] required autofocus></td></tr>
        <tr><td>Địa chỉ:</td><td><input type=Address name=inputAddress  id=inputAddress class=form-control placeholder='$v[diachi]' required></td></tr>
        <tr><td>Ngày lập:</td><td>$v[ngaylap]</td></tr>
       
            
        ";

        
    }
?> </tr>
</table>
<button "class=btn btn-lg btn-primary btn-block" type="submit" name="capnhatkh" id="capnhatkh">CẬP NHẬT</button>
</form>
<?php } ?>
<?php 
if(isset($_POST['capnhatkh'])){
$name=$_POST['inputName'];
$sdt=$_POST['inputPhone'];
$email=$_POST['inputEmail'];
$diachi=$_POST['inputAddress'];
if($name = ''){
$name =$v['ten_kh'];
}
// if($sdt = ''){
//     $sdt =$v['sdt'];
//     }
//     if($email = ''){
//         $name =$v['email_kh'];
//         }
//         if($diachi = ''){
//             $name =$v['diachi'];
//             }
              
//cho $name.$diachi.$sdt.$email;
//if($inputPassword==$inputRePassword){
      if(preg_match( '/[0-9]{10,11}/', $sdt)){
       
        $sqlct="update khachhang_tbl set ten_kh ='$name',sdt='$sdt', diachi='$diachi' where email_kh='$email'";
        $objSTM= $pdh->query($sqlct);
        $data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
        echo "Cập nhật  thành công";
        //header('Location : weblaptop/sanpham.php' );
    }else echo" Số điện thoại không hợp lệ";
//}
}
?></div>
</body>


<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>

</html>