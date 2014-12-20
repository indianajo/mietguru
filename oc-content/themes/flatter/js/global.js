$(document).ready(function () {					
	//slideshow
	$('.carousel').carousel();
	//$(".carousel-indicators li:first").addClass("active");
	$(".carousel-inner .item:first").addClass("active");
	//slideshow end
	
    // gototop
	 $("#back-top").hide(); 
	 // fade in #back-top
	 $(function () {
		  $(window).scroll(function () {
		   if ($(this).scrollTop() > 100) {
			$('#back-top').fadeIn();
		   } else {
			$('#back-top').fadeOut();
		   }
		  });

		  // scroll body to 0px on click
		  $('#back-top a').click(function () {
		   $('body,html').animate({
			scrollTop: 0
		   }, 800);
		   return false;
	  });
	 });
	 // gototop end
	 
});


$(function () { $("[data-toggle='tooltip']").tooltip(); });

/* Categories Menu Dropdown */
$(function() {
	$(".dropdown").hover(
		function(){ $(this).addClass('open') },
		function(){ $(this).removeClass('open') }
	);
});

/* Owl Carousel */
$(document).ready(function() {
  var owl = $("#owl-popular");
  owl.owlCarousel({
	// Define custom and unlimited items depending from the width
	// If this option is set, itemsDeskop, itemsDesktopSmall, itemsTablet, itemsMobile etc. are disabled
	// For better preview, order the arrays by screen size, but it's not mandatory
	// Don't forget to include the lowest available screen size, otherwise it will take the default one for screens lower than lowest available.
	// In the example there is dimension with 0 with which cover screens between 0 and 450px
	
	itemsCustom : [
	  [0, 1],
	  [450, 2],
	  [600, 3],
	  [700, 3],
	  [1000, 4],
	  [1200, 5],
	  [1400, 5],
	  [1600, 6]
	],
	navigation : true
  });

  var owl = $("#owl-latest");
  owl.owlCarousel({
	// Define custom and unlimited items depending from the width
	// If this option is set, itemsDeskop, itemsDesktopSmall, itemsTablet, itemsMobile etc. are disabled
	// For better preview, order the arrays by screen size, but it's not mandatory
	// Don't forget to include the lowest available screen size, otherwise it will take the default one for screens lower than lowest available.
	// In the example there is dimension with 0 with which cover screens between 0 and 450px
	
	itemsCustom : [
	  [0, 1],
	  [450, 2],
	  [600, 3],
	  [700, 3],
	  [1000, 4],
	  [1200, 5],
	  [1400, 5],
	  [1600, 6]
	],
	navigation : true
  });
});