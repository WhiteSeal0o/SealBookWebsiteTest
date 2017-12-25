/*=====================================================================
===================== SCROLL SPEED
=====================================================================*/
// if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
// window.onmousewheel = document.onmousewheel = wheel;

function wheel(event) {
    var delta = 0;
    if (event.wheelDelta) delta = event.wheelDelta / 120;
    else if (event.detail) delta = -event.detail / 3;

    handle(delta);
    if (event.preventDefault) event.preventDefault();
    event.returnValue = false;
}

function handle(delta) {
    var time = 300;
	   var distance = 100;

    $('html, body').stop().animate({
        scrollTop: $(window).scrollTop() - (distance * delta)
    }, time );
}

/*====================================================================*/



var logo = document.getElementById("logo");
var nav = document.getElementsByClassName("top-nav");
console.log(nav);
var sticky = logo.offsetTop;
var newBook = [
  '<strong><a href="#">Battle Royale</a></strong><span>by: <a href="#"> Koushun Takami</a></span><p>Koushun Takami\'s notorious high-octane thriller is based on an irresistible premise: a class of junior high school students is taken to a deserted island where, as part of a ruthless authoritarian program,...</p>',
  '<strong><a href="#">Dream the World Awake</a></strong><span>by: <a href="#"> Walter Van Beirendonck</a></span><p>Walter van Beirendonck has been at the forefront of fashion for more than thirty years. One of the Antwerp Six and the director of fashion at the Royal Academy of Fine Arts, he is known for the uninhibited nature of his work and the wonderful daring that he shows as a designer.</p>',
  '<strong><a href="#">Casino Royale</a></strong><span>by: <a href="#"> Ian Fleming</a></span><p>In the novel that introduced James Bond to the world, Ian Fleming’s agent 007 is dispatched to a French casino in Royale-les-Eaux. His mission? Bankrupt a ruthless Russian agent who’s been on a bad luck streak at the baccarat table.</p>'
];
var bestBook = [
  '<strong><a href="#">I Think I Love You</a></strong><span>by: <a href="#"> Allison Pearson</a></span><p>Poignant, hilarious, joyful, profoundly moving and uplifting, I Think I Love You captures what we learn about love, life and friendship through the universal experience of worshipping a teen dream. It will resonate with readers everywhere.</p>',
  '<strong><a href="#">The Journey of Dreams </a></strong><span>by: <a href="#"> Marge Pellegrino</a></span><p>For the peaceful highlanders of Guatemala, life has become a nightmare. Helicopters slash like machetes through the once-quiet air. Soldiers patrol the streets, hunting down suspected guerillas. Villagers mysteriously disappear and children are recruited as soldiers...</p>',
  '<strong><a href="#">Photographs and Photograms</a></strong><span>by: <a href="#">Andreas Haus </a></span><p>Inspects the photographs and examines the innovations of the visionary Hungarian artist and photographer, paying attention to his impact on the Weimar Bauhaus, the Chicago School of Design, and artistic development during the 1920s and 1930s.</p>'
];

var authors = [
  '<div class="author-info"><a href="#" class="name">Sarah J. Maas</a><p class="story">Sarah lives in Bucks County, PA, and over the years, she has developed an unhealthy appreciation for Disney movies and bad pop music. She adores fairy tales and ballet, drinks too much tea, and watches an ungodly amount of TV. When she\'s not busy writing, she can be found exploring the historic and beautiful Pennsylvania countryside with her husband and canine companion.</p></div>',
  '<div class="author-info"><a href="#" class="name">Angie Thomas</a><p class="story">Angie Thomas was born, raised, and still resides in Jackson, Mississippi as indicated by her accent. She is a former teen rapper whose greatest accomplishment was an article about her in Right-On Magazine with a picture included. She holds a BFA in Creative Writing from Belhaven University and an unofficial degree in Hip Hop. She can also still rap if needed. She is an inaugural winner of the Walter Dean Meyers Grant 2015, awarded by We Need Diverse Books.</p></div>',
  '<div class="author-info"><a href="#" class="name">Mark T. Sullivan</a><p class="story">Mark T. Sullivan (b. 1958) is an author of thrillers. Born in a Boston suburb, he joined the Peace Corp after college, traveling to West Africa to live with a tribe of Saharan nomads. Upon returning to the United States, he took a job at Reuters, beginning a decade-long career in journalism that would eventually lead to a job as an investigative reporter for the San Diego Tribune.</p></div>',
  '<div class="author-info"><a href="#" class="name">John Green</a><p class="story">John Green\'s first novel, Looking for Alaska, won the 2006 Michael L. Printz Award presented by the American Library Association. His second novel, An Abundance of Katherines, was a 2007 Michael L. Printz Award Honor Book and a finalist for the Los Angeles Times Book Prize. His next novel, Paper Towns, is a New York Times bestseller and won the Edgar Allen Poe Award for Best YA Mystery.</p></div>',
  '<div class="author-info"><a href="#" class="name">Cassandra Clare</a><p class="story">Cassandra Clare was born overseas and spent her early years traveling around the world with her family and several trunks of fantasy books. Cassandra worked for several years as an entertainment journalist for the Hollywood Reporter before turning her attention to fiction. She is the author of City of Bones, the first book in the Mortal Instruments trilogy and a New York Times bestseller. Cassandra lives with her fiance and their two cats in Massachusetts.</p></div>'
];

