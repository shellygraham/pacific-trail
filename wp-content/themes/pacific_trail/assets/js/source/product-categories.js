(function ($) {

  $(document).ready(function($) {

    // test if user is on product categories page
    if ( !$('body').hasClass('archive') ) return;

    // init sticky sidebar for product grid
    function initStickySidebar() {
      $(window).scroll(function() {
        if ($(window).width() > mediaTabletWidth) {
          var scroll = $(window).scrollTop();
          
          var productsOffset = $('.products').offset().top;
          var distance = productsOffset - scroll;
          var shrunkHeaderHeight = 103;

          if ( distance < shrunkHeaderHeight ) {
            $(".sidebar").css({
              'position': 'fixed',
              'top': shrunkHeaderHeight
            });
          } else {
            $(".sidebar").css({
              'position': 'relative',
              'top': 'auto'
            });
          }
        } else {
          $(".sidebar").css({
            'position': 'relative',
            'top': 'auto'
          });
        }
      });
      $(window).trigger('scroll');
    }

    // Dynamic div resizer for product grid
    function setHeight(column) {
      var maxHeight = 0;
      //Get all the element with class = col
      column = $(column);
      column.css('height', 'auto');
      //Loop all the column
      column.each(function() {       
          //Store the highest value
          if($(this).height() > maxHeight) {
              maxHeight = $(this).height();
          }
      });
      //Set the height
      column.height(maxHeight);
    }

    function adjustProductGrid() {
      setHeight('.woocommerce-page .product');
      initStickySidebar();
    }
    var productGridTO;
    $(window).resize(function() {
        clearTimeout(productGridTO);
        var productGridTO = setTimeout( adjustProductGrid, 500);
    });
    $(window).trigger('resize');

    // Product Grid sidebar nav
    $('.sidebar .btn').click(function(){
      $('.sidebar').toggleClass("closed");
      $('.products').toggleClass("closed");
      $('.woocommerce-page .product').height(function(index, height) {
        return (height + 40);
      });
    });

    // show products
    $('.products-wrapper').css({
      'opacity': 1
    });

    // Initialize product categories category filter
    var productCats = $(".product-cats");
    productCats.find(".filter").click( function() {
      productCats.toggleClass("hide-cats");
    });
    productCats.addClass("hide-cats");

  });
}(jQuery))