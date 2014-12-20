$(document).ready(function () {

 $('select#sCategory').change(function(){
    $("#autowidth").html($('select#sCategory option:selected').text());
    $(this).width($("#autowidth").width()+30); // 30 : the size of the down arrow of the select box 
 });

	//slideshow
	$('.carousel').carousel();
	//$(".carousel-indicators li:first").addClass("active");
	$(".carousel-inner .item:first").addClass("active");
	
    // gototop
	   // hide #back-top first
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

		 /*$(window).ready( function(){*/
		 /* automatic keep header always displaying on top */
		/* automatic keep header always displaying on top */
		/*if( $("body").hasClass("keep-header") ){
			 $("#header").addClass( "navbar-fixed-top" );
			var hideheight =  $("#header").height()+120; 
			$("#page").css( "padding-top", $("#header").height() );
			$(window).scroll(function() {
				var pos = $(window).scrollTop();
				if( pos >= hideheight ){
					$("#top").addClass('hide-bar');
			$(".hide-bar").css( "margin-top", - $("#top").height() );
				}else {
					$("#top").removeClass('hide-bar');
					$("#top").css( "margin-top", 0 );
				} 
			});
		}
		} );*/
});