function myFunction() {

  var wScroll = $(window).scrollTop();

  // Top Nav fixed
  if (window.pageYOffset >= sticky) {
    logo.classList ? logo.classList.add('sticky') : logo.className += ' sticky';
    // nav[0].style.color="#0a0a0a";
    // nav[1].style.color="#0a0a0a";
    logo.style.color="#cbe3c6";
  } else {
    logo.classList ? logo.classList.remove('sticky') : logo.className -= ' sticky';
    // nav[0].style.color="#fff";
    // nav[1].style.color="#fff";
    logo.style.color="#e9696e";
  }
  if (wScroll>=$('.part2').offset().top - 50) {
    nav[0].style.color="#0a0a0a";
    nav[1].style.background="#0a0a0a";
    $( "<style>label .hamburger:after { background: #0a0a0a; }</style>" ).appendTo( "head" );
    $( "<style>label .hamburger:before { background: #0a0a0a; }</style>" ).appendTo( "head" );
  }else {
    nav[0].style.color="#fff";
    nav[1].style.background="#fff";
    $( "<style>label .hamburger:after { background: #fff; }</style>" ).appendTo( "head" );
    $( "<style>label .hamburger:before { background: #fff; }</style>" ).appendTo( "head" );
  }
  if (wScroll>=$('.part3').offset().top -50) {
    nav[0].style.color="#cbe3c6";
    nav[1].style.background="#cbe3c6";
    $( "<style>label .hamburger:after { background: #cbe3c6; }</style>" ).appendTo( "head" );
    $( "<style>label .hamburger:before { background: #cbe3c6; }</style>" ).appendTo( "head" );
  }
  if (wScroll>=$('.part4').offset().top -50) {
    nav[0].style.color="#e9696e";
    nav[1].style.background="#e9696e";
    $( "<style>label .hamburger:after { background: #e9696e; }</style>" ).appendTo( "head" );
    $( "<style>label .hamburger:before { background: #e9696e; }</style>" ).appendTo( "head" );
  }
  if (wScroll>=$('.part5').offset().top -50) {
    nav[0].style.color="white";
    nav[1].style.background="white";
    $( "<style>label .hamburger:after { background: #fff; }</style>" ).appendTo( "head" );
    $( "<style>label .hamburger:before { background: #fff; }</style>" ).appendTo( "head" );
  }
  if (wScroll>=$('.part6').offset().top -50) {
    nav[0].style.color="#1a1a1a";
    nav[1].style.background="#1a1a1a";
    $( "<style>label .hamburger:after { background: #1a1a1a; }</style>" ).appendTo( "head" );
    $( "<style>label .hamburger:before { background: #1a1a1a; }</style>" ).appendTo( "head" );
  }


  // Fade out the button
  if (window.pageYOffset >= 40) {
    document.getElementsByClassName("btn")[0].classList ? document.getElementsByClassName("btn")[0].classList.add('hidden') : document.getElementsByClassName("btn")[0].className += ' hidden';

  } else {
    document.getElementsByClassName("btn")[0].classList ? document.getElementsByClassName("btn")[0].classList.remove('hidden') : document.getElementsByClassName("btn")[0].className -= ' hidden';
  }

  // Now realesed effect
  if (window.innerWidth>=750) {
    document.getElementsByClassName("title")[0].style.transform='translateY('+(window.pageYOffset/8)+'%)';
    document.getElementsByClassName("new-released")[0].style.transform='translateY('+(-window.pageYOffset/16)+'%)';
    // document.getElementsByClassName("describle")[0].style.transform='translateY('+(-window.pageYOffset/8)+'%)';
    document.getElementById("new-rl").style.transform='translate('+(window.pageYOffset/40)+'%,'+(window.pageYOffset/20)+'%)';
  }

  // Cirle effect
  if (wScroll > $('.discount-bg').offset().top - $(window).height()) {
    $('.fic-circle').css('background-position','81.59% '+ (wScroll-$('.discount-bg').offset().top - 50) +'px')
    var opacity = (1-(($('.fic-circle').offset().top - $(window).height()/2.25)/wScroll))*10;
    $('.fic-tint').css('opacity',opacity);

  }

  // show the discount-text
  if (wScroll > $('.discount-bg').offset().top - 120){
    $('.discount-text').addClass('visible');
  } else {
    $('.discount-text').removeClass('visible');
  }

  //newest-rl small-box
  if (wScroll>=$('.newest-rl').offset().top -210) {
    $('.newest-rl .small-box ').each(function (i) {
      setTimeout(function () {
        $('.newest-rl .small-box ').eq(i).css('opacity',1);
        $('.newest-rl .small-box').eq(i).css('transform','translateX(0)');
      },400*(i+1));
    });
    $('.newest-rl h3').css('border-color','#e9696e');
  } else {
    $('.newest-rl .small-box ').css('opacity',0);
    $('.newest-rl .small-box').css('transform','translateX(50px)');
    $('.newest-rl h3').css('border-color','rgba(255, 192, 203, 0.2)');
  }

  //best-sl small-box
  if (wScroll>=$('.best-sl').offset().top -210) {
    $('.best-sl .small-box ').each(function (i) {
      setTimeout(function () {
        $('.best-sl .small-box ').eq(i).css('opacity',1);
        $('.best-sl .small-box').eq(i).css('transform','translateX(0)');
      },400*(i+1));
    });
    $('.best-sl h3').css('border-color','#e9696e');
  } else {
    $('.best-sl .small-box ').css('opacity',0);
    $('.best-sl .small-box').css('transform','translateX(50px)');
    $('.best-sl h3').css('border-color','rgba(255, 192, 203, 0.2)');
  }

  //top-authors author
  if (wScroll>=$('.top-authors').offset().top - 210) {
    $('.top-authors .author').css('transform','rotateY(0deg)');
    $('.top-authors .author').css('opacity',1);
  } else {
    $('.top-authors .author').css('transform','rotateY(-90deg)');
    $('.top-authors .author').css('opacity',0);
  }

} /*
===========================================================================
======================== End Scroll =======================================
===========================================================================*/

