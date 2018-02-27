(function($) {


	$(document).ready(function(){
		$(".screenshot").fancybox({
			helpers: {
				overlay: {
					locked: false
				}
			},
			padding: 0
		});
		$('.product__screens-wrapper').slick({
			dots: true,
			accessibility: true,
			infinite: true,
			slidesToShow: 5
		});
		$('.product__screens').animate({opacity: 1}, 250);
	});

})(jQuery);
