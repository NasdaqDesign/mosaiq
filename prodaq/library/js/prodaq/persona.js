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

	});


})( jQuery );
