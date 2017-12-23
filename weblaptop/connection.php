<?php 
$host="localhost"; // luôn luôn là localhost
$username="root"; // user của mysql
$password=""; // Mysql password
$db_name="dblaptop"; // tên database
$tbl_name="than"; // tên table
try{
    $pdh = new PDO("mysql:host=$host; dbname=$db_name"  , $username  , $password  );
    $pdh->query("  set names 'utf8'"  );
    }
    catch(Exception $e){
        echo $e->getMessage(); exit;
    }
$objSTM= $pdh->query($sql);
$data=$objSTM->fetchAll(PDO::FETCH_ASSOC);
?>