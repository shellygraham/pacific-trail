(function ($) {
  
  $(document).ready(function($) {
    
    // Product sliders
    var owlWrap = $('.owl-wrapper');
    // checking if the dom element exists
    if (owlWrap.length > 0) {
      // check if plugin is loaded
      if ($().owlCarousel) {
        owlWrap.each(function(){
          var carousel= $(this).find('.owl-carousel'),
            navigation = $(this).find('.customNavigation'),
            nextBtn = navigation.find('.next'),
            prevBtn = navigation.find('.prev'),
            playBtn = navigation.find('.play'),
            stopBtn = navigation.find('.stop');
            
          carousel.owlCarousel({
            items : 3, //3 items above 1000px browser width
            itemsDesktop : [1200,3], //3 items between 1000px and 901px
            itemsDesktopSmall : [1000,2], // betweem 900px and 601px
            //itemsTablet: [767,2], //2 items between 600 and 0
            itemsMobile : [479,1], // itemsMobile disabled - inherit from itemsTablet option
            rewindNav: false
          });
         
          // Custom Navigation Events
          nextBtn.click(function(){
            carousel.trigger('owl.next');
          });
          prevBtn.click(function(){
            carousel.trigger('owl.prev');
          });
          playBtn.click(function(){
            owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
          });
          stopBtn.click(function(){
            owl.trigger('owl.stop');
          });

        });
      };
    };

    function setCarouselHeight() {
      var items = $('.owl-item .item');
      var buttons = $('.owl-wrapper .btn-holder');
      var infos = $('.owl-wrapper .category-info');

      // set item and info heights only for large sizes
      if ( $(window).width() > mediaTabletWidth ) {

        // reset heights
        items.css({
          'height': 'auto'
        });

        var carouselHeight = 0;
        items.each(function() {       
            // store highest value
            if( $(this).height() > carouselHeight ) {
                carouselHeight = $(this).height();
            }
        });
        // set item heights
        items.height(carouselHeight);
        // set info panel heights
        infos.outerHeight( items.outerHeight() );
      }

      // set buttons heights
      buttons.outerHeight( items.outerHeight() );

      // show carousel after layout has been initialized
      $('.category-container').css({
        'opacity': 1
      });
    }

    // set carousel heights on load and on window resize
    var carouselResizeTO;

    $(window).resize(function() {
      clearTimeout(carouselResizeTO);
      carouselResizeTO = setTimeout( setCarouselHeight, 500);
    });
    setCarouselHeight();
    
  });

}(jQuery))