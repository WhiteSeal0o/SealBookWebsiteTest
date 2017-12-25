<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="Viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="http://www.shareicon.net/data/128x128/2016/09/30/837652_seal_512x512.png">

	<title>Home Page</title>
</head>
<body onscroll="myFunction()">
	<header class="v-header">

		<video id="bg--position" autoplay poster="background/pre-home-background.jpg" playsinline loop>
			<source src="background/TheJoyofBooks.mp4" type="video/mp4">
		</video>
		<div class="header-overlay"></div>

		<div class="home-book">
			<div class="nav">
				<a class="top-nav cart" href="shoppingCart.php"><i class="fa fa-shopping-cart"></i></a>
				<!--<a class="top-nav menu" style="display: none" href="#">MENU</a>-->

			</div>

			<div class="">
				<h1 class="title">So many books,<br>So little time</h1>
				<a href="#" class="btn" id="button">Explore</a>
			</div>
			<a href="#" class="logo" id="logo">sealBook</a>
		</div> <!-- Home book -->

	</header>

	<label>
	<input type='checkbox'>
	<span class='menu'>
		<span class='hamburger top-nav'></span>
	</span>
	<ul>
		<li>
			<a href='index.php'>Home</a>
		</li>
		<li>
			<a href='about.html'>About</a>
		</li>
		<li>
			<a href='book_garden.php'>Book Garden</a>
		</li>
		<li>
			<a href='authors.php'>Authors</a>
		</li>
	</ul>
	</label>

	<div class="part2">
		<div class="new-released-bg"></div>
		<div class="new-released">
			<div class="book-info">
				<a href="#" class="name">The sonic life of a giant tortosie</a>
				<div class="book-author">by: <a href="#">Lee McAlester</a></div>
				<p class="price">$30.99</p>
			</div>
			<img src="cover/life.jpg" alt="The sonic life of a giant tortosie" id="new-rl">
			<p class="describle">"What i'm relating now, what's going through my head, i have never told anyone before. It's secret, no one knows it. I will say what the secret is..."</p>
		</div><!-- new-released -->


	</div><!--  End Part2  -->

	<div class="part3">

		<div class="discount-bg">
			<div class="discount-text">
				We are a group of book lovers, and of course we encourage reading for everyone. Anyone who comes to sealBook are welcome to read the books freely<br>
				In addition, we offer monthly promotions with unexpected discounts, <a href="#">Explore</a> for more information
			</div>
			<div class="fic-circle">
				<div class="fic-tint">
					<div class="promo-text">
						Fiction Sale <strong> 20%</strong>
						<a href="#">Explore</a>
					</div>
				</div>
			</div>
		</div>

	</div><!-- End Part3 -->

	<div class="part4">
		<div class="feature-space"></div>
		<div class="feature newest-rl">
			<div class="large-box">
				<div class="book">

				</div>

				<div class="text">

				<div class="textx">


					<strong><a href="#">Dream the World Awake</a></strong>
					<span>by: <a href="#"> Walter Van Beirendonck</a></span>
					<p>Walter van Beirendonck has been at the forefront of fashion for more than thirty years. One of the Antwerp Six and the director of fashion at the Royal Academy of Fine Arts, he is known for the uninhibited nature of his work and the wonderful daring that he shows as a designer.</p>
				</div>

				</div>
			</div>

			<div class="boxs">
				<h3>Newest Released</h3>
				<div class="small-box"></div>
				<div class="small-box"></div>
				<div class="small-box"></div>
			</div>
		</div>

		<div class="feature-space"></div>
		<div class="feature best-sl">
			<div class="large-box">
				<div class="book">

				</div>

				<div class="text">
				<div class="textx">


					<strong><a href="#">Dream the World Awake</a></strong>
					<span>by: <a href="#"> Walter Van Beirendonck</a></span>
					<p>Walter van Beirendonck has been at the forefront of fashion for more than thirty years. One of the Antwerp Six and the director of fashion at the Royal Academy of Fine Arts, he is known for the uninhibited nature of his work and the wonderful daring that he shows as a designer.</p>
				</div>

				</div>
			</div>
			<div class="boxs">
				<h3>Best Seller</h3>
				<div class="small-box"></div>
				<div class="small-box"></div>
				<div class="small-box"></div>
			</div>
		</div>
		<div class="feature-space"></div>

	</div><!-- Part4 -->

	<div class="part5">

		<div class="top-authors">

			<div class="circles">
				<div class="author"></div>
				<div class="author"></div>
				<div class="author mid-author"></div>
				<div class="author"></div>
				<div class="author"></div>
			</div>

			<div class="text">
				<h3>Top Authors Of Year</h3>
			</div>

			<i class="fa fa-chevron-right next" aria-hidden="true"></i>
			<i class="fa fa-chevron-left previous" aria-hidden="true"></i>

		</div>
	</div><!-- Part5 Authors -->

	<div class="part6">
		<div class="subscribe">
			<div class="box"></div>
			<div class="box2"></div>
			<div class="box3"></div>
			<div class="sub-text">
				Subscribe us for more news and iformation about our <span>discount</span>
			</div>

			 <form class="email-form ease" action="" method="post" name="email" accept-charset="utf-8">
			   <input type="text" value="" name="email" class="email-field" id="email-field" placeholder="example@email.com">
			   <button type="submit" value="subscribe" name="subscribe" id="button-field" class="button-field" data-message="Subscribe">Subscribe</button>
			 </form>

		</div>
	</div><!-- Part6 Subscrible -->

	<div class="footer">
		<div class="direction">
			<a href="about.html">About us</a>
			<a href="#">Home</a>
			<a href="authors.php">Authors</a>
			<a href="book_garden.php">Store</a>
			<a href="facebook.com">Facebook</a>
			<a href="twitter.com">Twitter</a>
		</div>
		<div class="copyright">&copy2017 ibookonline.me</div>
	</div>
	
	<script type="text/javascript" src="js/home.js"></script>
</body>
</html>
