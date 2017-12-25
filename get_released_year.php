<?php
    function get_released_year(){
        $lastest_year = 1990;
        $current_year = date("Y");
        $ans = "";
        $ans .= "<option selected value='all'>All</option>";

        for($i = $current_year; $i >= 10 * floor($current_year/10); $i--){
            $tmp = 10 * floor($current_year/10);
            $ans .= "<option value='" .$i ."'>" .$i ."</option>";        
        }
        $tmp = $current_year - $lastest_year;
        for($i = floor(($current_year - $lastest_year)/10) - 1; $i >= 0; $i--){
            $tmp = $lastest_year +  $i * 10;          
            $ans .= "<option value='" .($lastest_year +  $i * 10) ."s'>" .($lastest_year +  $i * 10) ."s</option>";
        }
        return $ans;
    }
?>