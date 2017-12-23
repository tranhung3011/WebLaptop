<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">
  </head>


  <body>
  <!-- <script type="text/javascript" >
 function ktra()
 {
     t = document.getElementById('inputPhone').value;
   p1=document.getElementById('inputPassword').value;
  p2=document.getElementById('inputRePassword').value;
  return true;
	//if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $tt1))
	 if(preg_match("/[0-9]{10,11}/", t)){
	 	return true;    }
     else{
      return alert('Số điện  thoại  không hợp  lệ');
	}

   }
   if(p1!=p2)
   {
   return alert('mật khẩu không khớp'); 
      
   }
 

     
 }
</script>
  -->

    <div class="container">

    <form id="form1" name="form1" method="post" onsubmit="return ktra()"  action="checkdangky.php">
        <h2 class="form-signin-heading">Đăng ký</h2>
        <label for="inputEmail" class="sr-only">Email </label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="Name" class="sr-only">Hoten</label>
        <input type="Name" name="inputName" id="inputName" class="form-control" placeholder="Họ tên" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Nhập lại password</label>
        <input type="password" name="inputRePassword" id="inputRePassword" class="form-control" placeholder="Nhập lại password" required>
        <label for="inputAdr" class="sr-only">ADDRESS</label>
        <input type="Address"name="inputAddress"  id="inputAddress" class="form-control" placeholder="Địa chỉ" required>
        <label for="inputPhone" class="sr-only">phone</label>
        <input type="Phone"name="inputPhone"  id="inputPhone" class="form-control" placeholder="SĐT" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="dangky" >Đăng ký</button>
  </div>
</form>
<?php /*isset($_POST["dangky"]){
$sdt =$_POST["inputPhone"];
   if(preg_match("/[0-9]{10,11}/", $sdt)){
    echo "<script> alert('Số điện thoại ko hợp lệ');</script>"    }

}*/
  ?> 
    </div> <!-- /container -->
  </body>
</html>