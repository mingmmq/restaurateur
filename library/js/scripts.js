jQuery(document).ready(function($){
	
	var $window = $(window),
        $menu = $('div.menu');
	
	function checkWindowSize() {
		var width = $window.width();
		if ( width < 824 ) {
			return $menu.addClass('nav-mobile');
		}
		$menu.removeClass('nav-mobile');
	}
	
	$window
        .resize(checkWindowSize)
        .trigger('checkWindowSize');
		
	checkWindowSize();
	
	/* prepend menu icon */
	/* text version - but only supports english, not useful if your website is supporting multiple langauges */
	/* $('div.menu').prepend('<div id="menu-icon">Navigation</div>'); */
        /* fontawesome version */
        $('div.menu').prepend('<div id="menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></div>');
	$('#menu-filter-wrap').prepend('<div id="menu-item-icon">Select Menu Item</div>');
	
	/* toggle nav */
	$("#menu-icon").on("click", function(){
		$("div.menu > ul").slideToggle();
		$(this).toggleClass("active");
	});

	$("#menu-item-icon").on("click", function(){
		$("#menu-filters").slideToggle();
		$(this).toggleClass("active");
	});
	
	/* preloader */
	$('#load-cycle').hide();
	
	/* jquery cycle */
	$('.cycle-slideshow').show();
	
	
	/* toggle search box */
	$("#search-icon").on("click", function(){
		$("#search-box-wrap").slideToggle();
	});
	
	$("#close-x").on("click", function(){
		$("#search-box-wrap").slideUp();
	});
	
	$(".post-box").bind("mouseenter", function() {
		$(this).find(".post-box-img").fadeOut(400);
	});
	
	$(".post-box").bind("mouseleave", function() {
		$(this).find(".post-box-img").fadeIn(400);
	});
	
	var $container = $('#grid-wrap');
	
	$container.isotope({
	  itemSelector : '.grid-box',
	});

	
	$(window).resize(function() {
		$container.isotope({
		  itemSelector : '.grid-box'
		});
	});
	
	
	$('a.menu-filter-link').click(function(){
	  var selector = $(this).attr('data-filter');

	  $container.isotope({ 
	  	itemSelector : '.grid-box',
	  	filter: selector,
	  });
	  return false;
	});


});
