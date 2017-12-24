jQuery(function ($) {



  var $scroll;

  if ($(window).innerWidth() <= 1170) {
    $scroll = 100;
  } else {
    $scroll = 20;
  }



  $(window).resize(function () {
    if ($(window).innerWidth() <= 1170) {
      $scroll = 100;
    } else {
      $scroll = 20;
    }
  });




  //Match
  $('.FullGrid-match').matchHeight({
    byRow: true,
    property: 'height',
    target: null,
    remove: false
  });

  //Video in grid

  var iframe = document.getElementById('gridVideo');

  // $f == Froogaloop
  var player = $f(iframe);

  var playButton = document.getElementById("play-button");
  playButton.addEventListener("click", function () {
    player.api("play");
  });


  //Animate Down
  var stateObj = { foo: "bar" };
  $('.HoverCard-navigator').click(function () {
    var nextSibling = $(this).closest('section').next().offset().top;
    $('html, body').animate({ scrollTop: nextSibling + $scroll }, 600);
    window.history.replaceState(stateObj, 'test', '#test');
  });


  //Anchor Marks
  $(window).scroll(function () {
    // console.log('newset');
    var activePosition = -1000000;
    var activeElement = '';
    var currentState = history.state;
    // console.log(currentState);
    $(".SectionID").each(function (index) {
      var sectionPosition = $(this).offset().top - $(window).scrollTop();
      var sectionElement = $(this);
      if (sectionPosition > activePosition && sectionPosition < 0) {
        activePosition = sectionPosition;
        activeElement = sectionElement;
      }
      // console.log(sectionPosition);
    });
    // console.log(activeElement);
    if (activeElement) {
      activeID = '#' + activeElement.attr('id');
    }

    if (currentState != activeID) {
      window.history.replaceState(activeID, activeID, activeID);
      $('.Header-bubble').removeClass('is-active');
      $('.SubHeader a[href="' + activeID + '"]').addClass('is-active');
      $('.Header-nav a').removeClass('is-active');
      $('.Header-nav a[href="' + activeID + '"]').addClass('is-active');
    }

  });


  // $('.Header-bubble').first().addClass('is-active');


  //General Smooth Scrolling
  // Select all links with hashes
  $('.Header a[href*="#"], .Hero-push')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top + $scroll
          }, 500, function () {
            // Callback after animation
            // Must change focus!

          });
        }
      }
    });

  //Header Menu
  $('.Header-hamburger').click(function () {
    $(this).toggleClass('active');
    $('.Header').toggleClass('active');
    $('body, html').toggleClass('u-locked');
  });

  $('.Header-nav a').click(function () {
    $('.Header').toggleClass('active');
    $('.Header-hamburger').toggleClass('active');
    $('body, html').toggleClass('u-locked');
  });

  $('.Header-logo-inverted').click(function () {
    $('.Header').toggleClass('active');
    $('.Header-hamburger').toggleClass('active');
    $('body, html').toggleClass('u-locked');
  });

  $('.Content-video-button').click(function () {
    $(this).addClass('active');
    $('.Content-video-video').addClass('active');
  });


  var iframeTwo = document.getElementById('heroVideo');

  // $f == Froogaloop
  var player2 = $f(iframeTwo);

  var playButton = document.getElementById("play-buttonTwo");
  playButton.addEventListener("click", function () {
    player2.api("play");
  });




  //Flickity
  var $carousel = $('.ContactCta .grid--carousel');

  if ($(window).innerWidth() <= 1170) {
    $carousel.flickity({
      // options
      cellAlign: 'center',
      cellSelector: '.grid__col--1-of-3',
      pageDots: true,
      contain: true
    });
  } else {
    // $carousel.flickity('destroy');
  }



  $(window).resize(function () {
    if ($(window).innerWidth() <= 1170) {
      $carousel.flickity({
        // options
        cellAlign: 'center',
        cellSelector: '.grid__col--1-of-3',
        pageDots: true,
        contain: true
      });
    } else {
      if ($('.flickity-enabled').length > 0) {
        $carousel.flickity('destroy');
      }

    }
  });



  $('#Hero').vidbg({
    'mp4': '/wp-content/themes/passalong/assets/images/hero.mp4',
    'webm': '/wp-content/themes/passalong/assets/images/hero.webm',
    'poster': '/wp-content/themes/passalong/assets/images/empty.png'
  }, {
      muted: true,
      loop: true
    });


  $('html').addClass('active');





});