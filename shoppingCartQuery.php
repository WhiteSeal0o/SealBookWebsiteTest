<?php
    function ChangeQuantity($id,$temp){
    	$sql="update book set quantity=(quantity-$temp) where id=$id";
    	mysql_query($sql);
    }

    function delItems(){
        session_start();
        if($_SESSION['cart']){
            $id=$_GET['productid'];
            if($id==0){
                 unset($_SESSION['cart']);

            }else{
                unset($_SESSION['cart'][$id]);
           }
           header("location:shoppingCart.php#bookList");
           exit();
        }
    }
?>