// Functions accessible to various scripts
// Do these really need to be separate files? I like keeping functions in one place even if they aren't all used on the same page. plus we can use this as global file and move things into their own files once they require it.
(function($){
  new WOW().init();
  //If you ever need to hide the nav and footer for 'fullscreen'
  hideNav = function(wrapper, timer){
    setTimeout(function(){
      $('.navbar-main').addClass('hide-top');
      $('.fp__menu-toggle').addClass('show');
      $('.fp__footer').addClass('show');
      $('#sub-floor').animate({bottom: '-70px'}, 250);
      wrapper.animate({opacity: '1'}, 500);
    }, timer);
  };

  // For building the counts on the svg map
  buildMap = function(wrapper){

    var amersCount = wrapper.find('.region-count').data('amers'),
      emeaCount = wrapper.find('.region-count').data('emea'),
      apacCount = wrapper.find('.region-count').data('apac');

    wrapper
      .append('<span data-hover="amers" style="top: 24%; left: 13%;" class="count">AMERS<strong>'+ amersCount + '</strong></span>')
      .append('<span data-hover="emea" style="top: 36%; left: 46%;" class="count">EMEA<strong>'+ emeaCount + '</strong></span>')
      .append('<span data-hover="apac" style="top: 24%; left: 68%;" class="count">APAC<strong>'+ apacCount + '</strong></span>');

  };

  // For placing points and annotations on an image
  placePoints = function(slide){
    slide.find('.image-wrapper').each(function(){
      var	$wrapper = $(this),
        data = $wrapper.find('.data-wrapper').data('annotations');

      for(var i = 0; i<data.length; i++){
        var xperc = data[i].xperc,
          yperc = data[i].yperc,
          heading = data[i].heading,
          description = data[i].annotation,
          imgWidth = $wrapper.find('img').width(),
          imgHeight = $wrapper.find('img').height(),
          xpos = imgWidth * xperc,
          ypos = imgHeight * yperc;

        //build points
        $wrapper.append('<a href="#" data-container="body" data-placement="top" data-toggle="popover" data-content="' + description + '" title="' + heading + '" style="left: '+ (xpos-25)+'px; top: '+ (ypos-25) + 'px;" class="target"><i class="fa fa-bullseye"></i></a>');

      }
    });
  };

  $(document).ready(function(){
    var $body = $('body'),
      $window = $(window),
      $document = $(document),
      templateUrl = object_name.templateUrl;


    $('a.anchor[href*="#"]:not([href="#"])').click(function(e) {
      e.preventDefault();
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - 50
          }, 250);
          return false;
        }
      }
    });
    if($('body').hasClass('home')){
      $('.home__product > a, .home__research > a').on('click', function(e){
        e.preventDefault();

        var target = $(this).data('target');

        $('.home__product, .home__research').removeClass('active');


        if(target == 'product'){
          $('.home__product').css('width', '100%');
          $('.home__research').css('width', '0%');
          setTimeout(function(){
            $('.home__product').addClass('active');

            $('.design__resources-slider').slick({
              dots: false,
              arrows: false,
              autoplay: true
            });
          }, 500);
        }

        else if(target == 'research'){
          $('.home__product').css('width', '0%');
          $('.home__research').css('width', '100%');
          setTimeout(function(){
            $('.home__research').addClass('active');
          }, 500);
        }
        else if(target == 'home'){
          $('.home__product').css('width', '50%');
          $('.home__research').css('width', '50%');
        }
        else{

        }


      });
    }

    //hideNav($('.home__hero'), 1500);



    $('.fp__menu-toggle').click(function(e){
      e.preventDefault();
      $('.navbar-main').toggleClass('hide-top');
      $(this).toggleClass('spin');
    });

    // Search Toggle
    /* commenting out since we use a paid search plugin
    $body.on('click', '.search-toggle', function(e){
      e.preventDefault();
      if($('.search__bg').hasClass('active')){
        $(this).html('<img src="'+directory_uri.template_directory_uri+'/library/images/search_icon.png">');
        $('.search__bg').removeClass('active');
        $body.removeClass('search-open');
      }
      else{
        $('.search__bg').addClass('active');
        $(this).html('<img src="'+directory_uri.template_directory_uri+'/library/images/modal_x.png">');
        $body.addClass('search-open');
      }
    });
    */

    $('#bgvid, .navbar-main').animate({opacity: '1'}, 250);
    $('[data-toggle="tooltip"]').tooltip({container: 'body'});

    // Navbar Stuff
    // ------------------------------------------------------------------------------------------
    $window.on('scroll', function () {
      if ($window.scrollTop() >= 50) {
          $('.navbar-main').addClass('filled');
      }
      else{
          $('.navbar-main').removeClass('filled');
      }
    });

    // Pattern Library iFrames
    // ------------------------------------------------------------------------------------------
    //Calculate iframe height to fill page
    var iframeHeight =  $(document).height() - 32;
    $('.iframe-wrapper').css('height', iframeHeight);

    $('.participant-modal').on('hide.bs.modal', function(){
      var $audio = $(this).find('audio');
      if($audio){
        $audio.trigger('pause');
      }
    });


  });



})(jQuery);
