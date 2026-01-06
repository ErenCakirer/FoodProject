/* ===============================================
	OWL CAROUSEL SLIDER
=============================================== */

jQuery('document').ready(function(){
  var owl = jQuery('.slider .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i> '],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

/* ===============================================
  OWL CAROUSEL DEAL OF THE DAY CATEGORY SECTION
=============================================== */

jQuery('document').ready(function(){
  var owl = jQuery('#deal-of-day .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    autoHeight: true,
    loop: true,
    dots:true,
    navText:["<div class='nav-btn fas fa-chevron-left' </div>","<div class='nav-btn  fas fa-chevron-right' </div>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      },
      1200: {
        items: 4
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

/* ===============================================
  OPEN CLOSE Menu
============================================= */

function grocery_shopping_open_menu() {
  jQuery('button.menu-toggle').addClass('close-panal');
  setTimeout(function(){
    jQuery('nav#main-menu').show();
  }, 100);

  return false;
}

jQuery( "button.menu-toggle").on("click", grocery_shopping_open_menu);

function grocery_shopping_close_menu() {
  jQuery('button.close-menu').removeClass('close-panal');
  jQuery('nav#main-menu').hide();
}

jQuery( "button.close-menu").on("click", grocery_shopping_close_menu);

/* ===============================================
  TRAP TAB FOCUS ON MODAL MENU
============================================= */

jQuery('button.close-menu').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('button.menu-toggle').focus();
  }
});

/* ===============================================
  Scroll Top //
============================================= */

jQuery(window).scroll(function () {
  if (jQuery(this).scrollTop() > 100) {
      jQuery('.scroll-up').fadeIn();
  } else {
      jQuery('.scroll-up').fadeOut();
  }
});

jQuery('a[href="#tobottom"]').click(function () {
  jQuery('html, body').animate({scrollTop: 0}, 'slow');
  return false;
});

/* ===============================================
 DAYS NUMBER COUNTER
=============================================== */

function grocery_shopping_timer($timer,mydate){
  // Set the date we're counting down to
  var countDownDate = new Date(mydate).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="timer"

      $timer.html( "<div class='timercolr'>" + days + "<br><span class=''>Days</span>" + "</div>" + "   " +"<div class='timercolr'>" + hours + "<br><span>Hours</span>" + "</div>" + "   " + "<div class='timercolr'>" + minutes + "<br><span>Mins</span>" + "</div>" + "   " + "<div class='timercolr'>" + seconds + "<br><span>Secs</span>" + "</div>");

      // If the count down is over, write some text
      if (distance < 0) {
          clearInterval(x);
          $timer.html("Timer Up -EVENT EXPIRED");
      }
  }, 1000);
}
jQuery("document").ready(function(){
  var mydate =jQuery('.date').val();
  jQuery(".countdown").each(function(){
      grocery_shopping_timer(jQuery(this),mydate);
  });
});

/*===============================================
 PRELOADER
=============================================== */

jQuery('document').ready(function($){
  setTimeout(function () {
  jQuery(".cssloader").fadeOut("slow");
},1000);
});
