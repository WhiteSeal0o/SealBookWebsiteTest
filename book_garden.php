<?php
    require_once('define_variable.php');    
    require_once('get_category.php');
    require_once('get_publisher.php');
    require_once('get_released_year.php');
    require_once('findbook.php');
?>

<?php
    $flag = false;

    if(isset($_GET['lowPrice'])){ //new search
        $flag = true;

        $search = $_GET['search'];
        $categoryName = $_GET['categoryName'];
        $publisherName = $_GET['publisherName'];
        $releasedYear = $_GET['releasedYear'];
        $lowPrice = $_GET['lowPrice'];
        $maxPrice = $_GET['maxPrice'];
        $displayOrder = $_GET['searchDisplayOrder'];
        
        $bookName = $search;
        $authorName = $search;

        if($categoryName == "all"){
            $categoryName = "";
        }
        if($publisherName == "all"){
            $publisherName = "";
        }
        if($releasedYear == "all"){
            $releasedYear = "";
        }

        $queryResult = executeQuery($bookName, $authorName, $categoryName, $releasedYear, $publisherName, $lowPrice, $maxPrice, $displayOrder);
    }else $queryResult = executeQuery("", "", "" , "", "", "0.01", "1000", "new");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="icon" href="http://www.shareicon.net/data/128x128/2016/09/30/837652_seal_512x512.png">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <link rel="stylesheet" type="text/css" href="css/w3s.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <title>Book Garden</title>

        <script>
            $( document ).ready( function() {
                $( "#searchPriceRange" ).slider({
                range: true,
                min: 0.01,
                max: 1000.00,
                
                <?php
                    if( $flag == false){
                        $lowPrice = 0.01;
                        $maxPrice = 999.01;
                    }else{
                        $lowPrice = $_GET["lowPrice"];
                        $maxPrice = $_GET["maxPrice"];
                    }
                ?>
                values: [ '<?php echo $lowPrice; ?>', '<?php echo $maxPrice; ?>' ],
                slide: function( event, ui ) {
                    $( "#searchLowPrice" ).val( ui.values[ 0 ]);
                    $( "#searchMaxPrice" ).val( ui.values[ 1 ]);

                }
                });
                $( "#searchLowPrice" ).val($( "#searchPriceRange" ).slider( "values", 0 ));
                $( "#searchMaxPrice" ).val($( "#searchPriceRange" ).slider( "values", 1 ));
            } );
        </script>

    </head>
    <body>
    <div id="container" class="container header-effect">
        <header class="header">
            <div class="bg-img"><img src="background/book_garden.jpg" alt="Background Image" /></div>

            <div class="nav">
                <a class="top-nav cart" href="shoppingCart.php"><i class="fa fa-shopping-cart"></i></a>
                <div class="top-nav"><div class="mid-line"></div></div>
                <a class="top-nav home" href="index.php"><span>sealBook</span></a>
            </div>

            <div class="title">
                <h3>OUr Book Garden</h3>
            </div>

            <form method=GET>
            <div class="filter">
                <div class="filter-btn">
                    This is everything, do you wanna <span class="btn">narrow down</span>for more specific looking
                </div>

                <div class="filter-form">
                    <div>
                        Category<br>
                        <select name="categoryName" id="searchCategoryName" class="searchSelectForm">
                            <?php echo get_category(); ?>
                        </select>
                    </div>
                    <div>
                        Publisher<br>
                        <select name="publisherName" id="searchPublisherName" class="searchSelectForm">
                            <?php echo get_publisher(); ?>
                        </select>
                    </div>
                    <div>
                        Price($)<br>
                        <input type="text" id="searchLowPrice" name="lowPrice" value="0.01" readonly style="border:0; color:#f6931f; font-weight:bold; width: 45%; text-align: center"> -
                        <input type="text" id="searchMaxPrice" name="maxPrice" value="999.01" readonly style="border:0; color:#f6931f; font-weight:bold; width: 45%; text-align: center">
                        <div id="searchPriceRange"></div>
                    </div>
                    <div>Published year<br>
                        <select name="releasedYear" id="searchReleasedYear" class="searchSelectForm">
                            <?php echo get_released_year(); ?>
                        </select>
                    </div>
                    <div>Sort by<br>
                        <select class="searchSelectForm" name="searchDisplayOrder" id="searchDisplayOrder">
                            <option value="new">Newest</option>
                            <option value="popular">Popular</option>
                            <option value="priceIncreased">Price Increased</option>
                            <option value="priceDescreased">Price Descreased</option>
                        </select>
                    </div>
                    <input class="go" type="submit" value="Go">
                    <input class="go" type="reset" value="Reset">
                </div>


                <div class="search-btn">
                    or Do you need some help? <span class="btn">Let us know</span>
                </div>

                <div class="search-box">
                    <input id="searchSearch" type="text" name="search" placeholder="search anything ... ">

                    <div></div>
                </div>
            </div>
            </form>

            <div class="bg-img"><img src="background/book_garden.jpg" alt="Background Image" /></div>
        </header>

        <a name="bookList"></a>
        <div id="firstPagination">
            <?php echo generatePagination($queryResult); ?>
        </div>
        <div class="products-wrapper">
                <?php displayAns($queryResult); ?>
        </div>
        <?php echo generatePagination($queryResult); ?>

    <div class="product-popup">
        <?php displayAnsPopUp($queryResult); ?>
    </div>
    <div class="footer">
        <div class="direction">
            <a href="about.html">About us</a>
            <a href="index.php">Home</a>
            <a href="authors.php">Authors</a>
            <a href="facebook.com">Facebook</a>
            <a href="twitter.com">Twitter</a>
        </div>
        <div class="copyright">&copy2017 ibookonline.me</div>
    </div>

    </div>  
    <!-- end container -->

    
    <script src="js/classie.js"></script>
    <script src="js/header.js"></script>
    <script src="js/products.js"></script>
    <script src="js/book_garden.js"></script>

    <!-- REVERT SEARCH VARIABLE -->
    <script>
    if(<?php echo $flag ?> == true){
        $()
        document.getElementById("searchSearch").value = '<?php echo $_GET['search']; ?>';
        document.getElementById("searchCategoryName").value = '<?php echo $_GET['categoryName']; ?>';
        document.getElementById("searchPublisherName").value = '<?php echo $_GET['publisherName']; ?>';
        document.getElementById("searchReleasedYear").value = '<?php echo $_GET['releasedYear']; ?>';
        document.getElementById("searchDisplayOrder").value = '<?php echo $_GET['searchDisplayOrder']; ?>';
    }</script>
    <!-- REVERT SEARCH VARIABLE -->

    </body>
</html>