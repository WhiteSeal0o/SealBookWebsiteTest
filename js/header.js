/*=========================================================================
========================= HEADER SCROLL EFFECT ============================
===========================================================================*/
(function() {
var scrollVal,
  isRevealed,
  noscroll,
  isAnimating,
  container = document.getElementById( 'container' );

function scrollPage() {
  scrollVal = window.pageYOffset|| document.documentElement.scrollTop;

  if( noscroll ) {
    if( scrollVal < 0 ) return false;
    window.scrollTo( 0, 0 );
  }

  if( classie.has( container, 'notrans' ) ) {
    classie.remove( container, 'notrans' );
    return false;
  }

  if( isAnimating ) {
    return false;
  }

  if( scrollVal <= 0 && isRevealed ) {
    toggle(0);
  }
  else if( scrollVal > 0 && !isRevealed ){
    toggle(1);
  }
}

function toggle( reveal ) {
  isAnimating = true;

  if( reveal ) {
    classie.add( container, 'modify' );
  }
  else {
    noscroll = true;
    classie.remove( container, 'modify' );
  }

  setTimeout( function() {
    isRevealed = !isRevealed;
    isAnimating = false;
    if( reveal ) {
      noscroll = false;
    }
  }, 1200 );
}

// refreshing the page...
var pageScroll = window.pageYOffset || document.documentElement.scrollTop;
noscroll = pageScroll === 0;

if( pageScroll ) {
  isRevealed = true;
  classie.add( container, 'notrans' );
  classie.add( container, 'modify' );
}

window.addEventListener( 'scroll', scrollPage );

})();

/*=========================================================================
========================= Filter Effect ===================================
===========================================================================*/

$("[class*='-btn'] span").click(function () {
  $(this).toggleClass("active");
});

var paginationMove = false;
$(".filter-btn span").click(function () {
  $(".filter-form").toggleClass("reveal");
  $(".products-wrapper").toggleClass("down");
  if(paginationMove == false){
    $("#firstPagination").css('transform', 'translateY(200px)');
    paginationMove = true;
  }else{
    $("#firstPagination").css('transform', 'translateY(0)');
    paginationMove = false;
  }
});

/*=========================================================================
========================== Search box Effect ==============================
==========================================================================*/

$(".search-btn span").click(function () {
  $(".search-box").toggleClass("reveal");
});

$(".search-box input").keyup(function () {
  $(".search-box div").replaceWith("<div class='highlight'>" + $(this).val() + "</div>");
});

$(".search-box div").replaceWith("<div class='highlight'>" + $(".search-box input").val() + "</div>");
