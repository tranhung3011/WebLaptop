<?php
session_start(); //start session

//empty cart by distroying current session
// if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
// {
//     $return_url = base64_decode($_GET["return_url"]); //return url
//     session_destroy();
//     header('Location:'.$return_url);
// }
 
//add item in shopping cart
if(isset($_GET["sp"]))
{
    $masp   = filter_var($_GET["sp"], FILTER_SANITIZE_STRING); //product code
    $product_qty    = filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); //product code
    //$return_url     = base64_decode($_POST["return_url"]); //return url
    echo $masp;
    
    //limit quantity for single product
    if($product_qty > 10){
        //die('<div align="center">sa!<br /><a href="index.php">Back To Products</a>.</div>');
        die();  
       
    }
 
    //MySqli query - get details of item from db using product code
    $sql="select * from    sanpham_tbl WHERE ma_sp='$masp'";
    require("connection.php"); 
    
    $count=$objSTM->rowCount();
    if($count>0) { //we have the product info
        foreach ($data as $r)
        //prepare array for the session variable
        $new_product = array(array('tensp'=>$r['ten_sp'], 'masp'=>$r['ma_sp'], 'qty'=>$product_qty, 'giasp'=>$r['gia_sp'],'motasp'=>$r['motasp']));
        
        if(isset($_SESSION["products"]) &&isset($_SESSION['dangnhap'])) //if we have the session
        {
            $found = false; //set found item to false
            $sosp=0;
            foreach ($_SESSION["products"] as $row) //loop through session array
            {
                $sosp++;
                if($row["masp"] == $masp){ //the item exist in array
                    $qty=$product_qty + $row['qty'];
                    $product[] = array('tensp'=>$row['tensp'], 'masp'=>$row["masp"], 'qty'=>$qty, 'giasp'=>$row["giasp"],'motasp'=>$r['motasp']);
                    $found = true;
                }else{
                    //item doesn't exist in the list, just retrive old info and prepare array for session var

                    $product[] = array('tensp'=>$row["tensp"], 'masp'=>$row["masp"], 'qty'=>$row["qty"], 'giasp'=>$row["giasp"],'motasp'=>$r['motasp']);
                }
            }
            
            if($found == false) //we didn't find item in array
            {
                //add new user item in array
                $_SESSION["products"] = array_merge($product, $new_product);
            }else{
                //found user item in array list, and increased the quantity
                $_SESSION["products"] = $product;
            }
            
        }else{
            //create a new session var if does not exist
            $_SESSION["products"] = $new_product;
        }
        
    }
    
    //redirect back to original page
    header('Location:index.php');
}
 
//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
    $masp   = $_GET["removep"]; //get the product code to remove
    $return_url     = base64_decode($_GET["return_url"]); //get return url
 
    
    foreach ($_SESSION["products"] as $row) //loop through session array var
    {
        if($row["masp"]!=$masp){ //item does,t exist in the list
            $product[] = array('tensp'=>$row["tensp"], 'masp'=>$row["masp"], 'qty'=>$row["qty"], 'giasp'=>$row["giasp"],'motasp'=>$r['motasp']);
        }
        
        //create a new product list for cart
        $_SESSION["products"] = $product;
    }
    
    //redirect back to original page
    header('Location:giohang.php');
}
//tru  san pham
if(isset($_GET["tru"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
    $masp   = $_GET["tru"]; //get the product code to remove
    $return_url     = base64_decode($_GET["return_url"]); //get return url
 
    
    foreach ($_SESSION["products"] as $row) //loop through session array var
    {
        if($row["masp"]==$masp){ //item does,t exist in the list
            $row["qty"]--;
            if($row["qty"]<=0)
            {
                $row["qty"]=0;
            }
        
            
        }
        $product[] = array('tensp'=>$row["tensp"], 'masp'=>$row["masp"], 'qty'=> $row["qty"], 'giasp'=>$row["giasp"],'motasp'=>$r['motasp']);
        
        //create a new product list for cart
        $_SESSION["products"] = $product;
    }
    
    //redirect back to original page
    header('Location:giohang.php');
}
// them  san pham
if(isset($_GET["them"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
    $masp   = $_GET["them"]; //get the product code to remove
    $return_url     = base64_decode($_GET["return_url"]); //get return url
 
    
    foreach ($_SESSION["products"] as $row) //loop through session array var
    {
        if($row["masp"]==$masp){ //item does,t exist in the list
            $row["qty"]++;
            
            }
        $product[] = array('tensp'=>$row["tensp"], 'masp'=>$row["masp"], 'qty'=>$row["qty"], 'giasp'=>$row["giasp"],'motasp'=>$r['motasp']);
        
        //create a new product list for cart
        $_SESSION["products"] = $product;
    }
    
    //redirect back to original page
    header('Location:giohang.php');
}