<?php
    require_once('define_variable.php');
    $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
    session_start();
    if(isset($_GET['bookid']) == false || isset($_GET['quantity']) == false){
        echo "<script>alert('Wrong request')</script>";
    }else{
        $bookid = $_GET['bookid'];
        $quantity = $_GET['quantity'];
    
        $query = "select quantity from book where id='" .$bookid ."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);

        $maxQty = $row['quantity'];
        
        if(isset($_SESSION['cart']) == false){
            $_SESSION['cart'] = array();
            $_SESSION['alreadyOrder'] = false;
        }
        //use bookid as a key
        if(isset($_SESSION['cart'][$bookid]) == true){
            if(($_SESSION['cart'][$bookid] + $quantity) <= $maxQty){
                $_SESSION['cart'][$bookid] += $quantity;                
                echo "<script language='JavaScript'>alert('Add complete')</script>";
            }
            else{
                echo "<script language='JavaScript'>alert('We only have " .$maxQty ." books')</script>";
            }
        }else{
            if($quantity <= $maxQty){
                $_SESSION['cart'][$bookid] = $quantity;
                echo "<script>alert('Add complete')</script>";
                echo "Add complete";                                                
            }
            else{
                echo "<script>alert('We only have " .$maxQty ." books')</script>";
            }                                           
        }
    }

    echo "<script language='JavaScript'>window.history.back();</script>";    
?>