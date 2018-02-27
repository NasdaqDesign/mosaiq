(function($) {


	$(document).ready(function(){
		var $body = $('body');

		$('.resource__wrapper .nav').affix({
				offset: {
						top: $('.resource__wrapper .nav').offset().top -105
				}
		});
		$body.scrollspy({
			target: '.resource__wrapper .scrollspy',
			offset: 50
		 });

		 $('a.video').fancybox({
				maxWidth	: 800,
				maxHeight	: 400,
				padding: 0,
				helpers : {
					overlay: {
						locked: false
					},
					media : {}
				}
		 });
	});

})(jQuery);