// Feature mouseover effect****************************************************
    //Data
for (var i = 0; i < 3; i++) {
  $('.newest-rl .small-box:eq('+ i +')').css('background-image','url("newest-released/'+(i+1)+'.jpg")');
  $('.best-sl .small-box:eq('+ i +')').css('background-image','url("best-seller/'+(i+1)+'.jpg")');
  $('.newest-rl .small-box:eq('+ i +')').data("book",newBook[i]);
  $('.best-sl .small-box:eq('+ i +')').data("book",bestBook[i]);
}

    //Default text value
$('.newest-rl .large-box').css('background-image','url("newest-released/2.jpg")');
$('.newest-rl .large-box .book').css('background-image','url(newest-released/2.jpg)');
$('.best-sl .large-box').css('background-image','url("best-seller/2.jpg")');
$('.best-sl .large-box .book').css('background-image','url(best-seller/2.jpg)');

    //newest rl
$('.newest-rl .small-box').mouseover(function() {
  $('.newest-rl').css('background-color','#0a0a0a');
  $('.newest-rl .large-box .book').css('background-image',$(this).css('background-image'));
  $('.newest-rl .large-box').css('background-image',$(this).css('background-image'));

  $('.newest-rl .large-box .text').addClass('fade');
  var data = $(this).data('book');
  setTimeout(function () {
    $('.newest-rl .large-box .text').html(data);
  },500);

});
$('.newest-rl .small-box').mouseout(function() {
  $('.newest-rl').css('background-color','white');
  $('.newest-rl .large-box .text').removeClass('fade');
});
    //best-sl
