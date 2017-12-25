<?php
    require_once('define_variable.php');

    function executeQuery($bookName, $authorName, $categoryName, $releaseYear, $publisherName, $lowPrice, $maxPrice, $displayOrder){

        $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
        mysqli_set_charset($link,"utf8");
        $query = "select bookid from book_brief_view where ";
        $haveBefore = false;    

        $ans = array();

        if($bookName != ""){
            $query .= "bookname like '%" .$bookName ."%'";
            $haveBefore = true;
        }
        if($authorName != ""){
            if($haveBefore == true) $query .= " or ";
            $query .= "authorname = '" .$authorName ."'";
            $haveBefore = true;
        }
        if($categoryName != ""){
            if($haveBefore == true) $query .= " and ";
            $query .= "categoryname = '" .$categoryName ."'";
            $haveBefore = true;        
        }
        if($releaseYear != ""){
            if($haveBefore == true) $query .= " and ";            
            if(strpos($releaseYear, 's') == false){
                $query .= "year(updated) = '" .$releaseYear ."'";
            }else{
                $query .= "year(updated) >= '" .intval($releaseYear) ."'";
                $query .= " and year(updated) <= '" .(intval($releaseYear) + 10) ."'";                               
            }
            $haveBefore = true;      
        }
        if($publisherName != ""){
            if($haveBefore == true) $query .= " and ";
            $query .= "publishername = '" .$publisherName ."'";
            $haveBefore = true;        
        }
        if($lowPrice != ""){
            if($haveBefore == true) $query .= " and ";
            $query .= "price >= '" .$lowPrice ."'";
            $haveBefore = true;        
        }
        if($maxPrice != ""){
            if($haveBefore == true) $query .= " and ";
            $query .= "price <= '" .$maxPrice ."'";
            $haveBefore = true;        
        }
        if($authorName != ""){
            if($haveBefore == true) $query .= " or ";
            $query .= "authorname = '" .$authorName ."'";
            $haveBefore = true;        
        }
        // if($haveBefore == true) $query .= " and ";        
        //     $query .= "quantity > 0";
        if($displayOrder != ""){
            switch($displayOrder){
                case "priceIncreased":
                    $query .= " order by price asc";
                    break;
                case "priceDescreased":
                    $query .= " order by price desc";
                    break;
                case "new":
                    $query .= " order by updated desc";
                    break;
                default:
                    $query .= " order by bookid asc";                
            }
        }

        $result = mysqli_query($link, $query);
        if($result != false){
            $row = mysqli_fetch_array($result);
            while($row != null){
                array_push($ans, $row['bookid']);
                $row = mysqli_fetch_array($result);
            }
        }

        mysqli_close($link);
        return $ans;
    }

    function displayAns($ans){
        if($ans != null){
            $records_per_page = RECORDS_PER_PAGE;
            $total_num = count($ans);
            $num_of_page = ceil($total_num/$records_per_page);
            if(isset($_GET['page'])){
                $page = $_GET['page'] - 1;
            }else{
                $page = 0;
                $_GET['searchResult'] = $ans;
            }
            $num_of_records = RECORDS_PER_PAGE;
            if($page == $num_of_page - 1){
                $num_of_records = $total_num - $page * RECORDS_PER_PAGE;
            }

            $tmp = ceil($num_of_records/2);
            echo "<div class='products-layout' style='grid-template-rows: repeat(" .ceil($num_of_records/2) .", 1fr 4fr 1fr);'>";
            
            for($i = $page * $records_per_page; $i < $total_num && $i < ($page + 1) * $records_per_page; $i++){
                echo displayBook($ans[$i], $i) ;
            }
            echo "</div>";
        }else{
            echo "<h2>No result</h2>";
        }
        
    }

    function displayAnsPopUp($ans){
        $records_per_page = RECORDS_PER_PAGE;
        $total_num = count($ans);
        
        if(isset($_GET['page'])){
            $page = $_GET['page'] - 1;
        }else{
            $page = 0;
            $_GET['searchResult'] = $ans;
        }

        for($i = $page * $records_per_page; $i < $total_num && $i < ($page + 1) * $records_per_page; $i++){
            echo displayBookGetPopUp($ans[$i]) ;
        }
    }

    function displayAnsPopUpWithoutPageField($ans){
        for($i = 0; $i < count($ans); $i++){
            echo displayBookGetPopUp($ans[$i]) ;
        }
    }

    function generatePagination($ans){
        $records_per_page = RECORDS_PER_PAGE;
        $total_num = count($ans);
        
        if(isset($_GET['page'])){
            $page = $_GET['page'] - 1;
        }else{
            $page = 0;
            $_GET['searchResult'] = $ans;
        }
        $ret = "<div class='w3-center w3-padding-32' style='clear:both'><div class='w3-bar'>";
        $num_of_page = ceil($total_num/$records_per_page);
        if($num_of_page <= 5){
            for($i = 0; $i < $num_of_page; $i++){
                if($i != $page){
                    $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-button w3-hover-black'>" .($i+1) ."</a>";                        
                }else{
                    $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-black w3-button'>" .($i+1) ."</a>";                        
                }
            }
        }else{
            $ret .= "<a href=" .generateUrl('1') ." class='w3-bar-item w3-button w3-hover-black'>«</a>";
            if($page < 3){
                for($i = 0; $i < 5; $i++){
                    if($i != $page){
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-button w3-hover-black'>" .($i+1) ."</a>";                        
                    }else{
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-black w3-button'>" .($i+1) ."</a>";                        
                    }
                }
            }else{
                for($i = $page - 2; $i < $num_of_page && $i <= ($page + 2); $i++){
                    if($i != $page){
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-button w3-hover-black'>" .($i+1) ."</a>";                        
                    }else{
                        $ret .=  "<a href=" .generateUrl($i + 1) ." class='w3-bar-item w3-black w3-button'>" .($i+1) ."</a>";                        
                    }
                }
            }
            $ret .= "<a href=" .generateUrl($num_of_page) ." class='w3-bar-item w3-button w3-hover-black'>»</a>";            
        }
        $ret .= "</div></div>";
        return $ret;
    }

    function generateUrl($pageNumber){
        $url = $_SERVER['PHP_SELF'] ."?" .$_SERVER['QUERY_STRING'];
        if(strstr($url, "&page=") == true){
            $url = str_replace(strstr($url, "&page="), "&page=" .$pageNumber, $url);            
        }else{
            $url .= "&page=" .$pageNumber;
        }
        $url .= "#bookList";
        return $url;
    }

    function displayBook($bookID, $sequence_number){
        $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
        $query = "select * from book_brief_view where bookid ='" .$bookID ."'";
        $result = mysqli_query($link, $query);
        $display = "";
        if($result != false){
        $row = mysqli_fetch_array($result);

        $display .= "<div class='product " .$sequence_number ."'>";
        $display .= '<img src="data:image/jpeg;base64,' .base64_encode($row["cover"]) .'" data="' .$row["bookid"] .'" alt="' .$row["bookname"] .'"/>';   
        $display .= "<div class='box'>";
        $display .= "<div class='cart' data='" .$bookID ."'>Add to Cart</div>";
        $display .= "<div class='price'>$" .$row['price'] ."</div>";
        $display .= "</div>";
        $display .= "</div>";

        }  
        return $display;   
    }

    function displayBookGetPopUp($bookID){
        $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
        $query = "select * from book_brief_view where bookid ='" .$bookID ."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $authorUrl = "author-detail.php?name=" .$row['authorname'];        
        $display = "";

        $display .= "<div id='" .$bookID ."' class='product-detail'>";
        $display .= "<div class='content'>";
        $display .= "<div class='name'>" .$row['bookname'] ."</div>";
        $display .= "<a href='" .$authorUrl ."' class='author'>By: " .$row['authorname'] ."</a>";
        $display .= "<table><tr><td>Publisher: " .$row['publishername'] ."</td>";
        $display .= "<td>Released Day: " .$row['updated'] ."</td></tr>";
        $display .= "<tr><td cols='2' style='font-style: italic'><small>Note: " .$row['quantity'] ." books are available</small></td></tr>";
        $display .= "</table>";
        $display .= "<div class='btn' data='btn"  .$bookID ."'>";
        $display .= "<div class='cart'>Add to Cart<div class='bg'></div><span>Add to Cart</span></div>";
        $display .= "<div class='price'>$" .$row['price'] ."<div class='bg'></div><span>$" .$row['price'] ."</span></div>";
        $display .= "</div>";
        $display .= "<div class='intro'>";
        $display .= "<p style='text-align: left'><b>Introduction:</b></p>";        
        $display .= "<p>" .$row["description"] ."</p></div>";

        $display .= "</div>";
        $display .= "<div class='img'>";
        $display .= '<img src="data:image/jpeg;base64,' .base64_encode($row["cover"]) .'" data="' .$row["bookid"] .'" alt="' .$row["bookname"] .'"/>';   
        $display .= "</div></div>";

        return $display;
    }

    function detailBook($bookID){
        $link = mysqli_connect("localhost", "root", "user", "web1") or die("Cannot connect to database");
        $query = "select * from book_brief_view where bookid ='" .$bookID ."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);

        $row['cover'] = "../img/book.jpg";
        $display = "<div class='w3-padding-32'>";
        $display .= "<img src='" .$row['cover'] ."' class='w3-image' style='display:block;margin:auto' width='600' height='400' alt='" .$row['bookname'] ."' />";
        $display .= "<h3>" .$row['bookname'] ."</h3>";
        $display .= "<i>Giá: " .$row['price']/10000 ."</i><br>";
        $display .= "Tác giả: " .$row['authorname'] ."<br>";
        $display .= "Danh mục: " .$row['categoryname'] ."<br>";
        $display .= "<span class='bookIntroduct'>";
        $display .= "Giới thiệu sách: " .$row['description'] ."<br></span>";
        $display .= "<input type='button' value='Thêm vào giỏ hàng'>";       
        $display .= "</div>";      
        return $display;   
    }
    
?>