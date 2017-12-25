<?php
    session_start();
    $i = 0;
    while(true){
        if(isset($_GET['bookid' .$i]) && isset($_GET['quantity' .$i])){
            if($_GET['quantity' .$i] == 0){
                unset($_SESSION['cart'][$_GET['bookid' .$i]]);
            }else{
                $_SESSION['cart'][$_GET['bookid' .$i]] = $_GET['quantity' .$i];

            }
            $i ++;
        }else break;
    }

    if(count($_SESSION['cart']) == 0){
        unset($_SESSION['cart']);
    }
    echo "<script>window.location.replace('shoppingCart.php');</script>";    
?>