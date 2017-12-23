<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION['danhnhap']))  
 {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';  
      echo '<br /><br /><a href="thoat.php">Logout</a>';  
 }  
 else  
 {  
      header("location:dangnhap.php");  
 }  
 ?>  
