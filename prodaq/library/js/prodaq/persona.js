(function($) {

	$(document).ready(function(){
		var $body = $('body');
		// set dots connecting personas
		var secondaryCount = $('.secondary').length,
			secondaryHeight = $('.secondary').outerHeight();
		$('.dotted').css('height', (secondaryCount * secondaryHeight) + 'px');

		if($body.hasClass('page-persona-stats')){
			buildMap($('.map-dist__map'));
		}
		else if($body.hasClass('single-persona')){
			buildMap($('.persona__participants-map'));
		}

		$body.on('mouseenter', '.count', function(){
			var target = $(this).data('hover');
			$('#worldmap .region#'+target).attr('class', 'region active');
		});
		$body.on('mouseleave', '.count', function(){
			var target = $(this).data('hover');
			$('#worldmap .region#'+target).attr('class', 'region');
		});


		$('.personas-list .filters').affix({
				offset: {
						top: $('.personas-list .filters').offset().top -105
				}
		});

		// Some SVG Interactions, not used right now
		// $('#worldmap .region').on('click', function(){
		// 	var region = $(this).attr('ID');
		// 	var activeClass = $(this).attr('class');
		//
		// 	if(activeClass.indexOf('active') !== -1){
		// 		$(this).attr('class', 'region');
		// 	}
		// 	else{
		// 		$(this).attr('class', 'region active');
		// 	}
		// });

	});


})( jQuery );
