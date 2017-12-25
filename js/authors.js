
$(document).ready(function () {

  /****************  TOP-NAV **************************/
  $(window).scroll(function () {
    var scrollVal = window.pageYOffset;
    if (scrollVal > 0) {
      $(".top-nav").addClass("mini");
    } else $(".top-nav").removeClass("mini");

  // $("a").hide();

  var currentUrl = window.location.href;
  if(currentUrl.indexOf("#") != -1){
    var findChar = currentUrl.substr(currentUrl.indexOf("#") + 1, currentUrl.length);
    var authors = document.querySelectorAll(".grid-layout .author");
    authors.forEach(function (author) {
      var firstDigit = Array.from(author.lastChild.innerText)[0];
      if (firstDigit.toUpperCase() === findChar) {
        $(author).removeClass("blur");
        $("a[name='" + findChar + "']").show();

      } else {
        $(author).addClass("blur");
      }
      if (findChar === "All") $(author).removeClass("blur");
    });
  }
});

  //refreshing the page...
  var scrollVal = document.documentElement.scrollTop;
  if (scrollVal > 0) {
    $(".top-nav").addClass("mini");
  }

  /****************** ALPHABET FILTER ***************************/
  $(".alpha span").click(function () {
    var url = window.location.pathname;
    url += "#" + $(this)[0].innerHTML;
    window.location.replace(url);
  });

  /************************* Popup Product ******************************/
  $(".book img").click(function () {
    console.log($(this).attr('data'));
    $("#"+$(this).attr('data')).addClass("popup");
  });

  $(".product-detail").click(function () {
    $(this).removeClass("popup");
  });

  $(".product-detail .btn").hover(function () {
      $(this).toggleClass("reverse");
  });

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
    
});
