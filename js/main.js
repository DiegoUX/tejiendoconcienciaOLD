(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

			// Logo header scroll down...
			$(window).scroll(function() {
				if ($(this).scrollTop() > '200') {  
				    $('header').addClass("minify");
				}
				else{
				    $('header').removeClass("minify");
				}
			});

	});
	
})(jQuery, this);
