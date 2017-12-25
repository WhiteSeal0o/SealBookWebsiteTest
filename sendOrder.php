<?php
    require_once('define_variable.php');
    $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");

    $executeStatus = true;
    session_start();
    $list = $_SESSION['cart'];

    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $addr = $_GET['address'];
    $gender = $_GET['gender'];
    $email = $_GET['email'];

    $query = "select id from customer where name='" .$name ."' and phone='" .$phone ."' and address='" .$addr ."' and gender='" .$gender ."' and email='" .$email ."';";
    $result = mysqli_query($link, $query);
    $row = mysqli_affected_rows($link);
    
    if($row <= 0){
        $query = "insert into customer(name, phone, address, gender, email) values('" .$name ."','" .$phone ."','" .$addr ."','" .$gender ."','" .$email ."');";
        $result = mysqli_query($link, $query);
        $query = "select id from customer where name='" .$name ."' and phone='" .$phone ."' and address='" .$addr ."' and gender='" .$gender ."' and email='" .$email ."';";
        $result = mysqli_query($link, $query); 
    }

    $row = mysqli_fetch_array($result);
    $customerID = $row['id'];

    //GET ID FOR NEW ORDER
    $query = "select max(id) from orderbook order by id asc";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $orderID = $row['0'] + 1;

    $query = "insert into orderbook(paidstat, shipstat, orderdate, shipdate, userid) values('0', '0','" .date('Y/m/d') ."','0-0-0','" .$customerID ."');";
    $result = mysqli_query($link, $query);

    foreach($list as $key => $value){
        $query = "select insertOrderBook('" .$orderID ."', '" .$key ."', '" .$value ."');";
        $result = mysqli_query($link, $query);
        $query = "select quantity from book where id='" .$key ."';";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);        
        $lastQuantity = $row['quantity'];
        if($lastQuantity - $value < 0){
            $executeStatus = false;
            $query = "delete from orderdetail where id='" .$orderID ."';";
            $result = mysqli_query($link, $query);            
            break;
        }
        $query = "update book set quantity='" .($lastQuantity - $value) ."' where id='" .$key ."';";
        $result = mysqli_query($link, $query);
    }

    $query = "select sum(cost) from orderdetail where orderid='" .$orderID ."';";
    $result = mysqli_query($link, $query);        
    $row = mysqli_fetch_array($result);
    $total = $row['sum(cost)'];
    
    $query = "update orderbook set total='" .$total ."' where id='" .$orderID ."';";
    $result = mysqli_query($link, $query);

?>

<html>
    <body>
        <?php
            if($executeStatus == false){
                echo "<script>alert('Sorry we don\'t have enough book for you')</script>";
            }else{
                echo "<script>alert('Your request is complete!')</script>";
                $_SESSION['alreadyOrder'] = true;
            }
            echo "<script>window.history.back();</script>";                
        ?>   
    </body>
</html>