(function ($) {
  
  $(document).ready(function($) {

		if ( !$('body').hasClass('single-product') ) return;

    console.log('single product');

    var origSkuText = $('.sku:first').text();
		
		// run initialization function after delay to allow other plugins to initialize first
    function initSingleProduct() {
      // unselect swatch and reset variation info when thumbnail is clicked
      $('.yith_magnifier_thumbnail').click( function(e) {
        $('.variations-table .selected').removeClass('selected');
        $('.yith_magnifier_thumbnail').removeClass('active');
        $(this).addClass('active');
        $('.color_wrapper').html('');
        $('.sku').text(origSkuText);
      });

      // remove multiple zoom wrapper instances that sometimes appear when selecting swatch
      // and show appropriate swatch variation text when swatch is clicked
      $('.variations-table .swatch-anchor').click( function() {
        // remove zoom wrappers
        unwrapZoom();
        $('.yith_magnifier_thumbnail').removeClass('active');

        // show color name
        var title = $(this).attr('title');
        var varInfoText = 'Color <span class="color">' + title + '</span>';
        var target = $('.color_wrapper');
        target.html( varInfoText );
      });

      function unwrapZoom() {
        var wrapperClass = '.yith_magnifier_zoom_wrap';
        $( wrapperClass ).children( wrapperClass ).unwrap( wrapperClass );
        if ( $( wrapperClass ).children( wrapperClass ).length > 1 ) {
          unwrapZoom();
        }
      }

      // make first thumbnail active
      $('.yith_magnifier_thumbnail:first').addClass('active');

      // fade in swapped image
      $('.yith_magnifier_thumbnail, .variations-table .swatch-anchor').click( function(e) {
        $(".images").hide().fadeIn(500);
      });

      // resize thumbnail container
      function matchHeight() {
        var newHeight = $(".yith_magnifier_zoom_wrap").height();
        $(".thumbnails").height(newHeight);
      }
      var mhTO;
      $(window).resize( function() {
        clearTimeout(mhTO);
        mhTO = setTimeout( matchHeight, 100);
      });
    }

		var singleProductTO = setTimeout( initSingleProduct, 1000);

  });

}(jQuery))