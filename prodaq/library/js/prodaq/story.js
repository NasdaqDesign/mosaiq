// Story and Fullpage JS work
// Needs fullpage.js


(function($) {


	$(document).ready(function(){

		var $footer = $('.fp__footer');

		var storyNavArr = [],
			storyAnchorArr = [];

		$('.section').each(function(){
			storyNavArr.push($(this).data('name'));
			storyAnchorArr.push($(this).data('anchor'));
		});

		$wrapper = $('#story-wrapper');

		$wrapper.fullpage({
			navigation: false,
			anchors: storyAnchorArr,
			navigationTooltips: storyNavArr,
			showActiveTooltip: true,
			afterLoad: function(anchorLink, index){
				var loadedSection = $(this);

				if(loadedSection.hasClass('image-slide')){
					placePoints(loadedSection);
					//loadedSection.find('.target').popover('show');
				}
			},
			onLeave: function(index, nextIndex, direction){
				var leavingSection = $(this),
					$nextSlide = $wrapper.find('.section:nth-of-type('+ nextIndex +')'),
					iterationNumber = $nextSlide.attr('id').charAt(0);

				if(nextIndex == 1){
					$footer.find('.iteration_number').html('');
				}
				else{
					$footer.find('.iteration_number').html('Iteration ' + iterationNumber);
				}
				if(leavingSection.hasClass('image-slide')){
					enterCount = 0;
					leavingSection.find('.target').popover('destroy').remove();
				}
			}
		});

		hideNav($wrapper, 1500);
	});

	$('body').on('click', '.target', function(){
		$('.target').popover('destroy');
		$(this).popover('show');
	});

	var enterCount = 0,
		targetCount = 0;
	$('body').on('keypress', function(e){
		var $currentSection = $('body').find('.fp-section.active');

		if(e.which == 13) {
			// we need to match the amount of targets to amount of enters
			enterCount ++;
			if($currentSection.hasClass('image-slide')){
				targetCount = $currentSection.find('.target').length;
			}
			$('.target').popover('destroy');
			$currentSection.find('.target:nth-of-type('+enterCount+')').popover('show');
			if(enterCount == targetCount){
				enterCount = 0;
			}
		}
	});


})( jQuery );