$('.best-sl .small-box').mouseover(function() {
  $('.best-sl').css('background-color','#0a0a0a');
  $('.best-sl .large-box .book').css('background-image',$(this).css('background-image'));
  $('.best-sl .large-box').css('background-image',$(this).css('background-image'));

  $('.best-sl .large-box .text').addClass('fade');
  var data = $(this).data('book');
  setTimeout(function () {
    $('.best-sl .large-box .text').html(data);
  },500);

});
$('.best-sl .small-box').mouseout(function() {
  $('.best-sl').css('background-color','white');
  $('.best-sl .large-box .text').removeClass('fade');
});


/**************************************************************
====================Top Authors effect==========================
****************************************************************/
  //Data
for (var i = 0; i < 5; i++) {
  $('.circles .author:eq('+ i +')').css('background-image','url("authors/'+(i+1)+'.jpg")');
  $('.circles .author:eq('+ i +')').data("author",authors[i]);
  $('.circles .author:eq('+ i +')').data("author",authors[i]);
}
$('.top-authors .next').click(function () {
  for (var i = 0; i < 5; i++) {
    if ($('.circles .author').eq(i).hasClass('mid-author')) {
      $('.circles .author').eq(i).removeClass('mid-author').css('background-color',"#2a2a2a");
      if (i<4) {
        $('.circles .author').eq(i+1).addClass('mid-author').css('background-color','rgba(204, 204, 204, 0)');
        break;
      } else {
        $('.circles .author').eq(0).addClass('mid-author').css('background-color','rgba(204, 204, 204, 0)');
        break;
      }
    }
  };
});
$('.top-authors .previous').click(function () {
  for (var i = 0; i < 5; i++) {
    if ($('.circles .author').eq(i).hasClass('mid-author')) {
      $('.circles .author').eq(i).removeClass('mid-author').css('background-color',"#2a2a2a");
      if (i>0) {
        $('.circles .author').eq(i-1).addClass('mid-author').css('background-color','rgba(204, 204, 204, 0)');
        break;
      } else {
        $('.circles .author').eq(4).addClass('mid-author').css('background-color','rgba(204, 204, 204, 0)');
        break;
      }
    }
  };
});
  //mouseover - mouseout
$('.top-authors .author').mouseover(function () {
  if ($(this).hasClass('mid-author')) {
    $(this).css('background-color','rgba(204, 204, 204, 0.5)');
    $('.top-authors').css('background-color','#0a0a0a');
    var data = $(this).data('author');
    setTimeout(function () {
      $('.top-authors .text').replaceWith(data);
    },500);
  }
});
$('.top-authors .author').mouseout(function () {
  if ($(this).hasClass('mid-author')) {
    $(this).css('background-color','rgba(204, 204, 204, 0)');
    $('.top-authors').css('background-color','#1a1a1a');
    // var data = $(this).data('book');
    setTimeout(function () {
      $('.top-authors .author-info').replaceWith('<div class="text"><h3>Top Authors Of Year</h3></div>');
    },500);
  }
});



/*************************************************************************
============================= Subscribe effect===================================
**************************************************************************/
$(".button-field").mouseover(function(){
  $(".subscribe").css('background-color','#2a2a2a');
  nav[0].style.color="#fff";
  nav[1].style.background="#fff";
  $( "<style>label .hamburger:after { background: #fff; }</style>" ).appendTo( "head" );
  $( "<style>label .hamburger:before { background: #fff; }</style>" ).appendTo( "head" );
});
$(".email-field").focus(function(){
  $(".button-field").css('width','20%');
  $(".email-field").css('width','80%');
});
$(".email-field").blur(function(){
  $(".subscribe").css('background-color','white');

  $(".button-field").css('width','50%');
  $(".email-field").css('width','50%');
});
$(".button-field").mouseout(function(){
  $(".subscribe").css('background-color','white');
  nav[0].style.color="#2a2a2a";
  nav[1].style.background="#2a2a2a";
  $( "<style>label .hamburger:after { background: #2a2a2a; }</style>" ).appendTo( "head" );
  $( "<style>label .hamburger:before { background: #2a2a2a; }</style>" ).appendTo( "head" );
});
