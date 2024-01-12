jQuery(function($){
  "use strict";
    jQuery('.gb_navigation > ul').superfish({
    delay:       500,
    animation:   {opacity:'show',height:'show'},
    speed:       'fast'
  });
});

function software_it_company_gb_Menu_open() {
  jQuery(".side_gb_nav").addClass('show');
}
function software_it_company_gb_Menu_close() {
  jQuery(".side_gb_nav").removeClass('show');
}

jQuery('.gb_toggle').click(function () {
  software_it_company_Keyboard_loop(jQuery('.side_gb_nav'));
});

var software_it_company_Keyboard_loop = function (elem) {
  var software_it_company_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var software_it_company_firstTabbable = software_it_company_tabbable.first();
  var software_it_company_lastTabbable = software_it_company_tabbable.last();
  software_it_company_firstTabbable.focus();

  software_it_company_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      software_it_company_firstTabbable.focus();
    }
  });

  software_it_company_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      software_it_company_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};

( function( $ ) {

  jQuery(document).ready(function($){
    // Implement go to top.
    var $scroll_obj = jQuery( '#btn-scrollup' );
    jQuery( window ).on( 'scroll',function(){
      if ( $( this ).scrollTop() > 100 ) {
        $scroll_obj.fadeIn();
      } else {
        $scroll_obj.fadeOut();
      }
    });

    $scroll_obj.on( 'click',function(){
      jQuery( 'html, body' ).animate( { scrollTop: 0 }, 600 );
      return false;
    });
  });

} )( jQuery );

document.addEventListener('DOMContentLoaded', function () {
        var preloader = document.getElementById('preloader');

        if (preloader) {  // Check if the element exists before trying to manipulate it
            var duration = 4000; // 10 seconds

            setTimeout(function () {
                preloader.style.display = 'none';
            }, duration);
        }
    });

 document.addEventListener('DOMContentLoaded', function () {
    // Get the header element
    var header = document.getElementById('middle-header');

    // Get the initial offset of the header
    var headerOffset = header.offsetTop;

    // Function to handle scroll events
    function handleScroll() {
        var sticky_setting = jQuery('#middle-header').attr('data-sticky');
        if (window.pageYOffset > headerOffset) {
            // Add the "sticky" class when scrolling down
            if(sticky_setting == 1) {
              header.classList.add('sticky');
            }
        } else {
            // Remove the "sticky" class when scrolling up
            if(sticky_setting == 1) {
              header.classList.remove('sticky');
            }
        }
    }

    // Attach the scroll event listener
    window.onscroll = handleScroll;
});
