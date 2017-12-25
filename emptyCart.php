<?php
    session_start();
    unset($_SESSION['cart']);
    echo "<script>window.location.replace('book_garden.php#bookList');</script>";    
?>