<?php
  // username và password được gửi từ form đăng nhập
  $inputEmail=$_POST['inputEmail'];
  $inputName=$_POST['inputName'];
  $inputPassword=$_POST['inputPassword'];
  $inputRePassword=$_POST['inputRePassword'];
  $inputAddress=$_POST['inputAddress'];
  $inputPhone=$_POST['inputPhone'];
  ($inputPassword==$inputRePassword) or die( "<script>function goback() {
    history.back(-1)
}</script><font size=10>Mật khẩu không khớp nhau. Yêu cầu nhập lại!</font><a href='javascript:goback()'>
<button class='btn btn-lg btn-primary btn-block'>  &nbsp &nbsp &nbsp &nbspNhấp đây để quay lại   &nbsp&nbsp &nbsp &nbsp</button></a>");
  if(preg_match( '/[0-9]{10,11}/', $inputPhone)){

  }else die("<script>function goback() {
    history.back(-1)
}</script><font size=10>Số điện thoại không hợp lệ .Vui lòng  nhập lại!</font><a href='javascript:goback()'>
<button class='btn btn-lg btn-primary btn-block'>  &nbsp &nbsp &nbsp &nbsp Nhấp đây để quay lại  &nbsp&nbsp &nbsp &nbsp</button></a>");

  ///echo $inputEmail ;
  ///echo $inputPassword;
  $sql="select max(ma_kh) from khachhang_tbl";
  require("connection.php");
  foreach($data as $r){

  
    //echo $r['max(ma_kh)'];
    $ma = $r['max(ma_kh)'];
    }
    //  echo $stk;
    $stk= substr($ma,3);




  $sql1="select * from khachhang_tbl where email_kh='$inputEmail'";
  $objSTM= $pdh->query($sql1);
  $data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
 
    $count=$objSTM->rowCount();
    if( $count >0){
      echo "Tài khoản đã được sử dụng!";
    }else {
      $stk++;
      $makh="MKH$stk";
  
  		$now=getdate();
      $currentDate = $now["year"] . "." . $now["mon"] . "." . $now["mday"]; ;
      $sql2 = "insert into khachhang_tbl(ma_kh,ten_kh,sdt,email_kh,password_kh,diachi,ngaylap) values
      ('$makh','$inputName','$inputPhone','$inputEmail','$inputPassword','$inputAddress','$currentDate')";
      $objSTM=$pdh->query($sql2);
      $data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
      


      echo "Đăng ký  thành công!" ;
    }
      ?>
      <a href="index.php"><input type="button" name="nuttrangchu" value="quay về trang chủ"></a>
      <a href="dangnhap.php"><input type="button" name="nutdangnhap" value="đăng nhập"></a>
    