 <script>function goback() {
    history.back(-1)
}</script>
<?php

 session_start();
// username và password được gửi từ form đăng nhập
$inputEmail=$_POST['inputEmail'];
$inputPassword=$_POST['inputPassword'];
///echo $inputEmail ;
///echo $inputPassword;
$sql="select * from khachhang_tbl where email_kh='$inputEmail' and password_kh='$inputPassword'";
include("connection.php"); 
$count=$objSTM->rowCount();
if($count>0){
    echo "ĐĂNG NHẬP THÀNH CÔNG"; 
    $_SESSION['dangnhap']=$inputEmail;
    header('location:index.php');
 
}else{
    echo '<script>alert("Đăng nhập thất bại: Sai id hoặc password!")</script>';
     //header('Location: javascript:goback()?GET=1 ');
    ?>

<font size=10>Mật khẩu không khớp nhau. Yêu cầu nhập lại!</font><a href='javascript:goback()'>
<button class='btn btn-lg btn-primary btn-block'>  &nbsp &nbsp &nbsp &nbspNhấp đây để quay lại   &nbsp&nbsp &nbsp &nbsp</button></a>
<?php
}

?>