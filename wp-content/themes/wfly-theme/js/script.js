(function($) {
  function headerFixed() {
    var headertop = $('#header');
    var offset = headertop.position();
    $(window).scroll(function () {
      if ($(this).scrollTop() > offset.top) {
        headertop.addClass('fixed');
      } else {
        headertop.removeClass('fixed');
      }
    });
  }

  function navigation() {
    $('.menu-icon').click(function() {
      $('ul.main-nav').slideToggle('fast');
    });
  }

  function searchtoggle() {
    $(".block-search > .search").hide();
    $(".block-search .toggle-search").click(function(){
      $(this).toggleClass("open");
      $(this).toggleClass("close");
      $(".block-search > .search").slideToggle();
    });
  }

  function featureSlider() {
    $('.cf_block-slider').slick({
      arrows: true,
      dots: false,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      adaptiveHeight: true,
      autoplay: true,
      autoplaySpeed: 3000,
    });
  }

  function verticalSlick() {
    $('.slickvertical > ul').slick({
      vertical: true,
      slidesToScroll: 1,
      autoplay: true,
      speed: 300,
      slidesToShow: 3,
      adaptiveHeight: true
    });
  }

  function colorbox() {
    if($( window ).width() < 480) {
      $(".popup-login").colorbox({inline:true, width:"100%"});
    } else {
      $(".popup-login").colorbox({inline:true, width:"30%"});
    }
  }

  function loginForm() {
    var form_group = $('.login-form .form-group');
    form_group.each(function() {
      if($(this).html().replace(/\s|&nbsp;/g, '').length == 0) {
        $(this).remove();
      }
 
      var form_class = $(this).find('input').attr('name');
      $(this).addClass(form_class);
    })
  }

  function matchHeight() {
    //$(this).find('.post-cars .car-title').matchHeight();
    $('.block-tuyen-sinh .post-title').matchHeight();
  }

  function moveSlideshow() {
    var parent_height = $('.view-post-title').outerHeight(true);
    var content_height = $('.view-post-title > ul').outerHeight(true);
    var slide_height = content_height - parent_height;
    $('body').append( "<style>@-webkit-keyframes moveSlideshow {0% { top: 0; } 50% { top: -"+slide_height+"px; } 51% { top: -"+slide_height+"px; } 100% { top: 0; }}@-moz-keyframes moveSlideshow {0% { top: 0; } 50% { top: -"+slide_height+"px; } 51% { top: -"+slide_height+"px; } 100% { top: 0; }}");
    var position_slide = $('.view-post-title > ul').position().top;
    console.log(position_slide);
  }

  $(document).ready(function() {
    // Call to function
    //headerFixed();
    navigation();
    searchtoggle();
    featureSlider();
    verticalSlick();
    colorbox();
    moveSlideshow();
    //matchHeight();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
    //matchHeight();  
  });
})(jQuery);
