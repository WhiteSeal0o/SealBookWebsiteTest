<?php
    require_once('findbook.php');
    require_once('define_variable.php');

    $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
    mysqli_set_charset($link,"utf8");
    $query = "select authorname, avatar, bio from author";
    $result = mysqli_query($link, $query);

    $result = mysqli_query($link, $query);

    $display = "";
    $firstChar = "A";
    $lastChar = "";
    while(($row = mysqli_fetch_array($result)) != null){
        // if($firstChar == "A" && $lastChar == ""){
        //   $lastChar = $firstChar;
        //   $display .= "<a name='" .$firstChar ."'></a>";
        // }
        // if($firstChar != strtoupper(substr($row['authorname'], 0, 1))){
        //   $firstChar = chr(ord(strtoupper(substr($row['authorname'], 0, 1))));
        //   $display .= "<a name='" .$firstChar ."'></a>";
        // }
       
        $display .= "<div class='author' data='abc'>";
        $display .= '<img src="data:image/jpeg;base64,' .base64_encode($row["avatar"]) .'" alt="' .$row["authorname"] .'"/>';
        $display .= "<a class='overlay' href='author-detail.php?name=" .$row['authorname'] ."'>" .$row['authorname'] ."</a>";
        $display .= "</div>";
    }
    
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/authors.css">
  <link rel="icon" href="http://www.shareicon.net/data/128x128/2016/09/30/837652_seal_512x512.png">
  <script src="js/authors.js"></script>
  <title>Authors</title>

</head>
<body>
  <div class="container">
    <header class="header">
      <div class="nav">
        <a class="top-nav cart" href="shoppingCart.php">
          <i class="fa fa-shopping-cart"></i>
        </a>
        <a class="top-nav home" href="index.php">
          <span>sealBook</span>
        </a>
      </div>

      <div class="title-side">
        <h3>Meet  Our</h3>
        <h1>AUTHORS</h1>
        <div class="title-box">
          <h1>AUTHORS</h1>
        </div>
      </div>
    </header>

    <div class="alpha">
      <span>All</span>
      <span>A</span>
      <span>B</span>
      <span>C</span>
      <span>D</span>
      <span>E</span>
      <span>F</span>
      <span>G</span>
      <span>H</span>
      <span>I</span>
      <span>J</span>
      <span>K</span>
      <span>L</span>
      <span>M</span>
      <span>N</span>
      <span>O</span>
      <span>P</span>
      <span>Q</span>
      <span>R</span>
      <span>S</span>
      <span>T</span>
      <span>U</span>
      <span>V</span>
      <span>W</span>
      <span>X</span>
      <span>Y</span>
      <span>Z</span>
    </div>

    <div class="grid-container">
      <div class="grid-layout">

        <?php echo $display; ?>

      </div>
    </div>
  </div>
</body>
</html>