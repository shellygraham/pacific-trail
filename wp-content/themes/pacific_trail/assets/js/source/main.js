var toggleModal;
var mediaTabletWidth = 768;

(function ($) {
  
  $(document).ready(function($) {

    // Header scrolling
    // vary amount of scrolling needed to shrink header based on page
    var shrinkHeaderScrollDistance;
    if ( $('body').hasClass('single-product') ) {
      shrinkHeaderScrollDistance = 25;
    } else {
      shrinkHeaderScrollDistance = 200;
    }

    // set header class on scroll
    $(window).scroll( function() {
      if ( $(window).scrollTop() >= shrinkHeaderScrollDistance ) {
          $(".site-header").addClass("shrunk");
      } else {
          $(".site-header").removeClass("shrunk");
      }
    });

    // Main nav switcher mobile/desktop
    if ( $(window).width() < mediaTabletWidth ) {
      $('#site-navigation').addClass('mobile-nav');
    }

		// disable swatch click event on non-product detail pages
		if ( $('body').hasClass('archive') || $('body').hasClass('home') ) {
      $('.variations-table .swatch-anchor').click( false );
		}

    // CTA hover effect
    $('.cta-container .cta').hover(
      function() {
        $(this).addClass('hover');
      },
      function() {
        $(this).removeClass('hover');
      }
    );

    // Initialize modal show/hide
    toggleModal = function() {
      $('.modal').toggleClass('active');
      $('body').toggleClass('modal-active');
    }
    $('#contact-btn, .modal-close, .menu-item.contact').click( toggleModal );
    
    // skrollr parallax
    var mySkrollr;

    function initBannerParallax() {
      if( !(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera) && ($(window).width() > mediaTabletWidth) ) {
        mySkrollr = skrollr.init({
          forceHeight: false
        });
        // show banner after skrollr has initialized
        $(".parallax-image-wrapper").css({
          opacity: 1
        });
      } else {
        if ( mySkrollr && typeof mySkrollr.destroy === 'function' ) {
          mySkrollr.destroy();
        }
        $(".parallax-image-wrapper").css({
          opacity: 1
        });
      }
    }

    var bannerResizeTO;
    $(window).resize( function() {
      clearTimeout(bannerResizeTO);
      bannerResizeTO = setTimeout( initBannerParallax, 500 );
    });
    initBannerParallax();

    // Initialize mobile menu
    $("#mobile-navigation").mmenu({
      navbar: {
        add: false
      },
      offCanvas: {
        position: "right"
      }
    });

    // Initialize mobile menu button
    var mm = $("#mobile-navigation").data( 'mmenu' );
    
    $(".brand .menu").click(function(e) {
      mm.open();
      $(this).blur();
      e.preventDefault();
    });
  });
}(jQuery))