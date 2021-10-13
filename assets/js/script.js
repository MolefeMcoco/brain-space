$(document).ready(function(){
    $(".quote").addClass("animatable fadeInUp slow")
    $(window).load(function(){
      $(".loaded").fadeOut();
      $(".preloader").delay(1000).fadeOut("slow");

      

      
    });

    // form validation
        $("#message_form").validate();
        $("#newsletter_form").validate();
        $(".booking_form").validate();

    //gallery filter
    $(".gallery_product a").addClass("gallery");
    $('.gallery').featherlightGallery();

    //gallery filter
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
        $(this).addClass("active");//end gallery filter


    $(window).scroll(function(){
        //navigation animation
        if (jQuery(window).scrollTop()> 75) {
            $("#navigation").addClass("attach");
            $(".navbar").addClass("navbar_background");
            $(".about-nav").removeClass("attach");
        }else{
            $("#navigation").removeClass("attach");
            $(".about-nav").removeClass("attach");
        };
        //end navigation animation 

        $('.down-arrow').localScroll({duration:1500});

        $(".pay_page #navigation").removeClass("attach");
});

});


jQuery(function($) {
  // Function which adds the 'animated' class to any '.animatable' in view
  var doAnimations = function() {
    
    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $('.animatable');
    
    // Unbind scroll handler if we have no animatables
    if ($animatables.length == 0) {
      $(window).off('scroll', doAnimations);
    }
    
    // Check all animatables and animate them if necessary
        $animatables.each(function(i) {
       var $animatable = $(this);
            if (($animatable.offset().top + $animatable.height() - 20) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
            }
    });

    };
  
  // Hook doAnimations on scroll, and trigger a scroll
    $(window).on('scroll', doAnimations);
    $(window).trigger('scroll');

  $(".service_icon i").addClass("animatable fadeIn slow");

});


