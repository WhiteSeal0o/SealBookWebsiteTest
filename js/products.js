$(window).scroll(function () {
  var pageScroll = window.pageYOffset || document.documentElement.scrollTop;
  $(".products-layout").css("transform","translateY(-"+pageScroll/800+"%)");
});

$(".product .box").hover(function () {
  $(this).toggleClass("pulled");
});

$(".product img").click(function () {
  console.log($(this).attr('data'));
  $("#"+$(this).attr('data')).addClass("popup");
});

$(".product .cart").click(function(){
  var bookid = $(this).attr('data');
  var url = "addCart.php?bookid=" + bookid + "&quantity=1";
  window.open(url, "_self");
});

//--------------------

$(".product-detail .content .btn").click(function () {
  var bookid = $(this).attr('data').substring(3, $(this).attr('data').length);
  var quantity = prompt("How much do you want: ", "1");
  if(isNaN(quantity) || quantity == 0 || quantity == null){
    alert("You input a wrong number")
  }
  else{
    url = "addCart.php?bookid=" + bookid + "&quantity=" + quantity;
    window.open(url, "_self");
  }
  $(this).removeClass("popup");
});

//------------------
$(".product-detail").click(function () {
  $(this).removeClass("popup");
});
$(".product-detail .btn").hover(function () {
  $(this).toggleClass("reverse");
});
