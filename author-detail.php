<?php
    require_once('findbook.php');
    require_once('define_variable.php');
    $rowInfo = "";

    if(isset($_GET['name']) == true){
        require_once('findbook.php');
        require_once('define_variable.php');

        $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
        mysqli_set_charset($link,"utf8");
        $query = "select * from author where authorname='" .$_GET['name'] ."'";
        $result = mysqli_query($link, $query);

        $rowInfo = mysqli_fetch_array($result);
    }else{
        header('Location: authors.php');
    }

    $bookList = executeQuery("", $_GET['name'], "", "", "", "", "", "");
    
    function displayBookList($bookList){
      $ret = "";
      $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
      for($i = 0; $i < count($bookList); $i++){
        $query = "select * from book_brief_view where bookid ='" .$bookList[$i] ."'";
        $result = mysqli_query($link, $query);
        if($result != false){
          $row = mysqli_fetch_array($result);
          $ret .= '<div class="book ' .($i + 1) .'">' .'<img src="data:image/jpeg;base64,' .base64_encode($row["cover"]) .'" alt="' .$row["bookname"] .'" data="' .$row["bookid"] .'"/></div>';          
        }
      }
      return $ret;
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
  <link rel="stylesheet" type="text/css" href="css/author.css">
  <script src="js/authors.js"></script>
  <title>Author's Detail</title>
</head>
<body>
  <header class="header">
      <h1><?php echo $_GET['name']; ?></h1>
  </header>

  <div class="info-container">
    <div class="img"><?php echo '<img src="data:image/jpeg;base64,' .base64_encode($rowInfo["avatar"]) .'" alt="' .$rowInfo["authorname"] .'"/>'; ?></div>
    <div class="info">
      <div class="year"><?php echo $rowInfo['dob']; ?></div>
      <div class="story"><?php echo $rowInfo['bio']; ?></div>
    </div>
  </div>

  <h3>Books By <?php echo $_GET['name']; ?></h3>
  <div class="books">
    <?php echo displayBookList($bookList); ?>
  </div>

    <div class="product-popup">
        <?php echo displayAnsPopUpWithoutPageField($bookList); ?>
    </div>

  <a class = "back" href="javascript:history.go(-1)">Back</a>

</body>
</html>