<?php
    require_once('define_variable.php');
    
    function get_publisher(){
        $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
        $query = "select publishername from publisher";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        
        $ans = "";

        $ans .= "<option selected value='all'>All</option>";
        
        while($row != null){
            $ans .= "<option value='" .$row['publishername'] ."'>" .$row['publishername'] ."</option>";
            $row = mysqli_fetch_array($result);
        }
        // echo $query;
        return $ans;
    }
?>
