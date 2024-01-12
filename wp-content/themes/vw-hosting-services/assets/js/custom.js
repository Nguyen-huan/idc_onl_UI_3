function vw_hosting_services_menu_open_nav() {
	window.vw_hosting_services_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_hosting_services_menu_close_nav() {
	window.vw_hosting_services_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.vw_hosting_services_currentfocus=null;
  	vw_hosting_services_checkfocusdElement();
	var vw_hosting_services_body = document.querySelector('body');
	vw_hosting_services_body.addEventListener('keyup', vw_hosting_services_check_tab_press);
	var vw_hosting_services_gotoHome = false;
	var vw_hosting_services_gotoClose = false;
	window.vw_hosting_services_responsiveMenu=false;
 	function vw_hosting_services_checkfocusdElement(){
	 	if(window.vw_hosting_services_currentfocus=document.activeElement.className){
		 	window.vw_hosting_services_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_hosting_services_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_hosting_services_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_hosting_services_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_hosting_services_gotoHome = true;
			} else {
				vw_hosting_services_gotoHome = false;
			}

		}else{

			if(window.vw_hosting_services_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_hosting_services_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_hosting_services_responsiveMenu){
				if(vw_hosting_services_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_hosting_services_gotoClose = true;
				} else {
					vw_hosting_services_gotoClose = false;
				}

			}else{

			if(window.vw_hosting_services_responsiveMenu){
			}}}}
		}
	 	vw_hosting_services_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});


jQuery('document').ready(function(){
  var owl = jQuery('#main-product .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: false,
    dots:false,
    navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

function flashcountdown($timer,mydate){
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
      // console.log($timer.html())
      $timer.html( "<div class='numbers'><div class='timer_days timmer-days timer_after'>" + days + "</div><div class='nofont'></div>" + "</div>" + "   " +"<div class='numbers'><div class='timer_days timmer-hr timer_after'>  " + hours + "</div><div class='nofont'></div>" + "</div>" + "   " + "<div class='numbers'><div class='timer_days timmer-min timer_after'>  " + minutes + "</div><div class='nofont'></div>" + "</div>" + "   " + "<div class='numbers'><div class='timer_days'>  " + seconds + "</div><div class='nofont'></div>" + "</div>");
      // If the count down is over, write some text
      if (distance < 0) {
          clearInterval(x);
          $timer.html("Timer Up -EVENT EXPIRED");
      }
    }, 1000);
  }
    var mydate =jQuery('.date2').val();
    jQuery(".countdown2").each(function(){
        flashcountdown(jQuery(this),mydate);
    });


// tab

jQuery(document).ready(function () {
	jQuery( ".tablinks" ).first().addClass( "active" );
});

function vw_hosting_services_services_tab(evt, cityName) {
  var vw_hosting_services_i, vw_hosting_services_tabcontent, vw_hosting_services_tablinks;
  vw_hosting_services_tabcontent = document.getElementsByClassName("tabcontent");
  for (vw_hosting_services_i = 0; vw_hosting_services_i < vw_hosting_services_tabcontent.length; vw_hosting_services_i++) {
    vw_hosting_services_tabcontent[vw_hosting_services_i].style.display = "none";
  }
  vw_hosting_services_tablinks = document.getElementsByClassName("tablinks");
  for (vw_hosting_services_i = 0; vw_hosting_services_i < vw_hosting_services_tablinks.length; vw_hosting_services_i++) {
    vw_hosting_services_tablinks[vw_hosting_services_i].className = vw_hosting_services_tablinks[vw_hosting_services_i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
	jQuery('.tabcontent').hide();
	jQuery('.tabcontent:first').show();

	// button js
	jQuery('.features-clicked').on('click', function() {
	  // jQuery(this).toggleClass('show');
	  jQuery('.features-clicked').toggleClass('show');

	  jQuery('.nav-item.dropdown .dropdown-menu').toggleClass('show');
	});
});


